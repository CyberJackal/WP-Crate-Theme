(function($) {

	$( window ).on('load', function() {

	});

	$( document ).ready( function() {

		$('.page-comments').height( $('.comments-area').outerHeight() );
		$('.toggle-comments').click(function(){
			$('.page-comments').toggleClass('closed');
		});

		$('.widget_categories h4').click(function(){
			$(this).parent().toggleClass('open');
		});

		 $('#mobile-menu .menu-item-has-children .sub-menu').click(function(e){
	  	e.stopPropagation();
	  });

		$('select.mp_choose_gateway').on('change', function() {	  	
		  $('input:radio[value='+this.value+']').click();
		});
		
	});

	$( window ).scroll( function() {

	});

	$( window ).resize( function() {

		//$('#page').css( 'padding-bottom', $('.footer').outerHeight() );

	});

})( jQuery );
