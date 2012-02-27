<h2>Mootools 1.2 Sliders</h2>
<p>If you haven&#8217;t already, be sure and check out the rest of the <a href="http://web.archive.org/web/20090212193208/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-1-intro-to-the-library/">Mootools 1.2 tutorials</a> in our 30 days series.</p>

<p>By now, initiating these Mootools plugin objects should start seeming pretty familiar.  Slider is no different, you create your new slider, define the elements for the slider and the handle, you set your options and then create some functions for the callback events.  And though sliders do follow this familiar pattern, there are a few quirks along the way.</p>
<h3>The Basics</h3>
<h4>Creating a new slider object</h4>
<p>Lets first start with our html and css.  The basic idea is to create a div for the slider, so a long rectangle (how long depends on what we are using the slider for) and a child element to act as the knob:</p>

<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;slider&quot;&gt;&lt;div id=&quot;knob&quot;&gt;&lt;/div&gt;&lt;/div&gt;</pre></div></div>

<p>Our css can be simple also.  Just set up the width, height and background colors:</p>

<div class="wp_syntax"><div class="code"><pre>#slider {
	width: 200px<SEMI>
	height: 20px<SEMI>
	background-color: #0099FF<SEMI>
}
&nbsp;
#knob {
	width: 20px<SEMI>
	height: 20px<SEMI>

	background-color: #993333<SEMI>
}</pre></div></div>

<p>Now, we can create our new slider object.  To initiate the slider, first throw your elements into vars, then create a &#8220;new&#8221; slider object just like we did with tween, morph and drag.move:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//put your elements into variables</span>
<span style="color: #003366; font-weight: bold;">var</span> sliderObject <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'slider'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #003366; font-weight: bold;">var</span> knobObject <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'knob'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//create a  new slider object</span>
<span style="color: #006600; font-style: italic;">//define the slider element first</span>
<span style="color: #006600; font-style: italic;">//then define the knob</span>
<span style="color: #003366; font-weight: bold;">var</span> SliderObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Slider<span style="color: #009900;">&#40;</span>sliderObject <span style="color: #339933;">,</span> knobObject <span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

    <span style="color: #006600; font-style: italic;">//here are your options</span>
    <span style="color: #006600; font-style: italic;">//we will look at each one below</span>
    range<span style="color: #339933;">:</span> <span style="color: #009900;">&#91;</span><span style="color: #CC0000;">0</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">10</span><span style="color: #009900;">&#93;</span><span style="color: #339933;">,</span>
    snap<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">true</span><span style="color: #339933;">,</span>

    steps<span style="color: #339933;">:</span> <span style="color: #CC0000;">10</span><span style="color: #339933;">,</span>
    offset<span style="color: #339933;">:</span> <span style="color: #CC0000;">0</span><span style="color: #339933;">,</span>
    wheel<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">true</span><span style="color: #339933;">,</span>

    mode<span style="color: #339933;">:</span> <span style="color: #3366CC;">'horizontal'</span><span style="color: #339933;">,</span>
    <span style="color: #006600; font-style: italic;">//onchange fires when the value of step changes</span>
    <span style="color: #006600; font-style: italic;">//it will pass the current step as a parameter</span>
    onChange<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>step<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

        <span style="color: #006600; font-style: italic;">//put what you want to happen on change here</span>
        <span style="color: #006600; font-style: italic;">//you can refer to the step</span>
    <span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
    <span style="color: #006600; font-style: italic;">//ontick moves when the user drags the knob</span>
    <span style="color: #006600; font-style: italic;">//it will pass the current position (relative to the parent element)</span>
    onTick<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>pos<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

	<span style="color: #006600; font-style: italic;">//this is necessary for the knob to adjust</span>
        <span style="color: #006600; font-style: italic;">//we will talk about this more below</span>
	<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">knob</span>.<span style="color: #006600;">setStyle</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'left'</span><span style="color: #339933;">,</span> pos<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

    <span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
    <span style="color: #006600; font-style: italic;">//fires when the dragging stops</span>
    onComplete<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>step<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
        <span style="color: #006600; font-style: italic;">//put what you want to happen on complete here</span>

        <span style="color: #006600; font-style: italic;">//you can refer to the step</span>
    <span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>Slider Options</h4>
<p><strong>Snap:</strong> (defaults to false) can be a true or false value.  This determines whether the knob snaps to the steps as its dragged along the slider.</p>
<p><strong>Offset:</strong> (defaults to 0) This is the relative offset of the knob from the starting position.  Try experimenting with this one.</p>

<p><strong>Range:</strong> (defaults to false) This is a very useful option.  You can set a range of numbers that the steps will break into.  For example, if your range was [0, 200] and you had 10 steps, your steps would be 20 apart.  The range can also include negative numbers, for example [-10, 0] which is very useful when inverting the scroller (more on that below).</p>
<p><strong>Wheel:</strong> (defaults to false) Set wheel to true and the scroller will recognize the mousewheel event.  When using the mousewheel, you may have to adjust the range to ensure that the mousewheel event does not appear inverted (again, more on that later).</p>
<p><strong>Steps:</strong> (defaults to 100) The default of 100 steps is very useful as it&#8217;s easy to use as a percentage.  You can, however, set as many steps (that are usable) within reason.</p>
<p><strong>Mode:</strong> (defaults to &#8216;horizontal&#8217;) Mode will define whether a slider registers as vertical or horizontal.  However, there are a few more necessary steps to convert from horizontal and vertical.</p>

<h4>Callback Events</h4>
<p><strong>onChange:</strong> this event fires whenever the current step changes.  Passes &#8220;step.&#8221; Check out the demo below to see when it fires.</p>
<p><strong>onTick:</strong> this event fires whenever the handle position is changed. Passes &#8220;position.&#8221; Check out the demo below to see what it fires.</p>
<p><strong>onComplete:</strong> this event fires whenever the handle is let go of.  Passes &#8220;step.&#8221;   Check out the demo below to see when it fires.</p>

<h3>Example</h3>
<p>Let&#8217;s set up a demo that shows up a bit of feedback.</p>
<p><strong>.set();</strong> Take a look at the button event to see .set() in action.  It is simple to use: just call the slider object, add .set, then the step you want to go to.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> SliderObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Slider<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'slider'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'knob'</span><span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>
    <span style="color: #006600; font-style: italic;">//options</span>

	range<span style="color: #339933;">:</span> <span style="color: #009900;">&#91;</span><span style="color: #CC0000;">0</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">10</span><span style="color: #009900;">&#93;</span><span style="color: #339933;">,</span>
	snap<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">false</span><span style="color: #339933;">,</span>

	steps<span style="color: #339933;">:</span> <span style="color: #CC0000;">10</span><span style="color: #339933;">,</span>
	offset<span style="color: #339933;">:</span> <span style="color: #CC0000;">0</span><span style="color: #339933;">,</span>
	wheel<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">true</span><span style="color: #339933;">,</span>

	mode<span style="color: #339933;">:</span> <span style="color: #3366CC;">'horizontal'</span><span style="color: #339933;">,</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//callback events</span>
    onChange<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>step<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'change'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#F3F825'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'steps_number'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'html'</span><span style="color: #339933;">,</span> step<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

    <span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
    onTick<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>pos<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tick'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#F3F825'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

		$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'knob_pos'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'html'</span><span style="color: #339933;">,</span> pos<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		<span style="color: #006600; font-style: italic;">//this line is very necessary (left with horizontal)</span>
		<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">knob</span>.<span style="color: #006600;">setStyle</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'left'</span><span style="color: #339933;">,</span> pos<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
    <span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
    onComplete<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>step<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'complete'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#F3F825'</span><span style="color: #009900;">&#41;</span>

		$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'steps_complete_number'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'html'</span><span style="color: #339933;">,</span> step<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span>step<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

    <span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> SliderObjectV <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Slider<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'sliderv'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'knobv'</span><span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

	range<span style="color: #339933;">:</span> <span style="color: #009900;">&#91;</span><span style="color: #CC0000;">-10</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">0</span><span style="color: #009900;">&#93;</span><span style="color: #339933;">,</span>
	snap<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">true</span><span style="color: #339933;">,</span>

	steps<span style="color: #339933;">:</span> <span style="color: #CC0000;">10</span><span style="color: #339933;">,</span>
	offset<span style="color: #339933;">:</span> <span style="color: #CC0000;">0</span><span style="color: #339933;">,</span>
	wheel<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">true</span><span style="color: #339933;">,</span>

	mode<span style="color: #339933;">:</span> <span style="color: #3366CC;">'vertical'</span><span style="color: #339933;">,</span>
    onTick<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>pos<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #006600; font-style: italic;">//this line is very necessary (top with vertical)</span>

		<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">knob</span>.<span style="color: #006600;">setStyle</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'top'</span><span style="color: #339933;">,</span> pos<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
    <span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
	onChange<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>step<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'stepsV_number'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'html'</span><span style="color: #339933;">,</span> step<span style="color: #339933;">*</span><span style="color: #CC0000;">-1</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
    <span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #006600; font-style: italic;">//sets the vertical one to start at 0</span>
<span style="color: #006600; font-style: italic;">//without this it would start at the top</span>
SliderObjectV.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #CC0000;">0</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//sets the slider to step 7</span>
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'set_knob'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span> SliderObject.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #CC0000;">7</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<div id="slider_wrap">
<div id="change" class="indicator">
            <strong>onChange</strong><br/><br />
            passes the step you are on: <span id="steps_number"></span>
        </div>
<div id="tick" class="indicator">
            <strong>onTick</strong><br />

            passes the knob position: <span id="knob_pos"></span>
        </div>
<div id="complete" class="indicator">
            <strong>onComplete</strong><br />
            passes the current step: <span id="steps_complete_number"></span>
        </div>
<div id="slider">
<div id="knob"></div>
</p></div>

<p>        <button id="set_knob">Set knob to position 7</button></p>
<div id="sliderv">
<div id="knobv"></div>
</p></div>
<p>
        <span id="stepsV_number"></span>
	</div>
<p>Notice on the vertical example that we not only change &#8220;mode&#8221; to &#8220;vertical,&#8221; we also change .setStyle() to &#8220;top&#8221; instead of &#8220;left&#8221; within the onTick event.  Also, see how in &#8220;range&#8221; we start at -10 then go to 0.  Then, when we display the number inside onChange, we multiply the negative value by -1, resulting in the positive counterpart.  This accomplishes two things: first, it lets us change the value from 10 to 0, with 0 at the bottom.  While this could be accomplished by setting the range to 10, 0 <strong>the mousewheel becomes inverted.</strong>.  Which brings us to the second reason - the mousewheel reads the values, not the direction you want the handle to go, so the only way to have the mousewheel read the slider correctly AND have the values start at 0 on the bottom was to pull this little trick</p>

<p><strong>Note:</strong> regarding the use of &#8220;top&#8221; and &#8220;left&#8221; within the onTick event, I can&#8217;t say for sure whether or not this is &#8220;regulation&#8221; mootools.  This is just how I was able to get it to work, and I would interested to hear if there are other, possibly cleaner ways.</p>
<h3>To Learn More&#8230;</h3>
<p>As always, check out the docs section on <a href="http://web.archive.org/web/20090212193208/http://docs.mootools.net/Plugins/Slider#">sliders</a></p>

<h4>Tomorrow&#8217;s Tutorial</h4>
<p><a href="http://web.archive.org/web/20090212193208/http://www.consideropen.com/blog/2008/09/30-days-of-mootools-12-tutorials-day-16-sortables30-days-of-mootools-12-tutorials-day-16-sortables-and-intro-to-methods">Sortables Plugin and Intro to Methods</a></p>
<h4><a href="http://web.archive.org/web/20090212193208/http://www.consideropen.com/downloads/30days_of_moo/mootorial_day15_sliders.zip">Download a zip with everything you need</a></h4>
<p>Including the Mootools 1.2 core and more libraries, as well as an html file, external javascript file, a css stlye sheet and the example above.</p>
<h3>Questions, Comments or Suggestions</h3>
<p>All welcome, thanks for checking out our tutorials.  Here we are, halfway through the series.  We are going to start doing more user requests, and the series is filling in fast.  If there are any subjects you would like to see featured here, please drop us a note.  Hope you find this series useful.</p>
					