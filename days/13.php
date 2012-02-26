<h2>Mootools and Regular Expressions</h2>
<p>If you haven&#8217;t already, I&#8217;d suggest checking out the rest of the <a href="http://web.archive.org/web/20090218042328/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-1-intro-to-the-library/"> 30 Days of Mootools Tutorials</a> before continuing on. For day 13, we&#8217;ll do a brief overview of regular expressions, then look at the functionality Mootools offers to make life easier when dealing with them.</p>

<p>For those of you not already familiar with how a <strong>reg</strong>ular <strong>ex</strong>pression (regex) works, I highly suggest you spend some quality time with the reference links scattered in the text, and especially the &#8220;To Learn More&#8221; links at the bottom of this page. We&#8217;re going to be looking at some extremely basic uses of regexes, there&#8217;s an incredible amount that they can do beyond what we&#8217;ll be talking about today.</p>
<h2>The Basics</h2>
<h3>test()</h3>
<p>At it&#8217;s simplest, a regular expression can be simply a string of text you wish to match. While javascript already provides a <a href="http://web.archive.org/web/20090218042328/http://developer.mozilla.org/en/Core_JavaScript_1.5_Reference/Objects/RegExp">RegExp object</a> with it&#8217;s own <a href="http://web.archive.org/web/20090218042328/http://developer.mozilla.org/en/Core_JavaScript_1.5_Reference/Objects/RegExp/test">test() function</a>, the Mootools test() function is a much friendlier and far less painful way to utilize regexes in javascript.</p>

<p>For starters, lets take a look at the simplest usage of test(), finding a specific string within a larger string :</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//The string we'll be looking for a match in</span>
<span style="color: #003366; font-weight: bold;">var</span> string_to_test <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;Match anything in here&quot;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//The regular expression we're looking for</span>
<span style="color: #003366; font-weight: bold;">var</span> regular_expression <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;anything&quot;</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #006600; font-style: italic;">//Apply the regular expression, returns either true or false</span>
<span style="color: #003366; font-weight: bold;">var</span> result <span style="color: #339933;">=</span> string_to_test.<span style="color: #006600;">test</span><span style="color: #009900;">&#40;</span>regular_expression<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//result is now equal to true</span></pre></div></div>

<p>This is essentially the same behavior you&#8217;d get from the contains() function, but where contains looks for complete words, the regular expression matches any occurrences of the regular expression. For example, contains() will <strong>not</strong> return true in this instance while test() will:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> string_to_match <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;anything&quot;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//Returns False</span>

string_to_match.<span style="color: #006600;">contains</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'nything'</span><span style="color: #009900;">&#41;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//Returns True</span>
string_to_match.<span style="color: #006600;">test</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'nything'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Also, be aware that unless you explicitly tell it not to, the regex is case sensitive, so searching for &#8220;match&#8221; when the string contains &#8220;Match&#8221; will return false. You can play around with it below.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> regex_demo <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #003366; font-weight: bold;">var</span> test_string <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'regex_1_value'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #003366; font-weight: bold;">var</span> regex_value <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'regex_1_match'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #003366; font-weight: bold;">var</span> test_result <span style="color: #339933;">=</span> test_string.<span style="color: #006600;">test</span><span style="color: #009900;">&#40;</span>regex_value<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
	<span style="color: #000066; font-weight: bold;">if</span>     <span style="color: #009900;">&#40;</span>test_result<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'regex_1_result'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'html'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">&quot;matched&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span><span style="color: #009900;">&#125;</span>
	<span style="color: #000066; font-weight: bold;">else</span> <span style="color: #009900;">&#123;</span>$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'regex_1_result'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'html'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">&quot;didn't match&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span><span style="color: #009900;">&#125;</span>

<span style="color: #009900;">&#125;</span></pre></div></div>

<p>Note that there are special characters in regular expressions that you have to be careful about using. If you place any of the following into regex box you may cause an error and have to reload this page for the demos to function.</p>
<pre>- . * + ? ^ $ { } ( ) | [ ] / \
</pre>
<table border="0">
<tbody>
<tr>
<td>String to Test</td>
<td>
<input id="regex_1_value" type="text" value="Match any of these words" /></td>
</tr>
<tr>
<td>Regular Expression</td>

<td>
<input id="regex_1_match" type="text" value="any" /></td>
</tr>
<tr>
<td><button id="regex_1_button">Run Regex</button></td>
<td>
<div id="regex_1_result">&nbsp;</div>
</td>
</tr>
</tbody>
</table>
<h3>Ignoring Case</h3>
<p>There are plenty of situations in which you aren&#8217;t concerned about the case of the term you are trying to match. If you don&#8217;t want a regular expression to be case sensitive, you can call test with the &#8220;i&#8221; parameter:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//The string we'll be looking for a match in</span>
<span style="color: #003366; font-weight: bold;">var</span> string_to_test <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;IgNorE CaSe&quot;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//returns false</span>
string_to_test.<span style="color: #006600;">test</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;ignore&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #006600; font-style: italic;">//returns true</span>
string_to_test.<span style="color: #006600;">test</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;ignore&quot;</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">&quot;i&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Technically speaking, you can pass multiple parameters to test, but since javascript currently only supports 3 regular expression parameters (2 of which are enabled by default in test()), the &#8220;i&#8221; parameter is probably the only thing you&#8217;ll be passing it for the time being. You can go ahead and test out the difference in case matching below :</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> regex_demo <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//Get the string to test from the input field</span>
	<span style="color: #003366; font-weight: bold;">var</span> test_string <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'regex_2_value'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
	<span style="color: #006600; font-style: italic;">//Get the regular expression to use from the input field</span>
	<span style="color: #003366; font-weight: bold;">var</span> regex_value <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'regex_2_match'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
	<span style="color: #006600; font-style: italic;">//See if we're ignoring case sensitivity</span>
	<span style="color: #003366; font-weight: bold;">var</span> regex_param <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;&quot;</span><span style="color: #339933;">;</span>
	<span style="color: #000066; font-weight: bold;">if</span> <span style="color: #009900;">&#40;</span>$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'regex_2_param'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">checked</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		regex_param <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;i&quot;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//Run the test and get the result</span>
	<span style="color: #003366; font-weight: bold;">var</span> test_result <span style="color: #339933;">=</span> test_string.<span style="color: #006600;">test</span><span style="color: #009900;">&#40;</span>regex_value<span style="color: #339933;">,</span> regex_param<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
	<span style="color: #006600; font-style: italic;">//Update the result span with the what happened</span>
	<span style="color: #000066; font-weight: bold;">if</span>     <span style="color: #009900;">&#40;</span>test_result<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'regex_2_result'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'html'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">&quot;matched&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span><span style="color: #009900;">&#125;</span>

	<span style="color: #000066; font-weight: bold;">else</span> <span style="color: #009900;">&#123;</span>$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'regex_2_result'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'html'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">&quot;didn't match&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span><span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span></pre></div></div>

<table border="0">
<tbody>

<tr>
<td>String to Test</td>
<td>
<input id="regex_2_value" type="text" value="IgNorE CaSe" /></td>
</tr>
<tr>
<td>Regular Expression</td>
<td>
<input id="regex_2_match" type="text" value="ignore" /></td>
</tr>
<tr>
<td>Ignore Case</td>
<td>
<input id="regex_2_param" type="checkbox" /></td>

</tr>
<tr>
<td><button id="regex_2_button">Run Regex</button></td>
<td>
<div id="regex_2_result">&nbsp;</div>
</td>
</tr>
</tbody>
</table>
<h2>The Fun Stuff</h2>
<p>Now that we&#8217;ve covered simple matching, we can start looking at some of the more impressive aspects of regexes. This doesn&#8217;t come close to covering everything possible with regexes&mdash;it&#8217;s a cherrypicking of some of the more immediately useful functionality.</p>

<h3>Match at the beginning with ^</h3>
<p>The regex &#8216;^&#8217; operator allows you to look for a match at the beginning of a line regardless of whether the string you&#8217;re looking for exists later on in the string.  Place it before the expression you want to match like so :</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//The string we're going to test</span>
<span style="color: #003366; font-weight: bold;">var</span> string_to_test <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;lets match at the beginning&quot;</span>

&nbsp;
<span style="color: #006600; font-style: italic;">//Tests to see if the string begins with lets, returns true</span>
<span style="color: #003366; font-weight: bold;">var</span> is_true <span style="color: #339933;">=</span> string_to_test.<span style="color: #006600;">match</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;^lets&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>As you may expect, if the expression is not at the beginning of the string, this test will return false:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//The string we're going to test</span>
<span style="color: #003366; font-weight: bold;">var</span> string_to_test <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;lets match at the beginning&quot;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//Tests to see if the string begins with match, returns false</span>
<span style="color: #003366; font-weight: bold;">var</span> is_false <span style="color: #339933;">=</span> string_to_test.<span style="color: #006600;">match</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;^match&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Go ahead and test it out below:</p>
<table border="0">
<tbody>
<tr>
<td>String to Test</td>
<td>
<input id="regex_3_value" type="text" value="lets match at the beginning" /></td>
</tr>
<tr>
<td>Regular Expression</td>
<td>
<input id="regex_3_match" type="text" value="^lets" /></td>
</tr>

<tr>
<td>Ignore Case</td>
<td>
<input id="regex_3_param" type="checkbox" /></td>
</tr>
<tr>
<td><button id="regex_3_button">Run Regex</button></td>
<td>
<div id="regex_3_result">&nbsp;</div>
</td>
</tr>
</tbody>
</table>
<h3>Match at the end with $</h3>

<p>The &#8216;$&#8217; operator functions just like &#8220;^&#8221; with two differences.</p>
<ol>
<li>It matches at the end of a string instead of the beginning.</li>
<li>It&#8217;s placed at the end of the expression instead of the beginning</li>
</ol>
<p>Other than that, everything works as you would expect it to:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//The string we're going to test</span>
<span style="color: #003366; font-weight: bold;">var</span> string_to_test <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;lets match at the end&quot;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//Tests to see if the string ends with end, returns true</span>
<span style="color: #003366; font-weight: bold;">var</span> is_true <span style="color: #339933;">=</span> string_to_test.<span style="color: #006600;">match</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;end$&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #006600; font-style: italic;">//Tests to see if the string ends with the, returns false</span>
<span style="color: #003366; font-weight: bold;">var</span> is_false <span style="color: #339933;">=</span> string_to_test.<span style="color: #006600;">match</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;the$&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>One neat thing you can do with a combination of both these operators is test to see if a string contains just the expression you&#8217;re testing for and nothing else</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//The string we're going to test</span>
<span style="color: #003366; font-weight: bold;">var</span> string_to_test <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;lets match everything&quot;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//Tests to see if the string is precisely &quot;lets match everything&quot;, returns true</span>
<span style="color: #003366; font-weight: bold;">var</span> is_true <span style="color: #339933;">=</span> string_to_test.<span style="color: #006600;">match</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;^lets match everything$&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #006600; font-style: italic;">//Tests to see if the string is precisely &quot;lets everything&quot;, returns false</span>
<span style="color: #003366; font-weight: bold;">var</span> is_false <span style="color: #339933;">=</span> string_to_test.<span style="color: #006600;">match</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;^lets everything$&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<table border="0">

<tbody>
<tr>
<td>String to Test</td>
<td>
<input id="regex_4_value" type="text" value="lets match everything" /></td>
</tr>
<tr>
<td>Regular Expression</td>
<td>
<input id="regex_4_match" type="text" value="^lets match everything$" /></td>
</tr>
<tr>
<td>Ignore Case</td>
<td>

<input id="regex_4_param" type="checkbox" /></td>
</tr>
<tr>
<td><button id="regex_4_button">Run Regex</button></td>
<td>
<div id="regex_4_result">&nbsp;</div>
</td>
</tr>
</tbody>
</table>
<h3>Character Classes</h3>
<p>Character classes are another regex tool that allows you to match multiple specific characters (A or Z) as well as a range of characters (A through Z). If, for example, you want to test if either of the words moo or boo exist in a string, character classes allow you to do this by placing both characters in [brackets] within the regular expression :</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//The string to test for moo</span>

<span style="color: #003366; font-weight: bold;">var</span> first_string_to_test <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;cows go moo&quot;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//The string to test for boo</span>
<span style="color: #003366; font-weight: bold;">var</span> second_string_to_test <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;ghosts go boo&quot;</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #006600; font-style: italic;">//This matches the first but not the second</span>
<span style="color: #003366; font-weight: bold;">var</span> returns_true <span style="color: #339933;">=</span> first_string_to_test.<span style="color: #006600;">test</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;moo&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #003366; font-weight: bold;">var</span> returns_false <span style="color: #339933;">=</span> second_string_to_test<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;moo&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #006600; font-style: italic;">//This matches the second but not the first</span>
returns_false <span style="color: #339933;">=</span> first_string_to_test.<span style="color: #006600;">test</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;boo&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
returns_true <span style="color: #339933;">=</span> second_string_to_test.<span style="color: #006600;">test</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;boo&quot;</span><span style="color: #009900;">&#41;</span>

&nbsp;
<span style="color: #006600; font-style: italic;">//This matches both the second and the first</span>
returns_true <span style="color: #339933;">=</span> first_string_to_test<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;[mb]oo&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
returns_true <span style="color: #339933;">=</span> second_string_to_test<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;[mb]oo&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<table border="0">
<tbody>
<tr>
<td>First string to test</td>
<td>
<input id="regex_5_value_1" type="text" value="cows go moo" /></td>
<td>
<div id="regex_5_result_1">&nbsp;</div>
</td>
</tr>
<tr>
<td>Second string to test</td>
<td>
<input id="regex_5_value_2" type="text" value="ghosts go boo" /></td>

<td>
<div id="regex_5_result_2">&nbsp;</div>
</td>
</tr>
<tr>
<td>Regular Expression</td>
<td>
<input id="regex_5_match" type="text" value="[mb]oo" /></td>
</tr>
<tr>
<td>Ignore Case</td>
<td>
<input id="regex_5_param" type="checkbox" /></td>
</tr>
<tr>

<td><button id="regex_5_button">Run Regex</button></td>
<td></td>
</tr>
</tbody>
</table>
<p>In order to match a range of characters, you separate the beginning and the end of the range you&#8217;d like to match with a dash. You can define a range of either characters or numbers in the same way.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> string_to_test  <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot; b or 3&quot;</span><span style="color: #339933;">;</span>

<span style="color: #006600; font-style: italic;">//Match a, b, c, or d. Returns true</span>
string_to_test.<span style="color: #006600;">test</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;[a-d]&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//Match 1, 2, 3, 4, or 5. Returns true.</span>
string_to_test.<span style="color: #006600;">test</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;[1-5]&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>If you&#8217;d like to match between multiple character classes, you can nest your character class calls inside their own [brackets] and seperate them with the &#8216;|&#8217; operator</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> string_to_test <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;b or 3&quot;</span><span style="color: #339933;">;</span>
<span style="color: #006600; font-style: italic;">//Match a to d or 1 to 5, returns true</span>
string_to_test.<span style="color: #006600;">test</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#91;</span> <span style="color: #009900;">&#91;</span>a<span style="color: #339933;">-</span>d<span style="color: #009900;">&#93;</span> <span style="color: #339933;">|</span> <span style="color: #009900;">&#91;</span><span style="color: #CC0000;">1</span><span style="color: #CC0000;">-5</span><span style="color: #009900;">&#93;</span> <span style="color: #009900;">&#93;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<table border="0">
<tbody>
<tr>
<td>First string to test</td>
<td>
<input id="regex_6_value_1" type="text" value="b" /></td>
<td>
<div id="regex_6_result_1">&nbsp;</div>
</td>
</tr>
<tr>
<td>Second string to test</td>
<td>
<input id="regex_6_value_2" type="text" value="3" /></td>

<td>
<div id="regex_6_result_2">&nbsp;</div>
</td>
</tr>
<tr>
<td>Regular Expression</td>
<td>
<input id="regex_6_match" type="text" value="[a-d]" /></td>
</tr>
<tr>
<td>Ignore Case</td>
<td>
<input id="regex_6_param" type="checkbox" /></td>
</tr>
<tr>

<td><button id="regex_6_button">Run Regex</button></td>
<td></td>
</tr>
</tbody>
</table>
<h3>escapeRegExp()</h3>
<p>It may have occurred to you while reading that the way regular expressions are built could make matching some types of strings difficult. For instance, what if you wanted to look for [stuff-in-here] or $300 in a string? You can do so manually by placing a &#8216;\&#8217; character before each special character you want to ignore.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//The string we want to match, note the [ ] - and $</span>
<span style="color: #003366; font-weight: bold;">var</span> string_to_match <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;[stuff-in-here] or $300&quot;</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #006600; font-style: italic;">//Incorrect way to match matching</span>
string_to_match.<span style="color: #006600;">test</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;[stuff-in-here]&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
string_to_match.<span style="color: #006600;">test</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;$300&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//Correct way to match,</span>
<span style="color: #006600; font-style: italic;">//note the \ preceding the [ ] - and $</span>

string_to_match.<span style="color: #006600;">test</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;<span style="color: #000099; font-weight: bold;">\[</span>stuff<span style="color: #000099; font-weight: bold;">\-</span>in<span style="color: #000099; font-weight: bold;">\-</span>here<span style="color: #000099; font-weight: bold;">\]</span>&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
string_to_match.<span style="color: #006600;">test</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;<span style="color: #000099; font-weight: bold;">\$</span>300&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>This can be a source of real headaches when dealing with regexes, especially if you&#8217;re not completely familiar with them. For reference, the special characters in regexes that require escaping are</p>
<pre>- . * + ? ^ $ { } ( ) | [ ] / \
</pre>
<p>Fortunately, Mootools provides the escapeRegExp() function, which makes sure that your regexes are properly escaped. It&#8217;s another string function, so you can just call it on whatever string you want to match for before using it in your regular expression.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//The string we need to Escape</span>
<span style="color: #003366; font-weight: bold;">var</span> unescaped_regex_string <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;[stuff-in-here]&quot;</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #006600; font-style: italic;">//Escape the string</span>
<span style="color: #003366; font-weight: bold;">var</span> escaped_regex_string <span style="color: #339933;">=</span> unescaped_regex_string.<span style="color: #006600;">escapeRegExp</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//escaped_regex_string is &quot;\[stuff\-in\-here\]&quot;</span></pre></div></div>

<p>Note this means that any special characters you want to use in your regular expression must be added on after the string has been escaped:</p>
<pre lang="text/javascript">//The string we need to Escape
var unescaped_regex_string = "[stuff-in-here]&#8220;;

//Escape the string, matching at the beginning
var escaped_regex_string = &#8220;^&#8221; + unescaped_regex_string.escapeRegExp();

//escaped_regex_string is &#8220;^\[stuff\-in\-here\]&#8221;
</pre>
<p>Go ahead and check out the differences between using escapeRegExp() and not in the example below</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> regex_demo <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

	<span style="color: #006600; font-style: italic;">//Get the string to test</span>
	<span style="color: #003366; font-weight: bold;">var</span> test_string_1 <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'regex_7_value_1'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;

	<span style="color: #006600; font-style: italic;">//Get the regular expression to use</span>
	<span style="color: #003366; font-weight: bold;">var</span> regex_value <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'regex_7_match'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;

	<span style="color: #006600; font-style: italic;">//Check to see if we're escaping regexes</span>
	<span style="color: #000066; font-weight: bold;">if</span> <span style="color: #009900;">&#40;</span>$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'regex_7_escape'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">checked</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #006600; font-style: italic;">//If so, escape the regex</span>
		regex_value <span style="color: #339933;">=</span> regex_value.<span style="color: #006600;">escapeRegExp</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #009900;">&#125;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//See if we're ignoring case sensitivity</span>
	<span style="color: #003366; font-weight: bold;">var</span> regex_param <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;&quot;</span><span style="color: #339933;">;</span>
	<span style="color: #000066; font-weight: bold;">if</span> <span style="color: #009900;">&#40;</span>$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'regex_7_param'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">checked</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		regex_param <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;i&quot;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//Run the test</span>
	<span style="color: #003366; font-weight: bold;">var</span> test_result_1 <span style="color: #339933;">=</span> test_string_1.<span style="color: #006600;">test</span><span style="color: #009900;">&#40;</span>regex_value<span style="color: #339933;">,</span> regex_param<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #000066; font-weight: bold;">if</span>      <span style="color: #009900;">&#40;</span>test_result_1<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'regex_7_result_1'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'html'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">&quot;matched&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span><span style="color: #009900;">&#125;</span>
	<span style="color: #000066; font-weight: bold;">else</span> <span style="color: #009900;">&#123;</span>$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'regex_7_result_1'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'html'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">&quot;didn't match&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span><span style="color: #009900;">&#125;</span>

&nbsp;
<span style="color: #009900;">&#125;</span></pre></div></div>

<table border="0">
<tbody>
<tr>
<td>First string to test</td>
<td>
<input id="regex_7_value_1" type="text" value="[something] or $300" /></td>
<td></td>
</tr>
<tr>
<td>Regular Expression</td>
<td>
<input id="regex_7_match" type="text" value="$300" /></td>

</tr>
<tr>
<td>use escapeRegExp()</td>
<td>
<input id="regex_7_escape" type="checkbox" /></td>
<td></td>
</tr>
<tr>
<td>Ignore Case</td>
<td>
<input id="regex_7_param" type="checkbox" /></td>
</tr>
<tr>
<td><button id="regex_7_button">Run Regex</button></td>

<td>
<div id="regex_7_result">&nbsp;</div>
</td>
</tr>
</tbody>
</table>
<p><cite>Remember that you can break the demos on this page by using unescaped special characters, so don&#8217;t be surprised if stuff stops working right after you&#8217;ve been playing with this. </cite></p>
<h3>To Learn More</h3>
<h4><a href="http://web.archive.org/web/20090218042328/http://www.consideropen.com/downloads/30days_of_moo/mootorial_day13_regexes.zip">Download a zip with everything you need to get started</a></h4>
<p>
 <a href="http://web.archive.org/web/20090218042328/http://www.regular-expressions.info/">Regular-Expressions.info</a> is a good place to turn to for reference as well as learning&mdash;it&#8217;s a good site to spend some time with. For those of you familiar with Perl or who can deal with the language differences, the Section on Regexes in <a href="http://web.archive.org/web/20090218042328/http://www.sthomas.net/roberts-perl-tutorial.htm/#77-BasicRegularExpressions">Roberts Perl Tutorial</a> does a very good job of explaining the basic concepts. In the same vein, Stephen Ramsay has written a tutorial on <a href="http://web.archive.org/web/20090218042328/http://etext.lib.virginia.edu/services/helpsheets/unix/regex.html">Unix Regexes</a> which goes over some of the concepts in a very clear and straightforward manner.

</p>
<p>
Another good place to check out is the <a href="http://web.archive.org/web/20090218042328/http://regexlib.com/">Regex Library</a>, they&#8217;ve got tons of examples of regular expressions to do all sorts of common tasks. Finally, if you&#8217;re getting brave you should spend some time with the <a href="http://web.archive.org/web/20090218042328/http://developer.mozilla.org/en/Core_JavaScript_1.5_Guide/Regular_Expressions">Javascript Regular Expressions Reference</a> from Mozilla. It can get pretty dense, but it&#8217;s incredibly useful. For information about the Mootools side of the equation, check out the <a href="http://web.archive.org/web/20090218042328/http://docs.mootools.net/Native/String#String:test">test()</a> Documentation
</p>
<h3>Tomorrow&#8217;s Tutorial</h3>

<p>On day 14 we are going to look at <a href="http://web.archive.org/web/20090218042328/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-14-periodical-and-intro-to-hashes/">periodical and have a look at using hashes in Mootools 1.2</a></p>
					