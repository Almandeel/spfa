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
            <aside>
                <div class="asite-item">
                    <div class="category">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="fill">
                                    <h4>@lang('global.last_post')</h4>
                                </div>
                            </div>

                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                    <div class="category_list">
                        @foreach ($news as $last)
                            <p><a href="{{ url('post/' . $last->id) }}"><i class="fa fa-angle-double-right"></i> {{ $last->name }}</a></p>
                        @endforeach
                        <p><a href="{{ route('create.news') }}"><i class="fa fa-angle-double-right"></i> @lang('global.add') @lang('news.name')  </a></p>
                    </div>
                </div>


                <div class="category">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="fill">
                                <h4>@lang('global.category')</h4>
                            </div>
                        </div>

                        <div class="col-md-6">

                        </div>
                    </div>
                </div>

                <div class="category_list">
                    <p><a href="{{ url('blog') }}"> <i class="fa fa-angle-double-right"></i> @lang('categories.all')</a></p>
                    @foreach ($categories as $category)
                        <p><a href="{{ url('news/category/' . $category->id ) }}"> <i class="fa fa-angle-double-right"></i> {{ $category->name }}</a></p>
                    @endforeach
                </div>
            </aside>
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