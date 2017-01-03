
$(function() {

    //  Styled checkboxes, radios
    $(".styled, .multiselect-container input").uniform({ radioClass: 'choice' });

    // Styled file input
    $(".file-styled").uniform({
        wrapperClass: 'bg-teal-400',
        fileButtonHtml: '<i class="icon-googleplus5"></i>'
    });

    // Setup validation
    // ------------------------------

    // Initialize
    var validator = $("#frmFactoryGradeMarking").validate({
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
            name: {
                required: true
            },
            name_bn: {
                required: true
            },
            marks_start: {
                required: true,
                number: true,
            },
            marks_end: {
                required: true,
                number: true,
            },
        },
        messages: {
            name: {
                required: "Provide Grade Name English"
            },
            name_bn: {
                required: "Provide Grade Name Bangla"
            },
            marks_start: {
                required: "Provide Grade Mark From",
                number: "Grade Mark will number",
            },
            marks_end: {
                required: "Provide Grade Mark To",
                number: "Grade Mark will number",
            },
        }
    });


    // Reset form
    $('#reset').on('click', function() {
        validator.resetForm();
    });

});
