/* ------------------------------------------------------------------------------
*
*  # Form validation for idsc center
*
*
* ---------------------------------------------------------------------------- */

$(function() {


    // Setup validation
    // ------------------------------

    // Initialize
    var validator = $("#frmThanaUpazilla").validate({
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
            division_id: {
                required: true,
            },
            region_id: {
                required: true,
            },
            district_id: {
                required: true,
            },
			geo_code: {
                required: true,
            },
            name: {
                required: true,
            },
            name_bn: {
                required: true
            }

        },
        messages: {
            division_id: {
                required: "Select Division"
            },
            region_id: {
                required: "Select Region"
            },
            district_id: {
                required: "Select District"
            },
			geo_code: {
                required: "Provide valid GEO Code",
            },
            name: {
                required: "Provide Name (English)"
            },
            name_bn: {
                required: "Provide Name (Bangla)"
            }
        }
    });


    // Reset form
    $('#reset').on('click', function() {
        validator.resetForm();
    });

});
