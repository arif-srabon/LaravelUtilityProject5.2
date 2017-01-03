/* ------------------------------------------------------------------------------
*
*  # Form validation for idsc center
*
*
* ---------------------------------------------------------------------------- */

$(function() {

    //  Styled checkboxes, radios
    $(".styled, .multiselect-container input").uniform({ radioClass: 'choice' });

    // Setup validation
    // ------------------------------

    // Initialize
    var validator = $("#frmChecklistSubject").validate({
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
            checklist_subject_group_id: {
                required: true,
            },
            checklist_subject_name: {
                required: true,
                minlength: 3
            },
            checklist_subject_name_bn: {
                required: true
            },
            priority_rating: {
                maxlength: 2
            }

        },
        messages: {
            checklist_subject_group_id: {
                required: "Select Checklist Subject Group"
            },
            checklist_subject_name: {
                required: "Provide Name (English)"
            },
            checklist_subject_name_bn: {
                required: "Provide Name (Bangla)"
            },
            priority_rating: {
                maxlength: "Priority Rating Maximum Two Asterisk Mark (*)"
            }
        }
    });


    // Reset form
    $('#reset').on('click', function() {
        validator.resetForm();
    });

});
