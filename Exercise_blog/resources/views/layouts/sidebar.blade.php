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

                    <li class="active"><a href="{{url('dashboard')}}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-cog"></i> <span>Security</span></a>
                        <ul>
                            <li>
                                <a href="{{url('usercreate')}}">user</a></li>
                            <li>
                                <a href="{{url('rolePermission')}}">Role & Permission</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-copy"></i> <span>Layouts</span></a>
                        <ul>
                            <li><a href="index.html" id="layout1">Layout 1 <span class="label bg-warning-400">Current</span></a></li>
                            <li><a href="../../layout_2/LTR/index.html" id="layout2">Layout 2</a></li>
                            <li><a href="../../layout_3/LTR/index.html" id="layout3">Layout 3</a></li>
                            <li><a href="../../layout_4/LTR/index.html" id="layout4">Layout 4</a></li>
                            <li class="disabled"><a href="../../layout_5/LTR/index.html" id="layout5">Layout 5 <span class="label">Coming soon</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-user-plus"></i> <span>Login &amp; registration</span></a>
                        <ul>
                            <li><a href="login_simple.html">Simple login</a></li>
                            <li><a href="login_advanced.html">More login info</a></li>
                            <li><a href="login_registration.html">Simple registration</a></li>
                            <li><a href="login_registration_advanced.html">More registration info</a></li>
                            <li><a href="login_unlock.html">Unlock user</a></li>
                            <li><a href="login_password_recover.html">Reset password</a></li>
                            <li><a href="login_hide_navbar.html">Hide navbar</a></li>
                            <li><a href="login_transparent.html">Transparent box</a></li>
                            <li><a href="login_background.html">Background option</a></li>
                            <li><a href="login_validation.html">With validation</a></li>
                            <li><a href="login_tabbed.html">Tabbed form</a></li>
                            <li><a href="login_modals.html">Inside modals</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-droplet2"></i> <span>Color system</span></a>
                        <ul>
                            <li><a href="colors_primary.html">Primary palette</a></li>
                            <li><a href="colors_danger.html">Danger palette</a></li>
                            <li><a href="colors_success.html">Success palette</a></li>
                            <li><a href="colors_warning.html">Warning palette</a></li>
                            <li><a href="colors_info.html">Info palette</a></li>
                            <li class="navigation-divider"></li>
                            <li><a href="colors_pink.html">Pink palette</a></li>
                            <li><a href="colors_violet.html">Violet palette</a></li>
                            <li><a href="colors_purple.html">Purple palette</a></li>
                            <li><a href="colors_indigo.html">Indigo palette</a></li>
                            <li><a href="colors_blue.html">Blue palette</a></li>
                            <li><a href="colors_teal.html">Teal palette</a></li>
                            <li><a href="colors_green.html">Green palette</a></li>
                            <li><a href="colors_orange.html">Orange palette</a></li>
                            <li><a href="colors_brown.html">Brown palette</a></li>
                            <li><a href="colors_grey.html">Grey palette</a></li>
                            <li><a href="colors_slate.html">Slate palette</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-stack"></i> <span>Starter kit</span></a>
                        <ul>
                            <li><a href="starters/horizontal_nav.html">Horizontal navigation</a></li>
                            <li><a href="starters/1_col.html">1 column</a></li>
                            <li><a href="starters/2_col.html">2 columns</a></li>
                            <li>
                                <a href="#">3 columns</a>
                                <ul>
                                    <li><a href="starters/3_col_dual.html">Dual sidebars</a></li>
                                    <li><a href="starters/3_col_double.html">Double sidebars</a></li>
                                </ul>
                            </li>
                            <li><a href="starters/4_col.html">4 columns</a></li>
                            <li>
                                <a href="#">Detached layout</a>
                                <ul>
                                    <li><a href="starters/detached_left.html">Left sidebar</a></li>
                                    <li><a href="starters/detached_right.html">Right sidebar</a></li>
                                    <li><a href="starters/detached_sticky.html">Sticky sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="starters/layout_boxed.html">Boxed layout</a></li>
                            <li class="navigation-divider"></li>
                            <li><a href="starters/layout_navbar_fixed_main.html">Fixed main navbar</a></li>
                            <li><a href="starters/layout_navbar_fixed_secondary.html">Fixed secondary navbar</a></li>
                            <li><a href="starters/layout_navbar_fixed_both.html">Both navbars fixed</a></li>
                            <li><a href="starters/layout_fixed.html">Fixed layout</a></li>
                        </ul>
                    </li>
                    <li><a href="changelog.html"><i class="icon-list-unordered"></i> <span>Changelog <span class="label bg-blue-400">1.2.1</span></span></a></li>
                    <li><a href="../RTL/index.html"><i class="icon-width"></i> <span>RTL version</span></a></li>

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