<h2>Mootools 1.2 Tooltips Tutorial</h2>
<p><strong>Note</strong>: I have somehow broken the examples in IE, I&#8217;ll fix it as soon as I can and post what the problem turned out to be.  Thanks.<br />

If you haven&#8217;t already, be sure and check out the rest of the <a href="http://web.archive.org/web/20090214072209/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-1-intro-to-the-library">Mootools 1.2 tutorials</a> in our 30 days series.</p>
<p>Today we are going check out the Mootools tooltip bundled plugin.  With &#8220;Tips,&#8221; you can easily add custom tooltips with a title and content, custom styles, and fade in/out effects.  We will examine the tooltips options and events, as well as a few tools that will let you add and remove tooltips from elements.  Finally, we will learn how to have multiple styles of tooltips on the same page.</p>
<h3>The Basics</h3>
<h4>Creating a new tooltip</h4>
<p>Creating new tooltips is very simple.  First, let&#8217;s create the element where we will attach our tool tip.</p>

<div class="wp_syntax"><div class="code"><pre>&lt;a&gt;
&lt;/a&gt;&lt;a id=&quot;tooltipID1&quot; class=&quot;tooltip&quot; title=&quot;1st Tooltip Title&quot; rel=&quot;here is the default 'text' of 1&quot; href=&quot;http://www.consideropen.com&quot;&gt;Tool tip 1&lt;/a&gt;</pre></div></div>

<p>Mootools 1.2 tool tips will display the title and the rel text by default.  If there is no rel copy, it will display the href.</p>
<p>To create a new default tool tip:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> customTips <span style="color: #339933;">=</span> $$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.tooltip'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #003366; font-weight: bold;">var</span> toolTips <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Tips<span style="color: #009900;">&#40;</span>customTips<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Without any styling, you will get a tool tip that looks like this:</p>
<p><a id="tooltipIDA" class="tooltipA" title="1st Tooltip Title" rel="here is the default 'text' of 1" href="http://web.archive.org/web/20090214072209/http://www.consideropen.com/">Tool tip 1</a></p>
<h4>Styling your tooltip</h4>
<p>The mootools output gives you a lot of control over the style—take a look at the tooltip html:</p>

<div class="wp_syntax"><div class="code"><pre>//you can assign a class name for the tooltip wrap
//in the options
&lt;div class=&quot;options.className&quot;&gt;
&lt;div class=&quot;tip&quot;&gt;&lt;/div&gt;

&lt;/div&gt;</pre></div></div>

<p>Notice the top and bottom divs.  This lets you easily add rounded top and bottom sections, or other style effects.</p>
<p>Now, lets set up our first option and add some CSS.  The html above features a wrap div with the class name &#8220;options.className.&#8221;  By assigning a class name to your tips, you can style them individually and not style all mootools tooltips on your page.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> customTipsB <span style="color: #339933;">=</span> $$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.tooltipB'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #003366; font-weight: bold;">var</span> toolTipsB <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Tips<span style="color: #009900;">&#40;</span>customTipsB<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>
    className<span style="color: #339933;">:</span> <span style="color: #3366CC;">'custom_tip'</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Finally, we add some CSS:</p>

<div class="wp_syntax"><div class="code"><pre>.custom_tip .tip {
	background-color: #333<SEMI>
	padding: 5px<SEMI>
}
&nbsp;
.custom_tip .tip-title {
	color: #fff<SEMI>
	background-color: #666<SEMI>

	font-size: 20px<SEMI>
	padding: 5px<SEMI>
}
&nbsp;
.custom_tip .tip-text {
	color: #fff<SEMI>
	padding: 5px<SEMI>
}</pre></div></div>

<p><a id="tooltipIDB" class="tooltipB" title="2nd Tooltip Title" rel="here is the default 'text' of 2" href="http://web.archive.org/web/20090214072209/http://www.consideropen.com/">Tool tip 2</a></p>

<h3>Options</h3>
<p>There are only five options in Tips and they are all pretty self explanatory.</p>
<h4>showDelay</h4>
<p>Default is 100</p>
<p>An integer measured in milliseconds, this will determine the delay before the tooltip shows once the user mouses onto the element.</p>
<h4>hideDelay</h4>
<p>Default is 100</p>
<p>Just like showDelay above, except this integer (also measured in milliseconds) will determine how long to to wait before hiding the tip once the user leaves the element.</p>
<h4>className</h4>

<p>Default is null</p>
<p>Like we saw in the example above, this lets you set a class name for the tooltip wrap.</p>
<h4>offsets</h4>
<p>Default is x: 16, y: 16</p>
<p>This determines how far away from the element the tooltip will appear.  &#8216;x&#8217; refers to the right offset, where &#8216;y&#8217; is the down offset (both relative to the cursor IF the &#8216;fixed&#8217; option is set to false, otherwise the offset if relative to the original element).</p>

<h4>fixed</h4>
<p>Default is false</p>
<p>This sets whether or not the tooltip will follow your mouse if you move around the element.  If you set it to true, the tooltip will not move when you move your cursor, but will stay fixed relative to the original element.</p>
<h3>Events</h3>
<p>The tooltip events remain simple, like the rest of this class.  There are two events, onShow and onHide, and they work as you would expect.</p>
<h4>onShow</h4>
<p>This event fires when the tooltip shows.  If you set a delay, this event will not fire until the delay is up.</p>
<h4>onHide</h4>
<p>Just like onShow above, but this fires then the tip hides. If there is a delay, this event will not fire until the delay is up.</p>

<h3>Methods</h3>
<p>There are two methods for Tips, attach and detach.  This lets you target a specific element and add it to a tooltip object (and thereby inherent all the settings in that class instance) or detach a particular element.</p>
<h4>.attach();</h4>
<p>To attach a new element to a tooltip object, just state the Tip object, the tack on .attach();, and finally place the element selector within ().</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">toolTips.<span style="color: #006600;">attach</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#tooltipID3'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>.dettach();</h4>

<p>This method works just .attach, but has the opposite outcome.  First, state the Tip object, then add .dettach(), and finally place your element selector within ().</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">toolTips.<span style="color: #006600;">dettach</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#tooltipID3'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h3>Example</h3>
<p>For this example, we will create two instances of the Tips plugin, so we can have two different styles of tooltips.  We will also integrate the options, events and methods we saw above.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> customTips <span style="color: #339933;">=</span> $$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.tooltip'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> toolTips <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Tips<span style="color: #009900;">&#40;</span>customTips<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//this will set how long before</span>
	<span style="color: #006600; font-style: italic;">//the tooltip will wait to show up</span>

	<span style="color: #006600; font-style: italic;">//when you mouseover the element</span>
	<span style="color: #006600; font-style: italic;">//in milliseconds</span>
	showDelay<span style="color: #339933;">:</span> <span style="color: #CC0000;">1000</span><span style="color: #339933;">,</span>    <span style="color: #006600; font-style: italic;">//default is 100</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//this is how long the tooltip</span>

	<span style="color: #006600; font-style: italic;">//will delay bofore hiding</span>
	<span style="color: #006600; font-style: italic;">//when you leave</span>
	hideDelay<span style="color: #339933;">:</span> <span style="color: #CC0000;">100</span><span style="color: #339933;">,</span>   <span style="color: #006600; font-style: italic;">//default is 100</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//this will add a wrapper div</span>

	<span style="color: #006600; font-style: italic;">//with the following class to your tooltips</span>
	<span style="color: #006600; font-style: italic;">//this lets you have different styles of tooltips</span>
	<span style="color: #006600; font-style: italic;">//on the same page</span>
	className<span style="color: #339933;">:</span> <span style="color: #3366CC;">'anything'</span><span style="color: #339933;">,</span> <span style="color: #006600; font-style: italic;">//default is null</span>

&nbsp;
	<span style="color: #006600; font-style: italic;">//this sets the x and y offets</span>
	offsets<span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>
		<span style="color: #3366CC;">'x'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">100</span><span style="color: #339933;">,</span>       <span style="color: #006600; font-style: italic;">//default is 16</span>

		<span style="color: #3366CC;">'y'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">16</span>        <span style="color: #006600; font-style: italic;">//default is 16</span>
	<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//this determines whether the tooltip</span>
	<span style="color: #006600; font-style: italic;">//remains staitionary or follows your cursor</span>

	<span style="color: #006600; font-style: italic;">//true makes it stationary</span>
 	fixed<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">false</span><span style="color: #339933;">,</span>      <span style="color: #006600; font-style: italic;">//default is false</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//if you call the functions outside of the options</span>

	<span style="color: #006600; font-style: italic;">//then it may &quot;flash&quot; a bit on transitions</span>
	<span style="color: #006600; font-style: italic;">//much smoother if you leave them in here</span>
	onShow<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>toolTipElement<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	    <span style="color: #006600; font-style: italic;">//passes the tooltip element</span>

		<span style="color: #006600; font-style: italic;">//you can fade in to full opacity</span>
		<span style="color: #006600; font-style: italic;">//or leave them a little transparent</span>
    	toolTipElement.<span style="color: #006600;">fade</span><span style="color: #009900;">&#40;</span>.<span style="color: #CC0000;">8</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'show'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#FFF504'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
	onHide<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>toolTipElement<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
    	toolTipElement.<span style="color: #006600;">fade</span><span style="color: #009900;">&#40;</span><span style="color: #CC0000;">0</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'hide'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#FFF504'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> toolTipsTwo <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Tips<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.tooltip2'</span><span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

	className<span style="color: #339933;">:</span> <span style="color: #3366CC;">'something_else'</span><span style="color: #339933;">,</span> <span style="color: #006600; font-style: italic;">//default is null</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//you can change the tooltips values by using .store();</span>
<span style="color: #006600; font-style: italic;">//to override the rel, you can use the following code</span>
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tooltipID1'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">store</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tip:text'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'You can replace the href with whatever text you want.'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tooltipID1'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">store</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tip:title'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'Here is a new title.'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//the following code will not change the tooltip text</span>
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tooltipID1'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'rel'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'This will not change the tooltips text'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tooltipID1'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'title'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'This will not change the tooltips title'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
toolTips.<span style="color: #006600;">detach</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#tooltipID2'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
toolTips.<span style="color: #006600;">detach</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#tooltipID4'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

toolTips.<span style="color: #006600;">attach</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#tooltipID4'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<div id="show" class="ind">onShow</div>
<div id="hide" class="ind">onHide</div>
<p><!-- the rel will be the text, but if you don't fill in a rel, it will show the href --><br />
<a id="tooltipID1" class="tooltip" title="1st Tooltip Title" rel="here is the default 'text' of 1" href="http://web.archive.org/web/20090214072209/http://www.consideropen.com/">Tool tip 1</a></p>
<p><a id="tooltipID2" class="tooltip" title="2nd Tooltip Title" rel="here is the default 'text' of 2" href="http://web.archive.org/web/20090214072209/http://www.consideropen.com/blog">Tool tip is detached</a></p>
<p><a id="tooltipID3" class="tooltip" title="3rd Tooltip Title" rel="here is the default 'text' of 3" href="http://web.archive.org/web/20090214072209/http://www.consideropen.com/contact">Tool tip 3</a></p>

<p><a id="tooltipID4" class="tooltip" title="4rd Tooltip Title" rel="here is the default 'text' of 4, i was detached then attached" href="http://web.archive.org/web/20090214072209/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-1-intro-to-the-library/">Tool tip detached then attached again. </a></p>
<p><a id="tooltipID5" class="tooltip2" title="Other Tooltip Title" rel="here is the default 'text' of 'other style'" href="http://web.archive.org/web/20090214072209/http://www.consideropen.com/">A differently styled tool tip</a></p>
<h3>To Learn More&#8230;</h3>
<p>Read over the docs section on <a href="http://web.archive.org/web/20090214072209/http://docs.mootools.net/Plugins/Tips">Tips</a>.  Also, here is a great article by David Walsh on <a href="http://web.archive.org/web/20090214072209/http://davidwalsh.name/mootools-12-tooltips-customize">customizing your Mootools Tips</a>.</p>
<h4><a href="http://web.archive.org/web/20090214072209/http://www.consideropen.com/downloads/30days_of_moo/mootorial_day19_tooltips.zip">Download a zip with everything you need</a></h4>
<h4>Tomorrow&#8217;s Tutorial</h4>

<p>For day 20, we will look at a small project, <a href="http://web.archive.org/web/20090214072209/http://www.consideropen.com/blog/2008/09/30-days-of-mootools-12-tutorials-day-20-a-few-mootools-tabs/">how to create various types of tabbed content</a>.</p>
<h3>Comments, Suggestions or Questions?</h3>
					