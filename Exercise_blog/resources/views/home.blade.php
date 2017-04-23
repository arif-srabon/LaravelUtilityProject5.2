@extends('layouts.web')

<!-- display page title -->
@section('page_title', trans('web/home.page_title'))

<!-- display home link for non-logged-in users only -->
@if( empty(Session::get('sess_user_id')) )
	@section('main_nav_before')
		<li class="active disabled">
			<a href="{{ url('/') }}">
			    <i class="icon-home4"></i> {{ trans('master.home') }}
			</a>
		</li>
	@endsection
@endif


@section('site_content')

	<section class="header-bg">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h2 class="slider-title">{{ trans('master.welcome') }}</h2>
					<p class="slider-description">{{ trans('web/home.welcome_desc') }}</p>
					<a href="{{ url('/apply') }}" class="btn btn-lg btn-danger btn-oval"><i class="icon-file-text2"></i> {{ trans('web/home.btn_apply') }}</a>
				</div>
				<div class="col-sm-4">
					<aside class="widget widget-transparent widget-login">

						@if( empty(Session::get('sess_user_id')) )
	                		<!-- user is NOT LOGGED IN -->

							<h3 class="widget-title">{{ trans('web/home.login_title') }}</h3>
							<p class="widget-text">{{ trans('web/home.login_desc') }}</p>

							<!-- LOGIN FORM -->
							{!! Form::open(['url' => 'web/logincheck', 'method' => 'post']) !!}
								
								@include('errors.validation')

								<div class="input-group form-group">
									<span class="input-group-addon"><i class="icon-envelop3"></i></span>
									{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => trans('master.email'), 'required' => 'required']) !!}
								</div>

								<div class="input-group form-group">
									<span class="input-group-addon"><i class="icon-lock2"></i></span>
									{!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('master.password'), 'required' => 'required']) !!}
								</div>

								<div class="row">
									<div class="col-sm-6">
										<label>
											{!! Form::checkbox('remember', 'yes', true) !!} {{ trans('master.remember_me') }}
										</label>
									</div>
									<div class="col-sm-6 form-group">
										<button type="submit" class="btn btn-sm btn-primary pull-right login-btn"><i class="icon-paperplane"></i> {{ trans('master.btn_login') }}</button>
									</div>
								</div>

								<div class="forgot-password-block text-center">
									{{ link_to('passwordreset', trans('master.forgot_password'), array('class' => 'forgot-password-link')) }}
								</div>
							</form>
							<!-- /LOGIN FORM -->

						@else
							<!-- user is LOGGED IN -->

							<?php $username = Session::get("sess_user_full_name") ? Session::get("sess_user_full_name") : Session::get("user_auth")['email']; ?>
							<h3 class="widget-title">{{ trans('web/dashboard.widget_title_tools') }}</h3>
							<p class="widget-text small">{!! sprintf( trans('web/home.widget_tools_desc'), $username, url('/dashboard') ) !!}</p>
							<p class="widget-text small">{{ trans('web/home.widget_tools_desc2') }}</p>

							<div class="row">
								<div class="col-xs-6">
									<a href="{{ url('/apply') }}" class="btn btn-block btn-dash-tool"><i class="icon-file-text2"></i> <span class="center-block">{{ trans('web/dashboard.btn_license_application') }}</span></a>
								</div>
								<div class="col-xs-6">
									<a href="{{ url('/apply-layout') }}" class="btn btn-block btn-dash-tool"><i class="icon-map5"></i> <span class="center-block">{{ trans('web/dashboard.btn_layout_application') }}</span></a>
								</div>
							</div>

						@endif

					</aside>
				</div>
			</div>
		</div> <!-- /.container -->
		<div class="slider-backdrop"></div>
	</section> <!-- /.header-bg -->

	<section class="block-icons">
		<div class="container">
			<h2 class="sr-only">{{ trans('web/home.facilities') }}</h2>
			<div class="row">
				<div class="col-sm-2 text-center">
					<a href="{{ url('/apply') }}" class="service-link service-y">
						<i class="icon-file-text2 service-icon"></i>
						<h4 class="service-title">{{ trans('web/home.btn_apply') }}</h4>
					</a>
				</div>
				<div class="col-sm-2 text-center">
					<a href="{{ url('/document-archive/list') }}" class="service-link service-form">
						<i class="icon-book3 service-icon"></i>
						<h4 class="service-title">{{ trans('web/home.btn_osh_knowledgebase') }}</h4>
					</a>
				</div>
				<div class="col-sm-2 text-center">
					<a href="{{ url('/experts-database/list') }}" class="service-link service-z">
						<i class="icon-user-tie service-icon"></i>
						<h4 class="service-title">{{ trans('web/home.btn_osh_experts') }}</h4>
					</a>
				</div>
				<div class="col-sm-2 text-center">
					<a href="#" class="service-link service-x">
						<i class="icon-fire service-icon"></i>
						<h4 class="service-title">{{ trans('web/home.btn_report_incidents') }}</h4>
					</a>
				</div>
				<div class="col-sm-2 text-center">


					<a href="{{ url('/complain') }}" class="service-link service-complain">
						<i class="icon-megaphone service-icon"></i>
						<h4 class="service-title">{{ trans('web/home.btn_complain') }}</h4>

					</a>
				</div>
				<div class="col-sm-2 text-center">
					<a href="#" class="service-link service-c">
						<i class="icon-cog service-icon"></i>
						<h4 class="service-title">{{ trans('web/home.btn_registered_establishments') }}</h4>
					</a>
				</div>
			</div>
		</div> <!-- /.container -->
	</section>

	<section class="block-text">
		<div class="container">
			<h2 class="text-center home-section-head text-uppercase">{{ trans('web/home.about_us') }}</h2>
			<p class="text-center block-script">{{ trans('web/home.about_us_desc') }}</p>
		</div> <!-- /.container -->
	</section>

@endsection
