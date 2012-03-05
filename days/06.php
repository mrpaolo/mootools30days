<!-- Working Examples for Day 06 -->
<script type="text/javascript" src="days/js/06.js" ></script>

<h2>Manipulating HTML DOM Elements with Mootools 1.2</h2>
<p>If you haven&#8217;t already, be sure and check out the rest of the <a href="index.php?day=05">Mootools 1.2 tutorials</a> in our 30 days series.</p>

<p>We have already looked at how to select elements within the DOM, how to create arrays, how to create functions, how to attach events to elements and today we are going go further into manipulating HMTL elements.  With Mootools 1.2, you can add new elements into an html page, remove elements, and change any style or element parameters, all on the fly.</p>

<h3>The Basics</h3>
<h4>.get();</h4>
<p>This tool lets you retrieve element properties. Element properties are the various pieces that make up an html element, such as src, value, name, etc.  Using .get(); is very simple:</p>

<pre class="prettyprint">
//this will return the html tag (div, a, span...) of the element with the id "id_name"
$('id_name').get('tag');
</pre>


<pre class="prettyprint">
&lt;div id=&quot;body_wrap&quot;&gt;
    &lt;span id=&quot;id_name&quot;&gt;Element&lt;/span&gt; &lt;!-- the above code would return &quot;span&quot; --&gt;
&lt;/div&gt;
</pre>

<p>You can use .get() to retrieve more than just html tags:</p>

<ul>
	<li>id</li>
	<li>name</li>
	<li>value</li>
	<li>href</li>
	<li>src</li>
	<li>class (will return all classes if the element has multiple)</li>
	<li>text (the text content of an element)</li>
	<li>etc&#8230;</li>
</ul>

<h4>.set();</h4>
<p>.set(); works just like .get();, except instead of getting a value, it sets a value.  This is useful when combined with events and lets you change values after the page has loaded.</p>

<pre class="prettyprint">
//this will set the href of #id_name to "http://www.google.com"
$('id_name').set('href', 'http://www.google.com');
</pre>

<pre class="prettyprint">
&lt;div id=&quot;body_wrap&quot;&gt;
    &lt;!-- the above code would change the href url to &quot;http://www.google.com  --&gt;
    &lt;a id=&quot;id_name&quot; href=&quot;http://www.yahoo.com&quot;&gt;Search Engine&lt;/a&gt;
&lt;/div&gt;
</pre>

<h4>.erase();</h4>
<p>With .erase();, you can erase the value of an elements property.  It works just like the previous two. Select your element, then choose which property you want to erase.</p>

<pre class="prettyprint">
//this will erase the href value of #id_name
$('id_name').erase('href');
</pre>

<pre class="prettyprint">
&lt;div id=&quot;body_wrap&quot;&gt;
    &lt;!-- the above code would erase the href url  --&gt;
    &lt;a href=&quot;http://www.yahoo.com&quot;&gt;Search Engine&lt;/a&gt;
&lt;/div&gt;
</pre>

<h3>Moving Elements</h3>
<h4>.inject();</h4>
<p>To move an existing element around the page, you can use .inject();.  Like the other tools we have looked at, it&#8217;s very easy to use and gives you a lot of control over your user interface.  To use .inject();, lets first set up a few elements within variables:</p>

<pre class="prettyprint">
var elementA = $('elemA');
var elementB = $('elemB');
var elementC = $('elemC');
</pre>

<p>The above code places this html into variables, making it easy to manipulate with Mootools.</p>

<pre class="prettyprint">
&lt;div id=&quot;body_wrap&quot;&gt;
    &lt;div id=&quot;elemA&quot;&gt;A&lt;/div&gt;
    &lt;div id=&quot;elemB&quot;&gt;B&lt;/div&gt;
    &lt;div id=&quot;elemC&quot;&gt;C&lt;/div&gt;
&lt;/div&gt;
</pre>

<p>Now, to change the order of the elements, we can use .inject one of four ways.  We can inject to the:</p>

<ul>
	<li>bottom (default)</li>
	<li>top</li>
	<li>before</li>
	<li>after</li>
</ul>

<p>Bottom and top will place the injected element <strong>inside</strong> a selected element, in the top or bottom spot.  Before and after on the other hand, will inject one element before or after another, but not inside.</p>
<p>So, lets change the order to A-C-B.  Since we don&#8217;t need to inject an element inside another, we can use before or after.</p>

<pre class="prettyprint">
//translates to:  inject element C before element B
elementC.inject(elementB, 'before'); 
 
//translates to:  inject element B after element C
elementB.inject(elementC, 'after');
</pre>

<h3>Creating a New Element</h3>
<h4>new Element</h4>
<p>You can use the &#8220;new Element&#8221; constructor to create a new html element.  It&#8217;s very much like writing a regular html element, except we will adjust the syntax to make it play well with Mootools:</p>

<pre class="prettyprint">
//first, you name a variable and declare a "new Element"
//then you define which type of element (div, a, span...)
var newElementVar = new Element('div', {
    //here you set all the element parameters
    'id': 'id_name',
    'text': 'I am a new div',
    'styles': {
        //here you set all the style parameters
        'width': '200px',
        'height': '200px',
        'background-color': '#eee',
        'float': 'left'
    }
});
</pre>

<p>Now that you have an element, you can inject it somewhere with the code we learned earlier.  Let&#8217;s start with the following simple html:</p>

<pre class="prettyprint">
&lt;div id=&quot;body_wrap&quot;&gt;
    &lt;div id=&quot;content_id&quot;&gt;Some div content&lt;/div&gt;
&lt;/div&gt;
</pre>

<p>Now, lets turn #content_id into a variable:</p>

<pre class="prettyprint">
var bodyWrapVar = $('body_wrap');
</pre>

<p>Just like we learned before, we can inject the element we created into the current html:</p>

<pre class="prettyprint">
//translates to, "inject newElementVar inside bodyWrapVar, in top position
newElementVar.inject(bodyWrapVar , 'top');
</pre>

<p>The html would end up looking like:</p>

<pre class="prettyprint">
&lt;div id=&quot;body_wrap&quot;&gt;
    &lt;!-- this element was injected to the inside-top --&gt;
    &lt;div id=&quot;id_name&quot;&gt;I am a new div&lt;/div&gt;
    &lt;div id=&quot;content_id&quot;&gt;Some div content&lt;/div&gt;
&lt;/div&gt;
</pre>

<h3>Example</h3>
<p>For this example, lets create a form that lets you add a new element to your html page.  First, lets set up some inputs and a button.</p>

<pre class="prettyprint">
&lt;div id=&quot;body_wrap&quot;&gt;
        ID:  &lt;input id=&quot;id_input&quot; name=&quot;id&quot; /&gt;
        text:  &lt;input id=&quot;text_input&quot; name=&quot;text&quot; /&gt;
        &lt;button id=&quot;new_div&quot;&gt;create a new div&lt;/button&gt;
&lt;/div&gt;
</pre>

<p>Now, lets build the Mootools JavaScript that will let this html form inject a new element into your page.  First, let&#8217;s add a click event the button and create a function to contain our code:</p>

<pre class="prettyprint">
var newDiv = function() {
    //we are going to put our "add a new element" code in here
};
 
window.addEvent('domready', function() {
    $('new_div').addEvent('click', newDiv);
});
</pre>

<p>The next thing we need to figure out is what kind of variables we are going to be dealing with. To use the data in the input forms, we need to .get(); it:</p>

<pre class="prettyprint">
var idValue = $('id_input').get('value');
var textValue = $('text_input').get('value');
</pre>

<p>Now the variables above, idValue and textValue, contain the value of their respective input forms.  Since we want to get the value of the input fields at the time the user clicks the &#8220;create a new div&#8221; button, we need to place the above code <strong>within</strong> the newDiv(); function. If we were to get(); the values outside of the function, we would get the values on load, not on click.</p>

<pre class="prettyprint">
var newDiv = function() {
    var idValue = $('id_input').get('value');
    var textValue = $('text_input').get('value');
};
 
window.addEvent('domready', function() {
    $('new_div').addEvent('click', newDiv);
});
</pre>

<p>Next, we are going to need to grab our element that we want to inject the new div into:</p>

<pre class="prettyprint">
var newDiv = function() {
    var idValue = $('id_input').get('value');
    var textValue = $('text_input').get('value');
    var bodyWrapVar = $('newElementContainer');
};
 
window.addEvent('domready', function() {
    $('new_div').addEvent('click', newDiv);
});
</pre>

<p>Since we have our input values, we can now create the new element:</p>

<pre class="prettyprint">
var newDiv = function() {
    var idValue = $('id_input').get('value');
    var textValue = $('text_input').get('value');
    var bodyWrapVar = $('newElementContainer');
    var newElementVar = new Element('div', {
        //this sets the id to the value of the input by passing a variable
    	'id': idValue,
        //this sets the text to the value of the input by passing a variable
    	'html': textValue
    });

};
 
window.addEvent('domready', function() {
    $('new_div').addEvent('click', newDiv);
});
</pre>

<p>All we have left is to inject the new element into our page:</p>

<pre class="prettyprint">
var newDiv = function() {
	var bodyWrapVar = $('newElementContainer');
	var idValue = $('id_input').get('value');
	var textValue = $('text_input').get('value');
	var newElementVar = new Element('div', {
    	        'id': idValue,
    	        'text': textValue
	});
	//translates to, "inject newElementVar inside-top of bodyWrapVar."
	newElementVar.inject(bodyWrapVar, 'top');
};
 
var removeDiv = function() {
	//this erases the inner html (which is everything inside of the div tags)
	$('newElementContainer').erase('html');
}
 
window.addEvent('domready', function() {
   $('new_div').addEvent('click', newDiv);
   $('remove_div').addEvent('click', removeDiv);
});
</pre>

<p>
<div class="alert alert-info" id="newElementContainer"></div>
</p>
<p>ID:<br /><input id="id_input" name="id" /></p>
<p>text:<br /><input id="text_input" name="text" /></p>
<p><button class="btn btn-primary" id="new_div">create a new div</button></p>
<p><button class="btn btn-primary" id="remove_div">remove all new divs</button></p>

<h3>To Learn More&#8230;</h3>
<p>Make sure to take some time with the Elements section within the Mootools docs:</p>

<ul>
	<li><a href="http://docs.mootools.net/Element/Element">Element</a> contains most of what we talked about here and a lot more</li>
	<li><a href="http://docs.mootools.net/Element/Element.Style">Element.style</a> gives you control over style properties (something we will dig into more in another tutorial)</li>
	<li><a href="http://docs.mootools.net/Element/Element.Dimensions">Element.dimensions</a> contains tools for dealing with position, coordinates and more</li>
</ul>

<h4>Tomorrow&#8217;s tutorial</h4>
<p><a href="index.php?day=07">30 Days of Mootools, Day 7 - Setting and Getting Style Properties</a></p>