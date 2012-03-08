<h2>Mootools 1.2 Sliders</h2>
<p>If you haven&#8217;t already, be sure and check out the rest of the <a href="index.php?day=01">Mootools 1.2 tutorials</a> in our 30 days series.</p>

<p>By now, initiating these Mootools plugin objects should start seeming pretty familiar.  Slider is no different, you create your new slider, define the elements for the slider and the handle, you set your options and then create some functions for the callback events.  And though sliders do follow this familiar pattern, there are a few quirks along the way.</p>

<h3>The Basics</h3>
<h4>Creating a new slider object</h4>
<p>Lets first start with our html and css.  The basic idea is to create a div for the slider, so a long rectangle (how long depends on what we are using the slider for) and a child element to act as the knob:</p>

<pre class="prettyprint">
&lt;div id=&quot;slider&quot;&gt;&lt;div id=&quot;knob&quot;&gt;&lt;/div&gt;&lt;/div&gt;
</pre>

<p>Our css can be simple also.  Just set up the width, height and background colors:</p>

<pre class="prettyprint">
#slider {
	width: 200px
	height: 20px
	background-color: #0099FF
}
 
#knob {
	width: 20px
	height: 20px
	background-color: #993333
}
</pre>

<p>Now, we can create our new slider object.  To initiate the slider, first throw your elements into vars, then create a &#8220;new&#8221; slider object just like we did with tween, morph and drag.move:</p>

<pre class="prettyprint">
//put your elements into variables
var sliderObject = $('slider');
var knobObject = $('knob');

//create a  new slider object
//define the slider element first
//then define the knob
var SliderObject = new Slider(sliderObject , knobObject , {

	//here are your options
	//we will look at each one below
	range: [0, 10],
	snap: true,
	steps: 10,
	offset: 0,
	wheel: true,
	mode: 'horizontal',
	//onchange fires when the value of step changes
	//it will pass the current step as a parameter
	onChange: function(step){
		//put what you want to happen on change here
		//you can refer to the step
	},
	//ontick moves when the user drags the knob
	//it will pass the current position (relative to the parent element)
	onTick: function(pos){
		//this is necessary for the knob to adjust
		//we will talk about this more below
		this.knob.setStyle('left', pos);
	},
	//fires when the dragging stops
	onComplete: function(step){
		//put what you want to happen on complete here
		//you can refer to the step
	}
});
</pre>

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

<pre class="prettyprint">
window.addEvent('domready', function() {

	var SliderObject = new Slider('slider', 'knob', {
	
		//options
		range: [0, 10],
		snap: false,
		steps: 10,
		offset: 0,
		wheel: true,
		mode: 'horizontal',

		//callback events
		onChange: function(step){
			$('change').highlight('#F3F825');
			$('steps_number').set('html', step);
		},
		onTick: function(pos){
			$('tick').highlight('#F3F825');
			$('knob_pos').set('html', pos);
			//this line is very necessary (left with horizontal)
			this.knob.setStyle('left', pos);
		},
		onComplete: function(step){
			$('complete').highlight('#F3F825')
			$('steps_complete_number').set('html', step);
			this.set(step);
		}
	});

	var SliderObjectV = new Slider('sliderv', 'knobv', {

		range: [-10, 0],
		snap: true,
		steps: 10,
		offset: 0,
		wheel: true,
		mode: 'vertical',
		onTick: function(pos){
			//this line is very necessary (top with vertical)
			this.knob.setStyle('top', pos);
		},
		onChange: function(step){
			$('stepsV_number').set('html', step*-1);
		}
	});

	//sets the vertical one to start at 0
	//without this it would start at the top
	SliderObjectV.set(0);

	//sets the slider to step 7
	$('set_knob').addEvent('click', function(){ SliderObject.set(7)});
});
</pre>

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
	</div>

	<p><button id="set_knob" class="btn btn-primary">Set knob to position 7</button></p>

	<div id="sliderv">
		<div id="knobv"></div>
	</div>

	<span id="stepsV_number"></span>
</div>
	
<p>Notice on the vertical example that we not only change &#8220;mode&#8221; to &#8220;vertical,&#8221; we also change .setStyle() to &#8220;top&#8221; instead of &#8220;left&#8221; within the onTick event.  Also, see how in &#8220;range&#8221; we start at -10 then go to 0. Then, when we display the number inside onChange, we multiply the negative value by -1, resulting in the positive counterpart.  This accomplishes two things: first, it lets us change the value from 10 to 0, with 0 at the bottom.  While this could be accomplished by setting the range to 10, 0 <strong>the mousewheel becomes inverted.</strong>.  Which brings us to the second reason - the mousewheel reads the values, not the direction you want the handle to go, so the only way to have the mousewheel read the slider correctly AND have the values start at 0 on the bottom was to pull this little trick</p>

<p><strong>Note:</strong> regarding the use of &#8220;top&#8221; and &#8220;left&#8221; within the onTick event, I can&#8217;t say for sure whether or not this is &#8220;regulation&#8221; mootools.  This is just how I was able to get it to work, and I would interested to hear if there are other, possibly cleaner ways.</p>
<h3>To Learn More&#8230;</h3>
<p>As always, check out the docs section on <a href="http://docs.mootools.net/Plugins/Slider#">sliders</a></p>

<h4>Tomorrow&#8217;s Tutorial</h4>
<p><a href="index.php?day=16">Sortables Plugin and Intro to Methods</a></p>					