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
                        <li class="dropdown {{ checkActiveURL(action('HomeController@index')) }}"><a href="{{ action('HomeController@index') }}">@lang('menu.dashboard') <span class="sr-only">(current)</span></a></li>
                        @if(!Auth::user()->hasRole('admin'))
                            <li>
                                <a @if(Auth::user()->hasRole('supervisor') || Auth::user()->hasRole('fieldworker')) href="{{ action('ComplainsController@index') }}" @else href="#"  class="dropdown-toggle" data-toggle="dropdown" @endif>
                                    @lang('menu.compliance')
                                    @if(!Auth::user()->hasRole('supervisor') && !Auth::user()->hasRole('fieldworker'))<span class="caret"></span>@endif
                                    @if($unseen_counts = app()->make('ComplaintCounter')->operatorUnseen())
                                        <span class="label label-danger">{{ $unseen_counts }}</span>
                                    @endif
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ action('ComplainsController@create') }}">@lang('menu.register_complain')</a></li>
                                    <li>
                                        <a href="{{ action('ComplainsController@index') }}">
                                            @lang('menu.complains')
                                            @if(isset($unseen_counts) && $unseen_counts)
                                                <span class="label label-danger">{{ $unseen_counts }}</span>
                                            @endif
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @role('admin')
                            <li><a href="{{ action('UserController@index') }}">@lang('menu.user_management')</a></li>
                        @endrole

                        @ability('superman,admin', 'global')
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('menu.organization_mgmt')<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ action('Organization\DepartmentController@index') }}">@lang('menu.department_mgmt')</a></li>
                                <li><a href="{{ action('Organization\DesignationController@index') }}">@lang('menu.designation_mgmt')</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ action('Organization\EmployeeController@index') }}">@lang('menu.employees_mgmt')</a></li>
                            </ul>
                        </li>
                        @endability

                        @if(Auth::user()->hasRole('supervisor') && !Auth::user()->hasRole('admin'))
                            <li><a href="{{ action('Organization\EmployeeController@index') }}">@lang('menu.employees_mgmt')</a></li>
                        @endif

                        @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('supervisor') || Auth::user()->hasRole('fieldworker'))
                            <li><a href="{{ action('Reports\GraphController@index') }}">@lang('menu.report')</a></li>
                        @endif

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
                                    <li><a href="{{ action('UserManagement\DisabilityTypeController@index') }}">@lang('menu.disabilities')</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{ action('CMS\EmailTemplateController@index') }}">@lang('menu.email.templates')</a></li>
                                    <li><a href="{{ action('CMS\ContentController@edit', ['id' => 1]) }}">@lang('menu.privacy.change')</a></li>
                                    {{--<li><a href="{{ url('translations') }}">@lang('menu.translations')</a></li>--}}
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
                                <li><a href="{{ action('UserController@show', ['id' => Auth::id()]) }}">@lang('menu.user_settings')</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ url('/logout') }}"><strong>@lang('menu.logout')</strong></a></li>
                            </ul>
                        </li>
                    </ul><!-- End user menu -->

                </div><!-- /.navbar-collapse -->

        </div><!-- /.container-fluid -->
    </nav>
</header>
