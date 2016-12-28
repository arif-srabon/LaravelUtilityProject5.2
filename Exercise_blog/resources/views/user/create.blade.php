@extends('layouts.master')
@section('page_title', 'Dashboard')
@section('menu_dashboard', 'active')

@section('page_header')
        <i class="icon-meter2 position-left"></i> <span class="text-semibold">Dashboard</span>
@endsection

@section('breadcrumb_links')

        <li><a href="{{url('user')}}"><i class="icon-users position-left"></i> User List</a></li>
        @endsection

        @section('content')

                <!-- User Form -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Add User Information</h5>

                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
                <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
            <div class="panel-body">

                @include('errors.message')

                {!! Form::open(['url' => 'user', 'method' => 'post', 'id' => 'frm_user', 'files' => true]) !!}

                {{--@include('user.form')--}}

                {!! Form::close() !!}

            </div>
        </div>

        <!-- /User form -->

@endsection