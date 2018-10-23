$(document).ready(function(){
	$("a#del").on('click', (function(e){
		e.preventDefault();
		var url = $(this).attr('href');
		$(this).closest('.tr').hide();
		$.ajax({
			type: "GET",
			url: url
		});
	}));
});