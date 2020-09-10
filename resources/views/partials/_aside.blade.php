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
                        @guest
                            
                        @else 
                            @if(auth()->user()->adjective == 1)
                                <p style="padding: 6% 17%;"><a href="{{ route('create.news') }}"><i class="fa fa-angle-double-right"></i> @lang('global.add') @lang('news.post')</a></p>
                            @endif
                        @endguest
                    </div>
                </div>
            </div>
            <div class="category_list">
                @foreach ($lastnews as $last)
                    <p><a href="{{ url('post/' . $last->id) }}"><i class="fa fa-angle-double-right"></i> {{ $last->name }}</a></p>
                @endforeach
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
