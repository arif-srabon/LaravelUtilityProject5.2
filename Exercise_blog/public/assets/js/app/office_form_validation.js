/* ------------------------------------------------------------------------------
 *
 *  # Form validation for Office
 *
 *
 * ---------------------------------------------------------------------------- */

$(function () {

    // Form components
    // ------------------------------

    // Styled checkboxes, radios
    $(".styled, .multiselect-container input").uniform({radioClass: 'choice'});

    // Styled file input
    $(".file-styled").uniform({
        wrapperClass: 'bg-teal-400',
        fileButtonHtml: '<i class="icon-googleplus5"></i>'
    });

    // Setup validation
    // ------------------------------

    // Initialize
    var validator = $("#frmOffice").validate({
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
            division_id: {
                required: true
            },
            region_id: {
                required: true
            },
            //office_code: {
            //    required: true,
            //    minlength: 3
            //},
            office_address: {
                required: true,
                minlength: 5
            },
            office_name: {
                required: true,
                minlength: 3
            },
            office_name_bn: {
                required: true,
                minlength: 3
            }
        },
        messages: {
            division_id: {
                required: "Select Division."
            },
            region_id: {
                required: "Select Region."
            },
            //office_code: {
            //    required: "Provide Valid Office Code."
            //},
            office_address: {
                required: "Provide Office Address."
            },
            office_name: {
                required: "Provide Office Name."
            },
            office_name_bn: {
                required: "Provide Office Name [ Bangla ]."
            },

            head_office: "Please Select Head Office Status.",
            is_active: "Please Select a Status."
        }
    });

    // Reset form
    $('#reset').on('click', function () {
        validator.resetForm();
    });
});
