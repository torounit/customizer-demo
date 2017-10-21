/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function( $ ) {

	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.navbar-brand' ).text( to );
		} );
	} );

	wp.customize( 'jumbotron_lead', function( value ) {
		value.bind( function( to ) {
			$( '.jumbotron .lead' ).text( to );
		} );
	} );

	wp.customize( 'navbar_bg', function( value ) {
		console.log(value);
		value.bind( function( to ) {
			$( '.navbar' ).removeClass( 'bg-dark' );
			$( '.navbar' ).removeClass( 'bg-primary' );
			$( '.navbar' ).addClass( to );
		} );
	} );

})( jQuery );
