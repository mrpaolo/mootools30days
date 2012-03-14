<h2>Event Handling in Mootools 1.2</h2>
<p>If you haven&#8217;t already, be sure and check out the rest of the <a href="http://web.archive.org/web/20090210044531/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-1-intro-to-the-library/">Mootools 1.2 tutorials</a> in our 30 days series.</p>

<p>Welcome to Day 5 of <strong>30 Days of Mootools</strong>.  In the last tutorial we looked at different ways to create and use functions within Mootools 1.2.  The next step is to get a grasp on events.  Like selectors, events are an essential part of creating an interactive UI.  Once you get a hold of an element, you need to then decide what action will cause what effect.  Leaving the effects for a later tutorial, lets take a look at that middle step and explore some common events.</p>
<h3>Single Left Click</h3>
<p>The single left click is the most common event in web development.  Hyperlinks recognize the click event and take you to another URL.  Mootools can recognize the click event on other DOM elements, giving you tremendous flexibility in design and functionality.  The first step is to add the click event to an element:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//$('id_name') defines the element</span>
<span style="color: #006600; font-style: italic;">//.addEvent adds the event</span>
<span style="color: #006600; font-style: italic;">//('click') defines the type of event</span>
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'id_name'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

    <span style="color: #006600; font-style: italic;">//put whatever you want to happen on click in here</span>
    <span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'this element now recognizes the click event'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>You can accomplish the same thing by separating out the function from .addEvent();.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> clickFunction <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

    <span style="color: #006600; font-style: italic;">//put whatever you want to happen in here</span>
    <span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'this element now recognizes the click event'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

    $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'id_name'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> clickFunction<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>


<div class="wp_syntax"><div class="code"><pre>&lt;body&gt;

    &lt;div id=&quot;id_name&quot;&gt; &lt;! -- this element now recognizes the click event --&gt;
    &lt;/div&gt;
&lt;/body&gt;</pre></div></div>

<p><strong>Note</strong>: Just like the click event recognized by hyperlinks, Mootools&#8217; click event actually recognizes &#8220;mouse up,&#8221; meaning when you let go of the mouse button, <strong>not</strong> when you push it down.  This is to give users a chance to change their mind by dragging the mouse cursor off of the clicked element before letting the mouse button up.</p>

<h3>Mouse Enter &#038; Mouse Leave</h3>
<p>Hyperlinks also recognize &#8220;hover&#8221; events, where the cursor is over the anchor element.  With Mootools, you can add a hover event to other DOM elements.  By splitting it up into mouseenter and mouseleave, you get greater control over manipulating the DOM upon users&#8217; actions.</p>
<p>Just like before, the first thing we have to do is attach an event to an element</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> mouseEnterFunction <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

    <span style="color: #006600; font-style: italic;">//put whatever you want to happen in here</span>
    <span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'this element now recognizes the mouse enter event'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

    $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'id_name'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'mouseenter'</span><span style="color: #339933;">,</span> mouseEnterFunction<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Mouseleave works the same way.  This event fires when the cursor leaves an element.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> mouseLeaveFunction <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
    <span style="color: #006600; font-style: italic;">//put whatever you want to happen in here</span>
    <span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'this element now recognizes the mouse leave event'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>

&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
   $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'id_name'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'mouseleave'</span><span style="color: #339933;">,</span> mouseLeaveFunction<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h3>Remove an Event</h3>
<p>There are times when you will need to remove an event from an element once it is no longer needed.  Removing an event is just as easy as adding one, and even follows a similar structure.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//works just like the previous examples, only replace .addEvent with .removeEvent</span>
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'id_name'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">removeEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'mouseleave'</span><span style="color: #339933;">,</span> mouseLeaveFunction<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h3>Keystrokes in Textarea or Input</h3>
<p>Mootools also lets you recognize keystrokes in textareas and inputs.  The syntax for this is just like what we saw above:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> keydownEventFunction <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span> <span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
    <span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'This textarea can now recognize keystroke events'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span><span style="color: #339933;">;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
    $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'myTextarea'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'keydown'</span><span style="color: #339933;">,</span> keydownEventFunction<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>The above code will recognize any keystroke.  To target a particular keystroke, we need to add a <strong>parameter</strong> and use an <strong>if</strong> statement:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//notice the paramater &quot;event&quot; within the function parenthesis</span>

<span style="color: #003366; font-weight: bold;">var</span> keyStrokeEvent <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>event<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
    <span style="color: #006600; font-style: italic;">// this says, &quot;if the event key that was pressed is equal to &quot;k,&quot; do the following.&quot;</span>
    <span style="color: #000066; font-weight: bold;">if</span> <span style="color: #009900;">&#40;</span>event.<span style="color: #006600;">key</span> <span style="color: #339933;">==</span> <span style="color: #3366CC;">&quot;k&quot;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>  
	    <span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;This tutorial has been brought you by the letter k.&quot;</span><span style="color: #009900;">&#41;</span> 
    <span style="color: #009900;">&#125;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
    $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'myTextarea'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'keydown'</span><span style="color: #339933;">,</span> keyStrokeEvent<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>For other controls, such as &#8220;shift&#8221; and &#8220;control,&#8221; the syntax is slightly different:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> keyStrokeEvent <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>event<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

    <span style="color: #006600; font-style: italic;">// this says, &quot;if the event key that was pressed is &quot;shift,&quot; do the following.&quot;</span>
    <span style="color: #000066; font-weight: bold;">if</span> <span style="color: #009900;">&#40;</span>event.<span style="color: #006600;">shift</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span> 
	    <span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;You pressed shift.&quot;</span><span style="color: #009900;">&#41;</span> 
    <span style="color: #009900;">&#125;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
    $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'myTextarea'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'keydown'</span><span style="color: #339933;">,</span> keyStrokeEvent<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>


<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;body_wrap&quot;&gt;
    &lt;textarea id=&quot;myInput&quot;&gt;&lt;/textarea&gt;
&lt;/div&gt;</pre></div></div>

<h3>Example</h3>

<p>Here are some working examples of the code we went over above:</p>
<p><strong>Note</strong>: try clicking on the single click example, but instead of letting the left click button up, move your cursor off of the block with the button still held down.  Notice how it does NOT fire the click event.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> keyStrokeEvent <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>event<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
    <span style="color: #006600; font-style: italic;">// this says, &quot;if the event key that was pressed is &quot;k,&quot; do the following.&quot;</span>

    <span style="color: #000066; font-weight: bold;">if</span> <span style="color: #009900;">&#40;</span>event.<span style="color: #006600;">key</span> <span style="color: #339933;">==</span> <span style="color: #3366CC;">'k'</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span> 
	    <span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;This Mootorial was brought to you by the letter 'k.'&quot;</span><span style="color: #009900;">&#41;</span>  
    <span style="color: #009900;">&#125;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>

&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> mouseLeaveFunction <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
    <span style="color: #006600; font-style: italic;">//put whatever you want to happen in here</span>
    <span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'this element now recognizes the mouse leave event'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>

&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> mouseEnterFunction <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
    <span style="color: #006600; font-style: italic;">//put whatever you want to happen in here</span>
    <span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'this element now recognizes the mouse enter event'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>

&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> clickFunction <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
    <span style="color: #006600; font-style: italic;">//put whatever you want to happen in here</span>
    <span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'this element now recognizes the click event'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>

&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
    $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> clickFunction<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

    $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'enter'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'mouseenter'</span><span style="color: #339933;">,</span> mouseEnterFunction<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
    $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'leave'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'mouseleave'</span><span style="color: #339933;">,</span> mouseLeaveFunction<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

    $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'keyevent'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'keydown'</span><span style="color: #339933;">,</span> keyStrokeEvent<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>


<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;click&quot; class=&quot;block&quot;&gt;Single Left Click&lt;/div&gt;&lt;br /&gt;

&lt;div id=&quot;enter&quot; class=&quot;block&quot;&gt;Mouse Enter&lt;/div&gt;&lt;br /&gt;
&lt;div id=&quot;leave&quot; class=&quot;block&quot;&gt;Mouse Leave&lt;/div&gt;&lt;br /&gt;

&lt;textarea id=&quot;keyevent&quot;&gt;Type the letter 'k'&lt;/textarea&gt;</pre></div></div>

<div id="click" class="block">Single Left Click</div>
<p></p>
<div id="enter" class="block">Mouse Enter</div>
<p></p>
<div id="leave" class="block">Mouse Leave</div>
<p>
<textarea id="keyevent">Type the letter &#8216;k&#8217;</textarea></p>

<h3>To Learn More&#8230;</h3>
<h4><a href="http://web.archive.org/web/20090210044531/http://www.consideropen.com/downloads/30days_of_moo/mootorial_day5_events.zip">Download a zip with everything you need to get started</a></h4>
<p>Including the Mootools 1.2 core, an external javascript file, a simple html page and a css file.</p>
<h4>More about Events</h4>
<p>Mootools gives you a lot more control over events than we have covered here.  To learn more, check out some of the following links:</p>
<ul>
<li><a href="http://web.archive.org/web/20090210044531/http://docs.mootools.net/Native/Event">Events</a> within the Mootools docs</li>
<li><a href="http://web.archive.org/web/20090210044531/http://docs.mootools.net/Element/Element.Event">Element.Events</a> in the Mootools docs</li>

<li>Also, read over w3schools&#8217; page on <a href="http://web.archive.org/web/20090210044531/http://www.w3schools.com/jsref/jsref_events.asp">JavaScript events</a></li>
</ul>
<h4>Tomorrow&#8217;s Tutorial - HTML</h4>
<p><a href="http://web.archive.org/web/20090210044531/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-6-manipulating-html/">Day 6 - Manipulating HTML Elements</a></p>
<h3>Tutorial Request or Questions</h3>
<p>The next few tutorials are going to wrap up our basics overview.  We are going to start getting into more complex examples and we are interested to hear what kinds of things you want to learn about most. Feel free to drop a note with any suggestions, comments or questions.  Thanks and I hope you find this useful.</p>
					</div>
