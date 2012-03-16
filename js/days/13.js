/* 
Working examples for Day 13
*/


var regex_demo = function(){
	var test_string = $('regex_1_value').get('value');
	var regex_value = $('regex_1_match').get('value');
	var test_result = test_string.test(regex_value);

	if  (test_result){
		$('regex_1_result').set('html', "matched");
	} else {
		$('regex_1_result').set('html', "didn't match");
	}
}

var regex_demo_2 = function(){
	//Get the string to test from the input field
	var test_string = $('regex_2_value').get('value');
	//Get the regular expression to use from the input field
	var regex_value = $('regex_2_match').get('value');
	//See if we're ignoring case sensitivity
	var regex_param = "";
	if ($('regex_2_param').checked){
		regex_param = "i";
	}
	//Run the test and get the result
	var test_result = test_string.test(regex_value, regex_param);
	//Update the result span with the what happened
	if (test_result){
		$('regex_2_result').set('html', "matched");
	} else {
		$('regex_2_result').set('html', "didn't match");
	}
}

var regex_demo_3 = function(){
	var test_string = $('regex_3_value').get('value');
	var regex_value = $('regex_3_match').get('value');
	var regex_param = "";
	if ($('regex_3_param').checked){
		regex_param = "i";
	}
	var test_result = test_string.test(regex_value, regex_param);
	if (test_result){
		$('regex_3_result').set('html', "matched");
	} else {
		$('regex_3_result').set('html', "didn't match");
	}
}

var regex_demo_4 = function(){
	var test_string = $('regex_4_value').get('value');
	var regex_value = $('regex_4_match').get('value');
	var regex_param = "";
	if ($('regex_4_param').checked){
		regex_param = "i";
	}
	var test_result = test_string.test(regex_value, regex_param);
	if (test_result){
		$('regex_4_result').set('html', "matched");
	} else {
		$('regex_4_result').set('html', "didn't match");
	}
}

var regex_demo_5 = function() {
	var test_string_1 = $('regex_5_value_1').get('value');
	var test_string_2 = $('regex_5_value_2').get('value');
	var regex_value = $('regex_5_match').get('value');
	var regex_param = "";
	if ($('regex_5_param').checked){
		regex_param = "i";
	}
	var test_result_1 = test_string_1.test(regex_value, regex_param);
	var test_result_2 = test_string_2.test(regex_value, regex_param);
	if (test_result_1){
		$('regex_5_result_1').set('html', "matched");
	} else {
		$('regex_5_result_1').set('html', "didn't match");
	}
	if (test_result_2){
		$('regex_5_result_2').set('html', "matched");
	} else {
		$('regex_5_result_2').set('html', "didn't match");
	}
}

var regex_demo_6 = function() {
	var test_string_1 = $('regex_6_value_1').get('value');
	var test_string_2 = $('regex_6_value_2').get('value');
	var regex_value = $('regex_6_match').get('value');
	var regex_param = "";
	if ($('regex_6_param').checked){
		regex_param = "i";
	}
	var test_result_1 = test_string_1.test(regex_value, regex_param);
	var test_result_2 = test_string_2.test(regex_value, regex_param);
	if (test_result_1){
		$('regex_6_result_1').set('html', "matched");
	} else {
		$('regex_6_result_1').set('html', "didn't match");
	}
	if (test_result_2){
		$('regex_6_result_2').set('html', "matched");
	} else {
		$('regex_6_result_2').set('html', "didn't match");
	}
}

var regex_demo_7 = function(){
	//Get the string to test
	var test_string_1 = $('regex_7_value_1').get('value');
	//Get the regular expression to use
	var regex_value = $('regex_7_match').get('value');
	//Check to see if we're escaping regexes
	if ($('regex_7_escape').checked){
		//If so, escape the regex
		regex_value = regex_value.escapeRegExp();
	}
	//See if we're ignoring case sensitivity
	var regex_param = "";
	if ($('regex_7_param').checked){
		regex_param = "i";
	}
	//Run the test
	var test_result_1 = test_string_1.test(regex_value, regex_param);
	if (test_result_1){
		$('regex_7_result').set('html', "matched");
	} else {
		$('regex_7_result').set('html', "didn't match");
	}
}

window.addEvent('domready', function() {
	$('regex_1_button').addEvent('click', regex_demo);
	$('regex_2_button').addEvent('click', regex_demo_2);
	$('regex_3_button').addEvent('click', regex_demo_3);
	$('regex_4_button').addEvent('click', regex_demo_4);
	$('regex_5_button').addEvent('click', regex_demo_5);
	$('regex_6_button').addEvent('click', regex_demo_6);
	$('regex_7_button').addEvent('click', regex_demo_7);
});