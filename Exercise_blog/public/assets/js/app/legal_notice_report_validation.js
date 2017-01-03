/**
 * Created by Arif on 9/29/2016.
 */

$(function() {

    //  Styled checkboxes, radios
    $(".styled, .multiselect-container input").uniform({ radioClass: 'choice' });


    // Styled file input
    $(".file-styled").uniform({
        wrapperClass: 'bg-teal-400',
        fileButtonHtml: '<i class="icon-googleplus5"></i>'
    });

    $('.daterange-single').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD-MM-YYYY'));
    });

    $(function () {
        $(".date-format").datetimepicker({
            format: "DD-MM-YYYY"
        });
    });

    // Setup validation
    // ------------------------------

    // Initialize
    var validator = $("#frmLegalNoticeReport").validate({
        ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },

        // Different components require proper error label placement
        errorPlacement: function(error, element) {

            // Styled checkboxes, radios, bootstrap switch
            if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
                if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                    error.appendTo( element.parent().parent().parent().parent() );
                }
                else {
                    error.appendTo( element.parent().parent().parent().parent().parent() );
                }
            }


            // Inline checkboxes, radios
            else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                error.appendTo( element.parent().parent() );
            }

            // Input group, styled file input
            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                error.appendTo( element.parent().parent() );
            }

            else {
                error.insertAfter(element);
            }
        },
        validClass: "validation-valid-label",

        rules: {
            factory_name: {
                required: true
            },
            issue_date: {
                required: true
            }
        },
        messages: {
            factory_name: {
                required: "Please select Factory Name"
            },
            issue_date: {
                required: "Please select Issue Date"
            }
        },
        errorPlacement: function(error, element) {
            if (element.attr("name") == "factory_name" )
                error.insertAfter(".err-factory-name");
            else if  (element.attr("name") == "issue_date" )
                error.insertAfter(".err-issue-date");
            else
                error.insertAfter(element);
        }
    });

    // Reset form
    $('#reset').on('click', function() {
        validator.resetForm();
    });
    $('.select').select2({}).on("change", function (e) {
        $(this).valid(); //jquery validation script validate on change
    });

});
