<h2>Periodicals and Hashes with Mootools 1.2</h2>
<p>If you haven&#8217;t already, be sure and check out the rest of the <a href="http://web.archive.org/web/20090205211654/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-1-intro-to-the-library/">Mootools 1.2 tutorials</a> in our 30 days series.</p>

<p>Today&#8217;s tutorial is going to look at two areas, the first is .periodical(); and then we are going to get an introduction to hashes.  Periodical will do pretty much what it says—periodical will fire a function, periodically.  Hashes on the other hand are sets of key/value pairs.  Don&#8217;t worry if you are not familiar with hashes yet—we are going to do a quick introduction today and provide a few links for further reading.  And like everything with Mootools, once you see it the right way, its easy to use and incredibly helpful.</p>
<h3>.periodical()</h3>
<h4>The Basics</h4>
<p>All you have to do is tack .perdiodical(); onto the end of a function, and just like that your function will fire periodically. Like always, there are few things you will need to define.  For starters, you will need the function you want to attach periodical to, as well as how often you want to fire (measured in milliseconds).</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> periodicalFunction <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

	<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'again'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
        <span style="color: #006600; font-style: italic;">//number at the end indicates how often to fire, measure in milliseconds</span>

	<span style="color: #003366; font-weight: bold;">var</span> periodicalFunctionVar <span style="color: #339933;">=</span> periodicalFunction.<span style="color: #006600;">periodical</span><span style="color: #009900;">&#40;</span><span style="color: #CC0000;">100</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>Built in .bind();</h4>
<p>.periodical includes a great feature - it will automatically bind a var as the second parameter.  For example, if you wanted to pass a var outside the domready, you could bind it to the function you are firing periodically by setting it as the second parameter.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
        <span style="color: #006600; font-style: italic;">//pass something to a var</span>
        <span style="color: #003366; font-weight: bold;">var</span> passedVar <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'elementID'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

        <span style="color: #006600; font-style: italic;">//now periodicalFunction will be able to use &quot;this&quot; to refer to &quot;passedVar&quot;</span>
	<span style="color: #003366; font-weight: bold;">var</span> periodicalFunctionVar <span style="color: #339933;">=</span> periodicalFunction.<span style="color: #006600;">periodical</span><span style="color: #009900;">&#40;</span><span style="color: #CC0000;">100</span><span style="color: #339933;">,</span> passedVar<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>Stopping a periodical function</h4>
<p><strong>$clear()</strong></p>
<p>To stop a function from firing periodically once you have initiated it (like we did above), you can use $clear();.  Its very simple to use:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//we clear the var that we passed the function and periodical to</span>
$clear<span style="color: #009900;">&#40;</span>periodicalFunctionVar<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>Example</h4>
<p>To put it all together, let&#8217;s use a few of the things we have learned up to now (and a few we haven&#8217;t) to create a timer.  First, set up the timer html, and then we are going to want to include a start button, a stop button and a reset button.  Also, we should create a bar that will get longer as time goes on. Finally, we should have a place to show how long the timer has been going.</p>

<div class="wp_syntax"><div class="code"><pre>&lt;button id=&quot;timer_start&quot;&gt;start&lt;/button&gt;
&lt;button id=&quot;timer_stop&quot;&gt;pause&lt;/button&gt;

&lt;button id=&quot;timer_reset&quot;&gt;reset&lt;/button&gt;
&nbsp;
&lt;div id=&quot;timper_bar_wrap&quot;&gt;
&lt;/div&gt;
&nbsp;
&nbsp;
&lt;div id=&quot;timer_display&quot;&gt;0&lt;/div&gt;</pre></div></div>

<p>Now, for the Mootools.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> timerFunction <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
        <span style="color: #006600; font-style: italic;">//each time this function is called</span>
        <span style="color: #006600; font-style: italic;">//the var currentTime will increment by one</span>

        <span style="color: #006600; font-style: italic;">//more on this below</span>
        <span style="color: #006600; font-style: italic;">//also notice the use of &quot;this.counter&quot;</span>
        <span style="color: #006600; font-style: italic;">//&quot;this&quot; is the hash</span>
        <span style="color: #006600; font-style: italic;">//and &quot;counter&quot; is the key</span>

        <span style="color: #006600; font-style: italic;">//again, more on this below</span>
	<span style="color: #003366; font-weight: bold;">var</span> currentTime <span style="color: #339933;">=</span> <span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">counter</span><span style="color: #339933;">++;</span>
        <span style="color: #006600; font-style: italic;">//here we change the content of the timer display div to the current time</span>

	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'timer_display'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'text'</span><span style="color: #339933;">,</span> currentTime<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
        <span style="color: #006600; font-style: italic;">//this changes the style width, letting us easily create a timer bar</span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'timer_bar'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">setStyle</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'width'</span><span style="color: #339933;">,</span> currentTime<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
        <span style="color: #006600; font-style: italic;">//this is a simple hash with one key/value pair</span>
	<span style="color: #003366; font-weight: bold;">var</span> currentCounter <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Hash<span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>counter<span style="color: #339933;">:</span> <span style="color: #CC0000;">0</span><span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

        <span style="color: #006600; font-style: italic;">//we initiate our periodical and pass and bind the hash var</span>
	<span style="color: #003366; font-weight: bold;">var</span> simpleTimer <span style="color: #339933;">=</span> timerFunction.<span style="color: #006600;">periodical</span><span style="color: #009900;">&#40;</span><span style="color: #CC0000;">100</span><span style="color: #339933;">,</span> currentCounter<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 

&nbsp;
        <span style="color: #006600; font-style: italic;">//since we dont want the timer starting onload, we stop it</span>
	$clear<span style="color: #009900;">&#40;</span>simpleTimer<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
        <span style="color: #006600; font-style: italic;">//add an event to the start button</span>
        <span style="color: #006600; font-style: italic;">//this sets the timer going again</span>
        $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'timer_start'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;click&quot;</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		simpleTimer <span style="color: #339933;">=</span> timerFunction.<span style="color: #006600;">periodical</span><span style="color: #009900;">&#40;</span><span style="color: #CC0000;">100</span><span style="color: #339933;">,</span> currentCounter<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
        <span style="color: #006600; font-style: italic;">//this clears the periodical, and highlights the timer bar</span>

	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'timer_stop'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;click&quot;</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		$clear<span style="color: #009900;">&#40;</span>simpleTimer<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'timer_bar'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#EFE02F'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'timer_reset'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;click&quot;</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
                <span style="color: #006600; font-style: italic;">//reset first clears the periodical</span>

		$clear<span style="color: #009900;">&#40;</span>simpleTimer<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
                <span style="color: #006600; font-style: italic;">//and sets the counter to 0</span>
                <span style="color: #006600; font-style: italic;">//more on this later</span>
		currentCounter.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'counter'</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">0</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

                <span style="color: #006600; font-style: italic;">//</span>
		$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'timer_display'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'text'</span><span style="color: #339933;">,</span> currentCounter.<span style="color: #006600;">counter</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'timer_bar'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">setStyle</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'width'</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">0</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p><button id="timer_start">start</button><br />
<button id="timer_stop">pause</button><br />
<button id="timer_reset">reset</button></p>
<div id="timper_bar_wrap"></div>
<div id="timer_display">0</div>
<h3>Intro to Hashes</h3>

<h4>Creating a new hash</h4>
<p>There are a few things in that example you may not have seen before.  First of all, we are using a hash.  Hashes are sets of key/value pairs, and they are similar to an array in that they hold multiple objects, but each object they hold is also assigned a key.  First, lets look at how to build a new hash:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> hashVar <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Hash<span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
     <span style="color: #3366CC;">'firstKey'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">0</span><span style="color: #339933;">,</span>

     <span style="color: #3366CC;">'secondKey'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">0</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>So you put the key on the left and the value on the right (as an aside to those of you out there who are familiar with hashes, we are only covering hashes at the most fundamental level.  We are going to reserve storing functions within hashes until we have had a chance to talk about classes).  Anyhow, there are many advantages to using a system like this.  First of all, you can multiple sets in a single object.  Retrieval becomes much simpler and its great for keeping complex data organized.</p>
<h4>.set() and .get()</h4>
<p>You can also use the familiar .set() and .get() with hash keys.  When you want set, you declare the key, then the value to set to.  When you want to get, you just declare what key you want.  That&#8217;s all there is to it.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//assuming the hash above</span>
<span style="color: #006600; font-style: italic;">//here we set the firstKay to 200</span>
hashVar.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'firstKey'</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">200</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//here we get the value of firstKey, which is now 200</span>
<span style="color: #003366; font-weight: bold;">var</span> hashValue <span style="color: #339933;">=</span> hashVar.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'firstKey'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>You can also get a value by refering to hash.keyName:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> hashValue <span style="color: #339933;">=</span> hashVar.<span style="color: #006600;">firstKey</span><span style="color: #339933;">;</span>
<span style="color: #006600; font-style: italic;">//is the same as</span>
<span style="color: #003366; font-weight: bold;">var</span> hashValue <span style="color: #339933;">=</span> hashVar.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'firstKey'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>Adding a new pair to a hash</h4>
<p><strong>.extend();</strong></p>
<p>You can add a new set of key/value pairs (or several sets) with .extend().   First, let&#8217;s create a new pair object.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//this is a generic object</span>
<span style="color: #006600; font-style: italic;">//it contains key value pairs</span>
<span style="color: #006600; font-style: italic;">//but not the capabilities of a hash</span>
<span style="color: #003366; font-weight: bold;">var</span> genericObject <span style="color: #339933;">=</span> <span style="color: #009900;">&#123;</span>

    <span style="color: #3366CC;">'third'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">450</span><span style="color: #339933;">,</span>
    <span style="color: #3366CC;">'fourth'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">89</span>
<span style="color: #009900;">&#125;</span><span style="color: #339933;">;</span></pre></div></div>

<p>If we want to add this set of pairs to our existing hash, we just .extend(); the original hash to make room.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//now hashVar contains all the pairs within genericObject</span>
hashVar.<span style="color: #006600;">extend</span><span style="color: #009900;">&#40;</span>genericObject<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p><strong>Note:</strong> Any duplicate keys will be overridden by the second set.  So, if you have &#8220;firstKey&#8221;: &#8220;letterA&#8221; in the original hash, and you extend it with the &#8220;firstKey&#8221;: &#8220;letterB,&#8221; the resulting hash would read, &#8220;firstKey&#8221;: &#8220;letterB.&#8221;</p>

<h4>Combining two hashes</h4>
<p><strong>.combine();</strong></p>
<p>This lets you combine two hashes, and keeps the original if there are duplicate keys.  Other than that, works just like .extend.</p>
<h4>Removing pair from a hash</h4>
<p><strong>.erase();</strong></p>
<p>We have seen this one before.  It works just like you would expect.  You state the hash, then tack on .erase();, and finally you put the &#8216;key&#8217; inside the (parenthesis)</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">hashVar.<span style="color: #006600;">erase</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'firstKey'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>Hashes and .each()</h4>
<p>Hashes have a special relationship with .each(), and when you iterate through a hash, the each function will pass you the &#8220;value&#8221; as the first parameter and the &#8220;key&#8221; as the second -  like when you use .each on an array and it includes each &#8220;item&#8221; as the first parameter.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">hashVar.<span style="color: #006600;">each</span><span style="color: #009900;">&#40;</span><span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>value<span style="color: #339933;">,</span> key<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
    <span style="color: #006600; font-style: italic;">//this would send up one alert for each pair in the hash</span>
    <span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span>key <span style="color: #339933;">+</span> <span style="color: #3366CC;">&quot;:&quot;</span> <span style="color: #339933;">+</span> value<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h3>To Learn More&#8230;</h3>
<p>That&#8217;s all we are going to cover on hashes for now.  As we get further into the series, we&#8217;ll find some opportunities to look at other capabilities.  But for now, hopefully this can serve as an introduction to the concept if you are new to this sort of thing.  Soon enough, we are going to be covering classes, and then things will really start to come together.  In the meantime, check out the <a>hashes</a> section of the docs.</p>
<h4><a href="http://web.archive.org/web/20090205211654/http://www.consideropen.com/downloads/30days_of_moo/mootorial_day14_periodical.zip">Download a zip with everything you need to get started</a></h4>
<p>Including the Mootools 1.2 core, the examples above, an external javascript file, a simple html page and a css file.</p>
<h4>Tomorrow&#8217;s Tutorial</h4>

<p><a href="http://web.archive.org/web/20090205211654/http://www.consideropen.com/blog/2008/09/30-days-of-mootools-12-tutorials-day-15-sliders/">Learn how to set up and configure a Mootools slider</a></p>
<h3>Questions, Comments, Suggestions</h3>
<p>If you have anything to add to our discussion on Hashes or you are curious about the capabilities of the periodical function, feel free to drop a note.  Any other questions or suggestions are welcome.  Thanks and hope you find these tutorials useful.</p>
					