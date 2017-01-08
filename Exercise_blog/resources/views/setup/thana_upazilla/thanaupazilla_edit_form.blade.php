<div class="modal-content">
    <div class="modal-header bg-info">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title ">{{ trans('setup/thanaupazilla.window_edit_title') }}</h4>
    </div>

    {!! Form::model($thanaUpazillas, ['method' => 'PATCH', 'url' => ['thanaupzilla', $thanaUpazillas->id],'id' =>'frmThanaUpazilla', 'name' =>'frmThanaUpazilla']) !!}
    <div class="modal-body">
        @include('setup.thana_upazilla.thanaupazilla_form')

        {!! Form::close() !!}
    </div>

</div>