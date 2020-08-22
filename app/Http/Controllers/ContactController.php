<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Unit;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:contacts-create')->only(['create', 'store']);
        $this->middleware('permission:contacts-read')->only(['index', 'show']);
        $this->middleware('permission:contacts-update')->only(['edit', 'update']);
        $this->middleware('permission:contacts-delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     **/
    public function index(Request $request)
    {
        $contacts = Contact::all();
        if($request->column){
            $contact = Contact::find($request->id);
            if($request->column == 'viewhome'){
                $contact->viewhome = !$contact->viewhome;
            }else{
                $contact->viewable = !$contact->viewable;
            }
            $contact->save();
            session()->flash('success', _('global.operation_success'));
            return redirect()->route('contacts.index');
        }

        return view('dashboard/contacts/index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Contact::TYPES;
        return view('dashboard/contacts/create', compact('types'));
    }

    /**
     * contact a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'value_' . app()->getLocale() => 'required',
        ]);
        

        $contact = Contact::create($request->all());
        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            
            $locale = config('translatable.locales')[$i];
            $contact_value = "value_" . $locale;
            $contact->setTranslation('value', $locale, $request->$contact_value);
            
        }
        
        
        $contact->save();
        if($request->next == 'back'){
            return redirect()->route('contacts.create')->with('success', __('global.create_success'));
        }else{
            return redirect()->route('contacts.index')->with('success', __('global.create_success'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Contact $contact)
    {
        if($request->column){
            if($request->column == 'viewhome'){
                $contact->viewhome = !$contact->viewhome;
            }else{
                $contact->viewable = !$contact->viewable;
            }
            $contact->save();
            session()->flash('success', _('global.operation_success'));
            return redirect()->route('contacts.show', $contact->id);
        }
        $types = Contact::TYPES;
        return view('dashboard/contacts/show', compact('contact', 'types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $types = Contact::TYPES;
        return view('dashboard/contacts/edit', compact('contact', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'value_' . app()->getLocale() => 'required',
        ]);

        $contact->update($request->all());

        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            
            $locale = config('translatable.locales')[$i];
            $contact_value = "value_" . $locale;
            $contact->setTranslation('value', $locale, $request->$contact_value);
            
        }
        
        $contact->save();

        if($request->next == 'back'){
            return back()->with('success', __('global.update_success'));
        }else{
            return redirect()->route('contacts.index')->with('success', __('global.update_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', __('global.delete_success'));
    }
}
