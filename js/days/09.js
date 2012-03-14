/* 
Working examples for Day 09
*/

var trimDemo = function(){
	//Load up the text we're going to trim
	var text_to_trim =  '            \ntoo       much       whitespace\n              ';
	//Trim it
	var trimmed_text = text_to_trim.trim();
	//Report the results
	alert('Before Trimming : \n' + 
		'|-' + text_to_trim + '-|\n\n' +
		'After Trimming : \n' +  
		'|-' + trimmed_text + '-|'
	);
}

var cleanDemo = function(){
	//Load up the text we're going to clean
	var text_to_clean =  '            too\n       much\n       whitespace              ';

	//Clean it
	var cleaned_text = text_to_clean.clean();
 
	//Report the results
	alert('Before Cleaning : \n' + 
		'|-' + text_to_clean + '-|\n\n' +
		'After Cleaning : \n' +  
		'|-' + cleaned_text + '-|'
	);

}

var containsDemo = function(){
	//Put our list of banned words into an array
	var banned_words = ['drat', 'goshdarn', 'fiddlesticks', 'kumquat'];	
	//Get the contents of the text area
	var textarea_input = $('textarea_1').get('value');
	//Iterate over each of the banned words
	banned_words.each(function(banned_word){
		//Look for the current banned 
		//word in the textarea contents
		if (textarea_input.contains(banned_word)){
			//Tell the user not to use that word
			alert(banned_word + ' is not allowed');
		};
	});
}

var substituteDemo = function(){
	//Get the original text from the textfield
	var original_text = $('substitute_span').get('html');
 
	//Substitute the values in the textfields for the
	//values in the text field
	var new_text = original_text.substitute({
		first  : $('first_value').get('value'),
		second : $('second_value').get('value'),
		third  : $('third_value').get('value'),
	});
 
	//Replace the contents of the span with the new text
	$('substitute_span').set('html', new_text);
 
	//Disable the substitute button and
	//enable the reset button 
	$('simple_substitute').set('disabled', true);
	$('simple_sub_reset').set('disabled', false);
}
 
var substituteReset = function(){
	//Create a variable to hold the original text
	var original_text = "|- {first} -- {second} -- {third} -|";
 
	//Replace the contents of the span with the original text
	$('substitute_span').set('html', original_text);
 
	//Disable the reset button and enable
	//the substitute button
	$('simple_sub_reset').set('disabled', true);
	$('simple_substitute').set('disabled', false);
}


window.addEvent('domready', function() {
	// trimDemo
	$('trim_text').addEvent('click', trimDemo);
	// cleanDemo
	$('clean_text').addEvent('click', cleanDemo);
	// containsDemo
	$('check_textarea_1').addEvent('click', containsDemo);
	// substituteDemo
	$('simple_substitute').addEvent('click', substituteDemo);
	// substituteReset
	$('simple_sub_reset').addEvent('click', substituteReset);
});