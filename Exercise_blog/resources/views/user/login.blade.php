<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{trans('users/login.page_title')}}</title>

    <!-- Global stylesheets -->
    <link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/core.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="assets/css/colors.css" rel="stylesheet" type="text/css"> -->
    <link href="assets/css/login.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <?php
    /**
     * Bangla stylesheet
     * Stylesheet specific to Bengali stuffs only.
     * ...
     */
    if( 'bn' === Session::get('locale') ) : ?>
    <link href="{{ asset('assets/css/lima-bn.min.css')}}" rel="stylesheet" type="text/css">
    <?php endif; ?>



            <!-- Theme JS files -->
    <!-- <script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script> -->
    <!-- /theme JS files -->


</head>

<body class="login">

<div class="behave-table">
    <div class="behave-table-cell text-center">

        <div class="form-holder">
            <div class="form-left text-left">
                <h1 class="app-title text-uppercase visible-desktop">{{ trans('users/login.department') }}</h1>

                <div id="footer-credit-holder" class="dual-shadow-effect">
                    <footer id="footer-credit" class="text-center">
                        <p class="support-text">{{ trans('master.footer_support') }}</p>
                        <img src="{{ asset('assets/images/logo-canada-wordmark-red.png') }}" alt="Canada" title="Canada">
                        <img src="{{ asset('assets/images/logo-netherlands-embassy.png') }}" alt="Kingdom of the Netherlands" title="Kingdom of the Netherlands">
                        <img src="{{ asset('assets/images/logo-uk-aid-standard.png') }}" alt="UK aid - from the British People" title="UK aid - from the British People">
                        <img src="{{ asset('assets/images/logo-ilo.png') }}" alt="International Labour Organization" title="International Labour Organization">
                    </footer>
                </div> <!-- /#footer-credit-holder -->

                <div class="backdrop"></div>
            </div>
            <div class="form-right text-left">
                <h1 class="app-title text-uppercase visible-mobile text-center">{{ trans('users/login.department') }}</h1>
                <div class="row">
                    <div class="col-xs-3">
                        <a href="<?php @url('/'); ?>">
                            <img alt="System Logo" src="{{ asset('assets/images/logo-dual.gif') }}" width="70" height="70">
                        </a>
                    </div>
                    <div class="col-xs-9">
                        <h2 class="text-size-large text-semibold">{{ trans('users/login.vata_management_system') }}</h2>
                        <p class="text-light text-size-large">{{ trans('users/login.vata_management_system2') }}</p>
                    </div>
                </div>

                <div class="tvl-inline-header">
                    <div class="btn-group login-language-switcher" data-toggle="buttons">
                        <label class="btn btn-xs btn-default @if (Session::get("locale") == 'bn') active  @endif ">
                            <input type="radio" name="language_choice" id="bengali" autocomplete="off" value="bn" @if (Session::get("locale") == 'bn') checked  @endif > {{trans('master.header_bangla')}}
                        </label>
                        <label class="btn btn-xs btn-default @if (Session::get("locale") == 'en') active  @endif">
                            <input type="radio" name="language_choice" id="english" value="en" @if (Session::get("locale") == 'en') checked  @endif autocomplete="off"> {{trans('master.header_english')}}
                        </label>
                    </div>
                </div> <!-- /.tvl-inline-header -->

                <!-- Login form -->
                {!! Form::open(['url' => 'logincheck', 'method' => 'post']) !!}

                <h4 class="login-text">{{ trans('users/login.title') }}</h4>

                @include('errors.validation')

                <div class="form-group has-feedback has-feedback-left">
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('users/login.lbl_username')]) !!}
                    <div class="form-control-feedback"><i class="icon-user text-muted"></i></div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('users/login.lbl_password')]) !!}
                    <div class="form-control-feedback"><i class="icon-lock2 text-muted"></i></div>
                </div>

                <div class="row">
                    <div class="col-sm-6 text-left">
                        <label class="checkbox-inline">
                            {!! Form::checkbox('remember', 'yes', true, ['class' => 'styled']) !!}
                            {{ trans('users/login.lbl_remember') }}
                        </label><br>
                        <br>
                        <div>
                            {{ link_to('passwordreset', trans('users/login.lbl_forgot_password')) }}
                        </div>
                    </div>
                    <div class="col-sm-6 text-right">
                        <button type="submit" class="btn btn-xs btn-info text-bold">
                            {{trans('users/login.btn_login')}}
                            <i class="icon-circle-right2 position-right"></i>
                        </button>
                    </div>
                </div>

                {!! Form::close() !!}
                        <!-- /Login form -->
                <br>
                <div class="factory-login-no-margin">
                    {{ trans('users/login.lbl_new_factory_user') }} <a class="btn btn-xs btn-success" href="/factoryuser"><b>{{ trans('users/login.btn_register_here') }}</b></a>
                </div>
            </div>
        </div>
        <!-- /.form-holder -->

        <div class="footer-text text-center">
            {{trans('master.footer_powered')}} <a href="http://www.technovista.com.bd?ref=LIMA_ILO" target="_blank">{{trans('master.footer_tvl')}}</a>
        </div>

        <div class="clearfix"></div>
    </div>
    <!-- /.behave-table-cell -->
</div>
<!-- /.behave-table -->

<!-- Core JS files -->
<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
<!-- /core JS files -->

<!-- <script type="text/javascript" src="assets/js/pages/login.js"></script> -->

</body>
</html>
<script>
    $(document).ready(function(){
        $('.login-language-switcher .btn').on('click', function(){
            if( $(this).find('input[type="radio"]').val() === 'bn' )
                window.location.replace('{{url("setlang/bn")}}');
            else
                window.location.replace('{{url("setlang/en")}}');
        });
    });
</script>
