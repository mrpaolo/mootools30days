<h2>Multiple morphs with Fx.Elements</h2>
<p>Welcome back to 30 days of Mootools 1.2 tutorials.  If you haven&#8217;t already, be sure to check out <a href="http://web.archive.org/web/20090213133840/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-1-intro-to-the-library/">the rest of our mootools series</a>.  Today, we are going to take a look at the Fx.Elements plugin, which is basically an extension of Fx.Morph.  Instead of applying to a single element, Fx.Elements allows you to add the Fx functionality to multiple dom elements in one go. This can be very useful when you are applying the same options to more than one element, as we saw in <a href="http://web.archive.org/web/20090213133840/http://www.consideropen.com/blog/2008/09/30-days-of-mootools-12-tutorials-day-20-a-few-mootools-tabs/">the final example on day 20</a>. </p>

<h3>The Basics</h3>
<p>Implementing Fx.Elements looks just like Fx.Morph.  The difference between the two doesn&#8217;t come into play until you .start({}) an effect or .set({}) some styles.</p>
<p>To keep things tidy, lets first set up an array to pass to Fx.Elements.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> fxElementsArray <span style="color: #339933;">=</span> $$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.myElementClass'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Now we can pass our array to the Fx.Elements object.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> fxElementsObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Elements</span><span style="color: #009900;">&#40;</span>fxElementsArray<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

	<span style="color: #006600; font-style: italic;">//Fx Options</span>
	link<span style="color: #339933;">:</span> <span style="color: #3366CC;">'chain'</span><span style="color: #339933;">,</span>
	duration<span style="color: #339933;">:</span> <span style="color: #CC0000;">1000</span><span style="color: #339933;">,</span>

	transition<span style="color: #339933;">:</span> <span style="color: #3366CC;">'sine:in:out'</span><span style="color: #339933;">,</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//Fx Events</span>
	onStart<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		startInd.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#C3E608'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Just like Fx.Morph, Fx.Elements extends the Fx class, giving you access to all <a href="http://web.archive.org/web/20090213133840/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-11-using-fxmorph-fx-options-and-fx-events/">the Fx options and events.</a></p>
<h3>.start({}) and .set({})</h3>
<p>To start an Fx.Elements effect, or to set styles using Fx.Elements, you start out just as you would with Fx.Tween or Fx.Morph, but instead of setting the parameters directly on the Fx.Elements object, you refer to the elements via the index - the first element is 0, the second is 1, and so on.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//you can set your styles with .set({...})</span>
fxElementsObject .<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #3366CC;">'0'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>
		<span style="color: #3366CC;">'height'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">10</span><span style="color: #339933;">,</span>

		<span style="color: #3366CC;">'width'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">10</span><span style="color: #339933;">,</span>
		<span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'#333'</span>
	<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>

	<span style="color: #3366CC;">'1'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>
		<span style="color: #3366CC;">'width'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">10</span><span style="color: #339933;">,</span>
		<span style="color: #3366CC;">'border'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'1px dashed #333'</span>

	<span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//or create a transition effect with .start({...})</span>
fxElementsObject .<span style="color: #006600;">start</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #3366CC;">'0'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>
		<span style="color: #3366CC;">'height'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#91;</span><span style="color: #CC0000;">50</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">200</span><span style="color: #009900;">&#93;</span><span style="color: #339933;">,</span>

		<span style="color: #3366CC;">'width'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">50</span><span style="color: #339933;">,</span>
		<span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'#87AEE1'</span>
	<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
	<span style="color: #3366CC;">'1'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>

		<span style="color: #3366CC;">'width'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#91;</span><span style="color: #CC0000;">100</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">200</span><span style="color: #009900;">&#93;</span><span style="color: #339933;">,</span>
		<span style="color: #3366CC;">'border'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'5px dashed #333'</span>
	<span style="color: #009900;">&#125;</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Just like Fx.Morph, you can set either a start value and end value for the element to transition to and from, or you can just set a single parameter (like we did with 0&#8217;s width) and the element will transition from its current state to the new parameter.</p>
<p>And that&#8217;s pretty much all there is to Fx.Elements.  Check out the example below to see it in action.</p>
<h3>Example</h3>
<p>Here we have applied Fx.Elements to two elements.  There are a few different types of transitions to check out, along with a pause button which lets you freeze the transition mid stream.</p>
<p>First, lets set up our elements, our control buttons (including reset, pause and resume), and a few indicators so we can better watch the process unfold.</p>

<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;start_ind&quot; class=&quot;ind&quot;&gt;onStart&lt;/div&gt;
&lt;div id=&quot;cancel_ind&quot; class=&quot;ind&quot;&gt;onCancel&lt;/div&gt;
&lt;div id=&quot;complete_ind&quot; class=&quot;ind&quot;&gt;onComplete&lt;/div&gt;

&lt;div id=&quot;chain_complete_ind&quot; class=&quot;ind&quot;&gt;onChainComplete&lt;/div&gt;
&lt;span id='buttons'&gt;
	&lt;button id=&quot;fxstart&quot;&gt;Start A&lt;/button&gt;
        &lt;button id=&quot;fxstartB&quot;&gt;Start B&lt;/button&gt;

        &lt;button id=&quot;fxset&quot;&gt;Reset&lt;/button&gt;
        &lt;button id=&quot;fxpause&quot;&gt;Pause&lt;/button&gt;
        &lt;button id=&quot;fxresume&quot;&gt;Resume&lt;/button&gt;

&lt;/span&gt;
&lt;div class=&quot;myElementClass&quot;&gt;Element 0&lt;/div&gt;
&lt;div class=&quot;myElementClass&quot;&gt;Element 1&lt;/div&gt;</pre></div></div>

<p>Our css is nice and simple.</p>

<div class="wp_syntax"><div class="code"><pre class="css"><span style="color: #6666ff;">.ind</span> <span style="color: #66cc66;">&#123;</span>

	<span style="color: #000000; font-weight: bold;">width</span><span style="color: #66cc66;">:</span> <span style="color: #933;">200px</span><span style="color: #66cc66;">;</span>
	<span style="color: #000000; font-weight: bold;">padding</span><span style="color: #66cc66;">:</span> <span style="color: #933;">10px</span><span style="color: #66cc66;">;</span>
	<span style="color: #000000; font-weight: bold;">background-color</span><span style="color: #66cc66;">:</span> <span style="color: #cc00cc;">#87AEE1</span><span style="color: #66cc66;">;</span>

	<span style="color: #000000; font-weight: bold;">font-weight</span><span style="color: #66cc66;">:</span> <span style="color: #993333;">bold</span><span style="color: #66cc66;">;</span>
	<span style="color: #000000; font-weight: bold;">border-bottom</span><span style="color: #66cc66;">:</span> <span style="color: #933;">1px</span> <span style="color: #993333;">solid</span> <span style="color: #993333;">white</span><span style="color: #66cc66;">;</span>

<span style="color: #66cc66;">&#125;</span>
&nbsp;
<span style="color: #6666ff;">.myElementClass</span> <span style="color: #66cc66;">&#123;</span>
	<span style="color: #000000; font-weight: bold;">height</span><span style="color: #66cc66;">:</span> <span style="color: #933;">50px</span><span style="color: #66cc66;">;</span>
	<span style="color: #000000; font-weight: bold;">width</span><span style="color: #66cc66;">:</span> <span style="color: #933;">100px</span><span style="color: #66cc66;">;</span>

	<span style="color: #000000; font-weight: bold;">background-color</span><span style="color: #66cc66;">:</span> <span style="color: #cc00cc;">#FFFFCC</span><span style="color: #66cc66;">;</span>
	<span style="color: #000000; font-weight: bold;">border</span><span style="color: #66cc66;">:</span> <span style="color: #933;">1px</span> <span style="color: #993333;">solid</span> <span style="color: #cc00cc;">#FFFFCC</span><span style="color: #66cc66;">;</span>

	<span style="color: #000000; font-weight: bold;">padding</span><span style="color: #66cc66;">:</span> <span style="color: #933;">20px</span><span style="color: #66cc66;">;</span>
<span style="color: #66cc66;">&#125;</span>
&nbsp;
<span style="color: #cc00cc;">#buttons</span> <span style="color: #66cc66;">&#123;</span>
	<span style="color: #000000; font-weight: bold;">margin</span><span style="color: #66cc66;">:</span> <span style="color: #933;">20px</span> <span style="color: #933;">0</span><span style="color: #66cc66;">;</span>

	<span style="color: #000000; font-weight: bold;">display</span><span style="color: #66cc66;">:</span> <span style="color: #993333;">block</span><span style="color: #66cc66;">;</span>
<span style="color: #66cc66;">&#125;</span></pre></div></div>

<p>Now for the mootools.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> startFXElement <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

	<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">start</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #3366CC;">'0'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>
			<span style="color: #3366CC;">'height'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#91;</span><span style="color: #CC0000;">50</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">200</span><span style="color: #009900;">&#93;</span><span style="color: #339933;">,</span>

			<span style="color: #3366CC;">'width'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">50</span><span style="color: #339933;">,</span>
			<span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'#87AEE1'</span>
		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
		<span style="color: #3366CC;">'1'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>

			<span style="color: #3366CC;">'width'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#91;</span><span style="color: #CC0000;">100</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">200</span><span style="color: #009900;">&#93;</span><span style="color: #339933;">,</span>
			<span style="color: #3366CC;">'border'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'5px dashed #333'</span>
		<span style="color: #009900;">&#125;</span>

	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> startFXElementB <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">start</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>

		<span style="color: #3366CC;">'0'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>
			<span style="color: #3366CC;">'width'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">500</span><span style="color: #339933;">,</span>
			<span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'#333'</span>

		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
		<span style="color: #3366CC;">'1'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>
			<span style="color: #3366CC;">'width'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">500</span><span style="color: #339933;">,</span>
			<span style="color: #3366CC;">'border'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'10px solid #DC1E6D'</span>

		<span style="color: #009900;">&#125;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> setFXElement <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>

		<span style="color: #3366CC;">'0'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>
			<span style="color: #3366CC;">'height'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">50</span><span style="color: #339933;">,</span>
			<span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'#FFFFCC'</span><span style="color: #339933;">,</span>

			<span style="color: #3366CC;">'width'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">100</span>
		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
		<span style="color: #3366CC;">'1'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>
			<span style="color: #3366CC;">'height'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">50</span><span style="color: #339933;">,</span>

			<span style="color: #3366CC;">'width'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">100</span><span style="color: #339933;">,</span>
			<span style="color: #3366CC;">'border'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'none'</span>
		<span style="color: #009900;">&#125;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span>
&nbsp;
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
	<span style="color: #003366; font-weight: bold;">var</span> fxElementsArray <span style="color: #339933;">=</span> $$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.myElementClass'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
	<span style="color: #003366; font-weight: bold;">var</span> startInd <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'start_ind'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #003366; font-weight: bold;">var</span> cancelInd <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'cancel_ind'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #003366; font-weight: bold;">var</span> completeInd <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'complete_ind'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #003366; font-weight: bold;">var</span> chainCompleteInd <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'chain_complete_ind'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
	<span style="color: #003366; font-weight: bold;">var</span> fxElementsObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Elements</span><span style="color: #009900;">&#40;</span>fxElementsArray<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>
		<span style="color: #006600; font-style: italic;">//Fx Options</span>

		link<span style="color: #339933;">:</span> <span style="color: #3366CC;">'chain'</span><span style="color: #339933;">,</span>
		duration<span style="color: #339933;">:</span> <span style="color: #CC0000;">1000</span><span style="color: #339933;">,</span>
		transition<span style="color: #339933;">:</span> <span style="color: #3366CC;">'sine:in:out'</span><span style="color: #339933;">,</span>

&nbsp;
		<span style="color: #006600; font-style: italic;">//Fx Events</span>
		onStart<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
			startInd.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#C3E608'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>

		onCancel<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
			cancelInd.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#C3E608'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
		onComplete<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

			completeInd.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#C3E608'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
		onChainComplete<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
			chainCompleteInd.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#C3E608'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 
		<span style="color: #009900;">&#125;</span>

	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'fxstart'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> startFXElement.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>fxElementsObject<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'fxstartB'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> startFXElementB.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>fxElementsObject<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'fxset'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> setFXElement.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>fxElementsObject<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'fxpause'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		fxElementsObject.<span style="color: #006600;">pause</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'fxresume'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		fxElementsObject.<span style="color: #006600;">resume</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<div id="start_ind" class="ind">onStart</div>
<div id="cancel_ind" class="ind">onCancel</div>
<div id="complete_ind" class="ind">onComplete</div>
<div id="chain_complete_ind" class="ind">onChainComplete</div>
<p><span id='buttons'><br />
	<button id="fxstart">Start A</button><button id="fxstartB">Start B</button><button id="fxset">Reset</button><button id="fxpause">Pause</button><button id="fxresume">Resume</button><br />

</span></p>
<div class="myElementClass">Element 0</div>
<div class="myElementClass">Element 1</div>
<h3>To Learn More&#8230;</h3>
<p>As you can see, Fx.Elements is very straightforward.  To learn more, check out the <a href="http://web.archive.org/web/20090213133840/http://mootools.net/docs/Plugins/Fx.Elements">Fx.Element docs</a>, the <a href="http://web.archive.org/web/20090213133840/http://mootools.net/docs/Fx/Fx.Morph">Fx.Morph</a> and <a href="http://web.archive.org/web/20090213133840/http://mootools.net/docs/Fx/Fx">Fx docs</a>.</p>
<p>Also, be sure to check <a href="http://web.archive.org/web/20090213133840/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-11-using-fxmorph-fx-options-and-fx-events/">our tutorials on Fx.Morph and the Fx options and events</a>.</p>

<h4><a href="http://web.archive.org/web/20090213133840/http://www.consideropen.com/downloads/30days_of_moo/mootorial_day22_FxElements.zip">Download a zip of the final example</a></h4>
<p>Along with everything you need to get started.</p>
<h4>Tomorrow&#8217;s Tutorial</h4>
<p><a href="http://web.archive.org/web/20090213133840/http://www.consideropen.com/blog/2008/12/30-days-of-mootools-12-tutorials-day-23-fxslide/">Fx.Slide</a></p>
<h3>Questions, Comments or Suggestions</h3>
<p>Our publishing schedule has been a bit rocky lately, but we are hoping to pick it up and finish the series.  We are going to be doing more &#8220;project&#8221; type tutorials from here on out (like we did with the &#8220;tabs&#8221; tutorial), but you can still expect a sprinkling of basics.  As always, drop a note with any questions, suggestions or comments.  Thanks, and hope you have found today&#8217;s tutorial useful.</p>

					