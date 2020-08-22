<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dashboard/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->username }}</p>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            @permission('news-read')
                <li class="{{ (request()->segment(2) == 'news') ? 'active' : '' }}"><a href="{{ route('news.index') }}"><i class="fa fa-list-alt"></i><span> @lang('global.news')</span></a></li>   
            @endpermission

            @permission('courses-read')
                <li class="{{ (request()->segment(2) == 'courses') ? 'active' : '' }}"><a href="{{ route('courses.index') }}"><i class="fa fa-files-o"></i><span> @lang('global.courses')</span></a></li>
            @endpermission

            @permission('teachers-read')
                <li class="{{ (request()->segment(2) == 'teachers') ? 'active' : '' }}"><a href="{{ route('teachers.index') }}"><i class="fa fa-users"></i><span> @lang('global.teachers')</span></a></li>
            @endpermission

            @permission('sliders-read')
                <li class="{{ (request()->segment(2) == 'sliders') ? 'active' : '' }}"><a href="{{ route('sliders.index') }}"><i class="fa fa-square"></i><span> @lang('global.sliders')</span></a></li>
            @endpermission

            @permission('categories-read')
                <li class="{{ (request()->segment(2) == 'categories') ? 'active' : '' }}"><a href="{{ route('categories.index') }}"><i class="fa fa-square"></i><span> @lang('global.categories')</span></a></li>
            @endpermission

            @permission('informations-read')
                <li class="{{ (request()->segment(2) == 'informations') ? 'active' : '' }}"><a href="{{ route('informations.index') }}"><i class="fa fa-info-circle"></i><span> @lang('global.informations')</span></a></li>
            @endpermission

            @permission('networks-read')
                <li class="{{ (request()->segment(2) == 'networks') ? 'active' : '' }}"><a href="{{ route('networks.index') }}"><i class="fa fa-square"></i><span> @lang('global.networks')</span></a></li>
            @endpermission

            @permission('users-read')
                <li class="{{ (request()->segment(2) == 'users') ? 'active' : '' }}"><a href="{{ route('users.index') }}"><i class="fa fa-users"></i><span> @lang('global.users')</span></a></li>
            @endpermission
            
            @permission('settings-read')
                <li class="{{ (request()->segment(2) == 'settings') ? 'active' : '' }}"><a href="{{ route('settings.index') }}"><i class="fa fa-cog"></i><span> @lang('global.settings')</span></a></li>
            @endpermission
           
        </ul>

    </section>

</aside>