<h2>Tween with Mootools 1.2</h2>
<p>If you haven&#8217;t already, be sure and check out the rest of the <a href="http://web.archive.org/web/20090212090502/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-1-intro-to-the-library/">Mootools 1.2 tutorials</a> in our 30 days series.</p>

<p>Welcome to Day 10 of <strong>30 Days of Mootools Tutorials</strong>, today we are going to look at <a href="http://web.archive.org/web/20090212090502/http://docs.mootools.net/Fx/Fx.Tween">Fx.Tween</a>.  Just like all the other Mootools functions we have seen, these are very simple to use, but give you a lot power.  Tween lets you add those great &#8220;flashy&#8221; effects - which translates to smooth animated transitions to improve your users&#8217; experience.</p>
<h3>Tween Shortcuts</h3>
<p>We usually start out with &#8220;the basics,&#8221; but Mootools 1.2 just provides such fantastic shortcuts for tween and they are so easy to use that I couldn&#8217;t resist starting here.</p>

<h4>.tween();</h4>
<p>A <strong>tween</strong> is a smooth transitions between two style property values.  For example, with tween you can smoothly transition a div from &#8220;width: 100px&#8221; to &#8220;width: 300px.&#8221;</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//create a new function</span>
<span style="color: #003366; font-weight: bold;">var</span> tweenerFunction  <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

        <span style="color: #006600; font-style: italic;">//now select the element you want to tween</span>
        <span style="color: #006600; font-style: italic;">//then tack on .tween</span>
        <span style="color: #006600; font-style: italic;">//finally declare the style property and value you want to tween to</span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tweener'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">tween</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'width'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'300px'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
        <span style="color: #006600; font-style: italic;">//here we add an event to a button to initiate the tween on click</span>
        <span style="color: #006600; font-style: italic;">//and we call our tween function</span>
        $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tween_button'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> tweenerFunction<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Our html for the above would look something like this:</p>

<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;tweener&quot;&gt;&lt;/div&gt;
&lt;button id=&quot;tween_button&quot;&gt;300 width&lt;/button&gt;</pre></div></div>

<h4>.fade();</h4>

<p>This function lets you smoothly adjust an elements opacity.  The set up can look pretty much like the previous example:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//create a new function</span>
<span style="color: #003366; font-weight: bold;">var</span> tweenFadeFifty <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
       <span style="color: #006600; font-style: italic;">//here you create your selector</span>
       <span style="color: #006600; font-style: italic;">//then you add .fade</span>

       <span style="color: #006600; font-style: italic;">//finally declare a value between 0 and 1 (0 being invisible, 1 being full visibility)</span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tweener'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">fade</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.5'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

        <span style="color: #006600; font-style: italic;">//here we add an event to a button to initiate the tween on click</span>
        <span style="color: #006600; font-style: italic;">//and we call our tween function</span>
        $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tween_fade_fifty'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> tweenFadeFifty<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>


<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;tweener&quot;&gt;
&lt;button id=&quot;tween_fade_fifty&quot;&gt;Fade to fifty percept opacity&lt;/button&gt;</pre></div></div>

<h4>.highlight();</h4>
<p>Highlight is a very targeted (and extremely useful) tween shortcut that provides two functions:</p>

<ol>
<li>Use it to tween flash a different background color</li>
<li>Immediately set a different background color, then tween flash another background color</li>
</ol>
<p>These are very useful for creating user feedback.  For example, you can flash an element when something is selected, or you change a color then flash when it has been saved and closed.  There are tons of options and it is very simple to use.  For this example, lets create two divs and attach the two types of highlight:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//create a function</span>
<span style="color: #003366; font-weight: bold;">var</span> tweenHighlight <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>event<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

        <span style="color: #006600; font-style: italic;">//here we are using event.target, passed from the function</span>
        <span style="color: #006600; font-style: italic;">//this translates to &quot;the target of the event&quot;</span>
        <span style="color: #006600; font-style: italic;">//and since the effect applies to the same element that the event is attached to</span>
        <span style="color: #006600; font-style: italic;">//we don't have to create the selector again</span>
        <span style="color: #006600; font-style: italic;">//Note: addEvent will automatically pass the event object as a parameter</span>
        <span style="color: #006600; font-style: italic;">//to the function it calls... very handy</span>

	event.<span style="color: #006600;">target</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#eaea16'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//create a function</span>
<span style="color: #006600; font-style: italic;">//you need to pass a parameter</span>
<span style="color: #006600; font-style: italic;">//since this function is being called in an event</span>
<span style="color: #006600; font-style: italic;">//the function will automatically be passed the event object</span>

<span style="color: #006600; font-style: italic;">//and you can then refer to the element with .target</span>
<span style="color: #006600; font-style: italic;">//(the target of the event)</span>
<span style="color: #003366; font-weight: bold;">var</span> tweenHighlightChange <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #000066; font-weight: bold;">item</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
        <span style="color: #006600; font-style: italic;">//here instead of a single color, we add a comma separated second</span>
        <span style="color: #006600; font-style: italic;">//this will set the first color, then transition to the second</span>

        <span style="color: #000066; font-weight: bold;">item</span>.<span style="color: #006600;">target</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#eaea16'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'#333333'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tweener'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'mouseover'</span><span style="color: #339933;">,</span> tweenHighlight<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
        $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tweenerChange'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'mouseover'</span><span style="color: #339933;">,</span> tweenHighlightChange<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>


<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;tweener&quot;&gt;&lt;/div&gt;
&lt;div id=&quot;tweenerChange&quot;&gt;&lt;/div&gt;</pre></div></div>

<h4>Shortcut Examples</h4>
<p>Here is a live example of some of the effect shortcuts.  Try playing with the buttons in different orders and notice the behaivor:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> tweenerFunction  <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tweener'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">tween</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'width'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'300px'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> tweenerGoBack  <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tweener'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">tween</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'width'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'100px'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//.fade will also accept 'out' and 'in', equaling 0 and 1 respectively</span>
<span style="color: #003366; font-weight: bold;">var</span> tweenFadeOut <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tweener'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">fade</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'out'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> tweenFadeFifty <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tweener'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">fade</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.5'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> tweenFadeIn <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tweener'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">fade</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'in'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> tweenHighlight <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>event<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
	event.<span style="color: #006600;">target</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#eaea16'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tween_button'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> tweenerFunction<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tween_reset'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> tweenerGoBack<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tween_fade_out'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> tweenFadeOut<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tween_fade_fifty'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> tweenFadeFifty<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tween_fade_in'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> tweenFadeIn<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tweener'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'mouseover'</span><span style="color: #339933;">,</span>tweenHighlight<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>


<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;tweener&quot;&gt;&lt;/div&gt;&lt;br /&gt;

&lt;button id=&quot;tween_button&quot;&gt;300 width&lt;/button&gt;
&lt;button id=&quot;tween_reset&quot;&gt;100 width&lt;/button&gt;
&lt;button id=&quot;tween_fade_out&quot;&gt;Fade Out&lt;/button&gt;
&lt;button id=&quot;tween_fade_fifty&quot;&gt;Fade to 50% opacity&lt;/button&gt;

&lt;button id=&quot;tween_fade_in&quot;&gt;Fade In&lt;/button&gt;</pre></div></div>


<div class="wp_syntax"><div class="code"><pre>#tweener {
	height: 100px<SEMI>
	width: 100px<SEMI>
	background-color: #3399CC<SEMI>
}</pre></div></div>

<p>Mouseover to see highlight type 1</p>
<div id="tweener"></div>
<p>
<button id="tween_button">300 width</button><br />
<button id="tween_reset">100 width</button><br />
<button id="tween_fade_out">Fade Out</button><br />
<button id="tween_fade_fifty">Fade to 50% opacity</button><br />
<button id="tween_fade_in">Fade In</button></p>
<h3>More on Tweens</h3>

<h4>Creating a new tween</h4>
<p>If you want more flexibility and control over your tween effect, you are going to want to create a new tween instead of using the shortcuts.  Notice the use of &#8220;new&#8221; to create a new instance of Fx.Tween:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
        <span style="color: #006600; font-style: italic;">//first we pass the element we want to tween to a var</span>

        <span style="color: #003366; font-weight: bold;">var</span> newTweenElement <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'newTween'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
       <span style="color: #006600; font-style: italic;">//now we create a new tween event, and pass that element as a parameter</span>
       <span style="color: #003366; font-weight: bold;">var</span> newTween <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Tween</span><span style="color: #009900;">&#40;</span>newTweenElement<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>


<div class="wp_syntax"><div class="code"><pre>&lt;!-- here is the element we want to apply the tween to --&gt;
&lt;div id=&quot;newTween&quot;&gt;&lt;/div&gt;
&nbsp;
&lt;!-- here is a button that will come into play shortly --&gt;
&lt;button id=&quot;netTween_set&quot;&gt;Set&lt;/div&gt;</pre></div></div>

<h4>Setting styles with tween</h4>
<p>Once you create a new tween from an element, you can easily set a style property with .set();.  This takes place instanstly and works just like .setStyle();</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> newTweenSet <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
        <span style="color: #006600; font-style: italic;">//notice the use of &quot;this&quot;</span>

        <span style="color: #006600; font-style: italic;">//read on to learn how &quot;this&quot; is used</span>
	<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'width'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'300px'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span></pre></div></div>

<p>As we learned before, we want to separate our functions outside of the domready event, but in this case we are going to create the tween inside the domready, then refer to it outside.  We have already covered one way to pass parameters outside of the domready (by creating an anonymous function and passing a parameter) and today we are going to learn a Moo-better way to pass the tween object (not to say there are not times an anonymous function isn&#8217;t more appropriate).</p>
<p><strong>.bind();</strong></p>
<p>With .bind();, we can make a parameter equal to &#8220;this&#8221; in the eyes of a given function:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//first we add a click event to the button we saw above</span>
<span style="color: #006600; font-style: italic;">//then, instead of just calling the function</span>

<span style="color: #006600; font-style: italic;">//we call the function and add &quot;.bind()&quot;</span>
<span style="color: #006600; font-style: italic;">//we then place whatever we want to pass to the function</span>
<span style="color: #006600; font-style: italic;">//now, inside the function &quot;newTweenSet,&quot; &quot;this&quot; will refer to &quot;newTween&quot;</span>
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'netTween_set'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> newTweenSet.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>newTween<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>So if we look at the function above, &#8220;this&#8221; is now equivalent to saying &#8220;newTween&#8221; (which is our tween object).</p>
<p><P>Let&#8217;s put the whole thing together:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//here is our function</span>
<span style="color: #003366; font-weight: bold;">var</span> newTweenSet <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

        <span style="color: #006600; font-style: italic;">//since we used bind, &quot;this&quot; now refers to &quot;newTween&quot;</span>
        <span style="color: #006600; font-style: italic;">//so we are really saying</span>
        <span style="color: #006600; font-style: italic;">//newTween.set('width', '300px')</span>
	<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'width'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'300px'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
        <span style="color: #006600; font-style: italic;">//first we place our element into a var</span>
	<span style="color: #003366; font-weight: bold;">var</span> newTweenElement <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'newTween'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
        <span style="color: #006600; font-style: italic;">//then we create a new FX.Tween and assign it to its own var</span>
        <span style="color: #003366; font-weight: bold;">var</span> newTween <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Tween</span><span style="color: #009900;">&#40;</span>newTweenElement<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
        <span style="color: #006600; font-style: italic;">//now we add our event and bind newTween and newTweenSet</span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'netTween_set'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> newTweenSet.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>newTween<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>  

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>Starting a tween effect</h4>
<p>Now that we have our tween object all set up, our function is outside of of the domready event and we learned out how to .set(); a style parameter, lets move onto the actual tweening.  Starting a tween is very simple and similarly to .fade();, there are two ways to use .start();</p>
<ol>
<li>Tween a property value from the existing value to another</li>
<li>Set a property value, then tween to another</li>
</ol>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//this will tween from the existing value of width to 300px</span>
newTween.<span style="color: #006600;">start</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'width'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'300px'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #006600; font-style: italic;">//this one will first set the width to 100px, then tween to 300px</span>
newTween.<span style="color: #006600;">start</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'width'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'100px'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'300px'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Now, you can .start(); the tween from inside a function and use &#8216;this&#8217; once you .bind() the function with &#8220;newTween.&#8221;</p>

<h4>Thats all on tweens for now&#8230;</h4>
<p>Although, there is still a lot to talk about regarding tweening effects.  For example, if you want to &#8220;tween&#8221; multiple style properties at once, you would use .morph();.  And you can use the transitions library to change the, well, transition.  But this tutorial is already long enough, so we will leave those for another day.</p>
<h3>To Learn More&#8230;</h3>
<h4><a href="http://web.archive.org/web/20090212090502/http://www.consideropen.com/downloads/30days_of_moo/mootorial_day10_fx_tween.zip">Download a zip with everything you need to get started</a></h4>
<p>Including the Mootools 1.2 core, the examples above, an external javascript file, a simple html page and a css file.</p>
<p>As always, your best resource is the Mootools 1.2 docs.</p>
<ul>
<li>info on <a href="http://web.archive.org/web/20090212090502/http://docs.mootools.net/Fx/Fx.Tween">.tween();</a></li>

<li>also, poke around <a href="http://web.archive.org/web/20090212090502/http://docs.mootools.net/Fx/Fx.Morph">.morph();</a> and the <a href="http://web.archive.org/web/20090212090502/http://docs.mootools.net/Fx/Fx.Transitions">transitions</a> library</li>
</ul>
<h4>Tomorrow&#8217;s Tutorial</h4>
<p><a href="http://web.archive.org/web/20090212090502/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-11-using-fxmorph-fx-options-and-fx-events/">We will continue looking at the Fx library, focusing on morph, as well as the Fx options and events</a>.</p>
<h3>Questions, Comments or Suggestions?</h3>

<p>This is going to be kind of a 3 part series (tween, morph and transitions) and it would be great to know what else on this subject you would like to see.  And as always, any questions, comments or suggestions are welcome.  Hope you have found this series useful.</p>
					</div>