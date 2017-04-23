<!DOCTYPE html>
<html lang="{{ 'bn' === Session::get('locale') ? 'bn-BD' : 'en' }}">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('page_title') - {{ trans('master.master_title') }}</title>

        <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}">
        
        <!-- IcoMoon (undefined version) -->
        <link href="{{ asset('assets/css/icons/icomoon/styles.css?ver=1.0.0') }}" rel="stylesheet" type="text/css">

        <?php // Render page-specific style sheets ?>
        {!! Assets::css() !!}

        <!-- IKMS Stylesheet | Including Bootstrap v3.3.7 -->
        <link href="{{ asset('assets/css/app.css?ver=1.0.0') }}" rel="stylesheet" type="text/css">

        <?php
        /**
         * Bangla stylesheet
         * Stylesheet specific to Bengali stuffs only.
         * ...
         */
        if( 'bn' === Session::get('locale') ) : ?>
            <link href="{{ asset('assets/css/bengali.css?ver=1.0.0') }}" rel="stylesheet" type="text/css">
        <?php endif; ?>

        <!-- jQuery v2.1.4 -->
        <script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery.min.js?ver=2.1.4') }}"></script>

    </head>
    <body class="site @yield('body_class')">
        <div class="site-container">

            <header id="site-header" class="home-header" role="banner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{ url('/') }}" rel="home">
                                <img src="{{ asset('assets/images/logo-DIFE.png') }}" alt="{{ trans('web/login_registration.page_title') }}" class="pull-left">
                            </a>
                            <h1 class="site-title">
                                <a href="{{ url('/') }}" rel="home">{{ trans('master.app_title') }}</a>
                            </h1>
                            <small class="site-description">{{ trans('master.master_title') }}</small>
                        </div>
                        <div class="col-sm-6 text-right">
                            <!-- NAVIGATION -->
                            @include('layouts.nav')
                        </div>
                    </div>
                </div> <!-- /.container -->
            </header>

            <?php
            /**
             * Hook Site Content
             */
            ?>
            @yield('site_content')

            <div class="push"></div>
            
        </div> <!-- /.site-container -->

        <footer class="site-footer" role="contentinfo">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <p>{{ trans('master.footer_support') }}:</p>
                        <a href="http://www.ilo.org/" target="_blank" title="International Labour Organization"><img src="{{ asset('assets/images/logo-ilo.png') }}" alt="International Labour Organization"></a>
                    </div>
                    <div class="col-sm-6 text-center">
                        <nav class="footer-menu">
                            <ul>
                                <li><a href="{{ url('/') }}">{{ trans('master.home') }}</a></li>
                                <li><a href="{{ url('/apply') }}">{{ trans('web/home.btn_apply') }}</a></li>
                                <li><a href="{{ url('/document-archive/list') }}">{{ trans('web/home.btn_osh_knowledgebase') }}</a></li>
                            </ul>
                        </nav>
                        {{--<p class="text-muted">{{ CommonUtils::technovista_auto_copyright( '2017', trans('master.footer_copyright') ) }}</p>--}}
                    </div>
                    <div class="col-sm-3 text-right">
                        <p>{{ trans('master.footer_credit') }}:</p>
                        <a href="http://technovista.com.bd?ref=ikmsilo" target="_blank"><img src="{{ asset('assets/images/logo-technovista.png') }}" alt="TechnoVista Limited" width="150px"></a>
                    </div>
                </div>
            </div> <!-- /.container -->
        </footer>


        <!-- DOM MANIPULATING SITE JAVASCRIPTS IN FOOTER -->
        
        <!-- Compiled with Bootstrap v3.3.7 | Site.js v1.0.0 -->
        <script type="text/javascript" src="{{ asset('assets/js/main.js?ver=1.0.0') }}"></script>

        <script>
            jQuery(document).ready(function($){
                $('#switch-lang-to-en').on('click', function () {
                    window.location.replace('{{ url("setlang/en") }}');
                });
                $('#switch-lang-to-bn').on('click', function () {
                    window.location.replace('{{ url("setlang/bn") }}');
                });
            });
        </script>

        <?php // Render page-specific javascripts ?>
        {!! Assets::js() !!}

    </body>
</html>
