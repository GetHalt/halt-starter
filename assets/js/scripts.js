( function( $, Backbone ) {

	$.getJSON('http://localhost/beta/?json_route', function( data ) {
		console.log( data );
	} );

} ) ( jQuery, Backbone );