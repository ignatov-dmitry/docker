/**
 * Cropshop Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Customizer preview reload changes asynchronously.
 */
( function( $ ) {

	"use strict";
	
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.widget-title,.title-heading,.widget-text-heading.heading-title-v1 span' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.widget-title,.title-heading,.widget-text-heading.heading-title-v1 span' ).css( {
					'clip': 'auto',
					'position': 'static'
				} );

				$( '.widget-title,.title-heading,.widget-text-heading.heading-title-v1 span' ).css( {
					'color': to
				} );
			}
		} );
	} );
	//Update site link color in real time...
	wp.customize( 'link_color', function( value ) {
		value.bind( function( newval ) {  
			$('a').css('color', newval );
		} );
	} );

	//Update site link color in real time...
	wp.customize( 'text_color', function( value ) {
		value.bind( function( newval ) {  
			$('p,.description').css('color', newval );
		} );
	} );

	//Update site link color in real time...
	wp.customize( 'color_price', function( value ) {
		value.bind( function( newval ) {  
			$('.price > *').css('color', newval );
		} );
	} );

	//Update site link color in real time...
	wp.customize( 'color_price_old', function( value ) {
		value.bind( function( newval ) {  
			$('.price > del').css('color', newval );
		} );
	} );

	//Update site link color in real time...
	wp.customize( 'page_bg', function( value ) {
		value.bind( function( newval ) {  
			$('#page').css('background-color', newval );
		} );
	} );

	//Update site link color in real time...
	wp.customize( 'body_text_color', function( value ) {
		value.bind( function( newval ) {  
			$('body').css('color', newval );
		} );
	} );

	//Update site link color in real time...
	wp.customize( 'topbar_bg', function( value ) {
		value.bind( function( newval ) {  
			$('#pbr-topbar').css('background-color', newval );
		} );
	} );

	//Update site link color in real time...
	wp.customize( 'topbar_color', function( value ) {
		value.bind( function( newval ) {  
			$('#pbr-topbar span, #pbr-topbar .phone p').css('color', newval );
		} );
	} );

	//Update site link color in real time...
	wp.customize( 'topbar_bgcart', function( value ) {
		value.bind( function( newval ) {  
			$('#cart .mini-cart-items').css('background-color', newval );
		} );
	} );

	//Update site link color in real time...
	wp.customize( 'footer_bg', function( value ) {
		value.bind( function( newval ) {  
			$('#pbr-footer').css('background-color', newval );
		} );
	} );

	//Update site link color in real time...
	wp.customize( 'footer_color', function( value ) {
		value.bind( function( newval ) {  
			$('#pbr-footer, .copyright').css('color', newval );
		} );
	} );

	//Update site link color in real time...
	wp.customize( 'footer_heading_color', function( value ) {
		value.bind( function( newval ) {  
			$('#pbr-footer h2, #pbr-footer h3, #pbr-footer h4 ,  .pbr-footer .wpb_heading span, .pbr-footer .vc_custom_heading').css('color', newval );
		} );
	} );
} )( jQuery );