<div class="row">
    <div class="col-md-12">
        <fieldset>
            <legend class="text-semibold"><i class="icon-bookmark4 position-left"></i> User Identity</legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('full_name_en', 'User Full Name ( English ) *') !!}
                        {!! Form::text('full_name_en', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                        @if ($errors->has('full_name_en'))<p
                                class="text-danger">{!!$errors->first('full_name_en')!!}</p>@endif
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('designation_id', trans('users/user.lbl_designation')) !!}
                        {!! Form::select('designation_id', array(), null, ['placeholder' => 'Select Designation', 'class' => 'select form-control']) !!}
                        @if ($errors->has('designation_id'))<p
                                class="text-danger">{!!$errors->first('designation_id')!!}</p>@endif
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('email', 'User Name / Login ID *') !!}
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Username for Login']) !!}
                        @if ($errors->has('email'))<p
                                class="text-danger">{!!$errors->first('email')!!}</p>@endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('department_id', trans('users/user.lbl_department')) !!}
                        {!! Form::select('department_id', array(), null, ['placeholder' => 'Select Department', 'class' => 'select form-control']) !!}
                        @if ($errors->has('department_id'))<p
                                class="text-danger">{!!$errors->first('department_id')!!}</p>@endif
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('password', 'Password *') !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                        @if ($errors->has('password'))<p
                                class="text-danger">{!!$errors->first('password')!!}</p>@endif
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('password_confirmation', 'Confirm Password *') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Retype Password']) !!}
                        @if ($errors->has('password_confirmation'))<p
                                class="text-danger">{!!$errors->first('password_confirmation')!!}</p>@endif
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <fieldset>
            <legend class="text-semibold"><i class="icon-reading position-left"></i> Personal Details</legend>
            <div class="form-group">
                {!! Form::label('full_name_bn', 'User Full Name ( Bangla ) *') !!}
                {!! Form::text('full_name_bn', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                @if ($errors->has('full_name_bn'))<p class="text-danger">{!!$errors->first('full_name_bn')!!}</p>@endif
            </div>
            <div class="form-group">
                {!! Form::label('father_name', "Father's Name") !!}
                {!! Form::text('father_name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                @if ($errors->has('father_name'))<p class="text-danger">{!!$errors->first('father_name')!!}</p>@endif
            </div>
            <div class="form-group">
                {!! Form::label('mother_name', "Mother's Name") !!}
                {!! Form::text('mother_name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                @if ($errors->has('mother_name'))<p class="text-danger">{!!$errors->first('mother_name')!!}</p>@endif
            </div>
            <div class="form-group">
                {!! Form::label('official_email', 'E - mail') !!}
                {!! Form::email('official_email', null, ['class' => 'form-control', 'placeholder' => 'user@example.com']) !!}
                @if ($errors->has('official_email'))<p
                        class="text-danger">{!!$errors->first('official_email')!!}</p>@endif
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('blood_group', 'Blood Group') !!}
                        {!! Form::text('blood_group', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                        @if ($errors->has('blood_group'))<p
                                class="text-danger">{!!$errors->first('blood_group')!!}</p>@endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('date_of_birth', 'Date of Birth') !!}
                        <div class="input-group">
                            {!! Form::text('date_of_birth', null, ['class' => 'form-control daterange-single daterange-left']) !!}
                            <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                        </div>
                        @if ($errors->has('date_of_birth'))<p
                                class="text-danger">{!!$errors->first('date_of_birth')!!}</p>@endif

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('date_of_joining', 'Date of Joining ( 1st )') !!}
                        <div class="input-group">
                            {!! Form::text('date_of_joining', null, ['class' => 'form-control daterange-single daterange-left']) !!}
                            <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                        </div>
                        @if ($errors->has('date_of_joining'))<p
                                class="text-danger">{!!$errors->first('date_of_joining')!!}</p>@endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('mobile', 'Mobile') !!}
                        {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => '+88-0123-456789']) !!}
                        @if ($errors->has('mobile'))<p class="text-danger">{!!$errors->first('mobile')!!}</p>@endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('passport', 'Passport') !!}
                        {!! Form::text('passport', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                        @if ($errors->has('passport'))<p class="text-danger">{!!$errors->first('passport')!!}</p>@endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('national_id', 'National ID ( NID )') !!}
                        {!! Form::text('national_id', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                        @if ($errors->has('national_id'))<p
                                class="text-danger">{!!$errors->first('national_id')!!}</p>@endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('marital_status_id', 'Marital Status') !!}
                        {!! Form::select('marital_status_id', array(), null, ['placeholder' => 'Select', 'class' => 'select form-control']) !!}
                        @if ($errors->has('marital_status_id'))<p
                                class="text-danger">{!!$errors->first('marital_status_id')!!}</p>@endif
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
    <div class="col-md-6">
        <fieldset>
            <legend class="text-semibold"><i class="icon-camera position-left"></i> User Photo &amp; Signature</legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="thumbnail">
                        <div class="thumb text-center">
                            <?php
                            $userPhotoPath = (!empty($user->user_photo)) ? $user->user_photo : "";
                            ?>
                            <img src="{{ asset(ImageManager::getImagePath($userPhotoPath, 200, 200, 'crop')) }}"
                                 alt="User Photo" id="preview_user_image">
                        </div>
                        <div class="caption text-center">
                            <div class="form-group">
                                <label>Upload User Photo</label>

                                <div class="uploader">
                                    {!! Form::file('user_photo', ['id' => 'user_photo', 'class' => 'file-styled']) !!}
                                    @if ($errors->has('user_photo'))<p
                                            class="text-danger">{!!$errors->first('user_photo')!!}</p>@endif
                                </div>
                    <span class="help-block">
                    Allow File: jpg, jpeg, png. Max Size: 800KB. <br> Max Dimension: h:600px X w:600px
                    </span></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="thumbnail">
                        <div class="thumb text-center">
                            <?php
                            $userSignPath = (!empty($user->user_sign)) ? $user->user_sign : "";
                            ?>
                            <img src="{{ asset(ImageManager::getImagePath($userSignPath, 200, 200, 'crop')) }}"
                                 alt="User signature" id="preview_sign_image">
                        </div>
                        <div class="caption text-center">
                            <div class="form-group">
                                <label>Upload User signature</label>

                                <div class="uploader">
                                    {!! Form::file('user_sign', ['id' => 'user_sign', 'class' => 'file-styled']) !!}
                                    @if ($errors->has('user_sign'))<p
                                            class="text-danger">{!!$errors->first('user_sign')!!}</p>@endif
                                </div>
                    <span class="help-block">
                    Allow File: jpg, jpeg, png. Max Size: 800KB. <br> Max Dimension: h:600px X w:600px
                    </span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="display-block text-semibold">Status</label>
                <label class="radio-inline">
                    <div class="choice">
                        {!! Form::radio('status', 1, true,  ['class' => 'styledd']) !!}
                    </div>
                    Active
                </label>
                <label class="radio-inline">
                    <div class="choice">
                        {!! Form::radio('status', 0, null,  ['class' => 'styledd']) !!}
                    </div>
                    Inactive
                </label>
            </div>
            <div id="accordion-control" class="panel-group panel-group-control content-group-lg">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h6 class="panel-title">
                            <a href="#accordion-control-roles" data-parent="#accordion-control" data-toggle="collapse">
                                Assign Role(s)
                            </a>
                        </h6>
                    </div>
                    <div class="panel-collapse collapse in" id="accordion-control-roles">
                        <div class="panel-body">
                            <?php    //dump($assignedRole); ?>
                            <div class="form-group">
                                {!! Form::label('assigned_roles_list', 'Select User Role(s) *') !!}
                                {!! Form::select('assigned_roles_list[]', array(), null, ['class' => 'select form-control', 'multiple', id => 'assigned_roles_list']) !!}
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </fieldset>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <fieldset>
            <legend class="text-semibold"><i class="icon-home position-left"></i> Permanent Address</legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('permanent_house_road', 'House / Road') !!}
                        {!! Form::text('permanent_house_road', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                        @if ($errors->has('permanent_house_road'))<p
                                class="text-danger">{!!$errors->first('permanent_house_road')!!}</p>@endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('permanent_village', 'Village') !!}
                        {!! Form::text('permanent_village', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                        @if ($errors->has('permanent_village'))<p
                                class="text-danger">{!!$errors->first('permanent_village')!!}</p>@endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('permanent_division', 'Division') !!}
                        {!! Form::select('permanent_division', array(), null, ['placeholder' => 'Select', 'class' => 'select form-control']) !!}
                        @if ($errors->has('permanent_division'))<p
                                class="text-danger">{!!$errors->first('permanent_division')!!}</p>@endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('permanent_district', 'District') !!}
                        {!! Form::select('permanent_district', array(), null, ['placeholder' => 'Select', 'class' => 'select form-control']) !!}
                        @if ($errors->has('permanent_district'))<p
                                class="text-danger">{!!$errors->first('permanent_district')!!}</p>@endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('permanent_upzilla', 'Upazila / Thana') !!}
                        {!! Form::select('permanent_upzilla', array(), null, ['placeholder' => 'Select', 'class' => 'select form-control']) !!}
                        @if ($errors->has('permanent_upzilla'))<p
                                class="text-danger">{!!$errors->first('permanent_upzilla')!!}</p>@endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('permanent_ward', 'Ward') !!}
                        {!! Form::select('permanent_ward', array(), null, ['placeholder' => 'Select', 'class' => 'select form-control']) !!}
                        @if ($errors->has('permanent_ward'))<p
                                class="text-danger">{!!$errors->first('permanent_ward')!!}</p>@endif
                    </div>
                </div>

            </div>
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('permanent_postcode', 'Postcode') !!}
                        {!! Form::text('permanent_postcode', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                        @if ($errors->has('permanent_postcode'))<p
                                class="text-danger">{!!$errors->first('permanent_postcode')!!}</p>@endif
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
    <div class="col-md-6">
        <fieldset>
            <legend class="text-semibold"><i class="icon-flag3 position-left"></i> Present Address &nbsp;&nbsp;&nbsp;
            </legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('present_house_road', 'House / Road') !!}
                        {!! Form::text('present_house_road', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                        @if ($errors->has('present_house_road'))<p
                                class="text-danger">{!!$errors->first('present_house_road')!!}</p>@endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('present_village', 'Village') !!}
                        {!! Form::text('present_village', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                        @if ($errors->has('present_village'))<p
                                class="text-danger">{!!$errors->first('present_village')!!}</p>@endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('present_division', 'Division') !!}
                        {!! Form::select('present_division', array(), null, ['placeholder' => 'Select', 'class' => 'select form-control']) !!}
                        @if ($errors->has('present_division'))<p
                                class="text-danger">{!!$errors->first('present_division')!!}</p>@endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('present_district', 'District') !!}
                        {!! Form::select('present_district', array(), null, ['placeholder' => 'Select', 'class' => 'select form-control']) !!}
                        @if ($errors->has('present_district'))<p
                                class="text-danger">{!!$errors->first('present_district')!!}</p>@endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('present_upzilla', 'Upazila / Thana') !!}
                        {!! Form::select('present_upzilla', array(), null, ['placeholder' => 'Select', 'class' => 'select form-control']) !!}
                        @if ($errors->has('present_upzilla'))<p
                                class="text-danger">{!!$errors->first('present_upzilla')!!}</p>@endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('present_ward', 'Ward') !!}
                        {!! Form::select('present_ward', array(), null, ['placeholder' => 'Select', 'class' => 'select form-control']) !!}
                        @if ($errors->has('present_ward'))<p
                                class="text-danger">{!!$errors->first('present_ward')!!}</p>@endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('present_postcode', 'Postcode') !!}
                        {!! Form::text('present_postcode', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                        @if ($errors->has('present_postcode'))<p
                                class="text-danger">{!!$errors->first('present_postcode')!!}</p>@endif
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
</div>
<div class="text-right">
    {!! Form::hidden('id') !!}
    <button id="reset" class="btn btn-default" type="reset">Reset <i class="icon-reload-alt position-right"></i>
    </button>
    <button class="btn btn-primary" type="submit">Save <i class="icon-arrow-right14 position-right"></i></button>
</div>
