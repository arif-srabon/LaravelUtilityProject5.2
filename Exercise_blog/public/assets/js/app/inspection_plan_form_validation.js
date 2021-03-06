/* ------------------------------------------------------------------------------
 *
 *  # Form validation for Inspection Plan
 *
 *
 * ---------------------------------------------------------------------------- */

$(function () {

    // Default initialization
    $('.select').select2({});

    // For Radio Style
    $(".styled, .multiselect-container input").uniform({radioClass: 'choice'});

    // Date Picker Format
    $('.daterange-single').daterangepicker({
        autoUpdateInput: false,
        singleDatePicker: true,
        "autoApply": true,
        locale: {
            cancelLabel: 'Clear',
            format: 'DD-MM-YYYY'
        }
    });

    // Date Picker Format
    $('.daterange-single').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('DD-MM-YYYY'));
    });

    // Date Picker Format
    $(function () {
        $(".date_format").datetimepicker({
            format: "DD-MM-YYYY"
        });
    });

    // Month Format
    $(function () {
        $(".month_format").datetimepicker({
            format: "MMMM-YYYY"
        });
    });

    // Setup validation
    // ------------------------------

    $(".file-styled").uniform({
        wrapperClass: 'bg-teal-400',
        fileButtonHtml: '<i class="icon-googleplus5"></i>'
    });

    // Initialize
    var validator = $("#frm_inspectionplan").validate({
        ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },

        // Different components require proper error label placement
        errorPlacement: function (error, element) {

            // Styled checkboxes, radios, bootstrap switch
            if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container')) {
                if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                    error.appendTo(element.parent().parent().parent().parent());
                }
                else {
                    error.appendTo(element.parent().parent().parent().parent().parent());
                }
            }

            // Inline checkboxes, radios
            else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                error.appendTo(element.parent().parent());
            }

            // Input group, styled file input
            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                error.appendTo(element.parent().parent());
            }

            else {
                error.insertAfter(element);
            }
        },
        validClass: "validation-valid-label",

        rules: {
            month_date: {
                required: true
            },
            office_id: {
                required: true
            },
            inspector_id: {
                required: true
            },
            plan_date: {
                required: true
            }
        },
        messages: {
            month_date: {
                required: 'Provide Month Date.'
            },
            office_id: {
                required: 'Select Office Name.'
            },
            inspector_id: {
                required: 'Select Inspector Name.'
            },
            plan_date: {
                required: 'Provide Schedule Date.'
            }
        }
    });

    // Reset form
    $('#reset').on('click', function () {
        validator.resetForm();
    });
});
