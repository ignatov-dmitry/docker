(function () {
	
	"use strict";

	jQuery(document).ready(function($) {  
		 
		$('body').delegate(".input_datetime", 'hover', function(e){
	            e.preventDefault();
	            $(this).datepicker({
		               defaultDate: "",
		               dateFormat: "yy-mm-dd",
		               numberOfMonths: 1,
		               showButtonPanel: true,
	            });
         });

		var hides = ['anton_audio_link','anton_link_link','anton_link_text','anton_video_link','anton_gallery_files'];
		var shows = {
			audio:['anton_audio_link'],
			video:['anton_video_link','anton_video_text'],
			link:['anton_link_link'],
			gallery:['anton_gallery_files']	
		}
		$( '.post-type-post #post-formats-select input' ).on('click', function(){
			 $(hides).each( function( i, item ){
			 	$("[name="+item+']').parent().parent().hide();
			 } );
			 var s = $(this).val();
			 if( shows[s] != null ){
			 	$(shows[s]).each( function( i, is ){
			 		$("[name="+is+']').parent().parent().show();
				 } );
			 }
		} );
	});	
} )( jQuery );