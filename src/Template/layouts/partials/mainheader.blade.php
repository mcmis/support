<!-- Main Header -->
<header class="main-header">

    <nav class="navbar navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="{!! url('/') !!}" class="navbar-brand"><img src="{{ asset('img/logo-delegacion.png') }}"></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    @include('layouts.partial.header.menu')

                    @ability('superman,admin', 'global, manage-post')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('menu.settings') <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ action('ComplainCategoriesController@index') }}">@lang('menu.categories')</a></li>
                            <li><a href="{{ action('ComplainSourcesController@index') }}">@lang('menu.sources')</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ action('AvatarController@index') }}">@lang('menu.avatars')</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ action('LocationServices\AreaController@index') }}">@lang('menu.location.services')</a></li>
                            <li><a href="{{ action('LocationServices\PresetLocationController@index') }}">@lang('menu.location.presets')</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('email.event.templates') }}">@lang('menu.email.templates')</a></li>
                            <li><a href="{{ action('CMS\ContentController@edit', ['id' => 1]) }}">@lang('menu.privacy.change')</a></li>
                            <li class="divider"></li>
                            @include('layouts.partial.header.settings')
                        </ul>
                    </li>
                    @endability
                </ul>
                <!-- User menu -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="mail-menu">
                        <a href="{{ action('UserManagement\UserNoticeController@index') }}">
                            <i class="fa fa-envelope-o"></i>
                            @if($total_mails = Auth::user()->notices()->where('user_notice_receivers.seen', false)->count())<span class="label label-success">{{ $total_mails }}</span>@endif
                        </a>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('img/dummyuser.jpg') }}" class="user-image" alt="{{ Auth::user()->name }}"/>
                            <span class="hidden-xs"><b>{{ Auth::user()->name }}</b></span> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            @include('layouts.partial.header.user')
                            <li class="divider"></li>
                            <li><a href="{{ url('/logout') }}"><strong>@lang('menu.logout')</strong></a></li>
                        </ul>
                    </li>
                </ul><!-- End user menu -->

            </div><!-- /.navbar-collapse -->

        </div><!-- /.container-fluid -->
    </nav>
</header>
