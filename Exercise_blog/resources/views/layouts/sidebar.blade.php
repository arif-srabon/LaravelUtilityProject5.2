<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        @include('layouts.user_sidebar')
        <!-- /user menu -->
        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    @if ( 'bn' === Session::get("locale") )

                        <li>
                            <a id="sidebar-language-switcher-en">
                                <img id="sidebar-toggle-icon" alt="English Flag"
                                     src="{{ asset('assets/images/flags/gb.png') }}" class="position-left"> <span
                                        class="collapse-label">Switch to English</span>
                            </a>
                        </li>

                    @endif

                    @if ( 'en' === Session::get("locale") )

                        <li>
                            <a id="sidebar-language-switcher-bn">
                                <img id="sidebar-toggle-icon" alt="Bangladesh Flag"
                                     src="{{ asset('assets/images/flags/bd.png') }}" class="position-left"> <span
                                        class="collapse-label">বাংলায় দেখুন</span>
                            </a>
                        </li>

                    @endif

                    <li class="@yield('menu_dashboard')"><a href="{{url('dashboard')}}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>

                    <li class="@yield('menu_setup')">
                        <a href="#"><i class="glyphicon glyphicon-cog"></i> <span>Seeting</span></a>
                        <ul>
                            <li>
                                <a href="#" class="@yield('menu_setup_location')">Location</a>
                                <ul>
                                    <li><a href="{{url('division')}}" class="@yield('menu_setup_division')">Division</a></li>
                                    <li ><a href="{{url('district')}}" class="@yield('menu_setup_district')">District</a></li>
                                    <li ><a href="{{url('thanaupzilla')}}" class="@yield('menu_setup_thanaupazilla')">Thana/Upzilla</a></li>
                                </ul>
                            </li>
                            <li><a href="#" class="@yield('')">Other</a></li>
                        </ul>
                    </li>

                    <li class="@yield('menu_security')"><a href="#"><i class="icon-hammer-wrench"></i> <span>Security</span></a>
                        <ul>
                            <li ><a href="{{url('user')}}" class="@yield('menu_user')">user</a></li>
                            <li ><a href="{{url('rolePermission')}}" class="@yield('menu_role')">Role & Permission</a></li>
                        </ul>
                    </li>

                    <li><a href="#"><i class="icon-copy"></i> <span>Layouts</span></a>
                        <ul>
                            <li><a href="" id="layout1">Layout 1 <span class="label bg-warning-400">Current</span></a></li>
                            <li><a href="" id="layout2">Layout 2</a></li>
                            <li><a href="" id="layout3">Layout 3</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon-user-plus"></i> <span>Login &amp; registration</span></a>
                        <ul>
                            <li><a href="">Simple login</a></li>
                            <li><a href="">More login info</a></li>
                            <li><a href="">Simple registration</a></li>
                            <li><a href="">More registration info</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-droplet2"></i> <span>Color system</span></a>
                        <ul>
                            <li><a href="">Primary palette</a></li>
                            <li><a href="">Danger palette</a></li>
                            <li><a href="">Success palette</a></li>
                            <li><a href="">Warning palette</a></li>
                        </ul>
                    </li>

                    <li><a href="#"><i class="icon-stack"></i> <span>Starter kit</span></a>
                        <ul>
                            <li><a href="">Horizontal navigation</a></li>
                            <li><a href="">1 column</a></li>
                            <li><a href="">2 columns</a></li>
                            <li>
                                <a href="#">3 columns</a>
                                <ul>
                                    <li><a href="">Dual sidebars</a></li>
                                    <li><a href="">Double sidebars</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href=""><i class="icon-list-unordered"></i> <span>Changelog <span class="label bg-blue-400">1.2.1</span></span></a></li>
                    <li><a href=""><i class="icon-width"></i> <span>RTL version</span></a></li>

                    <!-- /main -->

                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>

<script>
    $(document).ready(function () {
        $('#sidebar-language-switcher-en').on('click', function () {
            window.location.replace('{{url("setlang/en")}}');
        });
        $('#sidebar-language-switcher-bn').on('click', function () {
            window.location.replace('{{url("setlang/bn")}}');
        });
    });
</script>