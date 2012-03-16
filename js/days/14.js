/* 
Working examples for Day 14
*/

var timerFunction = function(){
	//each time this function is called
	//the var currentTime will increment by one
	//more on this below
	//also notice the use of "this.counter"
	//"this" is the hash
	//and "counter" is the key
	//again, more on this below
	var currentTime = this.counter++;
	
	//here we change the content of the timer display div to the current time
	$('timer_display').set('text', currentTime);
	
	//this changes the style width, letting us easily create a timer bar
	$('timer_bar').setStyle('width', currentTime);
}
 
window.addEvent('domready', function() {
	//this is a simple hash with one key/value pair
	var currentCounter = new Hash({counter: 0});

	//we initiate our periodical and pass and bind the hash var
	var simpleTimer = timerFunction.periodical(100, currentCounter); 

	//since we dont want the timer starting onload, we stop it
	$clear(simpleTimer);

	//add an event to the start button
	//this sets the timer going again
	$('timer_start').addEvent("click", function(){
		simpleTimer = timerFunction.periodical(100, currentCounter);
	});

	//this clears the periodical, and highlights the timer bar
	$('timer_stop').addEvent("click", function(){
		$clear(simpleTimer);
		$('timer_bar').highlight('#EFE02F');
	});

	$('timer_reset').addEvent("click", function(){
		//reset first clears the periodical
		$clear(simpleTimer);
		
		//and sets the counter to 0
		//more on this later
		currentCounter.set('counter', 0);

		$('timer_display').set('text', currentCounter.counter);
		$('timer_bar').setStyle('width', 0);

	});
});