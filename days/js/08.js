/* 
Working examples for Day 08
*/

var changeColor = function(red_value, green_value, blue_value){
	var color = [red_value, green_value, blue_value].rgbToHex(); 
	alert('Converts to : ' + color); 
}

var toIntDemo = function(make_me_a_number){
	var number = make_me_a_number.toInt();
	alert('Best Attempt: ' + number);
}


var checkType = function(variable_to_check){
	var variable_type = $type(variable_to_check);
	alert('Variable is a: ' + variable_type);
}

var toIntDemo2 = function(make_me_a_number){
	var number = make_me_a_number.toInt();
	if ($type(number) != 'number'){
		number = 0;
	}
	alert('Best Attempt : ' + number);
}

var changeColor_2 = function(red_value, green_value, blue_value){
	red_value = red_value.toInt();
	green_value = green_value.toInt();
	blue_value = blue_value.toInt();
	//Set default values on anything thats Not a Number
	if ($type(red_value)   != 'number'){ red_value = 0; }
	if ($type(green_value) != 'number'){ green_value = 0; }
	if ($type(blue_value)  != 'number'){ blue_value = 0; }
	//Calculate hex value
	var color = [red_value, green_value, blue_value].rgbToHex(); 
	alert('Converts to : ' + color); 
}

var limitDemo = function(number_to_limit){
	//Do our best to get an integer
	number_to_limit = number_to_limit.toInt();
	//Get the limited value
	var limited_number = number_to_limit.limit(0, 255);
	alert("Number Limited To : " + limited_number);
}

var changeColor_3 = function(red_value, green_value, blue_value){
	//Try to make sure everything is an integer
	red_value   = red_value.toInt();
	green_value = green_value.toInt();
	blue_value  = blue_value.toInt();
	//Set default values on anything thats Not a Number
	if ($type(red_value)   != 'number'){red_value = 0;}
	if ($type(green_value) != 'number'){green_value = 0;}
	if ($type(blue_value)  != 'number'){blue_value = 0;}
	//Limit Everything to the RGB Scale (0 - 255)
	red_value   = red_value.limit(0, 255);
	green_value = green_value.limit(0, 255);
	blue_value  = blue_value.limit(0, 255);
	//Calculate hex value
	var color = [red_value, green_value, blue_value].rgbToHex(); 
	alert('Converts to : ' + color); 
}


window.addEvent('domready', function() {
	// rgbToHex()
	$('change_color_1_good').addEvent('click', function() {
		changeColor('28', '17', '47');
	});
	$('change_color_1_bad').addEvent('click', function() {
		changeColor('28', '17', 'oops');
	});
	// toInt()
	$('to_int_1').addEvent('click', function() {
		toIntDemo('613.234');
	});
	$('to_int_2').addEvent('click', function() {
		toIntDemo('83_hooray!');
	});
	$('to_int_3').addEvent('click', function() {
		toIntDemo('cant_get_83');
	});
	// type()
	$('type_number').addEvent('click', function() {
		checkType(43);
	});
	$('type_string').addEvent('click', function() {
		checkType('a string');
	});
	$('type_boolean').addEvent('click', function() {
		checkType(false);
	});
	//toInt()_2
	$('to_int_4').addEvent('click', function() {
		toIntDemo2('613.234');
	});
	$('to_int_5').addEvent('click', function() {
		toIntDemo2('83_hooray!');;
	});
	$('to_int_6').addEvent('click', function() {
		toIntDemo2('cant_get_83');
	});
	// changeColor_2
	$('change_color_2_clean').addEvent('click', function() {
		changeColor_2('28', '17', '47');
	});
	$('change_color_2_default').addEvent('click', function() {
		changeColor_2('28', '17', 'oops');
	});
	$('change_color_2_breaks').addEvent('click', function() {
		changeColor_2('428', '317', '265000');
	});
	// Limit()
	$('limit_demo').addEvent('click', function() {
		limitDemo(6535634);
	});
	// changeColor_3
	$('change_color_3_clean').addEvent('click', function() {
		changeColor_3('28', '17', '47');
	});
	$('change_color_3_default').addEvent('click', function() {
		changeColor_3('28', '17', 'oops');
	});
	$('change_color_3_limit').addEvent('click', function() {
		changeColor_3('428', '317', '265000');
	});
});
