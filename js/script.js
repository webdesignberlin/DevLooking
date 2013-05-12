//-- EVENT LISTENER --//
(function($) {

	$("#project-technology").select2();
	$("#project-search").select2();

	$('.hireme').on('click', function() {
		$(this).addClass('visited');
	});

})(jQuery);