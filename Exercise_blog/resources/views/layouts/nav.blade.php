<nav id="header-nav">

    <button type="button" class="navbar-toggle collapsed navbar-toggle-base" data-toggle="collapse" data-target="#navbar-to-toggle" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar-to-toggle">
        <ul class="nav navbar-nav navbar-right">

            @yield('main_nav_before')

            <!-- LANGUAGE SWITCHER -->
            @if ( 'bn' === Session::get("locale") )
                <li><a href="javascript:" id="switch-lang-to-en"><i class="icon-circles"></i> English</a></li>
            @elseif ( 'en' === Session::get("locale") )
                <li><a href="javascript:"  id="switch-lang-to-bn"><i class="icon-circles"></i> বাংলা</a></li>
            @endif

            <!-- USER LOGGED IN FEATURES -->
            @if( !empty(Session::get('sess_user_id')) )
                <!-- user is LOGGED IN -->

                <li class="@yield('menu_web_dashboard_class')"><a href="{{ url('/dashboard') }}"><i class="icons icon-meter2"></i> {{ trans('master.dashboard') }}</a></li>

                <li class="dropdown notification-bell">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-bell2"></i>
                    </a>
                    <div class="dropdown-menu">
                        <div class="notification-head">
                            <h3>{{ trans('master.notifications') }}</h3>
                        </div>
                        <ul class="notifications">
                            <li>
                                <a href="javascript:">
                                    Your application for establishment "Kalam &amp; Sons" was successfully registered on August 28, 2016 for the Financial Year 2016-2017.
                                </a>
                            </li>
                            <li>
                                <a href="javascript:">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro, quos?
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="dropdown">
                    <?php $sess_user_img = Session::get("sess_user_image"); ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php $username = Session::get("sess_user_full_name") ? Session::get("sess_user_full_name") : Session::get("user_auth")['email']; ?>
                        <i class="icon-user"></i> {{ $username }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="@yield('menu_web_apply_class')"><a href="{{url('/apply')}}"><i class="icon-file-text2"></i> {{ trans('web/home.btn_apply') }}</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{url('/passwordreset')}}"><i class="icon-unlocked"></i> {{ trans('master.reset_password') }}</a></li>
                        <li><a href="{{ url('/web/logout') }}"><i class="icon-switch"></i> {{ trans('master.logout') }}</a></li>
                    </ul>
                </li>
            @else
                <!-- user is NOT logged in -->
                <li>
                    <a href="{{ url('/') }}"><i class="icon-enter2"></i> {{ trans('master.login') }}</a>
                </li>
            @endif

        </ul>
    </div>
</nav> <!-- /#header-nav -->
