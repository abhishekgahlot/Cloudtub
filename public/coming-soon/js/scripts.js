//Our JS


//Animation

		$(function(){
		$('#lorries')
		.animate({
			backgroundPosition: '10000px 0px'
		}, 240000, 'linear');

		$('#background-vehicles').animate({
			backgroundPosition:'-8000px 0px'
		}, 140000, 'linear');

		$('#background-small-cranes').animate({
			backgroundPosition:'-10000px 0px'
		}, 500000, 'linear');

		$('#clouds').animate({
			backgroundPosition:'-10000px -0px'
		}, 960000, 'linear');

});

//Countdown

		$(function () {
		var austDay = new Date();
		austDay = new Date(austDay.getFullYear() + 0, 9 - 1, 15);
		$('#defaultCountdown').countdown({until: austDay});
		$('#year').text(austDay.getFullYear());
});

//Subscribe Form

//Our JS


//Animation

		$(function(){
		$('#lorries')
		.animate({
			backgroundPosition: '10000px 0px'
		}, 240000, 'linear');

		$('#background-vehicles').animate({
			backgroundPosition:'-8000px 0px'
		}, 140000, 'linear');

		$('#background-small-cranes').animate({
			backgroundPosition:'-10000px 0px'
		}, 500000, 'linear');

		$('#clouds').animate({
			backgroundPosition:'-10000px -0px'
		}, 960000, 'linear');

});

//Countdown

		$(function () {
		var austDay = new Date();
		austDay = new Date(austDay.getFullYear() + 0, 12 - 1, 31);
		$('#defaultCountdown').countdown({until: austDay});
		$('#year').text(austDay.getFullYear());
});

//Subscribe Form

function Mail()
{

	var email=document.getElementById('email').value;

	$.post('mail.php', {
			email: email
		}, function(data) {
		if(data!=='Enter Valid Email!'){
		$('#info').empty();
		$('#info').html('<center><div class="error">'+data+'</div>');
		}else{

			$('#info').append('<center><div class="error">'+data+'</div>');

		}


					});

}