$('.form .stages label').click(function(){
	
	var radioButtons = $('.form input:radio');
	var selectedIndex = radioButtons.index(radioButtons.filter(':checked'));
	selectedIndex = selectedIndex + 1;
});

$('.form button').click(function(){
	
	var radioButtons = $('.form input:radio');
	var selectedIndex = radioButtons.index(radioButtons.filter(':checked'));

	selectedIndex = selectedIndex + 2;

	$('.form input[type="radio"]:nth-of-type(' + selectedIndex + ')').prop('checked', true);
	
	if(selectedIndex == 6){
		
		$('button').html('Seçimlerimi Kontrol Ettim!');
	}

	if(selectedIndex - 1 == 6){
		
		$('button').attr("type", "submit");
	}
});

function logoClickFunction(){
	
	window.location.href = "http://www.radsan.com";
}