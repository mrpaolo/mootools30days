<h2>Project - A few ways to created &#8220;tabbed&#8221; content</h2>

<p>If you haven&#8217;t already, be sure and check out the rest of the <a href="http://web.archive.org/web/20090212090901/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-1-intro-to-the-library/">Mootools 1.2 tutorials</a> in our 30 days series.</p>
<p>Welcome back to 30 days of Mootools.  From here on out, we are going to loosen our publishing schedule, instead of every day, you can expect new tutorials every few days because we are pretty busy.  Today, we are going to break away from the our coverage of the library and programming basics to do a short project. Using what we have learned so far, there are several ways we can use tabs (and other li&#8217;s) to create content that will only show on hover or on click.</p>
<h3>Simple &#8220;Extra Info&#8221; Tabs</h3>
<h4>Tabs with info on hover</h4>

<p>For this first step, we are going to create a simple menu that will reveal additional info when you hover over a list item. First, set up the html - lets do a ul with four items, then create four divs (one corresponding to each list item):</p>

<div class="wp_syntax"><div class="code"><pre>//here is our menu
&lt;ul id=&quot;tabs&quot;&gt;
   	&lt;li id=&quot;one&quot;&gt;One&lt;/li&gt;
        &lt;li id=&quot;two&quot;&gt;Two&lt;/li&gt;

        &lt;li id=&quot;three&quot;&gt;Three&lt;/li&gt;
        &lt;li id=&quot;four&quot;&gt;Four&lt;/li&gt;
&lt;/ul&gt;
&nbsp;
//and here are our content divs
&lt;div id=&quot;contentone&quot; class=&quot;hidden&quot;&gt;content for one&lt;/div&gt;

&lt;div id=&quot;contenttwo&quot; class=&quot;hidden&quot;&gt;content for two&lt;/div&gt;
&lt;div id=&quot;contentthree&quot; class=&quot;hidden&quot;&gt;content for three&lt;/div&gt;
&lt;div id=&quot;contentfour&quot; class=&quot;hidden&quot;&gt;content for four&lt;/div&gt;</pre></div></div>

<p>For now, let&#8217;s not worry about making this pretty.  In the css, all we need to do is hide the content boxes:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">.<span style="color: #006600;">hidden</span> <span style="color: #009900;">&#123;</span>
	display<span style="color: #339933;">:</span> none<span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span></pre></div></div>

<p>Now, for the Mootools.  If we want the content to show when someone mouses over it and hide when they leave, we need to set up some functions:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> showFunction <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
	<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">setStyle</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'display'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'block'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> hideFunction <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
	<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">setStyle</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'display'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'none'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span></pre></div></div>

<p>and some events:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
        <span style="color: #006600; font-style: italic;">//here we can pass our container elements to a var</span>
	<span style="color: #003366; font-weight: bold;">var</span> elOne <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'contentone'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'one'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvents</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
            <span style="color: #006600; font-style: italic;">//for the mousenter event, we call showFunction</span>
            <span style="color: #006600; font-style: italic;">//and bind elOne, so we can pass the element to the function</span>
            <span style="color: #3366CC;">'mouseenter'</span><span style="color: #339933;">:</span> showFunction.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>elOne<span style="color: #009900;">&#41;</span><span style="color: #339933;">,</span>

            <span style="color: #3366CC;">'mouseleave'</span><span style="color: #339933;">:</span> hideFunction.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>elOne<span style="color: #009900;">&#41;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Now, we just repeat this pattern for each tab and the corresponding content.  Here it is complete:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//here are our functions to change the styles</span>
<span style="color: #003366; font-weight: bold;">var</span> showFunction <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
	<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">setStyle</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'display'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'block'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> hideFunction <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
	<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">setStyle</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'display'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'none'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
        <span style="color: #006600; font-style: italic;">//here we turn our content elements into vars</span>
	<span style="color: #003366; font-weight: bold;">var</span> elOne <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'contentone'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #003366; font-weight: bold;">var</span> elTwo <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'contenttwo'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #003366; font-weight: bold;">var</span> elThree <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'contentthree'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #003366; font-weight: bold;">var</span> elFour <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'contentfour'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
        <span style="color: #006600; font-style: italic;">//add the events to the tabs</span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'one'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvents</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>

                <span style="color: #006600; font-style: italic;">//set up the events types</span>
                <span style="color: #006600; font-style: italic;">//and bind the function with the variable to pass</span>
                <span style="color: #3366CC;">'mouseenter'</span><span style="color: #339933;">:</span> showFunction.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>elOne<span style="color: #009900;">&#41;</span><span style="color: #339933;">,</span>
                <span style="color: #3366CC;">'mouseleave'</span><span style="color: #339933;">:</span> hideFunction.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>elOne<span style="color: #009900;">&#41;</span>

	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'two'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvents</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #3366CC;">'mouseenter'</span><span style="color: #339933;">:</span> showFunction.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>elTwo<span style="color: #009900;">&#41;</span><span style="color: #339933;">,</span>

		<span style="color: #3366CC;">'mouseleave'</span><span style="color: #339933;">:</span> hideFunction.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>elTwo<span style="color: #009900;">&#41;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'three'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvents</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>

		<span style="color: #3366CC;">'mouseenter'</span><span style="color: #339933;">:</span> showFunction.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>elThree<span style="color: #009900;">&#41;</span><span style="color: #339933;">,</span>
		<span style="color: #3366CC;">'mouseleave'</span><span style="color: #339933;">:</span> hideFunction.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>elThree<span style="color: #009900;">&#41;</span>

	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'four'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvents</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #3366CC;">'mouseenter'</span><span style="color: #339933;">:</span> showFunction.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>elFour<span style="color: #009900;">&#41;</span><span style="color: #339933;">,</span>

		<span style="color: #3366CC;">'mouseleave'</span><span style="color: #339933;">:</span> hideFunction.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>elFour<span style="color: #009900;">&#41;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>As you can see, this is all very familiar and setting this up doesn&#8217;t require anything we havn&#8217;t covered so far.</p>

<ul id="tabs">
<li id="one">One</li>
<li id="two">Two</li>
<li id="three">Three</li>
<li id="four">Four</li>
</ul>
<div id="content_wrap">
<div id="contentone" class="hidden">content for one</div>
<div id="contenttwo" class="hidden">content for two</div>
<div id="contentthree" class="hidden">content for three</div>

<div id="contentfour" class="hidden">content for four</div>
</p></div>
<h4>Tabs that show content on click</h4>
<p>Taking the idea above, we can easily adjust it to reveal content on click.  Let&#8217;s use the same html as above, and adjust the Mootools code for a click event.</p>
<p>First, we are going to need to adjust our functions.  Since we can&#8217;t hide the content on mouseleave, we need to find another way to switch between the divs. Perhaps the easiest option is to hide them all on click, and just show &#8220;this&#8221; one (being whichever one is passed on click):</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> showFunction <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

	$$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.hiddenB'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">setStyle</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'display'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'none'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 
	<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">setStyle</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'display'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'block'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span></pre></div></div>

<p>Now, when we pass the function an element using bind, it will  hide the others and reveal that element.</p>
<p>Next, we need to adjust events.  First, we only need a single event, so we will use .addEvent();, and next we need to change the event type to &#8216;click.&#8217;</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
	<span style="color: #003366; font-weight: bold;">var</span> elOneB <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'contentoneB'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #003366; font-weight: bold;">var</span> elTwoB <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'contenttwoB'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #003366; font-weight: bold;">var</span> elThreeB <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'contentthreeB'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #003366; font-weight: bold;">var</span> elFourB <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'contentfourB'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'oneB'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> showFunction.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>elOneB<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'twoB'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> showFunction.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>elTwoB<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'threeB'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> showFunction.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>elThreeB<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'fourB'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> showFunction.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>elFourB<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<ul id="tabs">

<li id="oneB">One</li>
<li id="twoB">Two</li>
<li id="threeB">Three</li>
<li id="fourB">Four</li>
</ul>
<div id="content_wrapB">
<div id="contentoneB" class="hiddenB">content for one</div>
<div id="contenttwoB" class="hiddenB">content for two</div>
<div id="contentthreeB" class="hiddenB">content for three</div>
<div id="contentfourB" class="hiddenB">content for four</div>

</p></div>
<h3>Morph Content Tabs</h3>
<p>Extending on the code we have above, we can add some morph functionality when our hidden content is displayed.  To begin, we can set up an Fx.Morph effect just like the previous example, except instead of setting the styles, we will morph them.  Of course, we also have to create our morph objects:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> showFunction <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
        <span style="color: #006600; font-style: italic;">//resets all the styles before it morphs the current one</span>

	$$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.hiddenM'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">setStyles</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #3366CC;">'display'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'none'</span><span style="color: #339933;">,</span>
		<span style="color: #3366CC;">'opacity'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">0</span><span style="color: #339933;">,</span>

		<span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'#fff'</span><span style="color: #339933;">,</span>
		<span style="color: #3366CC;">'font-size'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'16px'</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 
&nbsp;

        <span style="color: #006600; font-style: italic;">//here we start the morph and set the styles to morph to</span>
	<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">start</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #3366CC;">'display'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'block'</span><span style="color: #339933;">,</span>
		<span style="color: #3366CC;">'opacity'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">1</span><span style="color: #339933;">,</span>

		<span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'#d3715c'</span><span style="color: #339933;">,</span>
		<span style="color: #3366CC;">'font-size'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'31px'</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>

&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
	<span style="color: #003366; font-weight: bold;">var</span> elOneM <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'contentoneM'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #003366; font-weight: bold;">var</span> elTwoM <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'contenttwoM'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #003366; font-weight: bold;">var</span> elThreeM <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'contentthreeM'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #003366; font-weight: bold;">var</span> elFourM <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'contentfourM'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
        <span style="color: #006600; font-style: italic;">//creat morph object</span>
	elOneM <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Morph</span><span style="color: #009900;">&#40;</span>elOneM<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

		link<span style="color: #339933;">:</span> <span style="color: #3366CC;">'cancel'</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	elTwoM <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Morph</span><span style="color: #009900;">&#40;</span>elTwoM<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

		link<span style="color: #339933;">:</span> <span style="color: #3366CC;">'cancel'</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	elThreeM <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Morph</span><span style="color: #009900;">&#40;</span>elThreeM<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

		link<span style="color: #339933;">:</span> <span style="color: #3366CC;">'cancel'</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	elFourM <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Morph</span><span style="color: #009900;">&#40;</span>elFourM<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

		link<span style="color: #339933;">:</span> <span style="color: #3366CC;">'cancel'</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'oneM'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> showFunction.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>elOneM<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'twoM'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> showFunction.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>elTwoM<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'threeM'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> showFunction.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>elThreeM<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'fourM'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> showFunction.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>elFourM<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>If we use the same html that we have above, we will get something like this:</p>

<div id="wrapM">
<ul id="tabsM">
<li id="oneM">One</li>
<li id="twoM">Two</li>
<li id="threeM">Three</li>
<li id="fourM">Four</li>
</ul>
<div id="content_wrapM">
<div id="contentoneM" class="hiddenM">content for one</div>
<div id="contenttwoM" class="hiddenM">content for two</div>
<div id="contentthreeM" class="hiddenM">content for three</div>

<div id="contentfourM" class="hiddenM">content for four</div>
</p></div>
</p></div>
<p><strong>Note:</strong> If you click on the above example quickly you will see that it pushes out multiple content divs.  Basically, if showFunction is called before the last one finishes tweening, it will not register it when it hides all content divs.  To solve this, we are going to need to break out of this exact formula, and play a bit with Fx.Elements.</p>
<h3>Example</h3>
<p>This example works just like the above example, except when you click on two tabs quickly, it will not &#8220;stack&#8221; the content divs.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//create a &quot;hide all&quot; function</span>

<span style="color: #006600; font-style: italic;">//create a parameter so you can pass the element</span>
<span style="color: #003366; font-weight: bold;">var</span> hideAll <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>fxElementObject<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	fxElementObject.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #3366CC;">'0'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>

			<span style="color: #3366CC;">'display'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'none'</span>
		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
		<span style="color: #3366CC;">'1'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>
			<span style="color: #3366CC;">'display'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'none'</span>

		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
		<span style="color: #3366CC;">'2'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>
			<span style="color: #3366CC;">'display'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'none'</span>
		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>

		<span style="color: #3366CC;">'3'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>
			<span style="color: #3366CC;">'display'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'none'</span>
		<span style="color: #009900;">&#125;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>

&nbsp;
<span style="color: #006600; font-style: italic;">//here we create a function for each content element</span>
<span style="color: #003366; font-weight: bold;">var</span> showFunctionOne <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
        <span style="color: #006600; font-style: italic;">//first, call the hideAll function</span>
        <span style="color: #006600; font-style: italic;">//then pass &quot;this&quot; as the Fx.element object</span>

	hideAll<span style="color: #009900;">&#40;</span><span style="color: #000066; font-weight: bold;">this</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
        <span style="color: #006600; font-style: italic;">//start the Fx.element morph for the index that corresponds to the click event</span>
	<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">start</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #3366CC;">'0'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>

			<span style="color: #3366CC;">'display'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#91;</span><span style="color: #3366CC;">'none'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'block'</span><span style="color: #009900;">&#93;</span><span style="color: #339933;">,</span>
			<span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#91;</span><span style="color: #3366CC;">'#fff'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'#999'</span><span style="color: #009900;">&#93;</span><span style="color: #339933;">,</span>

			<span style="color: #3366CC;">'font-size'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#91;</span><span style="color: #3366CC;">'16px'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'25px'</span><span style="color: #009900;">&#93;</span>
		<span style="color: #009900;">&#125;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> showFunctionTwo <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

	hideAll<span style="color: #009900;">&#40;</span><span style="color: #000066; font-weight: bold;">this</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">start</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #3366CC;">'1'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>
			<span style="color: #3366CC;">'display'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#91;</span><span style="color: #3366CC;">'none'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'block'</span><span style="color: #009900;">&#93;</span><span style="color: #339933;">,</span>

			<span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#91;</span><span style="color: #3366CC;">'#fff'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'#999'</span><span style="color: #009900;">&#93;</span><span style="color: #339933;">,</span>
			<span style="color: #3366CC;">'font-size'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#91;</span><span style="color: #3366CC;">'16px'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'25px'</span><span style="color: #009900;">&#93;</span>

		<span style="color: #009900;">&#125;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> showFunctionThree <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
	hideAll<span style="color: #009900;">&#40;</span><span style="color: #000066; font-weight: bold;">this</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
	<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">start</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #3366CC;">'2'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>
			<span style="color: #3366CC;">'display'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#91;</span><span style="color: #3366CC;">'none'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'block'</span><span style="color: #009900;">&#93;</span><span style="color: #339933;">,</span>

			<span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#91;</span><span style="color: #3366CC;">'#fff'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'#999'</span><span style="color: #009900;">&#93;</span><span style="color: #339933;">,</span>
			<span style="color: #3366CC;">'font-size'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#91;</span><span style="color: #3366CC;">'16px'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'25px'</span><span style="color: #009900;">&#93;</span>

		<span style="color: #009900;">&#125;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> showFunctionFour <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
	hideAll<span style="color: #009900;">&#40;</span><span style="color: #000066; font-weight: bold;">this</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
	<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">start</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #3366CC;">'3'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>
			<span style="color: #3366CC;">'display'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#91;</span><span style="color: #3366CC;">'none'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'block'</span><span style="color: #009900;">&#93;</span><span style="color: #339933;">,</span>

			<span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#91;</span><span style="color: #3366CC;">'#fff'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'#999'</span><span style="color: #009900;">&#93;</span><span style="color: #339933;">,</span>
			<span style="color: #3366CC;">'font-size'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#91;</span><span style="color: #3366CC;">'16px'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'25px'</span><span style="color: #009900;">&#93;</span>

		<span style="color: #009900;">&#125;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
        <span style="color: #006600; font-style: italic;">//create your array to pass to Fx.elements</span>

	<span style="color: #003366; font-weight: bold;">var</span> morphElements <span style="color: #339933;">=</span> $$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.hiddenMel'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
        <span style="color: #006600; font-style: italic;">//create a new Fx.Element object</span>
	<span style="color: #003366; font-weight: bold;">var</span> elementEffects <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Elements</span><span style="color: #009900;">&#40;</span>morphElements<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

               <span style="color: #006600; font-style: italic;">//set the &quot;link&quot; option to cancel</span>
		link<span style="color: #339933;">:</span> <span style="color: #3366CC;">'cancel'</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 
&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'oneMel'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> showFunctionOne.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>elementEffects<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'twoMel'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> showFunctionTwo.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>elementEffects<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'threeMel'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> showFunctionThree.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>elementEffects<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'fourMel'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> showFunctionFour.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>elementEffects<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<div id="wrapMel">
<ul id="tabsel">
<li id="oneMel">One a</li>
<li id="twoMel">Two</li>
<li id="threeMel">Three</li>
<li id="fourMel">Four</li>
</ul>
<div id="content_wrapMel">
<div class="hiddenMel">content for one</div>

<div class="hiddenMel">content for two</div>
<div class="hiddenMel">content for three</div>
<div class="hiddenMel">content for four</div>
</p></div>
</p></div>
<h3>To Learn More&#8230;</h3>
<p>This one is mostly a review and an application of the  stuff we covered in the previous tutorials.  As such, I am going to recommend that you <a href="http://web.archive.org/web/20090212090901/http://docs.mootools.net/"></a>read over the docs, in full, if you haven&#8217;t already.  It&#8217;s more fun than it sounds.  If you are new to the library and have been learning along with this tutorial, you may be surprised at how much you understand.</p>
<h4><a href="http://web.archive.org/web/20090212090901/http://www.consideropen.com/downloads/30days_of_moo/mootorial_day20_tabs.zip">Download a zip of the final example</a></h4>

<p>Along with everything you need to get started.</p>
<h4>Tomorrow&#8217;s Tutorial</h4>
<p><a href="http://web.archive.org/web/20090212090901/http://www.consideropen.com/blog/2008/09/30-days-of-mootools-12-tutorials-day-21-classes-part-ii/">Classes part 2</a></p>
<h3>Questions, Comments or Suggestions</h3>
<p>In particular, it would be great to hear of ways around the problem posed above.  But, if you have something else on your mind, please don&#8217;t hesitate.  Hope you have found this review useful.</p>
					