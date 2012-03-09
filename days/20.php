<h2>Project - A few ways to created &#8220;tabbed&#8221; content</h2>

<p>If you haven&#8217;t already, be sure and check out the rest of the <a href="index.php?day=01">Mootools 1.2 tutorials</a> in our 30 days series.</p>

<p>Welcome back to 30 days of Mootools.  From here on out, we are going to loosen our publishing schedule, instead of every day, you can expect new tutorials every few days because we are pretty busy.  Today, we are going to break away from the our coverage of the library and programming basics to do a short project. Using what we have learned so far, there are several ways we can use tabs (and other li&#8217;s) to create content that will only show on hover or on click.</p>

<h3>Simple &#8220;Extra Info&#8221; Tabs</h3>
<h4>Tabs with info on hover</h4>
<p>For this first step, we are going to create a simple menu that will reveal additional info when you hover over a list item. First, set up the html - lets do a ul with four items, then create four divs (one corresponding to each list item):</p>

<pre class="prettyprint">
//here is our menu
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
&lt;div id=&quot;contentfour&quot; class=&quot;hidden&quot;&gt;content for four&lt;/div&gt;
</pre>

<p>For now, let&#8217;s not worry about making this pretty.  In the css, all we need to do is hide the content boxes:</p>

<pre class="prettyprint">
.hidden {
	display: none;
}
</pre>

<p>Now, for the Mootools.  If we want the content to show when someone mouses over it and hide when they leave, we need to set up some functions:</p>

<pre class="prettyprint">
var showFunction = function() {
	this.setStyle('display', 'block');
}

var hideFunction = function() {
	this.setStyle('display', 'none');
}
</pre>

<p>and some events:</p>

<pre class="prettyprint">
window.addEvent('domready', function() {
	//here we can pass our container elements to a var
	var elOne = $('contentone');

	$('one').addEvents({
		//for the mousenter event, we call showFunction
		//and bind elOne, so we can pass the element to the function
		'mouseenter': showFunction.bind(elOne),
		'mouseleave': hideFunction.bind(elOne)
	});
});
</pre>

<p>Now, we just repeat this pattern for each tab and the corresponding content.  Here it is complete:</p>

<pre class="prettyprint">
//here are our functions to change the styles
var showFunction = function() {
	this.setStyle('display', 'block');
}

var hideFunction = function() {
	this.setStyle('display', 'none');
}

window.addEvent('domready', function() {
	//here we turn our content elements into vars
	var elOne = $('contentone');
	var elTwo = $('contenttwo');
	var elThree = $('contentthree');
	var elFour = $('contentfour');

	//add the events to the tabs
	$('one').addEvents({
		//set up the events types
		//and bind the function with the variable to pass
		'mouseenter': showFunction.bind(elOne),
		'mouseleave': hideFunction.bind(elOne)
	});

	$('two').addEvents({
		'mouseenter': showFunction.bind(elTwo),
		'mouseleave': hideFunction.bind(elTwo)
	});

	$('three').addEvents({
		'mouseenter': showFunction.bind(elThree),
		'mouseleave': hideFunction.bind(elThree)
	});

	$('four').addEvents({
		'mouseenter': showFunction.bind(elFour),
		'mouseleave': hideFunction.bind(elFour)
	});
});
</pre>

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
</div>

<h4>Tabs that show content on click</h4>
<p>Taking the idea above, we can easily adjust it to reveal content on click.  Let&#8217;s use the same html as above, and adjust the Mootools code for a click event.</p>
<p>First, we are going to need to adjust our functions.  Since we can&#8217;t hide the content on mouseleave, we need to find another way to switch between the divs. Perhaps the easiest option is to hide them all on click, and just show &#8220;this&#8221; one (being whichever one is passed on click):</p>

<pre class="prettyprint">
var showFunction = function() {
	$$('.hiddenB').setStyle('display', 'none'); 
	this.setStyle('display', 'block');
}
</pre>

<p>Now, when we pass the function an element using bind, it will  hide the others and reveal that element.</p>
<p>Next, we need to adjust events.  First, we only need a single event, so we will use .addEvent();, and next we need to change the event type to &#8216;click.&#8217;</p>

<pre class="prettyprint">
window.addEvent('domready', function() {
	var elOneB = $('contentoneB');
	var elTwoB = $('contenttwoB');
	var elThreeB = $('contentthreeB');
	var elFourB = $('contentfourB');
 
	$('oneB').addEvent('click', showFunction.bind(elOneB));
	$('twoB').addEvent('click', showFunction.bind(elTwoB));
	$('threeB').addEvent('click', showFunction.bind(elThreeB));
	$('fourB').addEvent('click', showFunction.bind(elFourB));
});
</pre>

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
</div>

<h3>Morph Content Tabs</h3>
<p>Extending on the code we have above, we can add some morph functionality when our hidden content is displayed.  To begin, we can set up an Fx.Morph effect just like the previous example, except instead of setting the styles, we will morph them.  Of course, we also have to create our morph objects:</p>

<pre class="prettyprint">
var showFunction = function() {
	//resets all the styles before it morphs the current one
	$$('.hiddenM').setStyles({
		'display': 'none',
		'opacity': 0,
		'background-color': '#fff',
		'font-size': '16px'
	}); 

	//here we start the morph and set the styles to morph to
	this.start({
		'display': 'block',
		'opacity': 1,
		'background-color': '#d3715c',
		'font-size': '31px'
	});
}

window.addEvent('domready', function() {
	var elOneM = $('contentoneM');
	var elTwoM = $('contenttwoM');
	var elThreeM = $('contentthreeM');
	var elFourM = $('contentfourM');

	//creat morph object
	elOneM = new Fx.Morph(elOneM, {
		link: 'cancel'
	});
	
	elTwoM = new Fx.Morph(elTwoM, {
		link: 'cancel'
	});
	
	elThreeM = new Fx.Morph(elThreeM, {
		link: 'cancel'
	});
	
	elFourM = new Fx.Morph(elFourM, {
		link: 'cancel'
	});

	$('oneM').addEvent('click', showFunction.bind(elOneM));
	$('twoM').addEvent('click', showFunction.bind(elTwoM));
	$('threeM').addEvent('click', showFunction.bind(elThreeM));
	$('fourM').addEvent('click', showFunction.bind(elFourM));
});
</pre>

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
	</div>
</div>

<p><strong>Note:</strong> If you click on the above example quickly you will see that it pushes out multiple content divs.  Basically, if showFunction is called before the last one finishes tweening, it will not register it when it hides all content divs.  To solve this, we are going to need to break out of this exact formula, and play a bit with Fx.Elements.</p>

<h3>Example</h3>
<p>This example works just like the above example, except when you click on two tabs quickly, it will not &#8220;stack&#8221; the content divs.</p>

<pre class="prettyprint">
//create a "hide all" function

//create a parameter so you can pass the element
var hideAll = function(fxElementObject){
	fxElementObject.set({
		'0': {
			'display': 'none'
		},
		'1': {
			'display': 'none'
		},
		'2': {
			'display': 'none'
		},
		'3': {
			'display': 'none'
		}
	});
}

//here we create a function for each content element
var showFunctionOne = function() {
	//first, call the hideAll function
	//then pass "this" as the Fx.element object
	hideAll(this);
	//start the Fx.element morph for the index that corresponds to the click event
	this.start({
		'0': {
			'display': ['none', 'block'],
			'background-color': ['#fff', '#999'],
			'font-size': ['16px', '25px']
		}
	});
}

var showFunctionTwo = function() {
	hideAll(this);
	this.start({
		'1': {
			'display': ['none', 'block'],
			'background-color': ['#fff', '#999'],
			'font-size': ['16px', '25px']
		}
	});
}

var showFunctionThree = function() {
	hideAll(this);
	this.start({
		'2': {
			'display': ['none', 'block'],
			'background-color': ['#fff', '#999'],
			'font-size': ['16px', '25px']
		}
	});
}

var showFunctionFour = function() {
	hideAll(this);
	this.start({
		'3': {
			'display': ['none', 'block'],
			'background-color': ['#fff', '#999'],
			'font-size': ['16px', '25px']
		}
	});
}

window.addEvent('domready', function() {
	//create your array to pass to Fx.elements
	var morphElements = $$('.hiddenMel');

	//create a new Fx.Element object
	var elementEffects = new Fx.Elements(morphElements, {
		//set the "link" option to cancel
		link: 'cancel'
	}); 

	$('oneMel').addEvent('click', showFunctionOne.bind(elementEffects));
	$('twoMel').addEvent('click', showFunctionTwo.bind(elementEffects));
	$('threeMel').addEvent('click', showFunctionThree.bind(elementEffects)); 
	$('fourMel').addEvent('click', showFunctionFour.bind(elementEffects)); 
});
</pre>

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
	</div>
</div>

<h3>To Learn More&#8230;</h3>
<p>This one is mostly a review and an application of the  stuff we covered in the previous tutorials.  As such, I am going to recommend that you <a href="http://docs.mootools.net/"></a>read over the docs, in full, if you haven&#8217;t already.  It&#8217;s more fun than it sounds.  If you are new to the library and have been learning along with this tutorial, you may be surprised at how much you understand.</p>

<h4>Tomorrow&#8217;s Tutorial</h4>
<p><a href="index.php?day=21">Classes part 2</a></p>					