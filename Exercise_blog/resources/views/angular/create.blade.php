@extends('layouts.master')
@section('page_title', 'Angular js')
@section('menu_security', 'active')
@section('menu_user', 'active')
@section('page_header')
    <i class="icon-key position-left"></i> <span class="text-semibold">Angular JS</span>
@endsection

@section('breadcrumb_links')

    <li><a href="{{url('#')}}"><i class="glyphicon glyphicon-th"></i> user  list</a></li>
@endsection


@section('content')

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Angular Js Information</h5>

            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
        <div class="panel-body">

            @include('errors.message')

            {!! Form::open(['url' => 'user/store', 'method' => 'post', 'id' => '', 'files' => true]) !!}

            @include('angular.angularjs_form')

            {!! Form::close() !!}

        </div>
    </div>
@endsection