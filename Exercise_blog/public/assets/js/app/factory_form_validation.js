/* ------------------------------------------------------------------------------
 *
 *  # Form validation for Factory
 *
 *
 * ---------------------------------------------------------------------------- */

$(function () {

    // Form components
    // ------------------------------

    // Default initialization
    $('.select').select2({});

    // Styled checkboxes, radios
    $(".styled, .multiselect-container input").uniform({radioClass: 'choice'});

    // Styled file input
    $(".file-styled").uniform({
        wrapperClass: 'bg-teal-400',
        fileButtonHtml: '<i class="icon-googleplus5"></i>'
    });

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

    // Date Time Picker Format
    $(function () {
        $(".date_time_format").datetimepicker({
            format: "DD-MM-YYYY hh:mm:ss A"
        });
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

    $(document).ready(function () {
        /* Start ( IS License Renewed Wise Date of Renewal ) */
        if ($("#is_license_renewed").val() != "") {

            if ($("#idIsLicenseRenewed").is(':checked')) {
                $("#difeRenewalDateField").show();
                $("#editRenewalDateDIFE").val($("#editDiFactoryEstablishmentRenewalDate").val());
            } else {
                $("#difeRenewalDateField").hide();
                $("#editRenewalDateDIFE").val('');
            }
        }
        else {
            $("#difeRenewalDateField").hide();
            $("#editRenewalDateDIFE").val('');
        }

        $('#idIsLicenseRenewed').on('click', function () {

            if ($("#idIsLicenseRenewed").is(':checked')) {
                $("#difeRenewalDateField").show();
                $("#editRenewalDateDIFE").val('');
            }
            else {
                $("#difeRenewalDateField").hide();
                $("#editRenewalDateDIFE").val('');
            }
        });
        /* End ( IS License Renewed Wise Date of Renewal ) */
    });

    // Setup validation
    jQuery.validator.addMethod("dateBD", function (value, element) {
        // valid date format DD-MM-YYYY
        return this.optional(element) || /^(0?[1-9]|[12][0-9]|3[01])[\-](0?[1-9]|1[012])[\-]\d{4}$/.test(value);
    }, 'Please Enter a Valid Date.');
    // ------------------------------

    // Initialize
    var validator = $("#frm_factory").validate({
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
            industry_id: {
                required: true
            },
            factory_name: {
                required: true,
                minlength: 3
            },
            factory_address: {
                required: true,
                minlength: 5
            },
            factory_phone: {
                required: true,
                minlength: 7
            },
            factory_establishment_year: {
                required: true
            },
            division_id: {
                required: true
            },
            region_id: {
                required: true
            },
            district_id: {
                required: true
            },
            di_factory_establishment_license_no: {
                required: true
            },
            //di_factory_establishment_date: {
            //    required: false,
            //    dateBD: true
            //},
            //di_factory_establishment_renewal_date: {
            //    required: true,
            //    dateBD: true
            //},
            //factory_inspection_date_time: {
            //    required: true
            //},
            //factory_previous_inspection_date_time: {
            //    required: true
            //},
            factory_workers_female_no: {
                required: true,
                number: true
            },
            factory_workers_male_no: {
                required: true,
                number: true
            },
            //factory_workers_total_no: {
            //    number: true
            //},
            factory_employee_female_no: {
                required: true,
                number: true
            },
            factory_employee_male_no: {
                required: true,
                number: true
            },
            //factory_employee_total_no: {
            //    number: true
            //}
        },
        messages: {
            industry_id: {
                required: "Select Industrial Sector."
            },
            factory_name: {
                required: "Provide Factory Name."
            },
            factory_address: {
                required: "Provide Factory Address."
            },
            factory_phone: {
                required: "Provide Factory Phone No.",
                minlength: "Please Enter a Valid Factory Phone No."
            },
            factory_establishment_year: {
                required: "Provide Year of Factory Establishment."
            },
            division_id: {
                required: "Select Division."
            },
            region_id: {
                required: "Select Region."
            },
            district_id: {
                required: "Select District."
            },
            di_factory_establishment_license_no: {
                required: "Provide Valid Dept of Inspection for Factory & Establishments License No."
            },
            //di_factory_establishment_date: {
            //    required: "Provide Valid Dept of Inspection for Factory & Establishments Date."
            //},
            //di_factory_establishment_renewal_date: {
            //    required: "Provide Valid Dept of Inspection for Factory & Establishments Renewal Date."
            //},
            //factory_inspection_date_time: {
            //    required: "Provide Valid Date & Time of Inspection."
            //},
            //factory_previous_inspection_date_time: {
            //    required: "Provide Valid Date & Time of Previous Inspection."
            //},
            factory_workers_female_no: {
                required: "Provide Factory Workers Female No.",
                number: "Please Enter a Valid Factory Workers Female No."
            },
            factory_workers_male_no: {
                required: "Provide Factory Workers Male No.",
                number: "Please Enter a Valid Factory Workers Male No."
            },
            //factory_workers_total_no: {
            //    required: "Provide Factory Workers Total No.",
            //    number: "Please Enter a Valid Factory Workers Total No."
            //},
            factory_employee_female_no: {
                required: "Provide Factory Employee Female No.",
                number: "Please Enter a Valid Factory Employee Female No."
            },
            factory_employee_male_no: {
                required: "Provide Factory Employee Male No.",
                number: "Please Enter a Valid Factory Employee Male No."
            },
            //factory_employee_total_no: {
            //   required: "Provide Factory Employee Total No.",
            //   number: "Please Enter a Valid Factory Employee Total No."
            //}
        }
    });

    // Reset form
    $('#reset').on('click', function () {
        validator.resetForm();
    });
});
