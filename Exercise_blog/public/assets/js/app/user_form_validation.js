/* ------------------------------------------------------------------------------
 *
 *  # Form validation for idsc center
 *
 *
 * ---------------------------------------------------------------------------- */

$(function () {


    // Form components
    // ------------------------------
    $("#user_photo").change(function () {
        previewImage(this, 'preview_user_image');
    });
    $("#user_sign").change(function () {
        previewImage(this, 'preview_sign_image');
    });//end files

    // Default initialization
    $('.select').select2({});


    // Styled checkboxes, radios
    $(".styled, .multiselect-container input").uniform({radioClass: 'choice'});

    // Styled file input
    $(".file-styled").uniform({
        wrapperClass: 'bg-teal-400',
        fileButtonHtml: '<i class="icon-googleplus5"></i>'
    });


    $('.daterange-single').daterangepicker({
        autoUpdateInput: false,
        singleDatePicker: true,
        "autoApply": true,
        locale: {
            cancelLabel: 'Clear',
            format: 'DD-MM-YYYY'
        }
    });

    $('.daterange-single').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('DD-MM-YYYY'));
    });

    // load comboBox value
    $("#frm_user").relatedSelects({
        onChangeLoad: '/permanentarea',
        loadingMessage: 'Please wait',
        selects: ['permanent_division', 'permanent_district', 'permanent_upzilla', 'permanent_ward']
    });

    // load comboBox value
    $("#frm_user").relatedSelects({
        onChangeLoad: '/presentarea',
        loadingMessage: 'Please wait',
        selects: ['present_division', 'present_district', 'present_upzilla', 'present_ward']
    });


    // Setup validation
    // ------------------------------
    // date format validation
    jQuery.validator.addMethod("dateBD", function (value, element) {
        // valid date format DD-MM-YYYY
        return this.optional(element) || /^(0?[1-9]|[12][0-9]|3[01])[\-](0?[1-9]|1[012])[\-]\d{4}$/.test(value);
    }, 'Please Enter a Valid Date.');

    // Initialize
    var validator = $("#frm_user").validate({
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

            // Input with icons and Select2
            else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                error.appendTo(element.parent());
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
            full_name_en: {
                required: true,
                minlength: 5
            },
            full_name_bn: {
                required: true,
                minlength: 5
            },
            idsc_center_id: {
                required: true,
                integer: true
            },
            designation_id: {
                required: true,
                integer: true
            },
            password: {
                required: true,
                minlength: 5
            },
            password_confirmation: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            },
            email: {
                required: true,
                minlength: 5
            },
            official_email: {
                email: true
            },
            national_id: {

                minlength: 13
            },
            date_of_birth: {
                dateBD: true
            },
            date_of_joining: {
                dateBD: true
            },
            'assigned_roles_list[]': {
                required: true
            }
        },
        messages: {
            email: {
                required: "Provide Valid and Unique User Name / Login ID.",
                minlength: "The User Name / Login ID must be at least 5 characters."
            },
            full_name_en: {
                required: "Provide Valid User Full Name in English.",
                minlength: "The User Full Name in English must be at least 5 characters."
            },
            full_name_bn: {
                required: "Provide Valid User Full Name in Bangla.",
                minlength: "The User Full Name in Bangla must be at least 5 characters."
            },
            official_email: {
                email: "Provide Valid Email Address."
            }
        }
    });


    // Reset form
    $('#reset').on('click', function () {
        validator.resetForm();
    });

});
