( function( $ ) {

	// Hero Title
	wp.customize( 'wp_titans_hero_title', function( value ) {
		value.bind( function( to ) {
			$( '#hero h1' ).text( to );
		} );
	} );

    // Hero Subtitle
	wp.customize( 'wp_titans_hero_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '#hero p' ).text( to );
		} );
	} );

    // About Content
    wp.customize( 'wp_titans_about_content', function( value ) {
		value.bind( function( to ) {
			$( '#about p' ).text( to );
		} );
	} );

} )( jQuery );
