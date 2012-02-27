<!-- Cool Intro -->

<div class="hero-unit">
	<h1>MooTools in 30 giorni</h1>
	<p>30 lezioni per imparare ad utilizzare la libreria javascript MooTools.</p>
	<!--
	<p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
	-->
</div>

<!-- Real Start -->

<h2>Intro to the Mootools 1.2 Library</h2>
<p>We recently got a request to do 30 days of Mootools 1.2 tutorials and it seemed like such a fine idea that we decided to get started right away.  These tutorials will assume no previous Mootools or JavaScript experience, but will require basic knowledge of html and CSS.</p>

<h3>Introduction to Mootools 1.2 JavaScript Library</h3>
<p><a href="http://mootools.net/">Mootools 1.2</a> is a powerful, lightweight javascript library designed to ease interactive JavaScript web development.  In a way, you can think of a lot of things that Mootools can do as CSS extensions.  For example, CSS lets you change a property on hover. Javascript allows you to recognize more events (click, mouseover, keystrokes, &#8230;) and Mootools makes it almost painfully easy to take advantage of this.</p>
<p>In addition, Mootools has all sorts of nifty extensions which let not only change element properties (like you can with hover), but lets you &#8220;morph&#8221; or &#8220;tween&#8221; properties, giving you the ability to create animated effects like you see on our menu.</p>
<p>Thats just one example, Mootools can allow you to do much more.  Over the next 30 days, we are going to dig deeper into the Mootools library, exploring everything from arrays and functions to FX.Slide and the other bundled plugins.</p>

<h3>Installing Mootools 1.2</h3>
<p>First, download and install the Mootools 1.2 Core library.</p>

<ol>
	<li>Download the <a href="http://mootools.net/download">Mootools 1.2 Core</a> library</li>
	<li>Upload the Mootools 1.2 Core library to your server or workspace</li>
	<li>Link to the Mootools 1.2 Core library in your head tag <code>&lt;script src=&#8221;mootools1.2core.js&#8221; type=&#8221;text/javascript&#8221;&gt;</code></li>
</ol>

<h3>Add Script Tags in your Head Tag</h3>
<p>Now that you are calling Mootools into your page, you need a place to write the code.  There are two options:</p>
<p>1. Place the code between script tags in your head:</p>

<pre>&lt;script type=&quot;text/javascript&quot;&gt;&lt;!--mce:0--&gt;&lt;/script&gt;</pre>

<p>2. Create an external JavaScript file and link to it in your head:</p>

<pre>&lt;script src=&quot;myJavaScriptFile.js&quot; type=&quot;text/javascript&quot;&gt;&lt;!--mce:1--&gt;&lt;/script&gt;</pre>

<p>From here on out, you can use either method.  I will often call the functions within the domready event inside the script tags, but create my functions in an external JavaScript file.</p>

<h3>Put it in the domready</h3>
<p>Mootools functions must be called within the domready event.</p>

<pre>
window.addEvent('domready', function() {
    exampleFunction();
});
</pre>

<h3>Put it in a Function</h3>
<p>You can still build your function outside of the domready, then call it within.</p>

<pre>
var exampleFunction = function() {
     alert('hello')
};

window.addEvent('domready', function() {
    exampleFunction();
});
</pre>

<h3>Library Description</h3>
<p>For this first tutorial, we are going to take a closer look at the key components of the library&#8217;s architecture and go over some of the basic functionality.</p>

<h4>Core</h4>
<p>The core contains common functions within the Mootools library and makes it easy to accomplish common tasks as well as beefing up a lot of pre-existing functionality (more on that later).  The following is meant only as an example of some of Mootools&#8217; capabilities and is no replacement for reading the <a href="http://docs.mootools.net/">Mootools documentation.</a></p>

<ul>
	<li>Check for a value (returns false if no value or 0 is found) - $chk(value);</li>
	<li>Return a random integer between two values - $random(min, max);</li>
	<li>Lets you easily detect <a href="http://docs.mootools.net/Core/Browser">browsers, browser engines and browser capabilities</a></li>
</ul>

<h4>Native</h4>
<p>This section of the library also contains common tools, letting you manipulate arrays (basically a list of values or objects), functions, numbers, strings, hashes and events.  Here are a few of the tools featured in Native:</p>

<ul>
	<li>Create a script that will apply to each object within an array - .each();</li>
	<li>Get the last item within an array - .getLast();</li>
	<li>Create an event that happens every x milliseconds - .periodical();</li>
	<li>Round a decimal - .round();</li>
	<li>Convert rbg to HEX - .rgbToHex();</li>
</ul>

<h4>Class</h4>
<p>A JavaScript class (in contrast to a CSS class), is a reusable object with functionality.  To learn more about Mootools classes you can check out this quick intro by Valerio (<a href="http://blog.mootools.net/2008/2/5/mootools-classes-how-to-use-them">Mootools Classes - How to Use Them</a>).  I would also recommend <a href="http://davidwalsh.name/mootools-12-class-template">David Walsh&#8217;s Mootools Class Template</a>.</p>

<h4>Element</h4>
<p>The element classes provide some of the most useful functionality within the Mootools library.  Here is where you will select Dom elements, manipulate their properties and position, and change their CSS styles.  Here are few of the great tools Mootools provides to deal with Dom elements:</p>
<ul>
	<li>Select the first of a certain type of DOM element, ID or class - .getElement();</li>
	<li>Select all of a certain type of DOM element, ID or class - .getElements();</li>
	<li>Add a class to an element - .addClass();</li>
	<li>Find out the value of an element&#8217;s property - .getProperty();</li>
	<li>Change the value of an element&#8217;s property - .setProperty();</li>
	<li>Find out the value of an element&#8217;s style property - .getStyle();</li>
	<li>Change the value of an element&#8217;s style property - .setStyle();</li>
	<li>Get an elements coordinates - .getCoordinates();</li>
</ul>

<h4>Utilities</h4>
<p>Utilities provides more refined selector logic, includes the domready event, gives you tools to manage AJAX calls, lets you easily manage cookies and even includes the &#8220;swiff&#8221; functionality which lets you interface JavaScript with ActionScript.</p>

<h4>FX</h4>
<p>This is probably Mootools&#8217; most fun section.  With FX you can create &#8220;tween&#8221; and &#8220;morph&#8221; effects that add animation to your  DOM objects.</p>
<ul>
	<li>Create an animated transition between two style values (e.g. grow a div larger smoothly) - var myFx = new Fx.Tween(element);</li>
	<li>Create an animated transition between multiple different style values (e.g. grow a div larger smoothly and change the background color while making the border thicker) - var myFx = new Fx.Morph(element);</li>
</ul>

<h4>Request</h4>
<p>Contains tools to ease dealing with Javascripts XMLHttpRequest (Ajax) functionality. Above making the entire request/response process much less painful, Request has extensions to deal specifically with either HTML or <a href="http://web.archive.org/web/20090210035054/http://json.org/">Javascript Object Notation</a> (JSON) responses.</p>

<h4>Plugins</h4>
<p>The Mootools plugins extend the core functionality, letting you easily add advanced UI functionality to your web projects. The list of plugins includes:</p>
<ul>
	<li>Fx.Slide</li>
	<li>Fx.Scroll</li>
	<li>Fx.Elements</li>
	<li>Drag</li>
	<li>Drag.Move</li>
	<li>Color</li>
	<li>Group</li>
	<li>Hash.Cookie</li>
	<li>Sortables</li>
	<li>Tips</li>
	<li>SmoothScroll</li>
	<li>Slider</li>
	<li>Scroller</li>
	<li>Assets</li>
	<li>Accordion</li>
</ul>

<h3>The Big Picture</h3>
<p>Before the next tutorial, take some time to pour over the Mootools documentation.  Even if you don&#8217;t understand it all, just read through it and absorb what you can.  Over the next 29 days we are going to dig deeper into specific areas within the library and break Mootools down into some easy to digest pieces, but first, be sure and take a good look over the whole menu.</p>

<h3>To Learn More&#8230;</h3>

<h4><a href="http://www.consideropen.com/downloads/30days_of_moo/mootorial_day1.zip">A zip with everything you need to get started</a></h4>
<p>Includes a copy of the Mootools 1.2 core library, a simple html file, an external JavaScript file for your functions and a css style sheet.  The html is well commented and includes the domready event.</p>

<h4>Other Mootools Tutorials</h4>
<p>In the mean time, here is a list of some other <a href="http://github.com/mootools/mootools-core/wikis/mootools-tutorials">Mootorials to help you get started</a>.</p>

<h4>30 Days of Mootools Translations</h4>
<p>Hablas Español? Echa un vistazo a la traducción de <a href="http://www.alainalemany.com/2008/10/10/30-dias-de-mootools-12-indice/">alainalemany.com</a></p>
<p>French translation: <a href="http://www.6ma.fr/tuto/mootools+jours+jour+1+introduction-458" target="_blank">http://www.6ma.fr/tuto/mootools+jours+jour+1+introduction-458</a></p>
<p>Chinese translation: <a href="http://ooboy.net/blog/article/605.aspx" target="_blank">http://ooboy.net/blog/article/605.aspx</a></p>

<h4>Mootools 1.2 Cheat Sheet</h4>
<p>Here is a great summary of the capabilities of Mootools 1.2.  I just printed out myself a copy and am currently looking for a place to hang it.  Maybe i&#8217;ll drop by the printers and have them set me up with a poster size :).  Anyhow, here&#8217;s the link to the <a href="http://mediavrog.net/blog/wp-content/uploads/2008/06/mootools-12-cheat-sheet.pdf">Mootools 1.2 Cheat Sheet</a></p>

<h4>Mootools Forum</h4>
<p>If you want to chat with other folks about Mootools, check out code samples or dig into specific questions, this is the place for you.  It&#8217;s still very new, but picking up steam: <a href="http://www.mooforum.net/">Mootools 1.2 forum</a></p>

<h4>Tomorrow</h4>
<p>Visit our <a href="http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-2-selectors/">Day 2 tutorial to learn more about Mootools 1.2 selectors</a></p>