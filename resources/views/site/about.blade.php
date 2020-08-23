@extends('layouts.site.master')

@section('title')
  {{ $setting->site_name }} | @lang('menu.about')
@endsection

@push('css')
<style>

</style>
@endpush
@section('content')
    <div class="container">
        <div class="col-md-8">

            <div class="about-image text-center wow slideInUp">
                <img style="width:25%" src="{{ asset('images/settings/' . $setting->site_logo) }}" alt="spfa">
                <p>{{ $first->description }}</p>
            </div>

            @foreach ($about->where('id', '!=', 1) as $item)
                <div class="about-text wow slideInUp">
                    <i class="fa fa-dot-circle-o"></i> <h3 style="display:inline-block">{{ $item->title }}</h3>
                    <p>{!! $item->description !!}</p>
                </div>
            @endforeach

        </div>
        <div class="col-md-4">
            @include('partials._aside')
        </div>
    </div>
@endsection

@push('js')

<script>
    $('table').addClass('table table-bordered table-hover text-center')
</script>

@if (app()->getLocale() == 'ar')

<script>
    $('table').css('direction', 'rtl')
</script>

@else 
<script>
    $('table').css('direction', 'ltr')
</script>
@endif

@endpush