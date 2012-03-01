/* 
Working examples for Day 04 
*/

var simple_function = function(){
	alert('This is a simple function');
}

var single_parameter_function = function(parameter){
	alert('the parameter is : ' + parameter);
}

var two_parameter_function = function(first_number, second_number){
	var third_number = first_number + second_number;
	alert(first_number + " plus " + second_number + " equals " + third_number);
}

var two_parameter_returning_function = function(first_number, second_number){
	var third_number = first_number + second_number;
	return third_number;
}

var changeColor = function(){
	var red   = $('red').get('value');
	var green = $('green').get('value');
	var blue  = $('blue').get('value');
	red   = red.toInt();
	green = green.toInt();
	blue  = blue.toInt();
	red   = red.limit(1, 255);
	green = green.limit(1, 255);
	blue  = blue.limit(1, 255);
	var color = [red, green, blue].rgbToHex(); 
	$$('.container').setStyle('background', color);
}
 
var resetColor = function(){
	$$('.container').setStyle('background', '#fff');
}


window.addEvent('domready', function() {
	$('simple_button').addEvent('click', function() {
		simple_function();
	});
	$('single_parameter_button').addEvent('click', function() {
		single_parameter_function('this is a parameter');
	});
	$('two_parameter_button').addEvent('click', function() {
		two_parameter_function(10, 5);
	});
	$('two_parameter_returning_button').addEvent('click', function() {
		var return_value = two_parameter_returning_function(10, 5);
		alert("return value is : " + return_value);
	});
	$('change').addEvent('click', changeColor);
	$('reset').addEvent('click', resetColor);
});


