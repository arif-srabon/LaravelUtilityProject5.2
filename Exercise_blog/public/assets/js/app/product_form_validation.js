/* ------------------------------------------------------------------------------
 *
 *  # Form validation for Product
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
    var validator = $("#frmProduct").validate({
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
            industry_id: {
                required: true
            },
            //product_code: {
            //    required: true,
            //    minlength: 3
            //},
            product_name: {
                required: true,
                minlength: 3
            },
            product_name_bn: {
                required: true,
                minlength: 3
            }
        },
        messages: {
            industry_id: {
                required: "Select Industrial Sector."
            },
            //product_code: {
            //    required: "Provide Valid Product Code."
            //},
            product_name: {
                required: "Provide Product Name."
            },
            product_name_bn: {
                required: "Provide Product Name [ Bangla ]."
            },
            is_active: "Please Select a Status."
        }
    });

    // Reset form
    $('#reset').on('click', function () {
        validator.resetForm();
    });
});
