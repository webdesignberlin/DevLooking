//-- EVENT LISTENER --//
(function($) {

	$("#project-technology").select2();
	$("#project-search").select2();

	$('.hireme').on('click', function() {
		$(this).addClass('visited');

        var mail = $('.mail:first').html();

        $.ajax({
            type: "POST",
            url: "http://dev-looking.me/index.php?action=mail",
            data: {email: mail}
        });
	});

})(jQuery);