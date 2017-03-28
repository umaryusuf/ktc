$(function(){

	var regno = $('#regno');
	regno.on('input', function(){
		var val = regno.val();
		if (val.length > 0 && val.length < 5) {
			$('#regno_error').text("Registration Number must be atleast 5 characters");
		}else{
			$('#regno_error').text("");
		}
	});

	var pat = /[0-9+&@#\/%?=~_|!:,.;]/g;

	var name = $('#fullname');
	name.on('input', function(){
		var val = name.val();
		var pat = /[0-9+&@#\/%=~_|]/g;
		var pat2 = /[A-z]\s\b[A-z]/g;

		if (pat.test(val) == true ) {
			$('#name_error2').text(" contains invalid characters");
		}else{
			$('#name_error2').text("");
		}

		if (pat2.test(val) == true) {
			$('#name_error').text("");
		}else{
			$('#name_error').text("Name must contains atleast two words");
		}
		
	});

	var phone = $('#phone');
	phone.on('input', function(){
		var number = phone.val();
		if (number.length > 0 && number.length < 11) {
			$('#phone_error').text("Phone Number must be atleast 11  characters");
		}else{
			$('#phone_error').text("");
		}
	});

	var town = $('#town');
	town.on('input', function(){
		var val = town.val();
		if (pat.test(val) == true) {
			$('#town_error').text("Town contains invalid characters");
		}else{
			$('#town_error').text("");
		}
	});

	var tribe = $('#tribe');
	tribe.on('input', function(){
		var val = tribe.val();
		if (pat.test(val) == true) {
			$('#tribe_error').text("Tribe contains invalid characters");
		}else{
			$('#tribe_error').text("");
		}
	});

	var local_gov = $('#local_gov');
	local_gov.on('input', function(){
		var val = local_gov.val();
		if (pat.test(val) == true) {
			$('#local_gov_error').text("Local Government contains invalid characters");
		}else{
			$('#local_gov_error').text("");
		}
	});

	var address = $('#address');
	address.on('input', function(){
		var pat = /[+&@#\/%=~_|]/g;
		var val = address.val();
		if (pat.test(val) == true) {
			$('#address_error').text("Address contains invalid characters");
		}else{
			$('#address_error').text("");
		}
	});

	$('#studentform').on('submit', function(){
		validateSex();
		validateState();
	});

	function validateSex(){
		var sex = $("#sex");
		if (sex == null || sex == "") {
			$('#sex_error').text("Sex is required");
			return false;
		}else{
			$('#sex_error').text("");
			return true;
		}
	}

	function validateState(){
		var state = $("#state");
		if (state == null || state == "") {
			$('#state_error').text("State is required");

			return false;
		}else{
			$('#state_error').text("");
			return true;
		}
	}
		});