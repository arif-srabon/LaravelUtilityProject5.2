<script type="text/javascript" src="assets/js/plugins/forms/validation/validate.min.js"></script>
<script type="text/javascript" src="assets/js/app/thanaUpazilla_form_validation.js"></script>

<!-- Theme JS files -->
{{--<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/full.min.js"></script>--}}
<!-- /theme JS files -->

<div class="row">
    <fieldset>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('division_id', trans('setup/thanaupazilla.label_division')) !!}<span class="text-danger">*</span>
                        {!! Form::select('division_id', $division, null, ['onChange'=>'loadDistrict()','placeholder' => trans('setup/thanaupazilla.ph_select'), 'class' => 'form-control']) !!}
                        @if ($errors->has('division_id'))<p
                                class="text-danger">{!!$errors->first('division_id')!!}</p>@endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('district_id', trans('setup/thanaupazilla.label_district')) !!}<span class="text-danger">*</span>
                        {!! Form::select('district_id', $district, null, ['placeholder' => trans('setup/thanaupazilla.ph_select'), 'class' => 'form-control']) !!}
                    </div>
                </div>
            </div>


            <div class="col-md-13">
                <div class="form-group">
                    {!! Form::label('geo_code', trans('setup/thanaupazilla.label_geo_code')) !!}<span class="text-danger">*</span>
                    {!! Form::text('geo_code', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
            </div>

            <div class="col-md-13">
                <div class="form-group">
                    {!! Form::label('name', trans('setup/thanaupazilla.label_name')) !!}<span class="text-danger">*</span>
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
            </div>
            <div class="col-md-13">
                <div class="form-group">
                    {!! Form::label('name_bn', trans('setup/thanaupazilla.label_name_bn')) !!}<span class="text-danger">*</span>
                    {!! Form::text('name_bn', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
            </div>
        </div>
    </fieldset>
</div>
<hr>
<div class="text-right">{!! Form::hidden('id') !!}
    <button id="reset" class="btn btn-default" type="reset">{{ trans('setup/thanaupazilla.btn_reset') }} <i
                class="icon-reload-alt position-right"></i></button>
    <button class="btn btn-primary" type="button" id="submit">{{ trans('setup/thanaupazilla.btn_save') }} <i
                class="icon-arrow-right14 position-right"></i>
    </button>
</div>

{!! Form::close() !!}


<script type="text/javascript">
    function loadDistrict() {
        var divisionId = $("#division_id").val();
        $.get('/thanaupazilla/getDistrict/' + divisionId, function (data) {
            //success data
            $('#district_id').empty();
            $("#district_id").append("<option value=''>{{trans('setup/thanaupazilla.ph_select')}}</option>");
            $.each(data, function (index, subcatObj) {
                $("#district_id").append("<option value='" + subcatObj.id + "'>" + subcatObj.name + "</option>");
            });
        });
    }
</script>

<script type="application/javascript">


    $(document).ready(function () {

        $("button#submit").click(function () {

            if ($("#frmThanaUpazilla").valid()) {
                var $form = $("#frmThanaUpazilla");
                $.ajax({
                    type: $form.attr('method'),
                    url: $form.attr('action'),
                    data: $form.serialize(),
                    success: function (data, status) {
                        if (data.toastr_error) {
                            toastr['error'](data.message, data.title);
                            return;
                        }
                        toastr['success'](data.message, data.title);
                        var grid = $("#grid_thana_upazilla").data("kendoGrid");
                        grid.dataSource.read();
                        grid.refresh();
                        $('#myModal').modal('hide');
                    },
                    error: function (result) {
                        if (result.status === 401) { //redirect if not authenticated user.
                            //$( location ).prop( 'pathname', 'auth/login' );
                        }
                        if (result.status === 422) {
                            var errors = $.parseJSON(result.responseText);
                            errorsHtml = '<div><ul>'; //class="alert alert-danger"
                            $.each(errors, function (key, value) {
                                errorsHtml += '<li>' + value[0] + '</li>';
                            });
                            errorsHtml += '</ul></div>';
                            toastr["error"](errorsHtml, "Invalid/Duplicate Input Data");
                        }
                    }
                });
            }

        });

    });

    {{--$("#division_id").change(function () {--}}

        {{--var division_id = $(this).val()--}}

        {{--$.ajax({--}}
            {{--dataType: 'json',--}}
            {{--type: "POST",--}}
            {{--url: "/region/getRegionByDivisionId/" + division_id,--}}
            {{--cache: false,--}}
            {{--success: function (response) {--}}
                {{--$("#region_id").empty();--}}
                {{--$("#region_id").append("<option value=''>{{ trans('setup/thanaupazilla.ph_select') }}</option>");--}}
                {{--if (response != '') {--}}
                    {{--for (i in response) {--}}
                        {{--$("#region_id").append("<option value='" + i + "'>" + response[i] + "</option>");--}}
                    {{--}--}}
                {{--}--}}
            {{--},--}}
            {{--error: function (x, e) {--}}
            {{--}--}}
        {{--});--}}
    {{--});--}}

    {{--$("#region_id").change(function () {--}}

        {{--var region_id = $(this).val()--}}

        {{--$.ajax({--}}
            {{--dataType: 'json',--}}
            {{--type: "POST",--}}
            {{--url: "/district/getDistrictByRegionId/" + region_id,--}}
            {{--cache: false,--}}
            {{--success: function (response) {--}}
                {{--$("#district_id").empty();--}}
                {{--$("#district_id").append("<option value=''>{{ trans('setup/thanaupazilla.ph_select') }}</option>");--}}
                {{--if (response != '') {--}}
                    {{--for (i in response) {--}}
                        {{--$("#district_id").append("<option value='" + i + "'>" + response[i] + "</option>");--}}
                    {{--}--}}
                {{--}--}}
            {{--},--}}
            {{--error: function (x, e) {--}}
            {{--}--}}
        {{--});--}}
    {{--});--}}


</script>
