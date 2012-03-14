<h2>Tween with Mootools 1.2</h2>
<p>If you haven&#8217;t already, be sure and check out the rest of the <a href="index.php?day=01">Mootools 1.2 tutorials</a> in our 30 days series.</p>

<p>Welcome to Day 10 of <strong>30 Days of Mootools Tutorials</strong>, today we are going to look at <a href="http://docs.mootools.net/Fx/Fx.Tween">Fx.Tween</a>.  Just like all the other Mootools functions we have seen, these are very simple to use, but give you a lot power.  Tween lets you add those great &#8220;flashy&#8221; effects - which translates to smooth animated transitions to improve your users&#8217; experience.</p>

<h3>Tween Shortcuts</h3>
<p>We usually start out with &#8220;the basics,&#8221; but Mootools 1.2 just provides such fantastic shortcuts for tween and they are so easy to use that I couldn&#8217;t resist starting here.</p>

<h4>.tween();</h4>
<p>A <strong>tween</strong> is a smooth transitions between two style property values.  For example, with tween you can smoothly transition a div from &#8220;width: 100px&#8221; to &#8220;width: 300px.&#8221;</p>

<pre class="prettyprint">
//create a new function
var tweenerFunction  = function() {
	//now select the element you want to tween
	//then tack on .tween
	//finally declare the style property and value you want to tween to
	$('tweener').tween('width', '300px');
}
 
window.addEvent('domready', function() {
	//here we add an event to a button to initiate the tween on click
	//and we call our tween function
	$('tween_button').addEvent('click', tweenerFunction);
});
</pre>

<p>Our html for the above would look something like this:</p>

<pre class="prettyprint">&lt;div id=&quot;tweener&quot;&gt;&lt;/div&gt;
&lt;button id=&quot;tween_button&quot;&gt;300 width&lt;/button&gt;
</pre>

<h4>.fade();</h4>
<p>This function lets you smoothly adjust an elements opacity.  The set up can look pretty much like the previous example:</p>

<pre class="prettyprint">
//create a new function
var tweenFadeFifty = function() {
	//here you create your selector
	//then you add .fade
	//finally declare a value between 0 and 1 (0 being invisible, 1 being full visibility)
	$('tweener').fade('.5');
}
 
window.addEvent('domready', function() {
	//here we add an event to a button to initiate the tween on click
	//and we call our tween function
	$('tween_fade_fifty').addEvent('click', tweenFadeFifty);
});
</pre>

<pre class="prettyprint">
&lt;div id=&quot;tweener&quot;&gt;
&lt;button id=&quot;tween_fade_fifty&quot;&gt;Fade to fifty percept opacity&lt;/button&gt;
</pre>

<h4>.highlight();</h4>
<p>Highlight is a very targeted (and extremely useful) tween shortcut that provides two functions:</p>

<ol>
	<li>Use it to tween flash a different background color</li>
	<li>Immediately set a different background color, then tween flash another background color</li>
</ol>

<p>These are very useful for creating user feedback.  For example, you can flash an element when something is selected, or you change a color then flash when it has been saved and closed.  There are tons of options and it is very simple to use.  For this example, lets create two divs and attach the two types of highlight:</p>

<pre class="prettyprint">
//create a function
var tweenHighlight = function(event) {
	//here we are using event.target, passed from the function
	//this translates to "the target of the event"
	//and since the effect applies to the same element that the event is attached to
	//we don't have to create the selector again
	//Note: addEvent will automatically pass the event object as a parameter
	//to the function it calls... very handy
	event.target.highlight('#eaea16');
}
 
//create a function
//you need to pass a parameter
//since this function is being called in an event
//the function will automatically be passed the event object

//and you can then refer to the element with .target
//(the target of the event)
var tweenHighlightChange = function(item) {
	//here instead of a single color, we add a comma separated second
	//this will set the first color, then transition to the second
	item.target.highlight('#eaea16', '#333333');
}
 
window.addEvent('domready', function() {
	$('tweener').addEvent('mouseover', tweenHighlight);
	$('tweenerChange').addEvent('mouseover', tweenHighlightChange);
});
</pre>


<pre class="prettyprint">
&lt;div id=&quot;tweener&quot;&gt;&lt;/div&gt;
&lt;div id=&quot;tweenerChange&quot;&gt;&lt;/div&gt;
</pre>

<h4>Shortcut Examples</h4>
<p>Here is a live example of some of the effect shortcuts.  Try playing with the buttons in different orders and notice the behaivor:</p>

<pre class="prettyprint">
var tweenerFunction  = function() {
	$('tweener').tween('width', '300px');
}
 
var tweenerGoBack  = function() {
	$('tweener').tween('width', '100px');
}
 
//.fade will also accept 'out' and 'in', equaling 0 and 1 respectively
var tweenFadeOut = function() {
	$('tweener').fade('out');
}
 
var tweenFadeFifty = function() {
	$('tweener').fade('.5');
}
 
var tweenFadeIn = function() {
	$('tweener').fade('in');
}
 
var tweenHighlight = function(event) {
	event.target.highlight('#eaea16');
}
 
window.addEvent('domready', function() {
	$('tween_button').addEvent('click', tweenerFunction);
	$('tween_reset').addEvent('click', tweenerGoBack);
	$('tween_fade_out').addEvent('click', tweenFadeOut);
	$('tween_fade_fifty').addEvent('click', tweenFadeFifty);
	$('tween_fade_in').addEvent('click', tweenFadeIn);
	$('tweener').addEvent('mouseover',tweenHighlight);
});
</pre>


<pre class="prettyprint">
&lt;div id=&quot;tweener&quot;&gt;&lt;/div&gt;&lt;br /&gt;
&lt;button id=&quot;tween_button&quot;&gt;300 width&lt;/button&gt;
&lt;button id=&quot;tween_reset&quot;&gt;100 width&lt;/button&gt;
&lt;button id=&quot;tween_fade_out&quot;&gt;Fade Out&lt;/button&gt;
&lt;button id=&quot;tween_fade_fifty&quot;&gt;Fade to 50% opacity&lt;/button&gt;
&lt;button id=&quot;tween_fade_in&quot;&gt;Fade In&lt;/button&gt;
</pre>


<pre class="prettyprint">
#tweener {
	height: 100px;
	width: 100px;
	background-color: #3399CC;
}
</pre>

<p>Mouseover to see highlight type 1</p>
<div id="tweener"></div>
<p>
<button id="tween_button" class="btn btn-primary">300 width</button>
<button id="tween_reset" class="btn btn-primary">100 width</button>
<button id="tween_fade_out" class="btn btn-primary">Fade Out</button>
<button id="tween_fade_fifty" class="btn btn-primary">Fade to 50% opacity</button>
<button id="tween_fade_in" class="btn btn-primary">Fade In</button>
</p>

<h3>More on Tweens</h3>

<h4>Creating a new tween</h4>
<p>If you want more flexibility and control over your tween effect, you are going to want to create a new tween instead of using the shortcuts.  Notice the use of &#8220;new&#8221; to create a new instance of Fx.Tween:</p>

<pre class="prettyprint">
window.addEvent('domready', function() {
	//first we pass the element we want to tween to a var
	var newTweenElement = $('newTween');
	//now we create a new tween event, and pass that element as a parameter
	var newTween = new Fx.Tween(newTweenElement);
});
</pre>


<pre class="prettyprint">
&lt;!-- here is the element we want to apply the tween to --&gt;
&lt;div id=&quot;newTween&quot;&gt;&lt;/div&gt;
&nbsp;
&lt;!-- here is a button that will come into play shortly --&gt;
&lt;button id=&quot;netTween_set&quot;&gt;Set&lt;/div&gt;
</pre>

<h4>Setting styles with tween</h4>
<p>Once you create a new tween from an element, you can easily set a style property with .set();.  This takes place instanstly and works just like .setStyle();</p>

<pre class="prettyprint">
var newTweenSet = function() {
	//notice the use of "this"
	//read on to learn how "this" is used
	this.set('width', '300px');
}
</pre>

<p>As we learned before, we want to separate our functions outside of the domready event, but in this case we are going to create the tween inside the domready, then refer to it outside.  We have already covered one way to pass parameters outside of the domready (by creating an anonymous function and passing a parameter) and today we are going to learn a Moo-better way to pass the tween object (not to say there are not times an anonymous function isn&#8217;t more appropriate).</p>

<h4>.bind();</h4>
<p>With .bind();, we can make a parameter equal to &#8220;this&#8221; in the eyes of a given function:</p>

<pre class="prettyprint">
//first we add a click event to the button we saw above
//then, instead of just calling the function
//we call the function and add ".bind()"
//we then place whatever we want to pass to the function
//now, inside the function "newTweenSet," "this" will refer to "newTween"
$('netTween_set').addEvent('click', newTweenSet.bind(newTween));
</pre>

<p>So if we look at the function above, &#8220;this&#8221; is now equivalent to saying &#8220;newTween&#8221; (which is our tween object).</p>
<p>Let&#8217;s put the whole thing together:</p>

<pre class="prettyprint">
//here is our function
var newTweenSet = function() {
	//since we used bind, "this" now refers to "newTween"
	//so we are really saying
	//newTween.set('width', '300px')
	this.set('width', '300px');
}
 
window.addEvent('domready', function() {
	//first we place our element into a var
	var newTweenElement = $('newTween');
	//then we create a new FX.Tween and assign it to its own var
	var newTween = new Fx.Tween(newTweenElement);
	//now we add our event and bind newTween and newTweenSet
	$('netTween_set').addEvent('click', newTweenSet.bind(newTween));  
});
</pre>

<h4>Starting a tween effect</h4>
<p>Now that we have our tween object all set up, our function is outside of of the domready event and we learned out how to .set(); a style parameter, lets move onto the actual tweening.  Starting a tween is very simple and similarly to .fade();, there are two ways to use .start();</p>

<ol>
	<li>Tween a property value from the existing value to another</li>
	<li>Set a property value, then tween to another</li>
</ol>

<pre class="prettyprint">
//this will tween from the existing value of width to 300px
newTween.start('width', '300px');
//this one will first set the width to 100px, then tween to 300px
newTween.start('width', '100px', '300px');
</pre>

<p>Now, you can .start(); the tween from inside a function and use &#8216;this&#8217; once you .bind() the function with &#8220;newTween.&#8221;</p>

<h4>Thats all on tweens for now&#8230;</h4>
<p>Although, there is still a lot to talk about regarding tweening effects.  For example, if you want to &#8220;tween&#8221; multiple style properties at once, you would use .morph();.  And you can use the transitions library to change the, well, transition.  But this tutorial is already long enough, so we will leave those for another day.</p>

<h3>To Learn More&#8230;</h3>
<p>As always, your best resource is the Mootools 1.2 docs.</p>
<ul>
	<li>info on <a href="http://docs.mootools.net/Fx/Fx.Tween">.tween();</a></li>
	<li>also, poke around <a href="http://docs.mootools.net/Fx/Fx.Morph">.morph();</a> and the <a href="http://docs.mootools.net/Fx/Fx.Transitions">transitions</a> library</li>
</ul>

<h4>Tomorrow&#8217;s Tutorial</h4>
<p><a href="index.php?day=11">We will continue looking at the Fx library, focusing on morph, as well as the Fx options and events</a>.</p>