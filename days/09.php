<h2>String Functions</h2>
<p>

Hey Folks, today we&#8217;re going to be taking a look at some of the additional functionality Mootools gives us to deal with strings. This is a partial view of the mootools string capabilities, and doesn&#8217;t include a few more estoteric functions (e.g. toCamelCase()) or any of the string functionality dealing with regular expressions. We&#8217;re going to take a day to go over the basics of regular expressions and their use within mootools a bit later. If you haven&#8217;t already, I&#8217;d recommend checking out the rest of the <a href="http://web.archive.org/web/20090217014336/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-1-intro-to-the-library/">30 Days of Mootools Tutorials</a> before continuing,
</p>
<p>
Before going into it, I want to take a moment too look at how these string functions are being called. For my examples I&#8217;ll be calling these functions on variables with strings in them like so :</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> my_text_variable <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;Heres some text&quot;</span><span style="color: #339933;">;</span>

<span style="color: #006600; font-style: italic;">//  result               text variable    name of the function</span>
<span style="color: #003366; font-weight: bold;">var</span> result_of_function <span style="color: #339933;">=</span> my_text_variable.<span style="color: #006600;">someStringFunction</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>While this makes it clearer for the sake of explanation, you should be aware that these string functions can also e called on strings without declaring a variable like so :</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> result_of_function <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;Heres some text&quot;</span>.<span style="color: #006600;">someStringFunction</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Note that this also holds true for all of mootools number functions as well :</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//Note the use of parentheses for numbers as</span>
<span style="color: #006600; font-style: italic;">//opposed to single quotes for strings</span>
<span style="color: #003366; font-weight: bold;">var</span> limited_number <span style="color: #339933;">=</span> <span style="color: #009900;">&#40;</span><span style="color: #CC0000;">256</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">limit</span><span style="color: #009900;">&#40;</span><span style="color: #CC0000;">1</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">100</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Also, I want to stress again that input filtering done with javascript <b>IS NOT</b> for sanitizing user input before sending it server-side. Anything you write in javascript can be seen, manipulated, and disabled by the person viewing your web page. We&#8217;ll be having some light discussion of PHP filtering techniques when we get to the Mootools Request class. In the meantime, just keep to the rule that anything security related should be done server-side, not with the javascript.
</p>
<h3>trim()</h3>
<p>The trim function provides a straightforward way to strip whitespace off the front and end of any strings you care to hand it.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//This is the String we're trimming</span>
<span style="color: #003366; font-weight: bold;">var</span> text_to_trim <span style="color: #339933;">=</span>  <span style="color: #3366CC;">&quot;    <span style="color: #000099; font-weight: bold;">\n</span>String With Whitespace     &quot;</span><span style="color: #339933;">;</span>

<span style="color: #006600; font-style: italic;">//  trimmed_text is &quot;String With Whitespace&quot;</span>
<span style="color: #003366; font-weight: bold;">var</span> trimmed_text <span style="color: #339933;">=</span> text_to_trim.<span style="color: #006600;">trim</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>If you haven&#8217;t seen that \n yet, it&#8217;s basically shorthand for Newline. Throw it in a string when you want to seperate it out into multiple lines. New lines are counted as whitespace by trim, so it gets rid of them as well. One thing Trim very specifically does not do is get rid of any extra whitespace <i>inside</i> of the string The example below shows you what happens to a string with newlines that gets trimmed:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> trimDemo <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//Load up the text we're going to trim</span>
	<span style="color: #003366; font-weight: bold;">var</span> text_to_trim <span style="color: #339933;">=</span>  <span style="color: #3366CC;">'            <span style="color: #000099; font-weight: bold;">\n</span>too       much       whitespace<span style="color: #000099; font-weight: bold;">\n</span>              '</span><span style="color: #339933;">;</span>

&nbsp;
	<span style="color: #006600; font-style: italic;">//Trim it</span>
	<span style="color: #003366; font-weight: bold;">var</span> trimmed_text <span style="color: #339933;">=</span> text_to_trim.<span style="color: #006600;">trim</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//Report the results</span>

	<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'Before Trimming : <span style="color: #000099; font-weight: bold;">\n</span>'</span> <span style="color: #339933;">+</span> 
		  <span style="color: #3366CC;">'|-'</span> <span style="color: #339933;">+</span> text_to_trim <span style="color: #339933;">+</span> <span style="color: #3366CC;">'-|<span style="color: #000099; font-weight: bold;">\n</span><span style="color: #000099; font-weight: bold;">\n</span>'</span> <span style="color: #339933;">+</span>

		  <span style="color: #3366CC;">'After Trimming : <span style="color: #000099; font-weight: bold;">\n</span>'</span> <span style="color: #339933;">+</span>  
	      <span style="color: #3366CC;">'|-'</span> <span style="color: #339933;">+</span> trimmed_text <span style="color: #339933;">+</span> <span style="color: #3366CC;">'-|'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span></pre></div></div>

<p><button id="trim_text" class="demo_button">Trim</button><br />
<br/></p>
<h3>clean()</h3>
<p>Makes sense, you wouldn&#8217;t necessarily want to remove all of the whitespace in a string. Fortunately for those of you feeling wreckless, Mootools generously provides you with clean(). </p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//This is the String we're trimming</span>
<span style="color: #003366; font-weight: bold;">var</span> text_to_clean <span style="color: #339933;">=</span>  <span style="color: #3366CC;">&quot;    <span style="color: #000099; font-weight: bold;">\n</span>String     <span style="color: #000099; font-weight: bold;">\n</span>With    Lots <span style="color: #000099; font-weight: bold;">\n</span> <span style="color: #000099; font-weight: bold;">\n</span>    More     <span style="color: #000099; font-weight: bold;">\n</span>Whitespace  <span style="color: #000099; font-weight: bold;">\n</span>   &quot;</span><span style="color: #339933;">;</span>

<span style="color: #006600; font-style: italic;">//  cleaned_text  is &quot;String With Lots More Whitespace&quot;</span>
<span style="color: #003366; font-weight: bold;">var</span> cleaned_text  <span style="color: #339933;">=</span> text_to_trim.<span style="color: #006600;">clean</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>clean() is trim with one important difference. Instead of restricting itself to the whitespace at the beginning and end of the string it just goes ahead and takes out <b>ALL</b> of the whitespace from the string you pass it. This means any amount of spaces more than one, and all linebreaks and tabs in the string. Compare the result to trim to see what I mean.

</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> cleanDemo <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//Load up the text we're going to clean</span>
	<span style="color: #003366; font-weight: bold;">var</span> text_to_clean <span style="color: #339933;">=</span>  <span style="color: #3366CC;">'            too<span style="color: #000099; font-weight: bold;">\n</span>       much<span style="color: #000099; font-weight: bold;">\n</span>       whitespace              '</span><span style="color: #339933;">;</span>

&nbsp;
	<span style="color: #006600; font-style: italic;">//Clean it</span>
	<span style="color: #003366; font-weight: bold;">var</span> cleaned_text <span style="color: #339933;">=</span> text_to_clean.<span style="color: #006600;">clean</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//Report the results</span>

	<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'Before Cleaning : <span style="color: #000099; font-weight: bold;">\n</span>'</span> <span style="color: #339933;">+</span> 
		  <span style="color: #3366CC;">'|-'</span> <span style="color: #339933;">+</span> text_to_clean <span style="color: #339933;">+</span> <span style="color: #3366CC;">'-|<span style="color: #000099; font-weight: bold;">\n</span><span style="color: #000099; font-weight: bold;">\n</span>'</span> <span style="color: #339933;">+</span>

		  <span style="color: #3366CC;">'After Cleaning : <span style="color: #000099; font-weight: bold;">\n</span>'</span> <span style="color: #339933;">+</span>  
	      <span style="color: #3366CC;">'|-'</span> <span style="color: #339933;">+</span> cleaned_text <span style="color: #339933;">+</span> <span style="color: #3366CC;">'-|'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span></pre></div></div>

<p><button id="clean_text" class="demo_button">Clean</button><br />
<br/></p>
<h3>contains()</h3>
<p>
Like trim() and clean(), contains() does one thing in a very straightforward, no frills manner. It checks a string to see if it contains a search string you define, returns true if it finds the search string and false if it can&#8217;t.
</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//Our string to search</span>
<span style="color: #003366; font-weight: bold;">var</span> string_to_match <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;Does this contain thing work?&quot;</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #006600; font-style: italic;">//Looks for 'contain', did_string match is true</span>
<span style="color: #003366; font-weight: bold;">var</span> did_string_match <span style="color: #339933;">=</span> string_to_match.<span style="color: #006600;">contains</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'contain'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//Looks for propane, did_string_match is false</span>
did_string_match <span style="color: #339933;">=</span> string_to_match.<span style="color: #006600;">contains</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'propane'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>
This thing can come in handy in all sorts of situations, and when you use it in combination with other tools like the Array.each() function we went over on <a href="http://web.archive.org/web/20090217014336/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-3-intro-to-using-arrays/">day 3</a> you can accomplish some decently complex tasks with relatively little code.  For example, if we take a list of words in an array and run it through each, we can look for multiple phrases in the same block of text with relatively little code :</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">	string_to_match <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;string containing whatever words you want to try to match&quot;</span><span style="color: #339933;">;</span>
	word_array <span style="color: #339933;">=</span> <span style="color: #009900;">&#91;</span><span style="color: #3366CC;">'words'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'to'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'match'</span><span style="color: #009900;">&#93;</span><span style="color: #339933;">;</span>

	<span style="color: #006600; font-style: italic;">//Pass each word in the array as the variable word</span>
	word_array.<span style="color: #006600;">each</span><span style="color: #009900;">&#40;</span><span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>word_to_match<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #006600; font-style: italic;">//Look for current word</span>
		<span style="color: #000066; font-weight: bold;">if</span> <span style="color: #009900;">&#40;</span>string_to_match.<span style="color: #006600;">contains</span><span style="color: #009900;">&#40;</span>word_to_match<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

			<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'found '</span> <span style="color: #339933;">+</span> word_to_match<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">&#125;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>

Throw in a textbox and a little imagination and you&#8217;ve got you&#8217;re very own swear (or whatever) word detector
</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> containsDemo <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//Put our list of banned words into an array</span>
	<span style="color: #003366; font-weight: bold;">var</span> banned_words <span style="color: #339933;">=</span> <span style="color: #009900;">&#91;</span><span style="color: #3366CC;">'drat'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'goshdarn'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'fiddlesticks'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'kumquat'</span><span style="color: #009900;">&#93;</span><span style="color: #339933;">;</span>	

&nbsp;
	<span style="color: #006600; font-style: italic;">//Get the contents of the text area</span>
	<span style="color: #003366; font-weight: bold;">var</span> textarea_input <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'textarea_1'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
	<span style="color: #006600; font-style: italic;">//Iterate over each of the banned words</span>
	banned_words.<span style="color: #006600;">each</span><span style="color: #009900;">&#40;</span><span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>banned_word<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #006600; font-style: italic;">//Look for the current banned </span>
		<span style="color: #006600; font-style: italic;">//word in the textarea contents</span>
		<span style="color: #000066; font-weight: bold;">if</span> <span style="color: #009900;">&#40;</span>textarea_input.<span style="color: #006600;">contains</span><span style="color: #009900;">&#40;</span>banned_word<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

			<span style="color: #006600; font-style: italic;">//Tell the user not to use that word</span>
			<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span>banned_word <span style="color: #339933;">+</span> <span style="color: #3366CC;">' is not allowed'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">&#125;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span></pre></div></div>

<p><textarea id="textarea_1" rows="2" cols="75">Banned Words : drat goshdarn fiddlesticks kumquat</textarea><br />
<button id="check_textarea_1" class="demo_button">Check for Banned Words</button><br />
<br/></p>
<h3>substitute()</h3>
<p>
substitute is a deceptively powerful tool. We&#8217;re just going to be touching the basics of it today, a lot of the power in substitute comes through it&#8217;s use of regular expressions, which we&#8217;re going to be looking at a little further on down the line. Still, the basic usage alone lets you do quite a bit.
</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//This is the text that substitute will be </span>

<span style="color: #006600; font-style: italic;">//using for a template. Note that everything</span>
<span style="color: #006600; font-style: italic;">//to be replaced is surrounded by {curly brackets}</span>
<span style="color: #003366; font-weight: bold;">var</span> text_for_substitute <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;One is {one},  Two {two}, Three is {three}.&quot;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//This is the object that holds the substitution</span>
<span style="color: #006600; font-style: italic;">//rules. The unquoted words on the right are</span>

<span style="color: #006600; font-style: italic;">//the search terms, and the quoted sentences on</span>
<span style="color: #006600; font-style: italic;">//the left are the sentences to be substituted</span>
<span style="color: #006600; font-style: italic;">//for the search term</span>
<span style="color: #003366; font-weight: bold;">var</span> substitution_object <span style="color: #339933;">=</span> <span style="color: #009900;">&#123;</span>
	one   <span style="color: #339933;">:</span> <span style="color: #3366CC;">'the first variable'</span><span style="color: #339933;">,</span> 
	two   <span style="color: #339933;">:</span> <span style="color: #3366CC;">'always comes second'</span><span style="color: #339933;">,</span> 
	three <span style="color: #339933;">:</span> <span style="color: #3366CC;">'getting sick of bronze..'</span>

    <span style="color: #009900;">&#125;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//call substitute with the substitution</span>
<span style="color: #006600; font-style: italic;">//object as the argument on text_for_substitute,</span>
<span style="color: #006600; font-style: italic;">//place the result in the new_string variable.    </span>
<span style="color: #003366; font-weight: bold;">var</span> new_string <span style="color: #339933;">=</span> text_for_substitute.<span style="color: #006600;">substitute</span><span style="color: #009900;">&#40;</span>substitution_object<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 

&nbsp;
<span style="color: #006600; font-style: italic;">//new_string is now &quot;One is the first variable,  Two always comes second, Three is getting sick of bronze...&quot;</span></pre></div></div>

<p>
You don&#8217;t actually have to create the substitution_object to use substitute if it&#8217;s not appropriate, the following will work just as well :
</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//Build the substitution string</span>
<span style="color: #003366; font-weight: bold;">var</span> text_for_substitute <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;{substitute_key} and the original text&quot;</span><span style="color: #339933;">;</span>

<span style="color: #006600; font-style: italic;">//Just include the substitution object as a paramater to substitute</span>
<span style="color: #003366; font-weight: bold;">var</span> result_text <span style="color: #339933;">=</span> text_for_substitute.<span style="color: #006600;">substitute</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>substitute_key <span style="color: #339933;">:</span> <span style="color: #3366CC;">'substitute_value'</span><span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #006600; font-style: italic;">//result_text is &quot;substitute_value and the original text&quot;</span></pre></div></div>

<p>
You can go even farther with that one, and place calls to retrieve values from the DOM in as substitute values and it&#8217;ll work just fine.
</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> substituteDemo <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//Get the original text from the textfield</span>

	<span style="color: #003366; font-weight: bold;">var</span> original_text <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'substitute_span'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'html'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//Substitute the values in the textfields for the</span>

	<span style="color: #006600; font-style: italic;">//values in the text field</span>
	<span style="color: #003366; font-weight: bold;">var</span> new_text <span style="color: #339933;">=</span> original_text.<span style="color: #006600;">substitute</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
		first  <span style="color: #339933;">:</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'first_value'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">,</span>

		second <span style="color: #339933;">:</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'second_value'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">,</span>
		third  <span style="color: #339933;">:</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'third_value'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">,</span>

	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//Replace the contents of the span with the new text</span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'substitute_span'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'html'</span><span style="color: #339933;">,</span> new_text<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
&nbsp;
	<span style="color: #006600; font-style: italic;">//Disable the substitute button and</span>
	<span style="color: #006600; font-style: italic;">//enable the reset button </span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'simple_substitute'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'disabled'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">true</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'simple_sub_reset'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'disabled'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">false</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> substituteReset <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

	<span style="color: #006600; font-style: italic;">//Create a variable to hold the original text</span>
	<span style="color: #003366; font-weight: bold;">var</span> original_text <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;|- {first} -- {second} -- {third} -|&quot;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//Replace the contents of the span with the original text</span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'substitute_span'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'html'</span><span style="color: #339933;">,</span> original_text<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
	<span style="color: #006600; font-style: italic;">//Disable the reset button and enable</span>
	<span style="color: #006600; font-style: italic;">//the substitute button</span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'simple_sub_reset'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'disabled'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">true</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'simple_substitute'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'disabled'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">false</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span></pre></div></div>

<p><span id="substitute_span">|- {first} &#8212; {second} &#8212; {third} -|</span></p>

<p>first_value<br />
<input type="text" id="first_value"></p>
<p>second_value<br />
<input type="text" id="second_value"></p>
<p>third_value<br />
<input type="text" id="third_value"></p>
<p><button id="simple_substitute" class="demo_button">substituteDemo()</button><button id="simple_sub_reset" class="demo_button">substituteReset()</button><br />
<br/><br />
A quick note before  wrap up for today, if you call substitute on a string and don&#8217;t provide a key : value pair for each of the {replacement keys} in the text it will simply remove whats between the curly brackets. So be careful not to use this on any string with curly brackets that you wanna keep. For example, this :</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;{one} some stuff {two} some more stuff&quot;</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">substitute</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>one <span style="color: #339933;">:</span> <span style="color: #3366CC;">'substitution text'</span><span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Will return &#8217;substitution text some stuff some more stuff&#8217;.<br />
<br/></p>
<h3>To Learn More</h3>

<h4><a href="http://web.archive.org/web/20090217014336/http://www.consideropen.com/downloads/30days_of_moo/mootorial_day9_filtering_2.zip">Download a zip containing everything you need to get started</a></h4>
<p><a href="http://web.archive.org/web/20090217014336/http://www.quirksmode.org/js/strings.html">Quirksmode on Strings</a> (this guy is amazing)<br />
<a href="http://web.archive.org/web/20090217014336/http://www.w3schools.com/jsref/jsref_obj_global.asp">Javascript String function reference</a><br />
<a href="http://web.archive.org/web/20090217014336/http://docs.mootools.net/Native/String">Mootools String documentation</a></p>
<h4>Tomorrow&#8217;s tutorial</h4>
<p>Be sure to check out Day 10, <a href="http://web.archive.org/web/20090217014336/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-10-tween-morph-and-transitions/#comment-653">Mootools 1.2 Tween Effects</a>.</p>

<h3>Let us know</h3>
<p>As always, if you&#8217;ve got any questions at all about this tutorial, any suggestions for improving it, or any requests for areas you&#8217;d like us to cover feel free to drop a comment or send us some mail, we&#8217;ll do our best to help ya out.</p>
					</div>