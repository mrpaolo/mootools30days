<h2>Drag.Move - Drag and Drop with Mootools 1.2</h2>
<p>If you haven&#8217;t already, be sure and check out the rest of the <a href="http://web.archive.org/web/20090212193157/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-1-intro-to-the-library/">Mootools 1.2 tutorials</a> in our 30 days series.</p>

<p>Welcome to Day 12 of 30 Days of Mootools.  Today we are going to take a close look at Drag.Move, a powerful Mootools class that lets you add drag and drop functionality to your web application.  It is set up like the rest of the plugins we have looked at: you create your &#8220;new&#8221; Drag.Move object and pass it to a var.  Then you define your options and events.  That&#8217;s pretty much all there is to it, but be sure to check out the description of IE CSS quirks in the example.</p>
<h3>The Basics</h3>
<h4>Drag.Move</h4>
<p>Setting up your drag object is very easy.  Just take a look below.  Notice how we have separated out our Drag.Move options and events from our Drag options and events.  Drag.Move extends Drag, so it will accept both its options and events, as well as Drag&#8217;s.  We are not going to look at Drag specifically today, but we are going to explore a few of the useful options and events.  Take a look at the code below, then read on to learn the specifics. </p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> myDrag <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Drag.<span style="color: #006600;">Move</span><span style="color: #009900;">&#40;</span>dragElement<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

	        <span style="color: #006600; font-style: italic;">// Drag.Move Options</span>
		droppables<span style="color: #339933;">:</span> dropElement<span style="color: #339933;">,</span>
		container<span style="color: #339933;">:</span> dragContainer<span style="color: #339933;">,</span>

		<span style="color: #006600; font-style: italic;">// Drag Options</span>
		handle<span style="color: #339933;">:</span> dragHandle<span style="color: #339933;">,</span>
		<span style="color: #006600; font-style: italic;">// Drag.Move Events</span>
                <span style="color: #006600; font-style: italic;">// the Drag.Move events pass the dragged element, </span>
                <span style="color: #006600; font-style: italic;">// and the dropped into droppable element</span>

		onDrop<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>el<span style="color: #339933;">,</span> dr<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
                        <span style="color: #006600; font-style: italic;">//will alert the id of the dropped into droppable element</span>
                        <span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span>dr.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'id'</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
                <span style="color: #006600; font-style: italic;">// Drag Events</span>
                <span style="color: #006600; font-style: italic;">// Drag events pass the dragged element</span>
                onComplete<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>el<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

			<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span>el.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'id'</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">&#125;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Let&#8217;s break this down a bit&#8230;</p>
<h4>Drag.Move Options</h4>

<p>The Drag.Move options let you set two important elements:</p>
<p><strong>droppables</strong> - Set the selector of droppable elements (which elements will register on drop related events)</p>
<p><strong>container</strong> - Set the drag element&#8217;s container (will keep the element inside)</p>
<p>Setting the options is simple:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//here we define a single element by id </span>
<span style="color: #003366; font-weight: bold;">var</span> dragElement <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'drag_element'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #006600; font-style: italic;">//here we define an array of elements by class</span>
<span style="color: #003366; font-weight: bold;">var</span> dropElements <span style="color: #339933;">=</span> $$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.drag_element'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> dragContainer <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'drag_container'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #006600; font-style: italic;">//now we set up our Drag.Move object</span>
<span style="color: #003366; font-weight: bold;">var</span> myDrag <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Drag.<span style="color: #006600;">Move</span><span style="color: #009900;">&#40;</span>dragElement <span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>
	        <span style="color: #006600; font-style: italic;">// Drag.Move Options</span>

                <span style="color: #006600; font-style: italic;">// set up our droppables element with the droppables var we defined above</span>
		droppables<span style="color: #339933;">:</span> dropElements <span style="color: #339933;">,</span>
               <span style="color: #006600; font-style: italic;">// set up our container element with the container element var</span>
		container<span style="color: #339933;">:</span> dragContainer 
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Now your draggable element is contained and you have a class that will accept drops.</p>
<h4>Drag.Move Events</h4>
<p>The events give you the ability to fire a function at different points, such as when you start to drag the object or when you drop it.  Each Drag.Move event will pass the dragged element and the dropped into element (as long as its droppable) as parameters.</p>
<p><strong>onDrop</strong> - this will fire when you drop the draggable element into a droppable element</p>
<p><strong>onLeave</strong> - fires when a draggable element leaves a droppable element&#8217;s bounds</p>
<p><strong>onEnter</strong> - fires when a draggable element enters a droppable element</p>

<p>Each of these events will call a function and that function will fire when the event happens.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> dragContainer <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'drag_container'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> myDrag <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Drag.<span style="color: #006600;">Move</span><span style="color: #009900;">&#40;</span>dragElement <span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

	        <span style="color: #006600; font-style: italic;">// Drag.Move Options</span>
		droppables<span style="color: #339933;">:</span> dropElements <span style="color: #339933;">,</span>
		container<span style="color: #339933;">:</span> dragContainer <span style="color: #339933;">,</span>

	        <span style="color: #006600; font-style: italic;">// Drag.Move Options</span>
                <span style="color: #006600; font-style: italic;">// the Drag.Move functions will pass the draggable element ('el' in this case)</span>
                <span style="color: #006600; font-style: italic;">// and the droppable element the draggable is interacting with ('dr' here)</span>
                onDrop<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>el<span style="color: #339933;">,</span> dr<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

                        <span style="color: #006600; font-style: italic;">// roughly translates to, &quot;if the element you drop onto is NOT a droppable element</span>
			<span style="color: #000066; font-weight: bold;">if</span> <span style="color: #009900;">&#40;</span><span style="color: #339933;">!</span>dr<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span> 
                            <span style="color: #006600; font-style: italic;">//dont do anything</span>
                        <span style="color: #009900;">&#125;</span>
                        <span style="color: #006600; font-style: italic;">// otherwise (logically meaning, if the element you drop onto IS droppable</span>

                        <span style="color: #006600; font-style: italic;">// do this other thing here</span>
        	        <span style="color: #000066; font-weight: bold;">else</span> <span style="color: #009900;">&#123;</span>
			    <span style="color: #006600; font-style: italic;">//have something happen when you drop on a droppable</span>
			<span style="color: #009900;">&#125;</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
		onLeave<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>el<span style="color: #339933;">,</span> dr<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

			<span style="color: #006600; font-style: italic;">// this will fire when a draggable leaves a droppable element</span>
		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
		onEnter<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>el<span style="color: #339933;">,</span> dr<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

			<span style="color: #006600; font-style: italic;">// this will fire when a draggable enters a droppable element</span>
		<span style="color: #009900;">&#125;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>A few Drag events and options</h4>
<p>There are quite a few options and events for Drag, but here we are just going to look at a few.</p>
<p><strong>snap - option</strong></p>
<p>Snap lets you set how many px the user must drag their cursor before the draggable element starts dragging.  The default is 6, and you can set it any number or variable representing a number.  Clearly, there are limits to what is reasonable (setting snap to 1000 wouldn&#8217;t be all that useful), but this does come in handy by letting you customize the user experience that much more.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> myDrag <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Drag.<span style="color: #006600;">Move</span><span style="color: #009900;">&#40;</span>dragElement <span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>
	        <span style="color: #006600; font-style: italic;">// Drag Options</span>

		snap<span style="color: #339933;">:</span> <span style="color: #CC0000;">10</span> 
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p><strong>handle - option</strong></p>
<p>Handle adds a handle to your draggable element.  The handle becomes the only element that will accept the &#8216;grab,&#8217; letting you use the rest of the element for other things.  To set up a handle, just call the element.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">// here we are setting up an array using a class selector</span>
<span style="color: #006600; font-style: italic;">// this will let us easily add multiple handles if we decide to have multiple draggables</span>
<span style="color: #003366; font-weight: bold;">var</span> dragHandle <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'drag_handle'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #003366; font-weight: bold;">var</span> myDrag <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Drag.<span style="color: #006600;">Move</span><span style="color: #009900;">&#40;</span>dragElement <span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

	        <span style="color: #006600; font-style: italic;">// Drag Options</span>
		handle<span style="color: #339933;">:</span> dragHandle 
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p><strong>onStart - event</strong></p>
<p>On start does what it says, fires an event on the start of drag.  If you have a long snap set, then this event wouldn&#8217;t fire until the mouse had gone that distance.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> myDrag <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Drag.<span style="color: #006600;">Move</span><span style="color: #009900;">&#40;</span>dragElement <span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>
	        <span style="color: #006600; font-style: italic;">// Drag Options</span>
                <span style="color: #006600; font-style: italic;">// Drag options will pass the dragged element as a parameter</span>

		onStart<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>el<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
                    <span style="color: #006600; font-style: italic;">// put whatever you want to happen on start in here</span>
               <span style="color: #009900;">&#125;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p><strong>onDrag - event</strong></p>
<p>This event, onDrag, will fire continuously while you are dragging an element.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> myDrag <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Drag.<span style="color: #006600;">Move</span><span style="color: #009900;">&#40;</span>dragElement <span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

	        <span style="color: #006600; font-style: italic;">// Drag Options</span>
                <span style="color: #006600; font-style: italic;">// Drag options will pass the dragged element as a parameter</span>
		onDrag<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>el<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
                    <span style="color: #006600; font-style: italic;">// put whatever you want to happen on drag in here</span>

               <span style="color: #009900;">&#125;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p><strong>onComplete - event</strong></p>
<p>Finally, onComplete refers to when you drop a grabbable, and it will fire whether or not you land in a droppable.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> myDrag <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Drag.<span style="color: #006600;">Move</span><span style="color: #009900;">&#40;</span>dragElement <span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

	        <span style="color: #006600; font-style: italic;">// Drag Options</span>
                <span style="color: #006600; font-style: italic;">// Drag options will pass the dragged element as a parameter</span>
		onComplete<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>el<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
                    <span style="color: #006600; font-style: italic;">// put whatever you want to happen on complete</span>

               <span style="color: #009900;">&#125;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h3>Example</h3>
<p>Let&#8217;s put this all together in a way that highlights when different events fire, and let&#8217;s use the options we looked at above to configure the Drag.Move object:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

	<span style="color: #003366; font-weight: bold;">var</span> dragElement <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'drag_me'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #003366; font-weight: bold;">var</span> dragContainer <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'drag_cont'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #003366; font-weight: bold;">var</span> dragHandle <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'drag_me_handle'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #003366; font-weight: bold;">var</span> dropElement <span style="color: #339933;">=</span> $$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.draggable'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #003366; font-weight: bold;">var</span> startEl <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'start'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #003366; font-weight: bold;">var</span> completeEl <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'complete'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #003366; font-weight: bold;">var</span> dragIndicatorEl <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'drag_ind'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #003366; font-weight: bold;">var</span> enterDrop <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'enter'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #003366; font-weight: bold;">var</span> leaveDrop <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'leave'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #003366; font-weight: bold;">var</span> dropDrop <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'drop_in_droppable'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 

&nbsp;
	<span style="color: #003366; font-weight: bold;">var</span> myDrag <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Drag.<span style="color: #006600;">Move</span><span style="color: #009900;">&#40;</span>dragElement<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>
	    <span style="color: #006600; font-style: italic;">// Drag.Move options</span>

		droppables<span style="color: #339933;">:</span> dropElement<span style="color: #339933;">,</span>
		container<span style="color: #339933;">:</span> dragContainer<span style="color: #339933;">,</span>
		<span style="color: #006600; font-style: italic;">// Drag options</span>

		handle<span style="color: #339933;">:</span> dragHandle<span style="color: #339933;">,</span>
		<span style="color: #006600; font-style: italic;">// Drag.Move Events</span>
		onDrop<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>el<span style="color: #339933;">,</span> dr<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

			<span style="color: #000066; font-weight: bold;">if</span> <span style="color: #009900;">&#40;</span><span style="color: #339933;">!</span>dr<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span> <span style="color: #009900;">&#125;</span>
&nbsp;
        	        <span style="color: #000066; font-weight: bold;">else</span> <span style="color: #009900;">&#123;</span>
				dropDrop.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#FB911C'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> <span style="color: #006600; font-style: italic;">//flashes orange</span>

				el.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#fff'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> <span style="color: #006600; font-style: italic;">//flashes white</span>
				dr.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#667C4A'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> <span style="color: #006600; font-style: italic;">//flashes green</span>
			<span style="color: #009900;">&#125;</span><span style="color: #339933;">;</span>

		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
		onLeave<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>el<span style="color: #339933;">,</span> dr<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
			leaveDrop.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#FB911C'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> <span style="color: #006600; font-style: italic;">//flashes orange</span>

		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
		onEnter<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>el<span style="color: #339933;">,</span> dr<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
			enterDrop.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#FB911C'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> <span style="color: #006600; font-style: italic;">//flashes orange</span>

		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
		<span style="color: #006600; font-style: italic;">// Drag Events</span>
		onStart<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>el<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
			startEl.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#FB911C'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> <span style="color: #006600; font-style: italic;">//flashes orange</span>

		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
		onDrag<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>el<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
			dragIndicatorEl.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#FB911C'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> <span style="color: #006600; font-style: italic;">//flashes orange</span>

		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
		onComplete<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>el<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
			completeEl.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#FB911C'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> <span style="color: #006600; font-style: italic;">//flashes orange</span>

		<span style="color: #009900;">&#125;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p><strong>Note on the css:</strong> For the Drag.Move container to register properly in IE, you will need to be sure to include positioning spelled out in the following css.  The important part is to remember to set the container with &#8220;position: relative&#8221; and the draggable with &#8220;position: absolute,&#8221; then be sure to set the position of the draggable with &#8220;left&#8221; and &#8220;top.&#8221;  Now, if you are just building for all the other browsers that follow the rules, you can ignore this part:</p>

<div class="wp_syntax"><div class="code"><pre>/* this is generally a good idea */
body {
	margin: 0<SEMI>
	padding: 0<SEMI>
}
&nbsp;
/* make sure the draggable element has &quot;position: absolute&quot; 
*/ and then top and left are set for the start position
#drag_me {
	width: 100px<SEMI>
	height: 100px<SEMI>

	background-color: #333<SEMI>
	position: absolute<SEMI>
	top: 0<SEMI>
	left: 0<SEMI>
}
&nbsp;
&nbsp;
#drop_here {
	width: 200px<SEMI>

	height: 200px<SEMI>
	background-color: #eee<SEMI>
}
&nbsp;
/* make sure the drag container is set with position relative */
#drag_cont {
	background-color: #ccc<SEMI>  
	height: 600px<SEMI> 
	width: 500px<SEMI>
	position: relative<SEMI>

	margin-top: 100px<SEMI>
	margin-left: 100px<SEMI>
}
&nbsp;
&nbsp;
#drag_me_handle {
	width: 100%<SEMI>
	height: auto<SEMI>
	background-color: #666<SEMI>

}
&nbsp;
#drag_me_handle span {
	display: block<SEMI>
	padding: 5px<SEMI>
}
&nbsp;
&nbsp;
.indicator {
	width: 100%<SEMI>
	height: auto<SEMI>
	background-color: #0066FF<SEMI>

	border-bottom: 1px solid #eee<SEMI>
}
&nbsp;
.indicator span {
	padding: 10px<SEMI>
	display: block<SEMI>
}
&nbsp;
.draggable {
	width: 200px<SEMI>
	height: 200px<SEMI>

	background-color: blue<SEMI>
}</pre></div></div>

<p>And now we set up our html:</p>

<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;drag_cont&quot;&gt;
    &lt;div id=&quot;start&quot; class=&quot;indicator&quot;&gt;&lt;span&gt;Start&lt;/span&gt;&lt;/div&gt;

    &lt;div id=&quot;drag_ind&quot; class=&quot;indicator&quot;&gt;&lt;span&gt;Drag&lt;/span&gt;&lt;/div&gt;
    &lt;div id=&quot;complete&quot; class=&quot;indicator&quot;&gt;&lt;span&gt;Complete&lt;/span&gt;&lt;/div&gt;

    &lt;div id=&quot;enter&quot; class=&quot;indicator&quot;&gt;&lt;span&gt;Enter Droppable Element&lt;/span&gt;&lt;/div&gt;
    &lt;div id=&quot;leave&quot; class=&quot;indicator&quot;&gt;&lt;span&gt;Leave Droppable Element&lt;/span&gt;&lt;/div&gt;

    &lt;div id=&quot;drop_in_droppable&quot; class=&quot;indicator&quot;&gt;&lt;span&gt;Dropped in Droppable Element&lt;/span&gt;&lt;/div&gt;
    &lt;div id=&quot;drag_me&quot;&gt;
        &lt;div id=&quot;drag_me_handle&quot;&gt;&lt;span&gt;handle&lt;/span&gt;&lt;/div&gt;

    &lt;/div&gt;
&nbsp;
    &lt;div id=&quot;drop_here&quot; class=&quot;draggable&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</pre></div></div>

<div id="drag_cont">
<div id="start" class="indicator">

        	<span>Start</span>
        </div>
<div id="drag_ind" class="indicator">
        	<span>Drag</span>
        </div>
<div id="complete" class="indicator">
        	<span>Complete</span>
        </div>

<div id="enter" class="indicator">
        	<span>Enter Droppable Element</span>
        </div>
<div id="leave" class="indicator">
        	<span>Leave Droppable Element</span>
        </div>
<div id="drop_in_droppable" class="indicator">
        	<span>Dropped in Droppable Element</span>
        </div>

<div id="drag_me">
<div id="drag_me_handle">
            	<span>handle</span>
            </div>
</p></div>
<div id="drop_here" class="draggable">
        </div>
</p></div>
<h3>To Learn More&#8230;</h3>
<p>Here are few relevant sections from the docs:</p>
<ul>

<li><a href="http://web.archive.org/web/20090212193157/http://docs.mootools.net/Plugins/Drag">Drag</a></li>
<li><a href="http://web.archive.org/web/20090212193157/http://docs.mootools.net/Plugins/Drag.Move">Drag.Move</a></li>
</ul>
<h4><a href="http://web.archive.org/web/20090212193157/http://www.consideropen.com/downloads/30days_of_moo/mootorial_day12_dragdrop.zip">Download a zip with everything you need to get started</a></h4>
<p>Including the mootools 1.2 core, the mootools 1.2 more library, an external javascript file for your functions, an external css file for your styles, and simple html file and the example above.</p>
<h4>Tomorrow&#8217;s Tutorial</h4>
<p><a href="http://web.archive.org/web/20090212193157/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-13-regular-expressions/">For Day 13, we are going to look at using regular expressions with Mootools 1.2</a></p>
<h3>Questions, Comments, Suggestions?</h3>
<p>There are still some more basic concepts to cover, but we are going to now branch out deeper into the library.  Within the next week or so we are going to start to feature some practical projects that will give you more control over your user interface.  Please let us know if there are any more &#8216;fundamentals&#8217; you would like to cover, if there are any projects you would like to see featured here, and of course, any questions, comments or suggestions.  Thanks and hope you are finding this series useful.</p>

					