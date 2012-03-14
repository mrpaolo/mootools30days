<h2>Functions and Mootools 1.2</h2>
<p>Welcome to day 4 of the 30 Days of Mootools. If you haven&#8217;t already, go check out the previous  <a href="http://web.archive.org/web/20090220052337/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-1-intro-to-the-library/">Mootools Tutorials</a> in the series. Today we&#8217;re taking a step back from the Mootools to go over the basics of functions in javascript.</p>

<p>Keeping with the Mootools theme however, you should be aware of where to place functions for use with Mootools. Previously we&#8217;ve been placing all of our example code within the domready function. When dealing with functions you want to place them <strong>outside</strong> of the domready loop. Functions aren&#8217;t executed until you call them from within the domready.</p>
<p>Generally it&#8217;s a good idea to try and keep as much of your function code outside of the page body all together and call it in through a javascript include. When just monkeying around with code though, I find it easier just to keep everything on the same page. We&#8217;re using the following convention for these tutorials:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #339933;">&lt;</span>script type<span style="color: #339933;">=</span><span style="color: #3366CC;">&quot;text/javascript&quot;</span><span style="color: #339933;">&gt;</span>

<span style="color: #009966; font-style: italic;">/*
 * Function definitions go here
 /</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
                <span style="color: #009966; font-style: italic;">/
                 *Calls to functions go here
                 */</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #339933;">&lt;/</span>script<span style="color: #339933;">&gt;</span></pre></div></div>

<p>All the examples follow this format, which results in the function being executed when the page loads. They also all have example buttons beneath them which you can press to see the results. This is accomplished through the using  Mootools event handlers which we&#8217;ll be talking about tomorrow.</p>
<h3>The Basics</h3>
<p>There are a few ways to define functions in javascript&mdash;since we&#8217;re focusing on Mootools we&#8217;ll be using their preferred methodology. The example below is about as basic as a function can get. We declare a variable named simple_function and define it as a function:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> simple_function <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span></pre></div></div>

<p>Then we add an alert to be run when the function is called:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'This is a simple function'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Finally, we close the function definition with a closing curly bracket:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #009900;">&#125;</span></pre></div></div>

<p>This closing bracket is one of the easiest things to overlook, and can often times be an incredible pain to track down&mdash;it&#8217;s a good idea to be mildly obsessive about double checking the closing of  your function definitions.</p>

<p>It&#8217;s all rolled together in the example below. After declaring the function, we&#8217;re adding a call to the function to the domready event that will execute on page load. Press the button beneath the example to see the result of calling simple_function(); .</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//Define simple_function as a function</span>
<span style="color: #003366; font-weight: bold;">var</span> simple_function <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'This is a simple function'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
        <span style="color: #006600; font-style: italic;">//Call simple_function when the dom(page) is ready</span>
        simple_function<span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p><button id="simple_button">Simple Function</button></p>
<h3>Single Parameter</h3>
<p>While having a chunk of code you can easily call from anywhere is useful, it&#8217;s even more useful when you can pass it parameters (information) to work with. To use parameters with functions, you need to add a variable name in the parenthesis after function like so:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> name_of_function <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>name_of_the_parameter<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

    <span style="color: #009966; font-style: italic;">/*function code goes here*/</span>
<span style="color: #009900;">&#125;</span></pre></div></div>

<p>Once you&#8217;re done, the variable is available inside the function for use. While you can name a parameter pretty much anything you want, it&#8217;s a good idea to make your parameter names as descriptive as possible. So for instance, if you were passing a parameter that held the name of a town, calling the parameter town_name would be preferable to something more vague (like user_input).</p>
<p>In the example below, we&#8217;re defining a function that takes a single parameter (called parameter) and sends out an alert containing the parameter. Note that while the first part of the message is surrounded by single quotes, the parameter is not.  When you want to use parameters in combination with hardcoded strings, you need to join them together with the + operator as shown below:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> single_parameter_function <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>parameter<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

        <span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'the parameter is : '</span> <span style="color: #339933;">+</span> parameter<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

        single_parameter_function<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'this is a parameter'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p><button id="single_parameter_button">Single Parameter Function</button></p>
<h3>Multiple Parameters</h3>
<p>Javascript doesn&#8217;t limit the amount of parameters you can define for a function. It&#8217;s generally a good idea to try and keep the number of parameters you pass to a function to a minimum for readability&#8217;s sake. Multiple parameters in a function definition are separated by commas, and otherwise behave exactly the same as a single parameter function. The example function below takes two numbers, and places their sum into the variable third_number like so:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> third_number <span style="color: #339933;">=</span> first_number <span style="color: #339933;">+</span> second_number<span style="color: #339933;">;</span></pre></div></div>

<p>Then the  + operator is used in a slightly different fashion to join the results together into a text string:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span>first_number <span style="color: #339933;">+</span> <span style="color: #3366CC;">&quot; plus &quot;</span> <span style="color: #339933;">+</span> second_number <span style="color: #339933;">+</span> <span style="color: #3366CC;">&quot; equals &quot;</span> <span style="color: #339933;">+</span> third_number<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>While this may seem confusing at first, it&#8217;s actually pretty straightforward. If you use + between numbers, you&#8217;re adding them together. If you use  + between any combination of numbers and strings you&#8217;re joining all the input into a single string.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> two_parameter_function <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>first_number<span style="color: #339933;">,</span> second_number<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

        <span style="color: #006600; font-style: italic;">//Get the sum of first_number and second_number</span>
        <span style="color: #003366; font-weight: bold;">var</span> third_number <span style="color: #339933;">=</span> first_number <span style="color: #339933;">+</span> second_number<span style="color: #339933;">;</span>
&nbsp;
        <span style="color: #006600; font-style: italic;">//Display the Results</span>

        <span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span>first_number <span style="color: #339933;">+</span> <span style="color: #3366CC;">&quot; plus &quot;</span> <span style="color: #339933;">+</span> second_number <span style="color: #339933;">+</span> <span style="color: #3366CC;">&quot; equals &quot;</span> <span style="color: #339933;">+</span> third_number<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	two_parameter_function<span style="color: #009900;">&#40;</span><span style="color: #CC0000;">10</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">5</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p><button id="two_parameter_button">Two Parameter Function</button></p>
<h3>Returning a Value</h3>
<p>Displaying the results of a function in an alert can be helpful, but sometimes you&#8217;ll want to take the result and use it somewhere else. To accomplish this you need to make use of return within the function. The example below functions pretty much the same as the previous example, except instead of sending out an alert, the script returns the sum of the two numbers here :</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #000066; font-weight: bold;">return</span> third_number<span style="color: #339933;">;</span></pre></div></div>

<p>You&#8217;ll notice that we&#8217;re doing more in the domready as well. In order to display this value, we&#8217;re assigning the functions return value to a parameter named return_value and then displaying an alert.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> two_parameter_returning_function <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>first_number<span style="color: #339933;">,</span> second_number<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		<span style="color: #003366; font-weight: bold;">var</span> third_number <span style="color: #339933;">=</span> first_number <span style="color: #339933;">+</span> second_number<span style="color: #339933;">;</span>
		<span style="color: #000066; font-weight: bold;">return</span> third_number<span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span>
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #003366; font-weight: bold;">var</span> return_value <span style="color: #339933;">=</span> two_parameter_returning_function<span style="color: #009900;">&#40;</span><span style="color: #CC0000;">10</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">5</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;return value is : &quot;</span> <span style="color: #339933;">+</span> return_value<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p><button id="two_parameter_returning_button">Two Parameter Returning Function</button></p>
<h3>Functions as Parameters</h3>
<p>If you look at the Mootools domready code we&#8217;re wrapping things in, you&#8217;ll notice that you&#8217;re passing a function as a parameter :</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #009966; font-style: italic;">/*code*/</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>A function that is passed as a parameter like this is referred to as an anonymous function:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #009966; font-style: italic;">/*code*/</span>
<span style="color: #009900;">&#125;</span></pre></div></div>

<p>In the Day 1 comments <a href="http://web.archive.org/web/20090220052337/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-1-intro-to-the-library/#comment-302">Boomstix pointed out</a> an alternate method for using the domready without using anonymous functions. Doing so would look something like this :</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//Build the function to be called on domready</span>
<span style="color: #003366; font-weight: bold;">var</span> domready_function<span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

	<span style="color: #009966; font-style: italic;">/*code*/</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//Assign the function to the domready event</span>
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> domready_function<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>I&#8217;m not aware of any significant difference between the performance or functionality of the two methods, so I believe this is essentially a stylistic choice. We&#8217;re going to be sticking with our method for now, but if anyone out there knows otherwise please let us know.</p>

<h3>Examples</h3>
<p>To whet your appetite for tomorrow (and make up for the lack of mootools today), I present a somewhat pointless function to let you change the background color of this page on the fly :</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> changeColor <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//Use get to retrieve the color </span>
	<span style="color: #006600; font-style: italic;">//values from the text boxes</span>

	<span style="color: #006600; font-style: italic;">//( http://docs.mootools.net/Element/Element#Element:get )</span>
	<span style="color: #003366; font-weight: bold;">var</span> red   <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'red'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #003366; font-weight: bold;">var</span> green <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'green'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #003366; font-weight: bold;">var</span> blue  <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'blue'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//Make sure everything is an integer</span>

	<span style="color: #006600; font-style: italic;">//( http://docs.mootools.net/Native/Number#Number:toInt )</span>
	red   <span style="color: #339933;">=</span> red.<span style="color: #006600;">toInt</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	green <span style="color: #339933;">=</span> green.<span style="color: #006600;">toInt</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	blue  <span style="color: #339933;">=</span> blue.<span style="color: #006600;">toInt</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//Make sure each number is between</span>
	<span style="color: #006600; font-style: italic;">//1 and 255, rounding if needed</span>
	<span style="color: #006600; font-style: italic;">//( http://docs.mootools.net/Native/Number#Number:limit )</span>

	red   <span style="color: #339933;">=</span> red.<span style="color: #006600;">limit</span><span style="color: #009900;">&#40;</span><span style="color: #CC0000;">1</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">255</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	green <span style="color: #339933;">=</span> green.<span style="color: #006600;">limit</span><span style="color: #009900;">&#40;</span><span style="color: #CC0000;">1</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">255</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	blue  <span style="color: #339933;">=</span> blue.<span style="color: #006600;">limit</span><span style="color: #009900;">&#40;</span><span style="color: #CC0000;">1</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">255</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//Get the Hex Code</span>
	<span style="color: #006600; font-style: italic;">//( http://docs.mootools.net/Native/Array/#Array:rgbToHex )</span>

	<span style="color: #003366; font-weight: bold;">var</span> color <span style="color: #339933;">=</span> <span style="color: #009900;">&#91;</span>red<span style="color: #339933;">,</span> green<span style="color: #339933;">,</span> blue<span style="color: #009900;">&#93;</span>.<span style="color: #006600;">rgbToHex</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 

&nbsp;
	<span style="color: #006600; font-style: italic;">//Set the Background color of the page</span>
	<span style="color: #006600; font-style: italic;">//( http://docs.mootools.net/Element/Element.Style#Element:setStyle )</span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">setStyle</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'background'</span><span style="color: #339933;">,</span> color<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> resetColor <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//Reset the background color to white</span>
	<span style="color: #006600; font-style: italic;">//( http://docs.mootools.net/Element/Element.Style#Element:setStyle )</span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">setStyle</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'background'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'#fff'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//Add click events to the buttons (more on this tommorrow)</span>
	<span style="color: #006600; font-style: italic;">//( http://docs.mootools.net/Element/Element.Event#Element:addEvent )</span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'change'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> changeColor<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'reset'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> resetColor<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Red :<br />
<input id="red" type="text"  size="3" value="255"></input>

<p>Green :<br />
<input id="green" type="text" size="3" value="255" ></input>
<p>Blue :<br />
<input id="blue" type="text" size="3" value="255"></input>
<p><button id="change">Change Background Color</button><br />
<button id="reset">Reset Background Color</button></p>
<h3>To Learn More&#8230;</h3>
<h4><a href="http://web.archive.org/web/20090220052337/http://www.consideropen.com/downloads/30days_of_moo/mootorial_day4_functions.zip">Download a zip with everything you need to get started</a></h4>
<p>Including the Mootools 1.2 core, an external javascript file, a simple html page and a css file.</p>
<h4>More on Javascript Functions</h4>

<p><a href="http://web.archive.org/web/20090220052337/http://www.quirksmode.org/js/function.html">Quirksmode on Javascript Functions</a></p>
<p><cite>I&#8217;m a little light on good resources for on Javascript functions, if anyone knows of good ones please send them my way.</cite></p>
<h4>Example Documentation</h4>
<p><a href="http://web.archive.org/web/20090220052337/http://docs.mootools.net/Utilities/DomReady">Utilities/DomReady</a><br />
<a href="http://web.archive.org/web/20090220052337/http://docs.mootools.net/Native/Number#Number:toInt">Number.toInt()</a><br />
<a href="http://web.archive.org/web/20090220052337/http://docs.mootools.net/Native/Number#Number:limit">Number.limit()</a><br />
<a href="http://web.archive.org/web/20090220052337/http://docs.mootools.net/Native/Array/#Array:rgbToHex">Array.rgbToHex()</a><br />
<a href="http://web.archive.org/web/20090220052337/http://docs.mootools.net/Element/Element.Style#Element:setStyle">Element.setStyle()</a><br />

<a href="http://web.archive.org/web/20090220052337/http://docs.mootools.net/Element/Element.Event#Element:addEvent">Element.addEvent()</a></p>
<h4>Tomorrow&#8217;s Mootools 1.2 Tutorial - Events</h4>
<p>Check in tomorrow for <a href="http://web.archive.org/web/20090220052337/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-5-event-handling/">Day 5 - Events</a>.</p>
<h3>Tutorial Request or Questions</h3>
<p>We&#8217;re going to be ramping up to some more in-depth stuff pretty soon. As always if you&#8217;ve got any questions about the code here or any future areas of mootools you&#8217;d like us to cover we&#8217;d love to hear from ya.</p>

					</div>