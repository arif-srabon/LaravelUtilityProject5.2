<div id="accordion-control-group2" class="panel-collapse collapse in">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div id="message"></div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('step_name', 'Field 1') !!}
                    {!! Form::text('step_name', null, ['id'=>'step_name','class' => 'required form-control', 'placeholder' => '']) !!}
                    @if ($errors->has('step_name'))
                        <p class="text-danger">{!!$errors->first('step_name')!!}</p>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('step_type', 'Field 2') !!}
                    {!! Form::select('step_type', ['Recommendation'=>'Recommendation','Approval'=>'Approval'], null, ['id'=>'step_type','placeholder' => trans('dmis/approval/approval_flow.lbl_select'), 'class' => 'required select form-control']) !!}
                    @if ($errors->has('step_type'))<p
                            class="text-danger">{!!$errors->first('step_type')!!}</p>@endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('step_sequence', 'Field 3') !!}
                    {!! Form::select('step_sequence', array('1'=>'arif'), null, ['id'=>'step_sequence','placeholder' => trans('dmis/approval/approval_flow.lbl_select'), 'class' => 'required select form-control']) !!}
                    @if ($errors->has('step_sequence'))
                        <p class="text-danger">{!!$errors->first('step_sequence')!!}</p>
                    @endif
                </div>
            </div>
            <div class="col-md-1"></div>
            <div style="margin-top: 5px;" class="col-md-4"><br>
                <button class="btn bg-slate" type="button" id="btnAdd">
                    Add More

                </button>
            </div>
        </div><br>

        <div class="row">
            <div class="col-md-12">
                <table id="tableStepInfo" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Field 1</th>
                        <th>Field 2</th>
                        <th>Field 3</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($approvalFlowStep))
                        @foreach($approvalFlowStep as $step)
                            <tr class="rows">
                                <td>
                                    {{$step->step_name}}
                                    {!! Form::hidden('step_name[]', $step->step_name) !!}
                                </td>
                                <td>
                                    {{$step->step_type}}
                                    {!! Form::hidden('step_type_id[]', $step->step_type) !!}
                                </td>
                                <td>
                                    {{$step->sequence_name}}
                                    {!! Form::hidden('step_sequence_id[]', $step->step_sequence) !!}
                                </td>
                                <td>
                                    <a class='edit-row editRow btn bg-primary' href='javascript:void(0)'><i class='icon-pencil3'></i></a>
                                    <a class='remove-row deleteRow btn bg-danger' href='javascript:void(0)'><i class='icon-cross2'></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>



<script type="application/javascript">

    // For added dynamic row
    var btnAdd = document.getElementById('btnAdd')
    btnAdd.addEventListener('click',function(e){
        e.preventDefault();
        var stepName = document.getElementById('step_name').value;
        var stepType = document.getElementById('step_type');
        var stepTypeId = document.getElementById('step_type').value;
        var stepSequence = document.getElementById('step_sequence');

        var stepSequenceId = document.getElementById('step_sequence').value;
        var stepType = stepType.options[stepType.selectedIndex].text;
        var stepSequence = stepSequence.options[stepSequence.selectedIndex].text;
        $('#message').text('')
        if (stepName == '') {
            $('#message').text('Please provide step name').css({'color': 'red'});
            return false;
        }
        if (!stepTypeId) {
            $('#message').text('Please select step type.').css({'color': 'red'});
            return false;
        }
        if (!stepSequenceId) {
            $('#message').text('Please select step sequence.').css({'color': 'red'});
            return false;
        }
        // Build table row for added dynamically
        var row = "<tr class='rows'><td>"+ stepName +
                "<input class='step_name' name='step_name[]' type='hidden' value='"+stepName+"'>" + "</td><td>"+
                stepType +
                "<input class='step-id' name='step_type_id[]' type='hidden' value='"+stepTypeId+"'>" + "</td><td>"+
                stepSequence +
                "<input class='sequence-id' name='step_sequence_id[]' type='hidden' value='"+stepSequenceId+"'>" + "</td><td>"+
                "<a class='edit-row editRow btn bg-primary' href='javascript:void(0)'><i class='icon-pencil3'></i></a>" + "&nbsp;" +
                "<a class='remove-row deleteRow btn bg-danger' href='javascript:void(0)'><i class='icon-cross2'></i></a>"
                + "</td></tr>";

        $('#tableStepInfo').find('tbody').append(row);

        // clear input after added row
        document.getElementById('step_name').value = "";
        document.getElementById('step_type').value = "";
        document.getElementById('step_sequence').value = "";

    });

    // Delete a row
    $('#tableStepInfo').on('click', '.rows a.deleteRow', function (event) {
        //e.preventDefault();//alert(e);
        $(this).parents("tr:first").remove();
        $(this).parent().parent().remove();
    });



    $('#btnSave').click( function(){

        var i = $('#tableStepInfo tbody tr').length;
        i = parseInt(i)
        if(i>=1) {
            $( "#step_name" ).removeClass( "required" );
            $( "#step_type" ).removeClass( "required" );
            $( "#step_sequence" ).removeClass( "required" );
        }
    });


    $(function () {
        $('#tableStepInfo').on('click', '.rows a.editRow', function (event) {
            //e.preventDefault();//alert(e);
            var tbl = document.getElementById('tableStepInfo');
            var rowNum = $(this).parents("tr:first").index();       // Get the index no of the current row
            var stepName = tbl.rows[rowNum+1].cells[0].getElementsByTagName("input")[0].value;     // Get the input value for 1st column(cells[0]) input
            var stepType = tbl.rows[rowNum+1].cells[1].getElementsByTagName("input")[0].value;
            var stepSequence = tbl.rows[rowNum+1].cells[2].getElementsByTagName("input")[0].value;


            document.getElementById('step_name').value = stepName;
            document.getElementById('step_type').value = stepType;
            document.getElementById('step_sequence').value = stepSequence;

            $(this).parents("tr:first").remove();
            $(this).parent().parent().remove();
        });
    });
</script>