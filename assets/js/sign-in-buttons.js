(function($) {

  $(document).ready( function(){
    console.log('document ready');
    console.log('adding click handler');
    $('.sign-in').click( function(){
      console.log('clicked');
      $('.sign-in-integrations').addClass( 'visible' );
      $('.sign-in').addClass('hidden');
    });
  } );

})( jQuery );
