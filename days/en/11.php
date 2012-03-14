<h2>Mootools 1.2 Fx.Morph, Fx Options, and Fx Events</h2>
<p>If you haven&#8217;t already, be sure and check out the rest of the <a href="http://web.archive.org/web/20090210023627/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-1-intro-to-the-library/">Mootools 1.2 tutorials</a> in our 30 days series.</p>

<p>Today, we are going continue exploring the Fx section of the library.  First, we will learn how to use Fx.Morph (which essentially lets you tween multiple style properties), then we are going check out some of the Fx options that apply to both Fx.Tween and Fx.Morph, finally we will see how to use Fx events like &#8220;onComplete&#8221; and &#8220;onStart.&#8221;  With these options and events, we will gain finer control over animated transitions. </p>
<h3>Fx.Morph</h3>
<h4>Creating a new Fx.Morph</h4>
<p>Initiating a new morph looks a lot like creating a new tween, except you have to account for multiple style properties.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//first, lets throw our element into a var</span>

<span style="color: #003366; font-weight: bold;">var</span> morphElement <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'morph_element'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//now, we create our morph</span>
<span style="color: #003366; font-weight: bold;">var</span> morphObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Morph</span><span style="color: #009900;">&#40;</span>morphElement<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #006600; font-style: italic;">//now we can set the style properties just like Fx.Tween</span>
<span style="color: #006600; font-style: italic;">//except now we can set multiple style properties</span>
morphObject.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
    <span style="color: #3366CC;">'width'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">100</span><span style="color: #339933;">,</span>
    <span style="color: #3366CC;">'height'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">100</span><span style="color: #339933;">,</span>

    <span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'#eeeeee'</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//we can also start our morph like we would start a tween</span>
<span style="color: #006600; font-style: italic;">//except we can now input multiple style properties</span>
morphObject.<span style="color: #006600;">start</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
    <span style="color: #3366CC;">'width'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">300</span><span style="color: #339933;">,</span>

    <span style="color: #3366CC;">'height'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">300</span><span style="color: #339933;">,</span>
    <span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'#d3715c'</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>And that is all there is to creating, setting and starting a morph.</p>

<p>To set this up proper, we should create our variables, separate out our functions and create a few events to control the whole thing:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> morphSet <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//now we can set the style properties just like Fx.Tween</span>
	<span style="color: #006600; font-style: italic;">//except now we can set multiple style properties</span>
	<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>

		<span style="color: #3366CC;">'width'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">100</span><span style="color: #339933;">,</span>
		<span style="color: #3366CC;">'height'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">100</span><span style="color: #339933;">,</span>
		<span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'#eeeeee'</span>

	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> morphStart <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//we can also start out morph like we would start a tween</span>
	<span style="color: #006600; font-style: italic;">//except we can now input multiple style properties</span>

	<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">start</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #3366CC;">'width'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">300</span><span style="color: #339933;">,</span>
		<span style="color: #3366CC;">'height'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">300</span><span style="color: #339933;">,</span>

		<span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'#d3715c'</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> morphReset <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

	<span style="color: #006600; font-style: italic;">//set the values back to start</span>
	<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #3366CC;">'width'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">0</span><span style="color: #339933;">,</span>
		<span style="color: #3366CC;">'height'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">0</span><span style="color: #339933;">,</span>

		<span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'#ffffff'</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

    <span style="color: #006600; font-style: italic;">//first, lets throw our element into a var</span>
	<span style="color: #003366; font-weight: bold;">var</span> morphElement <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'morph_element'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//now, we create our morph</span>

	<span style="color: #003366; font-weight: bold;">var</span> morphObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Morph</span><span style="color: #009900;">&#40;</span>morphElement<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//here we add the click event to the buttons</span>

	<span style="color: #006600; font-style: italic;">//and we bind morphObject and the function</span>
	<span style="color: #006600; font-style: italic;">//allowing us to use &quot;this&quot; above</span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'morph_set'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> morphSet.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>morphObject<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>  
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'morph_start'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> morphStart.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>morphObject<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'morph_reset'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> morphReset.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>morphObject<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>


<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;morph_element&quot;&gt;&lt;/div&gt;
&lt;button id=&quot;morph_set&quot;&gt;Set&lt;/button&gt;
&lt;button id=&quot;morph_start&quot;&gt;Start&lt;/button&gt;
&lt;button id=&quot;morph_reset&quot;&gt;reset&lt;/button&gt;</pre></div></div>

<div id="morph_element"></div>
<p><button id="morph_set">Set</button><br />
<button id="morph_start">Start</button><br />
<button id="morph_reset">reset</button></p>
<h3>The Fx Options</h3>
<p>The following options are accepted by both Fx.Tween and Fx.Morph.  They are simple to implement and give you a ton of control over your effects.  To set these options, use the following syntax:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//set up your tween or morph</span>
<span style="color: #006600; font-style: italic;">//then just set up your options between the { }</span>

<span style="color: #003366; font-weight: bold;">var</span> morphObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Morph</span><span style="color: #009900;">&#40;</span>morphElement<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>
    <span style="color: #006600; font-style: italic;">//first state the name of the option</span>
    <span style="color: #006600; font-style: italic;">//place a :</span>

    <span style="color: #006600; font-style: italic;">//then define your option</span>
    duration<span style="color: #339933;">:</span> <span style="color: #3366CC;">'long'</span><span style="color: #339933;">,</span>
    transition<span style="color: #339933;">:</span> <span style="color: #3366CC;">'sine:in'</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>fps (frames per second)</h4>
<p>This option determines the frames per second of the animation.  The default is 50, and it will accept numbers and variables that contain numbers</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//set up your tween or morph</span>
<span style="color: #006600; font-style: italic;">//then just set up your options between the { }</span>
<span style="color: #003366; font-weight: bold;">var</span> morphObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Morph</span><span style="color: #009900;">&#40;</span>morphElement<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

    fps<span style="color: #339933;">:</span> <span style="color: #CC0000;">60</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//or</span>
<span style="color: #003366; font-weight: bold;">var</span> framesPerSecond <span style="color: #339933;">=</span> <span style="color: #CC0000;">60</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> tweenObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Tween</span><span style="color: #009900;">&#40;</span>tweenElement<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>
    fps<span style="color: #339933;">:</span> framesPerSecond

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>unit</h4>
<p>This option sets the number unit.  For example, do you want &#8216;100&#8242; to mean px, % or ems?</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//set up your tween or morph</span>
<span style="color: #006600; font-style: italic;">//then just set up your options between the { }</span>
<span style="color: #003366; font-weight: bold;">var</span> morphObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Morph</span><span style="color: #009900;">&#40;</span>morphElement<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

    unit<span style="color: #339933;">:</span> <span style="color: #3366CC;">'%'</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>link</h4>
<p>Link provides a way for you to manage multiple calls to start an effect.  For example, if you have a mouseover effect, do you want it to start over each time the user hovers?  Or, if a person mouses over the object twice, should it ignore the second call to start or should it chain them up and start a second time once it finishes the first round?  Link has three settings:</p>
<ul>
<li>&#8216;ignore&#8217; (default) - ignore just ignores any calls to start until its done with the effect</li>

<li>&#8216;cancel&#8217; - will cancel the current effect if another call is made, giving the newest call precedence</li>
<li>&#8216;chain&#8217; - chain lets you &#8220;chain&#8221; the effects together and will stack the calls and execute them until it goes through all the chained calls</li>
</ul>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//set up your tween or morph</span>
<span style="color: #006600; font-style: italic;">//then just set up your options between the { }</span>

<span style="color: #003366; font-weight: bold;">var</span> morphObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Morph</span><span style="color: #009900;">&#40;</span>morphElement<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>
    link<span style="color: #339933;">:</span> <span style="color: #3366CC;">'chain'</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>duration</h4>
<p>Duration lets you define how long the animation will take.  Duration is not the same thing as speed, so if you want an object to move 100px in a duration of 1 second, it will go slower than an object moving 1000px in 1 second.  You can input a number (measured in milliseconds), a variable containing a number, or one of three shortcuts:</p>
<ul>
<li>&#8217;short&#8217; = 250ms</li>
<li>&#8216;normal&#8217; = 500ms (default)</li>
<li>&#8216;long&#8217; = 1000ms</li>

</ul>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//set up your tween or morph</span>
<span style="color: #006600; font-style: italic;">//then just set up your options between the { }</span>
<span style="color: #003366; font-weight: bold;">var</span> morphObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Morph</span><span style="color: #009900;">&#40;</span>morphElement<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

    duration<span style="color: #339933;">:</span> <span style="color: #3366CC;">'long'</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//or</span>
<span style="color: #003366; font-weight: bold;">var</span> morphObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Morph</span><span style="color: #009900;">&#40;</span>morphElement<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

    duration<span style="color: #339933;">:</span> <span style="color: #CC0000;">1000</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>transition</h4>
<p>The last option, transition, gives you the ability to determine the transition type.  For example, should it be a smooth transition or should it start out slowly then speed up toward the end.  Check out these examples of the transitions available with the Mootools core library:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> tweenObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Tween</span><span style="color: #009900;">&#40;</span>tweenElement<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

    transition<span style="color: #339933;">:</span> <span style="color: #3366CC;">'quad:in'</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p><strong>Note:</strong> the first transition bar fires a red highlight effect on start and an orange highlight effect on complete.  Check out how to use Fx events below.</p>
<div id="quadin" class="transitions">&#8216;quad:in&#8217;</div>
<div id="quadout" class="transitions zebra">&#8216;quad:out&#8217;</div>

<div id="quadinout" class="transitions">&#8216;quad:in:out&#8217;</div>
<div id="cubicin" class="transitions zebra">&#8216;cubic:in&#8217;</div>
<div id="cubicout" class="transitions">&#8216;cubic:out&#8217;</div>
<div id="cubicinout" class="transitions zebra">&#8216;cubic:in:out&#8217;</div>
<div id="quartin" class="transitions">&#8216;quart:in&#8217;</div>
<div id="quartout" class="transitions zebra">&#8216;quart:out&#8217;</div>
<div id="quartinout" class="transitions">&#8216;quart:in:out&#8217;</div>
<div id="quintin" class="transitions zebra">&#8216;quint:in&#8217;</div>
<div id="quintout" class="transitions">&#8216;quint:out&#8217;</div>

<div id="quintinout" class="transitions zebra">&#8216;quint:in:out&#8217;</div>
<div id="expoin" class="transitions">&#8216;expo:in&#8217;</div>
<div id="expoout" class="transitions zebra">&#8216;expo:out&#8217;</div>
<div id="expoinout" class="transitions">&#8216;expo:in:out&#8217;</div>
<div id="circin" class="transitions zebra">&#8216;circ:in&#8217;</div>
<div id="circout" class="transitions">&#8216;circ:out&#8217;</div>
<div id="circinout" class="transitions zebra">&#8216;circ:in:out&#8217;</div>
<div id="sinein" class="transitions">&#8217;sine:in&#8217;</div>
<div id="sineout" class="transitions zebra">&#8217;sine:out&#8217;</div>

<div id="sineinout" class="transitions">&#8217;sine:in:out&#8217;</div>
<div id="backin" class="transitions zebra">&#8216;back:in&#8217;</div>
<div id="backout" class="transitions">&#8216;back:out&#8217;</div>
<div id="backinout" class="transitions zebra">&#8216;back:in:out&#8217;</div>
<div id="bouncein" class="transitions">&#8216;bounce:in&#8217;</div>
<div id="bounceout" class="transitions zebra">&#8216;bounce:out&#8217;</div>
<div id="bounceinout" class="transitions">&#8216;bounce:in:out&#8217;</div>
<div id="elasticin" class="transitions zebra">&#8216;elastic:in&#8217;</div>
<div id="elasticout" class="transitions">&#8216;elastic:out&#8217;</div>

<div id="elasticinout" class="transitions zebra">&#8216;elastic:in:out&#8217;</div>
<p>The 30 transition types above break down into 10 sets:</p>
<ul>
<li>Quad</li>
<li>Cubic</li>
<li>Quart</li>
<li>Quint</li>
<li>Expo</li>
<li>Circ</li>

<li>Sine</li>
<li>Back</li>
<li>Bounce</li>
<li>Elastic</li>
</ul>
<p>Each set has three options:</p>
<ul>
<li>Ease In</li>
<li>Ease Out</li>
<li>Ease In Out</li>

</ul>
<h3>Fx Events</h3>
<p>The Fx event give you the opportunity to fire some code at different points throughout the animation effect.  This can be very useful for creating user feedback and gives you yet another level of control over your tweens and morphs:</p>
<ul>
<li>onStart - will fire when the Fx starts</li>
<li>onCancel - will fire when the Fx is cancelled</li>
<li>onComplete - will fire when the Fx is complete</li>
<li>onChainComplete - will fire when chained Fx completes</li>
</ul>
<p>When building a tween or a morph, you can set set up one of these events just like you would an option, except instead of a value, you give it a function:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//first we pass the new Fx.Tween to a variable</span>
<span style="color: #006600; font-style: italic;">//then we define the element to tween</span>
quadIn <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Tween</span><span style="color: #009900;">&#40;</span>quadIn<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>
        <span style="color: #006600; font-style: italic;">//here are some options</span>

	link<span style="color: #339933;">:</span> <span style="color: #3366CC;">'cancel'</span><span style="color: #339933;">,</span>
	transition<span style="color: #339933;">:</span> ‘quad<span style="color: #339933;">:</span><span style="color: #000066; font-weight: bold;">in</span>’<span style="color: #339933;">,</span>

&nbsp;
       <span style="color: #006600; font-style: italic;">//here are some events</span>
	onStart<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>passes_tween_element<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
                <span style="color: #006600; font-style: italic;">//these event will pass the tween object</span>
                <span style="color: #006600; font-style: italic;">//so here we are applying the &quot;highlight&quot; effect</span>

                <span style="color: #006600; font-style: italic;">//when the animation starts</span>
	        passes_tween_element.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#C54641'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
&nbsp;
        <span style="color: #006600; font-style: italic;">//notice how the commas are consistent</span>
        <span style="color: #006600; font-style: italic;">//between every option and event</span>

        <span style="color: #006600; font-style: italic;">//and NO COMMA AFTER THE LAST option or event  </span>
        onComplete<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>passes_tween_element<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
                <span style="color: #006600; font-style: italic;">//and here we apply the highlight effect on complete</span>
	        passes_tween_element.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#C54641'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h3>Example</h3>
<p>To generate the transition code above, we can reuse our functions in a way we haven&#8217;t seen in this series before.  All of the transition elements above use two functions, one to tween out on mouse enter and one to tween back on mouse leave:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">&nbsp;
<span style="color: #006600; font-style: italic;">//this is the function we use on mouse enter, tweens width to 700px</span>
<span style="color: #003366; font-weight: bold;">var</span> enterFunction <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

	<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">start</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'width'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'700px'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//this is the function we use on mouse leave, tweens width back to 300px</span>
<span style="color: #003366; font-weight: bold;">var</span> leaveFunction <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

	<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">start</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'width'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'300px'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

    <span style="color: #006600; font-style: italic;">//here we create throw some elements into vars</span>
    <span style="color: #003366; font-weight: bold;">var</span> quadIn <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'quadin'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
    <span style="color: #003366; font-weight: bold;">var</span> quadOut <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'quadout'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

    <span style="color: #003366; font-weight: bold;">var</span> quadInOut <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'quadinout'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
    <span style="color: #006600; font-style: italic;">//then we create three tween elements, one for each var above</span>
    quadIn <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Tween</span><span style="color: #009900;">&#40;</span>quadIn<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

	link<span style="color: #339933;">:</span> <span style="color: #3366CC;">'cancel'</span><span style="color: #339933;">,</span>
	transition<span style="color: #339933;">:</span> Fx.<span style="color: #006600;">Transitions</span>.<span style="color: #006600;">Quad</span>.<span style="color: #006600;">easeIn</span><span style="color: #339933;">,</span>

	onStart<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>passes_tween_element<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		passes_tween_element.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#C54641'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
	onComplete<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>passes_tween_element<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		passes_tween_element.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#E67F0E'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span>	
    <span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
   quadOut <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Tween</span><span style="color: #009900;">&#40;</span>quadOut<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

	link<span style="color: #339933;">:</span> <span style="color: #3366CC;">'cancel'</span><span style="color: #339933;">,</span>
	transition<span style="color: #339933;">:</span> <span style="color: #3366CC;">'quad:out'</span>
    <span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;

    quadInOut <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Fx.<span style="color: #006600;">Tween</span><span style="color: #009900;">&#40;</span>quadInOut<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>
	link<span style="color: #339933;">:</span> <span style="color: #3366CC;">'cancel'</span><span style="color: #339933;">,</span>

	transition<span style="color: #339933;">:</span> <span style="color: #3366CC;">'quad:in:out'</span>
    <span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
    <span style="color: #006600; font-style: italic;">//now we add the mouse enter and mouse leave events</span>
    <span style="color: #006600; font-style: italic;">//notice the use of .addEvents</span>
    <span style="color: #006600; font-style: italic;">//this works just like .addEvent</span>

    <span style="color: #006600; font-style: italic;">//except you can add multiple events using the pattern below </span>
    $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'quadin'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvents</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
        <span style="color: #006600; font-style: italic;">//first, you say what kind of event, place event type inside 'single quotes'</span>
        <span style="color: #006600; font-style: italic;">//then place a :</span>
        <span style="color: #006600; font-style: italic;">//finally you state your function</span>

        <span style="color: #006600; font-style: italic;">//in this case, its a function that binds to the tween</span>
        <span style="color: #3366CC;">'mouseenter'</span><span style="color: #339933;">:</span> enterFunction.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>quadIn<span style="color: #009900;">&#41;</span><span style="color: #339933;">,</span>
        <span style="color: #3366CC;">'mouseleave'</span><span style="color: #339933;">:</span> leaveFunction.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>quadIn<span style="color: #009900;">&#41;</span>

    <span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
    $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'quadout'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvents</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
        <span style="color: #006600; font-style: italic;">//notice how we reuse the same functions here</span>
        <span style="color: #3366CC;">'mouseenter'</span><span style="color: #339933;">:</span> enterFunction.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>quadOut<span style="color: #009900;">&#41;</span><span style="color: #339933;">,</span>

        <span style="color: #3366CC;">'mouseleave'</span><span style="color: #339933;">:</span> leaveFunction.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>quadOut<span style="color: #009900;">&#41;</span>
    <span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
    $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'quadinout'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvents</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>

        <span style="color: #006600; font-style: italic;">//we also use those same functions here</span>
        <span style="color: #006600; font-style: italic;">//but each time they apply to an event on a different element</span>
        <span style="color: #006600; font-style: italic;">//and bind to a different tween</span>
        <span style="color: #3366CC;">'mouseenter'</span><span style="color: #339933;">:</span> enterFunction.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>quadInOut<span style="color: #009900;">&#41;</span><span style="color: #339933;">,</span>

        <span style="color: #3366CC;">'mouseleave'</span><span style="color: #339933;">:</span> leaveFunction.<span style="color: #006600;">bind</span><span style="color: #009900;">&#40;</span>quadInOut<span style="color: #009900;">&#41;</span>
    <span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h3>To Learn More&#8230;</h3>
<p>You can gain even finer grained control over your effects with the tools in the Fx library.  Be sure to read over the <a href="http://web.archive.org/web/20090210023627/http://docs.mootools.net/Fx/Fx">Fx</a> section in the docs, as well as <a href="http://web.archive.org/web/20090210023627/http://docs.mootools.net/Fx/Fx.Tween">tween</a>, <a href="http://web.archive.org/web/20090210023627/http://docs.mootools.net/Fx/Fx.Morph">morph</a> and <a href="http://web.archive.org/web/20090210023627/http://docs.mootools.net/Fx/Fx.Transitions">transitions</a></p>

<h4><a href="http://web.archive.org/web/20090210023627/http://www.consideropen.com/downloads/30days_of_moo/mootorial_day11_fx_morph_and_options.zip">Download a zip of everything you need to get started</a></h4>
<p>Including the live examples on this page, the Mootools 1.2 core, an external javascript file, an external css file and a simple html file.</p>
<h4>Tomorrow&#8217;s Mootools 1.2 Tutorial</h4>
<p>Day 12 - <a href="http://web.archive.org/web/20090210023627/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-12-drag-and-drop-using-dragmove/">Drag and Drop with Drag.Move</a></p>
<h3>Questions, Comments or Suggestions</h3>
<p>If you have any questions about this tutorial, suggestions for future tutorials or any thoughts on the subjects covered here, feel free to drop us a comment.  Hope you find this useful.</p>
					</div>