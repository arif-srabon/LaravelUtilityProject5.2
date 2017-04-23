@extends('layouts.master')
@section('page_title', trans('dashboard.page_title'))
@section('menu_dashboard_blank', 'active')
@section('left_sidebar')
    @include('layouts.sidebar')
@endsection

@section('page_header')
    <i class="icon-meter2 position-left"></i> <span class="text-semibold">{{trans('dashboard.page_title')}}</span>
@endsection

@section('content')

	<div class="row">
		<div class="col-sm-3 col-xs-6 dash-widget-panel-holder">
			<div class="panel text-center dash-widget-panel">
				<div class="panel-body">
					<a href="{{ url('fd/dashboard') }}">
						<i class="icon-cog dash-widget-icon-lg text-info"></i><br>
						<span class="block-text text-bold">{{trans('dashboard.module_fd')}}</span>
					</a>
				</div>
			</div>
		</div>
		<div class="col-sm-3 col-xs-6 dash-widget-panel-holder">
			<div class="panel text-center dash-widget-panel">
				<div class="panel-body">
					<a href="{{ url('lis/dashboard') }}">
						<i class="icon-search4 dash-widget-icon-lg text-success"></i><br>
						<span class="block-text text-bold">{{trans('dashboard.module_lis')}}</span>
					</a>
				</div>
			</div>
		</div>
		<div class="col-sm-3 col-xs-6 dash-widget-panel-holder">
			<div class="panel text-center dash-widget-panel">
				<div class="panel-body">
					<a href="{{ url('osh/dashboard') }}">
						<i class="icon-aid-kit dash-widget-icon-lg text-danger"></i><br>
						<span class="block-text text-bold">{{trans('dashboard.module_osh')}}</span>
					</a>
				</div>
			</div>
		</div>
		<div class="col-sm-3 col-xs-6 dash-widget-panel-holder">
			<div class="panel text-center dash-widget-panel">
				<div class="panel-body">
					<a href="{{ url('dmis/dashboard') }}">
						<i class="icon-shield2 dash-widget-icon-lg text-primary"></i><br>
						<span class="block-text text-bold">{{trans('dashboard.module_dmis')}}</span>
					</a>
				</div>
			</div>
		</div>
	</div>

	<script>
		jQuery(document).ready(function($) {
			$('.dash-widget-panel').matchHeight();
		});
	</script>

@endsection