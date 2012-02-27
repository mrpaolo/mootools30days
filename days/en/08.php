<p>Hey folks, today we&#8217;re going to starting looking at how Mootools can make filtering user input a breeze. We&#8217;re going to be starting off with some basic number filtering today, and digging into the world of string filtering tommorrow. If you haven&#8217;t already checked out the rest of the <a href="http://web.archive.org/web/20090215011120/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-1-intro-to-the-library/">30 Days of Mootools tutorials</a>, I&#8217;d highly recommend doing so before continuing on. </p>

<p><strong>NOTE:</strong> Input filtering in Javascript is to ensure that your code runs smoothly, it should <strong>NOT</strong> be used as a substitute for the server side input filtering required to protect your applications against injection attacks.  </p>
<h2>Numbers</h2>
<p>
On Day 4 we ended with an example that took RGB values from textboxes and used them to change the background of the page, today we&#8217;re going to start by going over some of the code from that example and expanding upon it.
</p>
<h3>rgbToHex()</h3>
<p>
Technically speaking, the rgbToHex() function actually belongs to the <a href="http://web.archive.org/web/20090215011120/http://docs.mootools.net/Native/Array">Array</a> collection. Since it&#8217;s an array function built to deal with numbers, we&#8217;re going to tackle it today. Functionally, rgbToHex() is pretty straightforward to use:

</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">function</span> changeColor<span style="color: #009900;">&#40;</span>red_value<span style="color: #339933;">,</span> green_value<span style="color: #339933;">,</span> blue_value<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #003366; font-weight: bold;">var</span> color <span style="color: #339933;">=</span> <span style="color: #009900;">&#91;</span>red_value<span style="color: #339933;">,</span> green_value<span style="color: #339933;">,</span> blue_value<span style="color: #009900;">&#93;</span>.<span style="color: #006600;">rgbToHex</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 
	<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'Converts to : '</span> <span style="color: #339933;">+</span> color<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 

<span style="color: #009900;">&#125;</span>
&nbsp;
changeColor<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'28'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'17'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'47'</span><span style="color: #009900;">&#41;</span></pre></div></div>

<p><button id="change_color_1_good" class="demo_button">changeColor(&#8217;28&#8242;, &#8216;17&#8242;, &#8216;47&#8242;);</button><br />

<br/></p>
<p>
This works perfectly, as long as the values for red, green, and blue are numbers. Check out the behavior when you pass it something unexpected :
</p>
<p><button id="change_color_1_bad" class="demo_button">changeColor(&#8217;28&#8242;, &#8216;17&#8242;, &#8216;oops&#8217;);</button><br />
<br/></p>
<p>
The NaN you see at the end there stands for <strong>N</strong>ot <strong>a</strong> <strong>N</strong>umber. If you&#8217;re hard coding color values into the array, this situation probably isn&#8217;t going to come up. If you&#8217;re getting input from any other source though, you&#8217;re most likely going to run into situations where you have to deal with invalid input.

</p>
<h3>toInt()</h3>
<p>
So now, we need a way to make sure that the rgbToHex() function is only getting numbers passed to it - that is where the <a href="http://web.archive.org/web/20090215011120/http://docs.mootools.net/Native/Number#Number:toInt">toInt()</a> function comes in. toInt() is another relatively straightforward function. You call it on a variable and it does its best to get a regular integer from whatever the variable contains.
</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> toIntDemo <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>make_me_a_number<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

	<span style="color: #003366; font-weight: bold;">var</span> number <span style="color: #339933;">=</span> make_me_a_number.<span style="color: #006600;">toInt</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #000066;">alert</span> <span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'Best Attempt : '</span> <span style="color: #339933;">+</span> number<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span></pre></div></div>

<p><button id="to_int_1" class="demo_button">toIntDemo(&#8217;613.234&#8242;)</button><button id="to_int_2" class="demo_button">toIntDemo(&#8217;83_hooray!&#8217;)</button><button id="to_int_3" class="demo_button">toIntDemo(&#8217;cant_get_83&#8242;)</button><br />
<br/></p>
<p>
As you can see, toInt() can&#8217;t handle every conceivable situation, but thanks to another piece of Mootools coolness called $type(), we can deal with that problem as well.
</p>

<h3>$type()</h3>
<p>$type() is another one of the incredibly straightforward and useful goodies from the Mootools crew. It examines whatever variable you pass it, and returns a string telling you what type of variable it is:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> checkType<span style="color: #009900;">&#40;</span>variable_to_check<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #003366; font-weight: bold;">var</span> variable_type <span style="color: #339933;">=</span> $type<span style="color: #009900;">&#40;</span>variable_to_check<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;Variable is a : &quot;</span> <span style="color: #339933;">+</span> variable_type<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span></pre></div></div>

<p><button id="type_number" class="demo_button">checkType(43)</button><button id="type_string" class="demo_button">checkType(&#8217;a string&#8217;)</button><button id="type_boolean" class="demo_button">checkType(false)</button><br />

<br/></p>
<p>There&#8217;s a buttload of other types that $type() detects - you can get a full list of them in the <a href="http://web.archive.org/web/20090215011120/http://docs.mootools.net/Core/Core#type">Core.$type() documentation</a>. For now though, all we&#8217;re really worried about is detecting integers. If we take $type() and throw into the toIntDemo() function we can very easily deal with input that toInt() can&#8217;t handle :</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> toIntDemo <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>make_me_a_number<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

	<span style="color: #006600; font-style: italic;">//Try to make the input number</span>
	<span style="color: #003366; font-weight: bold;">var</span> number <span style="color: #339933;">=</span> make_me_a_number.<span style="color: #006600;">toInt</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//If That didn't work, set number to 0</span>

	<span style="color: #000066; font-weight: bold;">if</span> <span style="color: #009900;">&#40;</span>$type<span style="color: #009900;">&#40;</span>number<span style="color: #009900;">&#41;</span> <span style="color: #339933;">!=</span> <span style="color: #3366CC;">'number'</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>number <span style="color: #339933;">=</span> <span style="color: #CC0000;">0</span><span style="color: #339933;">;</span><span style="color: #009900;">&#125;</span>
	<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'Best Attempt : '</span> <span style="color: #339933;">+</span> number<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span></pre></div></div>

<p><button id="to_int_4" class="demo_button">toIntDemo_2(&#8217;613.234&#8242;)</button><button id="to_int_5" class="demo_button">toIntDemo_2(&#8217;83_hooray!&#8217;)</button><button id="to_int_6" class="demo_button">toIntDemo_2(&#8217;cant_get_83&#8242;)</button><br />
<br/></p>
<p>When we pull it all together into changeColor(), we get a solution that works <strong>almost</strong> perfectly :</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> changeColor_2 <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>red_value<span style="color: #339933;">,</span> green_value<span style="color: #339933;">,</span> blue_value<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//Try to make sure everything is an integer</span>

	red_value <span style="color: #339933;">=</span> red_value.<span style="color: #006600;">toInt</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	green_value <span style="color: #339933;">=</span> green_value.<span style="color: #006600;">toInt</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	blue_value <span style="color: #339933;">=</span> blue_value.<span style="color: #006600;">toInt</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
	<span style="color: #006600; font-style: italic;">//Set default values on anything thats Not a Number</span>
	<span style="color: #000066; font-weight: bold;">if</span> <span style="color: #009900;">&#40;</span>$type<span style="color: #009900;">&#40;</span>red_value<span style="color: #009900;">&#41;</span>   <span style="color: #339933;">!=</span> <span style="color: #3366CC;">'number'</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>red_value <span style="color: #339933;">=</span> <span style="color: #CC0000;">0</span><span style="color: #339933;">;</span><span style="color: #009900;">&#125;</span>

	<span style="color: #000066; font-weight: bold;">if</span> <span style="color: #009900;">&#40;</span>$type<span style="color: #009900;">&#40;</span>green_value<span style="color: #009900;">&#41;</span> <span style="color: #339933;">!=</span> <span style="color: #3366CC;">'number'</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>green_value <span style="color: #339933;">=</span> <span style="color: #CC0000;">0</span><span style="color: #339933;">;</span><span style="color: #009900;">&#125;</span>
	<span style="color: #000066; font-weight: bold;">if</span> <span style="color: #009900;">&#40;</span>$type<span style="color: #009900;">&#40;</span>blue_value<span style="color: #009900;">&#41;</span>  <span style="color: #339933;">!=</span> <span style="color: #3366CC;">'number'</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>blue_value <span style="color: #339933;">=</span> <span style="color: #CC0000;">0</span><span style="color: #339933;">;</span><span style="color: #009900;">&#125;</span>

&nbsp;
	<span style="color: #006600; font-style: italic;">//Calculate hex value</span>
	<span style="color: #003366; font-weight: bold;">var</span> color <span style="color: #339933;">=</span> <span style="color: #009900;">&#91;</span>red_value<span style="color: #339933;">,</span> green_value<span style="color: #339933;">,</span> blue_value<span style="color: #009900;">&#93;</span>.<span style="color: #006600;">rgbToHex</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 
	<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'Converts to : '</span> <span style="color: #339933;">+</span> color<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 

<span style="color: #009900;">&#125;</span></pre></div></div>

<p><button id ="change_color_2_clean" class="demo_button">changeColor(&#8217;28&#8242;, &#8216;17&#8242;, &#8216;47&#8242;);</button><button id ="change_color_2_default" class="demo_button">changeColor(&#8217;28&#8242;, &#8216;17&#8242;, &#8216;oops&#8217;);</button><button id ="change_color_2_breaks" class="demo_button">changeColor(&#8217;428&#8242;, &#8216;317&#8242;, &#8216;265000&#8242;);</button><br />

<br/></p>
<p>
The last function is passing rgbToHex() numbers outside of the RGB range of 0 - 255, which quite dutifully converts the value into it&#8217;s hex equivalent. Unfortunately this means that if we receive a number outside of that range as input, we aren&#8217;t going to be able to get a valid hex color value. Fortunately, there&#8217;s of one more piece from the Mootools kit, we can throw in to take care of this problem too.
</p>
<h3>limit()</h3>
<p>The Mootools <a href="http://web.archive.org/web/20090215011120/http://docs.mootools.net/Native/Number#Number:limit">limit()</a> function is pretty no frills. You call it on a number with the lower and upper bounds you want to limit the number to as arguments, and if that number is outside of the range you define, it rounds appropriately. It&#8217;s important to keep in mind that limit REQUIRES an integer to function, so it&#8217;s a generally a good idea to use toInt() on something you&#8217;re assuming to be a number before using limit (or anything else in the <a href="http://web.archive.org/web/20090215011120/http://docs.mootools.net/Native/Number">Number Collection</a>).</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> limitDemo <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>number_to_limit<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//Do our best to get an integer</span>
	number_to_limit <span style="color: #339933;">=</span> number_to_limit.<span style="color: #006600;">toInt</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
	<span style="color: #006600; font-style: italic;">//Get the limited value</span>
	<span style="color: #003366; font-weight: bold;">var</span> limited_number <span style="color: #339933;">=</span> number_to_limit.<span style="color: #006600;">limit</span><span style="color: #009900;">&#40;</span><span style="color: #CC0000;">0</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">255</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;Number Limited To : &quot;</span> <span style="color: #339933;">+</span> limited_number<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span></pre></div></div>

<p><button id ="limit_demo" class="demo_button">limitDemo(6535634);</button><br />
<br/></p>
<h3>Stick a Fork in it</h3>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> changeColor <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>red_value<span style="color: #339933;">,</span> green_value<span style="color: #339933;">,</span> blue_value<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//Try to make sure everything is an integer</span>

	red_value   <span style="color: #339933;">=</span> red_value.<span style="color: #006600;">toInt</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	green_value <span style="color: #339933;">=</span> green_value.<span style="color: #006600;">toInt</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	blue_value  <span style="color: #339933;">=</span> blue_value.<span style="color: #006600;">toInt</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
	<span style="color: #006600; font-style: italic;">//Set default values on anything thats Not a Number</span>
	<span style="color: #000066; font-weight: bold;">if</span> <span style="color: #009900;">&#40;</span>$type<span style="color: #009900;">&#40;</span>red_value<span style="color: #009900;">&#41;</span>   <span style="color: #339933;">!=</span> <span style="color: #3366CC;">'number'</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>red_value <span style="color: #339933;">=</span> <span style="color: #CC0000;">0</span><span style="color: #339933;">;</span><span style="color: #009900;">&#125;</span>

	<span style="color: #000066; font-weight: bold;">if</span> <span style="color: #009900;">&#40;</span>$type<span style="color: #009900;">&#40;</span>green_value<span style="color: #009900;">&#41;</span> <span style="color: #339933;">!=</span> <span style="color: #3366CC;">'number'</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>green_value <span style="color: #339933;">=</span> <span style="color: #CC0000;">0</span><span style="color: #339933;">;</span><span style="color: #009900;">&#125;</span>
	<span style="color: #000066; font-weight: bold;">if</span> <span style="color: #009900;">&#40;</span>$type<span style="color: #009900;">&#40;</span>blue_value<span style="color: #009900;">&#41;</span>  <span style="color: #339933;">!=</span> <span style="color: #3366CC;">'number'</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>blue_value <span style="color: #339933;">=</span> <span style="color: #CC0000;">0</span><span style="color: #339933;">;</span><span style="color: #009900;">&#125;</span>

&nbsp;
	<span style="color: #006600; font-style: italic;">//Limit Everything to the RGB Scale (0 - 255)</span>
	red_value   <span style="color: #339933;">=</span> red_value.<span style="color: #006600;">limit</span><span style="color: #009900;">&#40;</span><span style="color: #CC0000;">0</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">255</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	green_value <span style="color: #339933;">=</span> green_value.<span style="color: #006600;">limit</span><span style="color: #009900;">&#40;</span><span style="color: #CC0000;">0</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">255</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	blue_value  <span style="color: #339933;">=</span> blue_value.<span style="color: #006600;">limit</span><span style="color: #009900;">&#40;</span><span style="color: #CC0000;">0</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">255</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//Calculate hex value</span>
	<span style="color: #003366; font-weight: bold;">var</span> color <span style="color: #339933;">=</span> <span style="color: #009900;">&#91;</span>red_value<span style="color: #339933;">,</span> green_value<span style="color: #339933;">,</span> blue_value<span style="color: #009900;">&#93;</span>.<span style="color: #006600;">rgbToHex</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 
	<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'Converts to : '</span> <span style="color: #339933;">+</span> color<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 

<span style="color: #009900;">&#125;</span></pre></div></div>

<p><button id ="change_color_3_clean" class="demo_button">changeColor(&#8217;28&#8242;, &#8216;17&#8242;, &#8216;47&#8242;);</button><button id ="change_color_3_default" class="demo_button">changeColor(&#8217;28&#8242;, &#8216;17&#8242;, &#8216;oops&#8217;);</button><button id ="change_color_3_limit" class="demo_button">changeColor(&#8217;428&#8242;, &#8216;317&#8242;, &#8216;265000&#8242;);</button><br />

<br/></p>
<h3>To Learn More</h3>
<h4><a href="http://web.archive.org/web/20090215011120/http://www.consideropen.com/downloads/30days_of_moo/mootorial_day8_filtering_1.zip">Download a zip with everything you need to get started</a></h4>
<p><a href="http://web.archive.org/web/20090215011120/http://www.w3schools.com/jsref/jsref_obj_number.asp">Standard Number Functionality</a><br />
<a href="http://web.archive.org/web/20090215011120/http://docs.mootools.net/Native/Number">Mootools Number Functionality</a><br />
<a href="http://web.archive.org/web/20090215011120/http://docs.mootools.net/Native/Array">Mootools Array Functionality</a></p>
<h4>Tomorrow&#8217;s Tutorial</h4>
<p><a href="http://web.archive.org/web/20090215011120/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-9-input-filtering-strings/">Input Filtering Part 2 -Strings</a></p>
<h3>Requests?</h3>

<p>While we&#8217;re starting to get into more complex areas of the library, we&#8217;ve still got plenty of time left to fit in any topics or areas you&#8217;re interested in. If there&#8217;s something you&#8217;d like to learn to do with Mootools, please let us know and we&#8217;ll do our best to work it in to the schedule.</p>
					</div>