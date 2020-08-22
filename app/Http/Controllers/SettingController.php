<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:settings-create')->only(['create', 'store']);
        $this->middleware('permission:settings-read')->only(['index', 'show']);
        $this->middleware('permission:settings-update')->only(['edit', 'update']);
        $this->middleware('permission:settings-delete')->only('destroy');
    }
    
    public function index()
    {
        $setting = Setting::first();
        return view('dashboard.settings.edit', compact('setting'));
    }

    
    public function store(Request $request)
    {
        // dd($request->all());
        $request_data = $request->except('site_logo', 'site_email_password');

        $setting = Setting::first();
        $setting->update($request_data);
        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            
            $locale = config('translatable.locales')[$i];

            $site_name = "site_name_" . $locale;
            $setting->setTranslation('site_name', $locale, $request->$site_name);
            
            $maintenance_message = "maintenance_message_" . $locale;
            $setting->setTranslation('maintenance_message', $locale, $request->$maintenance_message);
        }

        if($request->site_logo) {
            if($setting['site_logo']) {
                unlink(public_path('images/settings' . '/' . $setting->site_logo));
            }
            $name_image_rand = rand(0 , 100000);
            $fileupload = $request->site_logo;
            $extention  = $fileupload->getClientOriginalExtension();
            $path       = $fileupload->move(public_path('images/settings/'), 'image_' . time() . $name_image_rand .'.' . $extention);
            $setting->site_logo = 'image_' . time() . $name_image_rand .  '.' . $extention;
        }

        if($request->site_email_password) {
            $setting->site_email_password = $request->site_email_password;
        }

        $setting->save();

        $env_update = $this->changeEnv([
            'MAIL_USERNAME'   => $setting->site_email,
            'MAIL_PASSWORD'   => $setting->site_email_password,
        ]);

        session()->flash('Update Success');

        return back()->with('success', __('global.update_success'));;
    }


    protected function changeEnv($data = array()){
        if(count($data) > 0){

            // Read .env-file
            $env = file_get_contents(base_path() . '/.env');

            // Split string on every " " and write into array
            $env = preg_split('/\s+/', $env);;

            // Loop through given data
            foreach((array)$data as $key => $value){

                // Loop through .env-data
                foreach($env as $env_key => $env_value){

                    // Turn the value into an array and stop after the first split
                    // So it's not possible to split e.g. the App-Key by accident
                    $entry = explode("=", $env_value, 2);

                    // Check, if new key fits the actual .env-key
                    if($entry[0] == $key){
                        // If yes, overwrite it with the new one
                        $env[$env_key] = $key . "=" . $value;
                    } else {
                        // If not, keep the old one
                        $env[$env_key] = $env_value;
                    }
                }
            }

            // Turn the array back to an String
            $env = implode("\n", $env);

            // And overwrite the .env with the new data
            file_put_contents(base_path() . '/.env', $env);
            
            return true;
        } else {
            return false;
        }
    }
}
