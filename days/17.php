<h2>Mootools 1.2 Accordion Tutorial</h2>
<p>If you haven&#8217;t already, be sure and check out the rest of the <a href="http://web.archive.org/web/20090210051945/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-1-intro-to-the-library/">Mootools 1.2 tutorials</a> in our 30 days series.</p>

<p>Continuing with our &#8220;more&#8221; library plugin tutorials, today we are going to look at maybe the most popular plugin, accordion.  Creating and configuring the basic accordion is simple, but be sure to read through carefully, as the more advanced options can be a little tricky.</p>
<h3>The Basics</h3>
<h4>Creating a new accordion</h4>
<p>To create a new accordion you are going to need to select pairs of elements&mdash;the title and the content.  So first, assign a class to each title and a class to each content element:</p>

<div class="wp_syntax"><div class="code"><pre>&lt;h3 class=&quot;togglers&quot;&gt;Toggle 1&lt;/h3&gt;

&lt;p class=&quot;elements&quot;&gt;Here is the content of toggle 1&lt;/p&gt;
&lt;h3 class=&quot;togglers&quot;&gt;Toggle 2&lt;/h3&gt;
&lt;p class=&quot;elements&quot;&gt;Here is the content of toggle 2&lt;/p&gt;</pre></div></div>

<p>Now, we can select all elements with the class &#8220;togglers&#8221; and all elements with the class &#8220;elements,&#8221; throw them into vars, then initiate a new accordion object.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> toggles <span style="color: #339933;">=</span> $$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.togglers'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #003366; font-weight: bold;">var</span> content <span style="color: #339933;">=</span> $$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.elements'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #006600; font-style: italic;">//set up your object var</span>
<span style="color: #006600; font-style: italic;">//create a &quot;new&quot; Accordion object</span>
<span style="color: #006600; font-style: italic;">//set the toggle array</span>
<span style="color: #006600; font-style: italic;">//set the content array</span>
<span style="color: #003366; font-weight: bold;">var</span> AccordionObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Accordion<span style="color: #009900;">&#40;</span>toggles<span style="color: #339933;">,</span> content<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>The default for setting for the accordion will give you something that looks like this:</p>
<h5 class="togglersA">Toggle 1</h5>
<p class="elementsA">Here is the content of toggle 1</p>
<h5 class="togglersA">Toggle 2</h5>
<p class="elementsA">Here is the content of toggle 2</p>
<h5 class="togglersA">Toggle 3</h5>
<p class="elementsA">Here is the content of toggle 3</p>
<h3>Options</h3>

<p>Of course, if you want something other than the default accordion, you are going to need to adjust the options.  Here we will go through each one:</p>
<h4>display</h4>
<p>Default is 0</p>
<p>This option determines which element shows on page load.  The default is 0, so the first element shows.  To set another element, just put in another integer that corresponds to its index.  Unlike &#8220;show,&#8221; display will transition the element open.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> AccordionObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Accordion<span style="color: #009900;">&#40;</span>toggles<span style="color: #339933;">,</span> content <span style="color: #009900;">&#123;</span> 
    display<span style="color: #339933;">:</span> <span style="color: #CC0000;">0</span> <span style="color: #006600; font-style: italic;">//default is 0</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>show</h4>
<p>Default is 0</p>
<p>Much like &#8220;display,&#8221; show determines which element will be open when the page loads, but instead of a transition, &#8220;show&#8221; will just make the content display on load without the transition.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> AccordionObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Accordion<span style="color: #009900;">&#40;</span>toggles<span style="color: #339933;">,</span> content <span style="color: #009900;">&#123;</span> 
    display<span style="color: #339933;">:</span> <span style="color: #CC0000;">0</span> <span style="color: #006600; font-style: italic;">//default is 0</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>height</h4>
<p>Default is true</p>
<p>When set to true, the content will show with a height transition.  This is the standard accordion setting you see above.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> AccordionObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Accordion<span style="color: #009900;">&#40;</span>toggles<span style="color: #339933;">,</span> content <span style="color: #009900;">&#123;</span> 
    height<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">true</span> <span style="color: #006600; font-style: italic;">//default is true</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>width</h4>
<p>Default is false</p>
<p>Like &#8220;height,&#8221; but instead of transitioning the height to show the content, it will transition the width.  If you use &#8220;width&#8221; with a standard set up, like we used above, then the space between the title toggle will stay the same, based on the height of the content.  The &#8220;content&#8221; div will then transition from left to right to display in that space.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> AccordionObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Accordion<span style="color: #009900;">&#40;</span>toggles<span style="color: #339933;">,</span> content <span style="color: #009900;">&#123;</span> 
    width<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">false</span> <span style="color: #006600; font-style: italic;">//default is false </span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>opacity</h4>
<p>Default is true</p>
<p>This option sets whether or not to show an opacity transition effect when you hide and display content.  Since we are using the default options above, you can see the effect there.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> AccordionObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Accordion<span style="color: #009900;">&#40;</span>toggles<span style="color: #339933;">,</span> content <span style="color: #009900;">&#123;</span> 
    opacity<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">true</span> <span style="color: #006600; font-style: italic;">//default is true</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>fixedHeight</h4>
<p>Default is false</p>
<p>To set a fixed height, you can set an integer here (for example, you could put 100 for content 100px tall).  This should be used with some kind of CSS overflow property if you are planning on having a fixed height smaller than the contents natural height.  Works as you would expect, thought it does not seem to register is you use the &#8220;show&#8221; option when you first load the page.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> AccordionObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Accordion<span style="color: #009900;">&#40;</span>toggles<span style="color: #339933;">,</span> content <span style="color: #009900;">&#123;</span> 
    fixedHeight<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">false</span> <span style="color: #006600; font-style: italic;">//default is false</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>fixedWidth</h4>
<p>Default is false</p>
<p>Just like &#8220;fixedHeight&#8221; above, this will set the width if you give this option an integer.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> AccordionObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Accordion<span style="color: #009900;">&#40;</span>toggles<span style="color: #339933;">,</span> content <span style="color: #009900;">&#123;</span> 
    fixedWidth<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">false</span> <span style="color: #006600; font-style: italic;">//default is false </span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>alwaysHide</h4>
<p>Default is false</p>
<p>This option lets you add a toggle control to the titles.  With this set to true, when you click on an open content title, it will close that content element without opening anything else.  You can see this in action in the full example below.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> AccordionObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Accordion<span style="color: #009900;">&#40;</span>toggles<span style="color: #339933;">,</span> content <span style="color: #009900;">&#123;</span> 
    alwaysHide<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">false</span> <span style="color: #006600; font-style: italic;">//default is false</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h3>Events</h3>
<h4>onActive</h4>
<p>This will fire when you toggle open an element.  It will pass the toggle control element and the content element that is opening and parameters.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> AccordionObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Accordion<span style="color: #009900;">&#40;</span>toggles<span style="color: #339933;">,</span> content <span style="color: #009900;">&#123;</span> 
	onActive<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>toggler<span style="color: #339933;">,</span> element<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

		toggler.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#76C83D'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> <span style="color: #006600; font-style: italic;">//green</span>
    	        element.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#76C83D'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>onBackground</h4>
<p>This will fire when an element starts to hide and will pass all other elements that are closing, but not opening.
</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> AccordionObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Accordion<span style="color: #009900;">&#40;</span>toggles<span style="color: #339933;">,</span> content <span style="color: #009900;">&#123;</span> 
	onBackground<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>toggler<span style="color: #339933;">,</span> element<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

        	toggler.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#DC4F4D'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> <span style="color: #006600; font-style: italic;">//red</span>
    		element.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#DC4F4D'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>	
	<span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>onComplete</h4>
<p>This is your standard onComplete event.  It passes a variable containing the content element.  There may be a better way to get these, if anyone knows, drop a note.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> AccordionObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Accordion<span style="color: #009900;">&#40;</span>toggles<span style="color: #339933;">,</span> content <span style="color: #009900;">&#123;</span> 
	onComplete<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>one<span style="color: #339933;">,</span> two<span style="color: #339933;">,</span> three<span style="color: #339933;">,</span> four<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

        	one.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#5D80C8'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> <span style="color: #006600; font-style: italic;">//blue</span>
    		two.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#5D80C8'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
    		three.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#5D80C8'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

    		four.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#5D80C8'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 
	<span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h3>Methods</h3>
<h4>.addSection();</h4>
<p>With this method, you can add a section (a toggle/content element pair).  It works like many of the other methods we have seen.  First refer to the accordion object, tack on .addSection, then you can call the id of the title, the id of the content, and finally state what position you want the new content to appear (0 being the first spot).</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">AccordionObject.<span style="color: #006600;">addSection</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'togglersID'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'elementsID'</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">2</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p><strong>Note:</strong> When you add a section like this, though it will show up in the spot of index 2, the actual index will be be +1 the last index.  So if you have 5 items in your array (0-4) and you add a 6th, its index would be 5 regardless of where you add it with .addSection();</p>
<h4>.display();</h4>

<p>This lets you open a given element.  You can select the element by its index (so if you have added an element pair and you want to display it, you will have a different index here than you would use above.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">AccordionObject.<span style="color: #006600;">display</span><span style="color: #009900;">&#40;</span><span style="color: #CC0000;">5</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> <span style="color: #006600; font-style: italic;">//would display the newly added element</span></pre></div></div>

<h3>Example</h3>
<p>Here we have a full featured accordi0n utilizing all of the events and methods we see above, as well as many of the options.  Check out the live example and cross reference with the code to see how everything works.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//send the toggle and content arrays to vars</span>

<span style="color: #003366; font-weight: bold;">var</span> toggles <span style="color: #339933;">=</span> $$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.togglers'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #003366; font-weight: bold;">var</span> content <span style="color: #339933;">=</span> $$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.elements'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #006600; font-style: italic;">//set up your object var</span>
<span style="color: #006600; font-style: italic;">//create a &quot;new&quot; Accordion object</span>
<span style="color: #006600; font-style: italic;">//set the toggle array</span>
<span style="color: #006600; font-style: italic;">//set the content array</span>
<span style="color: #006600; font-style: italic;">//set your options and events </span>
<span style="color: #003366; font-weight: bold;">var</span> AccordionObject <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Accordion<span style="color: #009900;">&#40;</span>toggles<span style="color: #339933;">,</span> content<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

	<span style="color: #006600; font-style: italic;">//when you load the page</span>
	<span style="color: #006600; font-style: italic;">//will &quot;show&quot; the content (by index)</span>
	<span style="color: #006600; font-style: italic;">//with NO transition, it will just be open</span>
	<span style="color: #006600; font-style: italic;">//also note: if you use &quot;fixedHeight,&quot; </span>

	<span style="color: #006600; font-style: italic;">//show will not work when the page first loads</span>
	<span style="color: #006600; font-style: italic;">//&quot;show&quot; will override &quot;display&quot;</span>
	show<span style="color: #339933;">:</span> <span style="color: #CC0000;">0</span><span style="color: #339933;">,</span> 

&nbsp;
&nbsp;
	<span style="color: #006600; font-style: italic;">//when you load the page</span>
	<span style="color: #006600; font-style: italic;">//this will &quot;display&quot; the content (by index)</span>
	<span style="color: #006600; font-style: italic;">//and the content will transition open</span>
	<span style="color: #006600; font-style: italic;">//if both display and show are set, </span>

	<span style="color: #006600; font-style: italic;">//show will override display</span>
	<span style="color: #006600; font-style: italic;">//display: 0,</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//defaults to true</span>
	<span style="color: #006600; font-style: italic;">//this creates a vertical accordion</span>
	height <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">true</span><span style="color: #339933;">,</span>

&nbsp;
	<span style="color: #006600; font-style: italic;">//this is for horizontal accordions</span>
	<span style="color: #006600; font-style: italic;">//tricky to use due to the css involved</span>
	<span style="color: #006600; font-style: italic;">//maybe a tutorial for another day?</span>
	width <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">false</span><span style="color: #339933;">,</span>

&nbsp;
	<span style="color: #006600; font-style: italic;">//defaults to true</span>
	<span style="color: #006600; font-style: italic;">//will give the content an opacity transition</span>
	opacity<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">true</span><span style="color: #339933;">,</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//defaults to false, can be integar - </span>

	<span style="color: #006600; font-style: italic;">//will fix height of all content containters</span>
	<span style="color: #006600; font-style: italic;">//would need an overflow css rule</span>
	<span style="color: #006600; font-style: italic;">//wont work on page load if you use &quot;show&quot;</span>
	fixedHeight<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">false</span><span style="color: #339933;">,</span> 

&nbsp;
	<span style="color: #006600; font-style: italic;">//can be false or an integer</span>
	<span style="color: #006600; font-style: italic;">//similiar to fixedHeight above, </span>
	<span style="color: #006600; font-style: italic;">//but for horizontal accordions</span>
	fixedWidth<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">false</span><span style="color: #339933;">,</span>

&nbsp;
	<span style="color: #006600; font-style: italic;">//lets you toggle an open item closed</span>
	alwaysHide<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">true</span><span style="color: #339933;">,</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//standard onComplete event</span>
	<span style="color: #006600; font-style: italic;">//passes a variable containing the element for each content element		</span>

	onComplete<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>one<span style="color: #339933;">,</span> two<span style="color: #339933;">,</span> three<span style="color: #339933;">,</span> four<span style="color: #339933;">,</span> five<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		one.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#5D80C8'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> <span style="color: #006600; font-style: italic;">//blue</span>
		two.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#5D80C8'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		three.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#5D80C8'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

		four.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#5D80C8'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 
		five.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#5D80C8'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> <span style="color: #006600; font-style: italic;">//the added section</span>
		$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'complete'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#5D80C8'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//this will fire when you toggle open an element</span>
	<span style="color: #006600; font-style: italic;">//will pass the toggle control element</span>
	<span style="color: #006600; font-style: italic;">//and the content element that is opening</span>
	onActive<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>toggler<span style="color: #339933;">,</span> element<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

		toggler.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#76C83D'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> <span style="color: #006600; font-style: italic;">//green</span>
		element.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#76C83D'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'active'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#76C83D'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//this will fire when an element starts to hide</span>
	<span style="color: #006600; font-style: italic;">//will pass all other elements</span>
	<span style="color: #006600; font-style: italic;">//the one closing or not opening</span>
	onBackground<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>toggler<span style="color: #339933;">,</span> element<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

		toggler.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#DC4F4D'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> <span style="color: #006600; font-style: italic;">//red</span>
		element.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#DC4F4D'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>	
		$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'background'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#DC4F4D'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>	
	<span style="color: #009900;">&#125;</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'add_section'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//the new section is made up of a pair </span>
	<span style="color: #006600; font-style: italic;">//(the new toggle ID and the corresponding Content ID) </span>

	<span style="color: #006600; font-style: italic;">//followed by where you want to place it in the index</span>
	AccordionObject.<span style="color: #006600;">addSection</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'togglersID'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'elementsID'</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">0</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>    
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'display_section'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//will determine which object displays first on page load</span>
	<span style="color: #006600; font-style: italic;">//will override the options display setting</span>
	AccordionObject.<span style="color: #006600;">display</span><span style="color: #009900;">&#40;</span><span style="color: #CC0000;">4</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>  

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Here you can see when the various events fire.</p>
<div id="complete" class="ind">onComplete</div>
<div id="active" class="ind">onActive</div>
<div id="background" class="ind">onBackground</div>
<p>Try adding the a new section with the button below.</p>
<div id="accordion_wrap">
<p class="togglers">Toggle 1</p>
<p class="elements">Here is the content of toggle 1 Here is the content of toggle 1 Here is the content of toggle 1 Here is the content of toggle 1 Here is the content of toggle 1 Here is the content of toggle 1 Here is the content of toggle 1 Here is the content of toggle 1</p>

<p class="togglers">Toggle 2</p>
<p class="elements">Here is the content of toggle 2</p>
<p class="togglers">Toggle 3</p>
<p class="elements">Here is the content of toggle 3</p>
<p class="togglers">Toggle 4</p>
<p class="elements">Here is the content of toggle 4</p>
<p id="togglersID">Toggle Add</p>
<p id="elementsID">Here is the content of toggle 4</p>
</p></div>

<p>    <button id="add_section">add section</button><br />
    <button id="display_section">display section</button></p>
<h4>Quirks</h4>
<ul>
<li>.display will recognize the index, but if you use addSection, that section will be the last index</li>
<li>if you use &#8220;fixedHeight,&#8221; &#8220;show&#8221; will not work on page load, but &#8220;display&#8221; works fine</li>

</ul>
<h4>More Accordion options, events and methods</h4>
<p>Accordion extends the Fx.Element class, which extends the Fx class.  You can use the various options in these classes to further refine your accordion.  Though it performs a simple task, the accordion is a useful and powerful plugin.  I would love to see any examples of people really pushing what it can do.</p>
<h3>To Learn More&#8230;</h3>
<p>Check out the docs sections on <a href="http://web.archive.org/web/20090210051945/http://docs.mootools.net/Plugins/Accordion">accordion</a>, as well as <a href="http://web.archive.org/web/20090210051945/http://docs.mootools.net/Plugins/Fx.Elements">Fx.Elements</a> and <a href="http://web.archive.org/web/20090210051945/http://docs.mootools.net/Fx/Fx">Fx</a>.  You can also see the <a href="http://web.archive.org/web/20090210051945/http://demos.mootools.net/Accordion">accordion at the Mootools official demos</a>.</p>

<h4><a href="http://web.archive.org/web/20090210051945/http://www.consideropen.com/downloads/30days_of_moo/mootorial_day17_accordion.zip">Download a zip with everything you need to get started</a></h4>
<p>Including the Mootools 1.2 core and more libraries, a simple html file, an external javascript file, a css style sheet and the example you see above.</p>
<h4>Tomorrow&#8217;s tutorial</h4>
<p><a href="http://web.archive.org/web/20090210051945/http://www.consideropen.com/blog/2008/09/30-days-of-mootools-12-tutorials-day-18-classes-part-i/">Classes, part 1</a></p>
<h3>Questions, Comments, Suggestions</h3>
<p>Drop us a note if you have any questions or anything to add.  Thanks and hope you find this useful.</p>
					