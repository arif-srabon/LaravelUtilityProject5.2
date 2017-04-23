/**
 * Site JS
 *
 * Site front-end specific JavaScripts
 *
 * @package ikms-ilo
 * @since   1.0.0
 */

// jQuery no-conflict wrapper
jQuery(document).ready(function($) {

	if(window.jQuery().switcher){
		/**
		 * Checkbox Switcher
		 * @plugin Switcher
		 * ---------------------------------------------------------------------
		 */
		$('.switcher').switcher();
	}


	if(window.jQuery().datepicker){
		/**
		 * Initiated Date Picker
		 * Calling DatePicker for every '.call-datepicker' element - onFocus()
		 *
		 * @author  skafandri
		 * @link    http://stackoverflow.com/a/10433307
		 * ---------------------------------------------------------------------
		 */
		$('body').on( 'focus', '.call-datepicker', function(){
		    $(this).datepicker({
		        format: 'dd-mm-yyyy'
		    });
		});
	}


	/** ------ PAGE-SPECIFIC JS ---------- */

	if(window.jQuery().dynamicForm){
		/**
	     * Payment Repeater - License Renewal
	     * @plugin jQuery dynamic form
	     * ---------------------------------------------------------------------
	     */
	    var payment_repeater = $('#payment-repeater');
	    if( payment_repeater.length > 0 )  {
	        payment_repeater.dynamicForm( '.add-payment', '.remove-payment', {limit: 2});
	    }
	}

});


/* ----------------------------------------------------------- */
/*  01. Bootstrap File Select
/* 		Triggering outside document ready for newly created DOM
/*
/*  	http://www.abeautifulsite.net/whipping-file-inputs-into-shape-with-bootstrap-3/
/* ----------------------------------------------------------- */
var btn_file = $('.btn-file :file');

btn_file.on( 'change', function() {
    var input 		= $(this),
        numFiles 	= input.get(0).files ? input.get(0).files.length : 1,
        label 		= input.val().replace(/\\/g, '/').replace(/.*\//, '');
    
    input.trigger('fileselect', [numFiles, label]);
});

btn_file.on('fileselect', function(event, numFiles, label) {
	$(this).closest('.repeater-card, .file-select').find('.file-status').html(label);
});
