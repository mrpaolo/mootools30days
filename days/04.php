<!-- Working Examples for Day 04 -->
<script type="text/javascript" src="days/js/04.js" ></script>

<h2>Functions and Mootools 1.2</h2>
<p>Welcome to day 4 of the 30 Days of Mootools. If you haven&#8217;t already, go check out the previous  <a href="index.php?day=04">Mootools Tutorials</a> in the series. Today we&#8217;re taking a step back from the Mootools to go over the basics of functions in javascript.</p>

<p>Keeping with the Mootools theme however, you should be aware of where to place functions for use with Mootools. Previously we&#8217;ve been placing all of our example code within the domready function. When dealing with functions you want to place them <strong>outside</strong> of the domready loop. Functions aren&#8217;t executed until you call them from within the domready.</p>

<p>Generally it&#8217;s a good idea to try and keep as much of your function code outside of the page body all together and call it in through a javascript include. When just monkeying around with code though, I find it easier just to keep everything on the same page. We&#8217;re using the following convention for these tutorials:</p>

<pre class="prettyprint">
&lt;script type=&quot;text/javascript&quot;&gt;
	/* 
	Function definitions go here
	*/
 
	window.addEvent(&#39;domready&#39;, function() {
		/* Calls to functions go here */
	});
&lt;/script&gt;
</pre>

<p>All the examples follow this format, which results in the function being executed when the page loads. They also all have example buttons beneath them which you can press to see the results. This is accomplished through the using  Mootools event handlers which we&#8217;ll be talking about tomorrow.</p>

<h3>The Basics</h3>
<p>There are a few ways to define functions in javascript&mdash;since we&#8217;re focusing on Mootools we&#8217;ll be using their preferred methodology. The example below is about as basic as a function can get. We declare a variable named simple_function and define it as a function:</p>

<pre class="prettyprint">
var simple_function = function(){
</pre>

<p>Then we add an alert to be run when the function is called:</p>

<pre class="prettyprint">
alert('This is a simple function');
</pre>

<p>Finally, we close the function definition with a closing curly bracket:</p>

<pre class="prettyprint">
}
</pre>

<p>This closing bracket is one of the easiest things to overlook, and can often times be an incredible pain to track down&mdash;it&#8217;s a good idea to be mildly obsessive about double checking the closing of  your function definitions.</p>

<p>It&#8217;s all rolled together in the example below. After declaring the function, we&#8217;re adding a call to the function to the domready event that will execute on page load. Press the button beneath the example to see the result of calling simple_function(); .</p>

<pre class="prettyprint">
//Define simple_function as a function
var simple_function = function(){
	alert('This is a simple function');
}
 
window.addEvent('domready', function() {
	//Call simple_function when the dom(page) is ready
	simple_function();
});
</pre>

<p><button class="btn btn-primary" id="simple_button">Simple Function</button></p>

<h3>Single Parameter</h3>
<p>While having a chunk of code you can easily call from anywhere is useful, it&#8217;s even more useful when you can pass it parameters (information) to work with. To use parameters with functions, you need to add a variable name in the parenthesis after function like so:</p>

<pre class="prettyprint">
var name_of_function = function(name_of_the_parameter){
    /*function code goes here*/
}
</pre>

<p>Once you&#8217;re done, the variable is available inside the function for use. While you can name a parameter pretty much anything you want, it&#8217;s a good idea to make your parameter names as descriptive as possible. So for instance, if you were passing a parameter that held the name of a town, calling the parameter town_name would be preferable to something more vague (like user_input).</p>

<p>In the example below, we&#8217;re defining a function that takes a single parameter (called parameter) and sends out an alert containing the parameter. Note that while the first part of the message is surrounded by single quotes, the parameter is not.  When you want to use parameters in combination with hardcoded strings, you need to join them together with the + operator as shown below:</p>

<pre class="prettyprint">
var single_parameter_function = function(parameter){
	alert('the parameter is : ' + parameter);
}
 
window.addEvent('domready', function(){
	single_parameter_function('this is a parameter');
});
</pre>

<p><button class="btn btn-primary" id="single_parameter_button">Single Parameter Function</button></p>

<h3>Multiple Parameters</h3>
<p>Javascript doesn&#8217;t limit the amount of parameters you can define for a function. It&#8217;s generally a good idea to try and keep the number of parameters you pass to a function to a minimum for readability&#8217;s sake. Multiple parameters in a function definition are separated by commas, and otherwise behave exactly the same as a single parameter function. The example function below takes two numbers, and places their sum into the variable third_number like so:</p>

<pre class="prettyprint">
var third_number = first_number + second_number;
</pre>

<p>Then the  + operator is used in a slightly different fashion to join the results together into a text string:</p>

<pre class="prettyprint">
alert(first_number + " plus " + second_number + " equals " + third_number);
</pre>

<p>While this may seem confusing at first, it&#8217;s actually pretty straightforward. If you use + between numbers, you&#8217;re adding them together. If you use  + between any combination of numbers and strings you&#8217;re joining all the input into a single string.</p>

<pre class="prettyprint">
var two_parameter_function = function(first_number, second_number){
	//Get the sum of first_number and second_number
	var third_number = first_number + second_number;

	//Display the Results
	alert(first_number + " plus " + second_number + " equals " + third_number);
}
 
window.addEvent('domready', function(){
	two_parameter_function(10, 5);
});
</pre>

<p><button class="btn btn-primary" id="two_parameter_button">Two Parameter Function</button></p>

<h3>Returning a Value</h3>
<p>Displaying the results of a function in an alert can be helpful, but sometimes you&#8217;ll want to take the result and use it somewhere else. To accomplish this you need to make use of return within the function. The example below functions pretty much the same as the previous example, except instead of sending out an alert, the script returns the sum of the two numbers here :</p>

<pre class="prettyprint">
return third_number;
</pre>

<p>You&#8217;ll notice that we&#8217;re doing more in the domready as well. In order to display this value, we&#8217;re assigning the functions return value to a parameter named return_value and then displaying an alert.</p>

<pre class="prettyprint">
var two_parameter_returning_function = function(first_number, second_number){
	var third_number = first_number + second_number;
	return third_number;
}

window.addEvent('domready', function(){
	var return_value = two_parameter_returning_function(10, 5);
	alert("return value is : " + return_value);
});
</pre>

<p><button class="btn btn-primary" id="two_parameter_returning_button">Two Parameter Returning Function</button></p>

<h3>Functions as Parameters</h3>
<p>If you look at the Mootools domready code we&#8217;re wrapping things in, you&#8217;ll notice that you&#8217;re passing a function as a parameter :</p>

<pre class="prettyprint">
window.addEvent('domready', function(){
	/*code*/
});
</pre>

<p>A function that is passed as a parameter like this is referred to as an anonymous function:</p>

<pre class="prettyprint">
function(){
	/*code*/
}
</pre>

<p>In the Day 1 comments <a href="http://web.archive.org/web/20090220052337/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-1-intro-to-the-library/#comment-302">Boomstix pointed out</a> an alternate method for using the domready without using anonymous functions. Doing so would look something like this :</p>

<pre class="prettyprint">
//Build the function to be called on domready
var domready_function(){
	/*code*/
}
 
//Assign the function to the domready event
window.addEvent('domready', domready_function);
</pre>

<p>I&#8217;m not aware of any significant difference between the performance or functionality of the two methods, so I believe this is essentially a stylistic choice. We&#8217;re going to be sticking with our method for now, but if anyone out there knows otherwise please let us know.</p>

<h3>Examples</h3>
<p>To whet your appetite for tomorrow (and make up for the lack of mootools today), I present a somewhat pointless function to let you change the background color of this page on the fly :</p>

<pre class="prettyprint">
var changeColor = function(){
	//Use get to retrieve the color 
	//values from the text boxes
	//( http://docs.mootools.net/Element/Element#Element:get )
	var red   = $('red').get('value');
	var green = $('green').get('value');
	var blue  = $('blue').get('value');
 
	//Make sure everything is an integer
	//( http://docs.mootools.net/Native/Number#Number:toInt )
	red   = red.toInt();
	green = green.toInt();
	blue  = blue.toInt();
 
	//Make sure each number is between
	//1 and 255, rounding if needed
	//( http://docs.mootools.net/Native/Number#Number:limit )
	red   = red.limit(1, 255);
	green = green.limit(1, 255);
	blue  = blue.limit(1, 255);
 
	//Get the Hex Code
	//( http://docs.mootools.net/Native/Array/#Array:rgbToHex )
	var color = [red, green, blue].rgbToHex(); 
 
	//Set the Background color of the page
	//( http://docs.mootools.net/Element/Element.Style#Element:setStyle )
	$('body_wrap').setStyle('background', color);
}
 
var resetColor = function(){
	//Reset the background color to white
	//( http://docs.mootools.net/Element/Element.Style#Element:setStyle )
	$('body_wrap').setStyle('background', '#fff');
}
 
window.addEvent('domready', function(){
	//Add click events to the buttons (more on this tommorrow)
	//( http://docs.mootools.net/Element/Element.Event#Element:addEvent )
	$('change').addEvent('click', changeColor);
	$('reset').addEvent('click', resetColor);
});
</pre>

<p>Red :<br /><input id="red" type="text"  size="3" value="255"></input></p>
<p>Green :<br /><input id="green" type="text" size="3" value="255" ></input></p>
<p>Blue :<br /><input id="blue" type="text" size="3" value="255"></input></p>

<p><button class="btn btn-primary" id="change">Change Background Color</button></p>
<p><button class="btn btn-primary" id="reset">Reset Background Color</button></p>

<h3>To Learn More&#8230;</h3>
<h4>More on Javascript Functions</h4>

<p><a href="http://www.quirksmode.org/js/function.html">Quirksmode on Javascript Functions</a></p>
<p><cite>I&#8217;m a little light on good resources for on Javascript functions, if anyone knows of good ones please send them my way.</cite></p>
<h4>Example Documentation</h4>
<ul>
	<li><a href="http://docs.mootools.net/Utilities/DomReady">Utilities/DomReady</a></li>
	<li><a href="http://web.archive.org/web/20090220052337/http://docs.mootools.net/Native/Number#Number:toInt">Number.toInt()</a></li>
	<li><a href="http://web.archive.org/web/20090220052337/http://docs.mootools.net/Native/Number#Number:limit">Number.limit()</a></li>
	<li><a href="http://web.archive.org/web/20090220052337/http://docs.mootools.net/Native/Array/#Array:rgbToHex">Array.rgbToHex()</a></li>
	<li><a href="http://web.archive.org/web/20090220052337/http://docs.mootools.net/Element/Element.Style#Element:setStyle">Element.setStyle()</a></li>
	<li><a href="http://web.archive.org/web/20090220052337/http://docs.mootools.net/Element/Element.Event#Element:addEvent">Element.addEvent()</a></p></li>
</ul>

<h4>Tomorrow&#8217;s Mootools 1.2 Tutorial - Events</h4>
<p>Check in tomorrow for <a href="index.php?day=05">Day 5 - Events</a>.</p>