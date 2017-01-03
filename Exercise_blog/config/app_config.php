<?php

return [

    /*
     * Grid properties
     */
//    'num_paging_row' => 10,
//    'grid_page_size' => [5, 10, 15, 20, 50],
//    'grid_button_count' => 5,
//    'grid_height' => 500,
//    'window_size' => ['small' => 450, 'medium' => 780, 'large' => 950],
//    'window_action_all' => ["Minimize", "Maximize", "Close"],
//    'window_action_close' => ["Close"],
    'num_paging_row' => 10,
    'grid_page_sizes' => [5, 10, 15, 20,],
    'grid_button_count' => 5,
    'grid_height' => 0,
    'grid_height_small' => 350,
    'num_paging_row_custom' => 150,
    /*
     * DB active status
     */
    'db_active' => 1,
    'db_inactive' => 0,


    /*
     * File uploading path
     */
    'idsc_center_upload_path' => 'uploads/idsc_center/',
    'registration_upload_path' => 'uploads/registration/',
    'user_upload_photo_path' => 'uploads/user/photo/',
    'user_upload_sign_path' => 'uploads/user/sign/',
    'speech_pediatric_upload_path' => 'uploads/speech_pediatric/',
    'speech_adult_upload_path' => 'uploads/speech_adult/',
    'hearing_aided_upload_path' => 'uploads/hearing_aided/',

    /*
     * cache parameter
     */
    'cache_time_limit' => 1, // 5 minutes

    /*
     * Assessment Type IDs
     */
    'visual_examination' => 1,

    /*
     * Common Messages
     */
    'msg_delete_confirmation' => "Are You Sure You want to Delete the Selected Record ?",
    'msg_save' => "Data Saved Successfully",
    'msg_update' => "Data Updated Successfully",
    'msg_delete' => "Data Deleted Successfully",
    'msg_invalid_input' => "Invalid / Duplicate Input Data, Check Again",

    'msg_failed_save' => "Data Saved Failed",
    'msg_failed_update' => "Data Updated Failed",
    'msg_failed_delete' => "Data Deleted Failed",

    'toastr_error' => "Error",
    'toastr_success' => "Success",
    'toastr_warning' => "Warning",
    'toastr_info' => "Info",
    'msg_delete_relation' => "Delete Not Allowed",
    'msg_used' => "This Data Already Used in Other Scope",
    'msg_duplicate' => "This Data Already Exists",

    /*
     * For Occupational Therapy --here the number is the code of cc_speech_pediatric_type table
     */
    'Deformities' => 24,
    'Muscletone' => 25,
    'Sensatiion' => 26,
    'Hand_Function' => 27,
    'Transitional_Movement_For_Child' => 28,
    'Functional_Gross_Motor_Skills' => 29,
    'Cognitive_Skill' => 30,
    'Viual_Processing_Skill_For_Adult' => 31,
    'Sensory_Motor' => 32,
    'Fine_Motor' => 33,
    'ChildsBehaviorTypeForText' => 34,
    'Occupational_Performance' => 35,
    'ChildsBehaviorTypeForSelect' => 36,
    'Sitting_static' => 37,
    'Sitting_Dependent' => 41,
    'Sitting_Moderate' => 42,
    'Standing_Static' => 38,
    'Standing_Dependent' => 43,
    'Standing_Moderate' => 44,
    'Walking_Static' => 39,
    'Walking_Dependent' => 45,
    'Walking_Moderate' => 46,
    'Communication_skills' => 40,
    'OralMotorControl' => 82,
    'SensorySkills' => 83,

    /*
     * for common Articulation Test cc_speech_pediatric_type code=19.
     */
//    'ArticulationTest' => 19,

    /*
     * for Hearing Aided
     */
    'AidedExam' => 79,
    'Frequency' => 81,

    /*
     * for Hearing Unaided Code of cc_speech_pediatric_type Table
     */
    'UnaidedMethodType' => 84,
    'UnaidedReliabilityType' => 85,
    'UnaidedStimuliType' => 86,
    'UnaidedWarbleType' => 87,

    /*
     * for Report
     */
    'valueForYearGenerate' => 20,
    'report_dis_page_title' => "Disability Type Wise Registered Client",
    'report_edu_page_title' => "Education Level Wise Registered Client",
    'report_pro_page_title' => "Profession Wise Registered Client",

    'header_line_1' => "Government of the People's Republic of Bangladesh",
    'header_line_2' => "Jatiyo Protibondhi Unnayan Foundation ( JPUF )",
    'header_line_3' => "Ministry of Social Welfare",
    'header_line_4' => "Protibondhi Sheba O Sahajyo Kendro ( PSOSK  )",

    'lbl_generate_report' => "Generate Report",
    'lbl_show_report' => "Show Report",

    'btn_preview' => "Preview",
    'btn_export_pdf' => "Export to PDF",
    'btn_export_xls' => "Export to XLS",
    'btn_print' => "Print",
    'btn_reset' => "Reset",

    /*
     * For Speech Adult
     */
    'lips_adult' => 47,
    'tongue_adult' => 48,
    'soft_palate' => 49,
    'teeth' => 50,
    'ddk' => 51,
    'single_word' => 52,
    'sentence_lavel' => 53,
    'apraxia' => 54,
    'commands' => 55,
    'speech' => 56,
    'eating_drinking' => 57,
    'single_word_key' => "single_word",
    'repetitions_single_command' => "repetitions_single",
    'repetitions_naming_objects' => "repetitions_naming",
    'written_single_word' => "written_single",
    'written_sentence_lavel' => "written_sentence",

    /*
     * For Speech Pediatric type table code
     */
    'PreVerbalSkills' => 1,
    'PlayCategory' => 2,
    'PlayType' => 3,
    'SocialSkills' => 4,
    'CommunicationForPediatric' => 5,
    'BehaviorsForPediatric' => 6,
    'OralPeripheralStructure' => 88,
    'TongueMovementType' => 7,
    'LipMovementType' => 8,
    'DroolingSaliva' => 9,
    'ThreeKeywordsType' => 10,
    'FourKeywordsType' => 11,
    'FiveKeywordsType' => 12,
    'NegativesType' => 89,
    'TwoKeywordObjectNamingColor' => 13,
    'TwoKeywordObjectNamingSize' => 14,
    'ObjectType' => 15,
    'DefiningWords' => 16,
    'WHQuestions' => 17,
    'VerbalReasoning' => 18,
    'EatingDrinkingSwallowingType' => 20,
    'ArticulationTest' => 19,

    /*
     * For Ndd Austism
     */
    'milestone' => 58,
    'physical_status' => 59,
    'general_behavior' => 60,
    'communication' => 61,
    'preference_in_play' => 62,
    'memory' => 63,
    'attention' => 64,
    'pre_academic_skills' => 65,
    'tectile' => 66,
    'visual' => 67,
    'vestibular' => 68,
    'auditory' => 69,
    'proprioception' => 70,
    'taste' => 71,
    'smell' => 72,

    /*
     * For Assessment
     */
    'physiotherapy' => 1,
    'autism' => 2,
    'occupational_therapy' => 3,
    'eye_assessment' => 4,
    'hearing_aided' => 5,
    'hearing_unaided' => 6,
    'speech_pediatric' => 7,
    'speech_adult' => 8,
];