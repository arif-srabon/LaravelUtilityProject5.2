
jQuery(document).ready(function($){

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

    $(".date-format").datetimepicker({
        format: "DD-MM-YYYY"
    });

    // Reset form
    $('#reset').on('click', function() {
        validator.resetForm();
    });
    $("#btnReset").on('click', function (e) {
        $("#progressouter").empty();
        $("#report_content").empty();
    });

    $('#reportForm input').keydown(function (e) {
        if (e.keyCode == 13) {
            $('#btnPreview').trigger('click');
        }
    });

    $("#frmGenerateNoticeReport").validate({
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

    $("#btnPdfExport").click(function () {
        if ($("#frmGenerateNoticeReport").valid()) {
            $("#hidExportType").val('exportPDF');
            $("#frmGenerateNoticeReport").submit();
        }
    });

    $("#btnXlsExport").click(function () {
        if ($("#frmGenerateNoticeReport").valid()) {
            $("#hidExportType").val('exportXLS');
            $("#frmGenerateNoticeReport").submit();
        }
    });

    $("#btnPrint").click(function () {
        if ($("#frmGenerateNoticeReport").valid()) {
            $("#hidExportType").val('exportPrint');
            $("#frmGenerateNoticeReport").submit();
        }
    });

    /**
     * Call Select2
     * Make validation error disappear while select field's state is changed.
     */
    $('.call-select2').select2().on("change", function (e) {
        $(this).valid(); //jquery validation script validate on change
    });

});
