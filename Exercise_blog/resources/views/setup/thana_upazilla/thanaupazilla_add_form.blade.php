<div class="modal-content">
    <div class="modal-header bg-info">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title ">{{ trans('setup/thanaupazilla.window_add_title') }}</h4>
    </div>

    {!! Form::open(['url' => '/thanaupzilla', 'method' => 'post','id' =>'frmThanaUpazilla', 'name' =>'frmThanaUpazilla']) !!}
    <div class="modal-body">
        @include('setup.thana_upazilla.thanaupazilla_form')
    </div>

    {!! Form::close() !!}

</div>
