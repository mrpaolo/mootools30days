<h2>Displaying elements with Fx.Slide</h2>
<p>Welcome to day 23 of 30 days of Mootools 1.2 tutorials.  If you haven&#8217;t already, be sure to check out <a href="http://web.archive.org/web/20090210043547/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-1-intro-to-the-library/">the rest of our mootools series</a>.  Continuing with our tutorials about the Fx plugins, we are going to take a look at Fx.Slide.  This plugin lets you display content by sliding it into view.  It is very simple to use and makes a great addition to your UI toolkit.</p>

<h3>The Basics</h3>
<p>Like all the other classes we have looked at, the first thing you need to do is initiate a new instance of the Fx.Slide class and apply it to an element.</p>
<p>First, lets set up our html for the slide element.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #339933;">&lt;</span>div id<span style="color: #339933;">=</span><span style="color: #3366CC;">&quot;slide_element&quot;</span> <span style="color: #003366; font-weight: bold;">class</span><span style="color: #339933;">=</span><span style="color: #3366CC;">&quot;slide&quot;</span><span style="color: #339933;">&gt;</span>Here <span style="color: #000066; font-weight: bold;">is</span> some content to slide.<span style="color: #339933;">&lt;/</span>div<span style="color: #339933;">&gt;</span></pre></div></div>

<p>And our css doesn&#8217;t need to be anything fancy.</p>

<div class="wp_syntax"><div class="code"><pre class="css"><span style="color: #6666ff;">.slide</span> <span style="color: #66cc66;">&#123;</span>
	<span style="color: #000000; font-weight: bold;">margin</span><span style="color: #66cc66;">:</span> <span style="color: #933;">20px</span> <span style="color: #933;">0</span><span style="color: #66cc66;">;</span> 
	<span style="color: #000000; font-weight: bold;">padding</span><span style="color: #66cc66;">:</span> <span style="color: #933;">10px</span><span style="color: #66cc66;">;</span>

	<span style="color: #000000; font-weight: bold;">width</span><span style="color: #66cc66;">:</span> <span style="color: #933;">200px</span><span style="color: #66cc66;">;</span>
	<span style="color: #000000; font-weight: bold;">background-color</span><span style="color: #66cc66;">:</span> <span style="color: #cc00cc;">#DAF7B4</span><span style="color: #66cc66;">;</span>
<span style="color: #66cc66;">&#125;</span></pre></div></div>

<p>Finally, we initiate a new instance of Fx.Slide and pass it our element variable.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> slideElement <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'slide_element'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> slideVar <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Slide</span><span style="color: #009900;">&#40;</span>slideElement<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

	<span style="color: #006600; font-style: italic;">//Fx.Slide Options</span>
	mode<span style="color: #339933;">:</span> <span style="color: #3366CC;">'vertical'</span><span style="color: #339933;">,</span> <span style="color: #006600; font-style: italic;">//default is 'vertical'</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//Fx Options</span>
	transition<span style="color: #339933;">:</span> <span style="color: #3366CC;">'sine:in'</span><span style="color: #339933;">,</span>

	duration<span style="color: #339933;">:</span> <span style="color: #CC0000;">300</span><span style="color: #339933;">,</span> 
&nbsp;
	<span style="color: #006600; font-style: italic;">//Fx Events</span>
	onStart<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'start'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;#EBCC22&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Since Fx.Slide is an extension of Fx, you can use any of the <a href="http://web.archive.org/web/20090210043547/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-11-using-fxmorph-fx-options-and-fx-events/">Fx options and events</a>, but Fx.Slide does come with a set of options itself.</p>

<h3>Fx.Slide options</h3>
<p>There are only two Fx.Slide options, &#8216;mode&#8217; and &#8216;wrapper.&#8217;  Frankly, I have never found myself using &#8216;wrapper&#8217; (I have never come across the need), but &#8216;mode&#8217; is what determines whether you want to slide horizontally or vertically.</p>

<h4>mode</h4>
<p>Mode gives you two choices, &#8216;vertical&#8217; or &#8216;horizontal&#8217;.  Vertical reveals from top to bottom and horizontal reveals from left to right.  There are no options to go from bottom to top or from right to left, tho I understand that hacking the class itself to accomplish this is relatively simple.  In my opinion, it&#8217;s an option I would like to see standard, and if anyone has hacked the class to allow this options, please drop us a note.</p>
<h4>wrapper</h4>
<p>By default, Fx.Slide throws a wrapper around your slide element, giving it &#8216;overflow&#8217;: &#8216;hidden&#8217;.  Wrapper allows you to set another element as the wrapper.  Like I said above, I am not clear on where this would come in handy and would be interested to hear any thoughts (thanks to horseweapon at <a href="http://web.archive.org/web/20090210043547/http://www.consideropen.com/blog/2008/12/30-days-of-mootools-12-tutorials-day-23-fxslide/www.mooforum.net">mooforum.net</a> for helping me clear this up).</p>

<h3>Fx.Slide methods</h3>
<p>Fx.Slide also features many methods for showing and hiding your element.</p>
<h4>.slideIn()</h4>
<p>As the name implies, this method will fire the start event and reveal your element.</p>
<h4>.slideOut()</h4>
<p>Slides your element back to the hidden state.</p>
<h4>.toggle()</h4>
<p>This will either slide the element in or out, depending on its current state.  Very useful method to add to click events.</p>
<h4>.hide()</h4>

<p>This will hide the element without a slide effect.</p>
<h4>.show()</h4>
<p>This will show the element without a slide effect</p>
<h4>override mode with methods</h4>
<p>Each of the methods above also accept &#8216;mode&#8217; as an optional parameter, letting you override anything set in the options.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">slideVar.<span style="color: #006600;">slideIn</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'horizontal'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h3>Fx.Slide shortcuts</h3>
<p>The Fx.Slide class also provides some handy shortcuts for adding the effect to an element.</p>
<h4>.set(&#8217;slide&#8217;);</h4>
<p>Instead of initiating a new class, you can create a new instance if you &#8217;set&#8217; slide on an element.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">slideElement.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'slide'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>setting options</h4>
<p>You can even set options with the shortcut:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">slideElement.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'slide'</span><span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>duration<span style="color: #339933;">:</span> <span style="color: #CC0000;">1250</span><span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>.slide()</h4>
<p>Once the slide is .set(), you can initiate it with the .slide() method.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">slideElement.<span style="color: #006600;">slide</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'in'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>.slide will accept:</p>
<ul>
<li>&#8216;in&#8217;</li>

<li>&#8216;out&#8217;</li>
<li>&#8216;toggle&#8217;</li>
<li>&#8217;show&#8217;</li>
<li>&#8216;hide&#8217;</li>
</ul>
<p>&#8230;each corresponding to the methods above.</p>
<h3>Example</h3>
<p>That pretty much covers the basics.  The example below uses most of what we learned above, displays a few different types of slides, and provides some indicator divs so you can watch the events.</p>
<p>First, set up the html.</p>

<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;start&quot; class=&quot;ind&quot;&gt;Start&lt;/div&gt;
&lt;div id=&quot;cancel&quot; class=&quot;ind&quot;&gt;Cancel&lt;/div&gt;

&lt;div id=&quot;complete&quot; class=&quot;ind&quot;&gt;Complete&lt;/div&gt;
&lt;br /&gt;&lt;br /&gt;
&nbsp;
&lt;button id=&quot;openA&quot;&gt;open A&lt;/button&gt;

&lt;button id=&quot;closeA&quot;&gt;close A&lt;/button&gt;
&lt;div id=&quot;slideA&quot; class=&quot;slide&quot;&gt;Here is some content - A. Notice the delay before onComplete fires.  This is due to the transition effect, the onComplete will not fire until the slide element stops &quot;elasticing.&quot; Also, notice that if you click back and forth, it will &quot;cancel&quot; the previous call and give the new one priority.&lt;/div&gt;

&nbsp;
&lt;button id=&quot;openB&quot;&gt;open B&lt;/button&gt;
&lt;button id=&quot;closeB&quot;&gt;close B&lt;/button&gt;
&lt;div id=&quot;slideB&quot; class=&quot;slide&quot;&gt;Here is some content - B. Notice how if you click me multiple times quickly I &quot;chain&quot; the events.  This slide is set up with the option &quot;link: 'chain'&quot;&lt;/div&gt;

&nbsp;
&lt;button id=&quot;openC&quot;&gt;toggle C&lt;/button&gt;
&lt;div id=&quot;slideC&quot; class=&quot;slide&quot;&gt;Here is some content - C&lt;/div&gt;
&nbsp;
&lt;button id=&quot;openD&quot;&gt;toggle D&lt;/button&gt;

&lt;div id=&quot;slideD&quot; class=&quot;slide&quot;&gt;Here is some content - D. Notice how I am not hooked into any events.  This was done with the .slide shortcut.&lt;/div&gt;
&nbsp;
&lt;button id=&quot;openE&quot;&gt;toggle E&lt;/button&gt;
&nbsp;
&lt;div id=&quot;slide_wrap&quot;&gt;

&lt;div id=&quot;slideE&quot; class=&quot;slide&quot;&gt;Here is some content - E&lt;/div&gt;
&lt;/div&gt;</pre></div></div>

<p>Now, our css.  We can keep it pretty simple.</p>

<div class="wp_syntax"><div class="code"><pre class="css"><span style="color: #6666ff;">.ind</span> <span style="color: #66cc66;">&#123;</span>

	<span style="color: #000000; font-weight: bold;">width</span><span style="color: #66cc66;">:</span> <span style="color: #933;">200px</span><span style="color: #66cc66;">;</span>
	<span style="color: #000000; font-weight: bold;">padding</span><span style="color: #66cc66;">:</span> <span style="color: #933;">10px</span><span style="color: #66cc66;">;</span>
	<span style="color: #000000; font-weight: bold;">background-color</span><span style="color: #66cc66;">:</span> <span style="color: #cc00cc;">#87AEE1</span><span style="color: #66cc66;">;</span>

	<span style="color: #000000; font-weight: bold;">font-weight</span><span style="color: #66cc66;">:</span> <span style="color: #993333;">bold</span><span style="color: #66cc66;">;</span>
	<span style="color: #000000; font-weight: bold;">border-bottom</span><span style="color: #66cc66;">:</span> <span style="color: #933;">1px</span> <span style="color: #993333;">solid</span> <span style="color: #993333;">white</span><span style="color: #66cc66;">;</span>

<span style="color: #66cc66;">&#125;</span>
&nbsp;
<span style="color: #6666ff;">.slide</span> <span style="color: #66cc66;">&#123;</span>
	<span style="color: #000000; font-weight: bold;">margin</span><span style="color: #66cc66;">:</span> <span style="color: #933;">20px</span> <span style="color: #933;">0</span><span style="color: #66cc66;">;</span> 
	<span style="color: #000000; font-weight: bold;">padding</span><span style="color: #66cc66;">:</span> <span style="color: #933;">10px</span><span style="color: #66cc66;">;</span>

	<span style="color: #000000; font-weight: bold;">width</span><span style="color: #66cc66;">:</span> <span style="color: #933;">200px</span><span style="color: #66cc66;">;</span>
	<span style="color: #000000; font-weight: bold;">background-color</span><span style="color: #66cc66;">:</span> <span style="color: #cc00cc;">#DAF7B4</span><span style="color: #66cc66;">;</span>
<span style="color: #66cc66;">&#125;</span>
&nbsp;
<span style="color: #cc00cc;">#slide_wrap</span> <span style="color: #66cc66;">&#123;</span>

	<span style="color: #000000; font-weight: bold;">padding</span><span style="color: #66cc66;">:</span> <span style="color: #933;">30px</span><span style="color: #66cc66;">;</span>
	<span style="color: #000000; font-weight: bold;">background-color</span><span style="color: #66cc66;">:</span> <span style="color: #cc00cc;">#D47000</span><span style="color: #66cc66;">;</span>
<span style="color: #66cc66;">&#125;</span></pre></div></div>

<p>Finally, our mootools javascript:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//EXAMPLE A</span>
	<span style="color: #003366; font-weight: bold;">var</span> slideElement <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'slideA'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
	<span style="color: #003366; font-weight: bold;">var</span> slideVar <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Slide</span><span style="color: #009900;">&#40;</span>slideElement<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>
		<span style="color: #006600; font-style: italic;">//Fx.Slide Options</span>

		mode<span style="color: #339933;">:</span> <span style="color: #3366CC;">'horizontal'</span><span style="color: #339933;">,</span> <span style="color: #006600; font-style: italic;">//default is 'vertical'</span>
		<span style="color: #006600; font-style: italic;">//wrapper: this.element, //default is this.element</span>
&nbsp;
		<span style="color: #006600; font-style: italic;">//Fx Options</span>
		link<span style="color: #339933;">:</span> <span style="color: #3366CC;">'cancel'</span><span style="color: #339933;">,</span>

		transition<span style="color: #339933;">:</span> <span style="color: #3366CC;">'elastic:out'</span><span style="color: #339933;">,</span>
		duration<span style="color: #339933;">:</span> <span style="color: #3366CC;">'long'</span><span style="color: #339933;">,</span> 
&nbsp;
		<span style="color: #006600; font-style: italic;">//Fx Events</span>

		onStart<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
			$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'start'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;#EBCC22&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>

&nbsp;
		onCancel<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
			$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'cancel'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;#EBCC22&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>

&nbsp;
		onComplete<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
			$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'complete'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;#EBCC22&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">&#125;</span>

	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">hide</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">show</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">hide</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> <span style="color: #006600; font-style: italic;">//note, .hide and .show do not fire events </span>
&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'openA'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		slideVar.<span style="color: #006600;">slideIn</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'closeA'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		slideVar.<span style="color: #006600;">slideOut</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
&nbsp;
&nbsp;
	<span style="color: #006600; font-style: italic;">//EXAMPLE B</span>
	<span style="color: #003366; font-weight: bold;">var</span> slideElementB <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'slideB'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
	<span style="color: #003366; font-weight: bold;">var</span> slideVarB <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Slide</span><span style="color: #009900;">&#40;</span>slideElementB<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>
		<span style="color: #006600; font-style: italic;">//Fx.Slide Options</span>

		mode<span style="color: #339933;">:</span> <span style="color: #3366CC;">'vertical'</span><span style="color: #339933;">,</span> <span style="color: #006600; font-style: italic;">//default is 'vertical'</span>
&nbsp;
		<span style="color: #006600; font-style: italic;">//Fx Options</span>
		<span style="color: #006600; font-style: italic;">//notice how chaining lets you click multiple time </span>
		<span style="color: #006600; font-style: italic;">//then mouse away and the effects will keep going</span>

		<span style="color: #006600; font-style: italic;">//for every click</span>
		link<span style="color: #339933;">:</span> <span style="color: #3366CC;">'chain'</span><span style="color: #339933;">,</span> 
&nbsp;
		<span style="color: #006600; font-style: italic;">//Fx Events</span>
		onStart<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

			$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'start'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;#EBCC22&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
&nbsp;
		onCancel<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

			$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'cancel'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;#EBCC22&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
&nbsp;
		onComplete<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

			$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'complete'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;#EBCC22&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">&#125;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'openB'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		slideVarB.<span style="color: #006600;">slideIn</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'closeB'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		slideVarB.<span style="color: #006600;">slideOut</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//EXAMPLE C</span>
	<span style="color: #003366; font-weight: bold;">var</span> slideElementC <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'slideC'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
	<span style="color: #003366; font-weight: bold;">var</span> slideVarC <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Slide</span><span style="color: #009900;">&#40;</span>slideElementC<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>
		<span style="color: #006600; font-style: italic;">//Fx.Slide Options</span>

		mode<span style="color: #339933;">:</span> <span style="color: #3366CC;">'vertical'</span><span style="color: #339933;">,</span> <span style="color: #006600; font-style: italic;">//default is 'vertical'</span>
		<span style="color: #006600; font-style: italic;">//wrapper: this.element, //default is this.element</span>
&nbsp;
		<span style="color: #006600; font-style: italic;">//Fx Options</span>
		<span style="color: #006600; font-style: italic;">//link: 'cancel',</span>

		transition<span style="color: #339933;">:</span> <span style="color: #3366CC;">'sine:in'</span><span style="color: #339933;">,</span>
		duration<span style="color: #339933;">:</span> <span style="color: #CC0000;">300</span><span style="color: #339933;">,</span> 
&nbsp;
&nbsp;
		<span style="color: #006600; font-style: italic;">//Fx Events</span>

		onStart<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
			$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'start'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;#EBCC22&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>

&nbsp;
		onCancel<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
			$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'cancel'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;#EBCC22&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>

&nbsp;
		onComplete<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
			$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'complete'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;#EBCC22&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">&#125;</span>

	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">hide</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'openC'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		slideVarC.<span style="color: #006600;">toggle</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'slideD'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">slide</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'hide'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'openD'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'slideD'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">slide</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'toggle'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//EXAMPLE C</span>
	<span style="color: #003366; font-weight: bold;">var</span> slideElementE <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'slideE'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #003366; font-weight: bold;">var</span> slideWrap <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'slide_wrap'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #003366; font-weight: bold;">var</span> slideVarE <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Slide</span><span style="color: #009900;">&#40;</span>slideElementE<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

		<span style="color: #006600; font-style: italic;">//Fx.Slide Options</span>
		<span style="color: #006600; font-style: italic;">//mode: 'vertical', //default is 'vertical'</span>
		wrapper<span style="color: #339933;">:</span> slideWrap <span style="color: #006600; font-style: italic;">//default is this.element</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">hide</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 

&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'openE'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		slideVarE.<span style="color: #006600;">toggle</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<div id="start" class="ind">Start</div>
<div id="cancel" class="ind">Cancel</div>
<div id="complete" class="ind">Complete</div>
<p><button id="openA">open A</button><br />
<button id="closeA">close A</button></p>
<div id="slideA" class="slide">Here is some content - A. Notice the delay before onComplete fires.  This is due to the transition effect, the onComplete will not fire until the slide element stops &#8220;elasticing.&#8221; Also, notice that if you click back and forth, it will &#8220;cancel&#8221; the previous call and give the new one priority.</div>

<p><button id="openB">open B</button><br />
<button id="closeB">close B</button></p>
<div id="slideB" class="slide">Here is some content - B. Notice how if you click me multiple times quickly I &#8220;chain&#8221; the events.  This slide is set up with the option &#8220;link: &#8216;chain&#8217;&#8221;</div>
<p><button id="openC">toggle C</button></p>
<div id="slideC" class="slide">Here is some content - C</div>
<p><button id="openD">toggle D</button></p>

<div id="slideD" class="slide">Here is some content - D. Notice how I am not hooked into any events.  This was done with the .slide shortcut.</div>
<p><button id="openE">toggle E</button></p>
<div id="slide_wrap">
<div id="slideE" class="slide">Here is some content - E</div>
</div>
<h3>To Learn More&#8230;</h3>
<p>Fx.Slide is a versatile and incredibly useful plugin.  To learn more, check out the <a href="http://web.archive.org/web/20090210043547/http://mootools.net/docs/Plugins/Fx.Slide">Fx.Slide docs</a>, the <a href="http://web.archive.org/web/20090210043547/http://mootools.net/docs/Fx/Fx.Morph">Fx.Morph</a> and <a href="http://web.archive.org/web/20090210043547/http://mootools.net/docs/Fx/Fx">Fx docs</a>.</p>

<p>Also, be sure to check <a href="http://web.archive.org/web/20090210043547/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-11-using-fxmorph-fx-options-and-fx-events/">our tutorials on Fx.Morph and the Fx options and events</a>.</p>
<h4><a href="http://web.archive.org/web/20090210043547/http://www.consideropen.com/downloads/30days_of_moo/mootorial_day23_FxSlide.zip">Download a zip of the final example</a></h4>
<p>Along with everything you need to get started.</p>
<h4>Tomorrow&#8217;s Tutorial</h4>
<p>Will post a link once it is published</p>
<h3>Questions, Comments or Suggestions</h3>
<p>I wanted to get this one in before we got away from the basics, as its such a commonly used plugin. As always, hope you find this useful and let us know if you have any questions, comments or suggestions.</p>

					