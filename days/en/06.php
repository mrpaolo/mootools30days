<h2>Manipulating HTML DOM Elements with Mootools 1.2</h2>
<p>If you haven&#8217;t already, be sure and check out the rest of the <a href="http://web.archive.org/web/20090210045505/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-1-intro-to-the-library/">Mootools 1.2 tutorials</a> in our 30 days series.</p>

<p>We have already looked at how to select elements within the DOM, how to create arrays, how to create functions, how to attach events to elements and today we are going go further into manipulating HMTL elements.  With Mootools 1.2, you can add new elements into an html page, remove elements, and change any style or element parameters, all on the fly.</p>
<h3>The Basics</h3>
<h4>.get();</h4>
<p>This tool lets you retrieve element properties. Element properties are the various pieces that make up an html element, such as src, value, name, etc.  Using .get(); is very simple:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//this will return the html tag (div, a, span...) of the element with the id &quot;id_name&quot;</span>
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'id_name'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'tag'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>


<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;body_wrap&quot;&gt;
    &lt;span id=&quot;id_name&quot;&gt;Element&lt;/span&gt; &lt;!-- the above code would return &quot;span&quot; --&gt;
&lt;/div&gt;</pre></div></div>

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

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//this will set the href of #id_name to &quot;http://www.google.com&quot;</span>
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'id_name'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'href'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'http://www.google.com'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>


<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;body_wrap&quot;&gt;
    &lt;!-- the above code would change the href url to &quot;http://www.google.com  --&gt;
    &lt;a id=&quot;id_name&quot; href=&quot;http://www.yahoo.com&quot;&gt;Search Engine&lt;/a&gt;

&lt;/div&gt;</pre></div></div>

<h4>.erase();</h4>
<p>With .erase();, you can erase the value of an elements property.  It works just like the previous two.  Select your element, then choose which property you want to erase.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//this will erase the href value of #id_name</span>
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'id_name'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">erase</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'href'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>


<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;body_wrap&quot;&gt;
    &lt;!-- the above code would erase the href url  --&gt;
    &lt;a href=&quot;http://www.yahoo.com&quot;&gt;Search Engine&lt;/a&gt;
&lt;/div&gt;</pre></div></div>

<h3>Moving Elements</h3>
<h4>.inject();</h4>
<p>To move an existing element around the page, you can use .inject();.  Like the other tools we have looked at, it&#8217;s very easy to use and gives you a lot of control over your user interface.  To use .inject();, lets first set up a few elements within variables:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> elementA <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'elemA'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #003366; font-weight: bold;">var</span> elementB <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'elemB'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #003366; font-weight: bold;">var</span> elementC <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'elemC'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>The above code places this html into variables, making it easy to manipulate with Mootools.</p>

<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;body_wrap&quot;&gt;
    &lt;div id=&quot;elemA&quot;&gt;A&lt;/div&gt;
    &lt;div id=&quot;elemB&quot;&gt;B&lt;/div&gt;

    &lt;div id=&quot;elemC&quot;&gt;C&lt;/div&gt;
&lt;/div&gt;</pre></div></div>

<p>Now, to change the order of the elements, we can use .inject one of four ways.  We can inject to the:</p>
<ul>
<li>bottom (default)</li>
<li>top</li>

<li>before</li>
<li>after</li>
</ul>
<p>Bottom and top will place the injected element <strong>inside</strong> a selected element, in the top or bottom spot.  Before and after on the other hand, will inject one element before or after another, but not inside.</p>
<p>So, lets change the order to A-C-B.  Since we don&#8217;t need to inject an element inside another, we can use before or after.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//translates to:  inject element C before element B</span>
elementC.<span style="color: #006600;">inject</span><span style="color: #009900;">&#40;</span>elementB<span style="color: #339933;">,</span> <span style="color: #3366CC;">'before'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 

&nbsp;
<span style="color: #006600; font-style: italic;">//translates to:  inject element B after element C</span>
elementB.<span style="color: #006600;">inject</span><span style="color: #009900;">&#40;</span>elementC<span style="color: #339933;">,</span> <span style="color: #3366CC;">'after'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h3>Creating a New Element</h3>
<h4>new Element</h4>
<p>You can use the &#8220;new Element&#8221; constructor to create a new html element.  It&#8217;s very much like writing a regular html element, except we will adjust the syntax to make it play well with Mootools:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//first, you name a variable and declare a &quot;new Element&quot;</span>
<span style="color: #006600; font-style: italic;">//then you define which type of element (div, a, span...)</span>
<span style="color: #003366; font-weight: bold;">var</span> newElementVar <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Element<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'div'</span><span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

    <span style="color: #006600; font-style: italic;">//here you set all the element parameters</span>
    <span style="color: #3366CC;">'id'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'id_name'</span><span style="color: #339933;">,</span>
    <span style="color: #3366CC;">'text'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'I am a new div'</span><span style="color: #339933;">,</span>

    <span style="color: #3366CC;">'styles'</span><span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>
        <span style="color: #006600; font-style: italic;">//here you set all the style parameters</span>
        <span style="color: #3366CC;">'width'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'200px'</span><span style="color: #339933;">,</span>
        <span style="color: #3366CC;">'height'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'200px'</span><span style="color: #339933;">,</span>

        <span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'#eee'</span><span style="color: #339933;">,</span>
        <span style="color: #3366CC;">'float'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'left'</span>
    <span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Now that you have an element, you can inject it somewhere with the code we learned earlier.  Let&#8217;s start with the following simple html:</p>

<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;body_wrap&quot;&gt;
    &lt;div id=&quot;content_id&quot;&gt;Some div content&lt;/div&gt;
&lt;/div&gt;</pre></div></div>

<p>Now, lets turn #content_id into a variable:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> bodyWrapVar <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Just like we learned before, we can inject the element we created into the current html:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//translates to, &quot;inject newElementVar inside bodyWrapVar, in top position</span>

newElementVar.<span style="color: #006600;">inject</span><span style="color: #009900;">&#40;</span>bodyWrapVar <span style="color: #339933;">,</span> <span style="color: #3366CC;">'top'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>The html would end up looking like:</p>

<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;body_wrap&quot;&gt;
    &lt;!-- this element was injected to the inside-top --&gt;

    &lt;div id=&quot;id_name&quot;&gt;I am a new div&lt;/div&gt;
    &lt;div id=&quot;content_id&quot;&gt;Some div content&lt;/div&gt;
&lt;/div&gt;</pre></div></div>

<h3>Example</h3>

<p>For this example, lets create a form that lets you add a new element to your html page.  First, lets set up some inputs and a button.</p>

<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;body_wrap&quot;&gt;
        ID:  &lt;input id=&quot;id_input&quot; name=&quot;id&quot; /&gt;
        text:  &lt;input id=&quot;text_input&quot; name=&quot;text&quot; /&gt;

        &lt;button id=&quot;new_div&quot;&gt;create a new div&lt;/button&gt;
&lt;/div&gt;</pre></div></div>

<p>Now, lets build the Mootools JavaScript that will let this html form inject a new element into your page.  First, let&#8217;s add a click event the button and create a function to contain our code:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> newDiv <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

    <span style="color: #006600; font-style: italic;">//we are going to put our &quot;add a new element&quot; code in here</span>
<span style="color: #009900;">&#125;</span><span style="color: #339933;">;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

    $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'new_div'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> newDiv<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>The next thing we need to figure out is what kind of variables we are going to be dealing with. To use the data in the input forms, we need to .get(); it:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> idValue <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'id_input'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #003366; font-weight: bold;">var</span> textValue <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'text_input'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Now the variables above, idValue and textValue, contain the value of their respective input forms.  Since we want to get the value of the input fields at the time the user clicks the &#8220;create a new div&#8221; button, we need to place the above code <strong>within</strong> the newDiv(); function. If we were to get(); the values outside of the function, we would get the values on load, not on click.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> newDiv <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

    <span style="color: #003366; font-weight: bold;">var</span> idValue <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'id_input'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
    <span style="color: #003366; font-weight: bold;">var</span> textValue <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'text_input'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span><span style="color: #339933;">;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
    $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'new_div'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> newDiv<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Next, we are going to need to grab our element that we want to inject the new div into:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> newDiv <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
    <span style="color: #003366; font-weight: bold;">var</span> idValue <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'id_input'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

    <span style="color: #003366; font-weight: bold;">var</span> textValue <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'text_input'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
    <span style="color: #003366; font-weight: bold;">var</span> bodyWrapVar <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'newElementContainer'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span><span style="color: #339933;">;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
    $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'new_div'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> newDiv<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Since we have our input values, we can now create the new element:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> newDiv <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
    <span style="color: #003366; font-weight: bold;">var</span> idValue <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'id_input'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

    <span style="color: #003366; font-weight: bold;">var</span> textValue <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'text_input'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
    <span style="color: #003366; font-weight: bold;">var</span> bodyWrapVar <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'newElementContainer'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
    <span style="color: #003366; font-weight: bold;">var</span> newElementVar <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Element<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'div'</span><span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>
        <span style="color: #006600; font-style: italic;">//this sets the id to the value of the input by passing a variable</span>

    	<span style="color: #3366CC;">'id'</span><span style="color: #339933;">:</span> idValue<span style="color: #339933;">,</span>
        <span style="color: #006600; font-style: italic;">//this sets the text to the value of the input by passing a variable</span>
    	<span style="color: #3366CC;">'html'</span><span style="color: #339933;">:</span> textValue
    <span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span><span style="color: #339933;">;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
    $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'new_div'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> newDiv<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>All we have left is to inject the new element into our page:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> newDiv <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
	<span style="color: #003366; font-weight: bold;">var</span> bodyWrapVar <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'newElementContainer'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #003366; font-weight: bold;">var</span> idValue <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'id_input'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
&nbsp;
&nbsp;
&nbsp;

	<span style="color: #003366; font-weight: bold;">var</span> textValue <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'text_input'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">get</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #003366; font-weight: bold;">var</span> newElementVar <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Element<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'div'</span><span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

    	        <span style="color: #3366CC;">'id'</span><span style="color: #339933;">:</span> idValue<span style="color: #339933;">,</span>
    	        <span style="color: #3366CC;">'text'</span><span style="color: #339933;">:</span> textValue
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
        <span style="color: #006600; font-style: italic;">//translates to, &quot;inject newElementVar inside-top of bodyWrapVar.&quot;</span>

	newElementVar.<span style="color: #006600;">inject</span><span style="color: #009900;">&#40;</span>bodyWrapVar<span style="color: #339933;">,</span> <span style="color: #3366CC;">'top'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> removeDiv <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

        <span style="color: #006600; font-style: italic;">//this erases the inner html (which is everything inside of the div tags)</span>
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'newElementContainer'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">erase</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'html'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

   $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'new_div'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> newDiv<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
   $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'remove_div'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> removeDiv<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>
<div id="newElementContainer"></div>
</p>
<p>ID:<br />
<input id="id_input" name="id" /></p>
<p>text:<br />
<input id="text_input" name="text" /></p>
<p><button id="new_div">create a new div</button><br />
<button id="remove_div">remove all new divs</button></p>
<p>(try putting &#8220;ilovemilk&#8221; as the id)</p>

<h3>To Learn More&#8230;</h3>
<p>Make sure to take some time with the Elements section within the Mootools docs:</p>
<ul>
<li><a href="http://web.archive.org/web/20090210045505/http://docs.mootools.net/Element/Element">Element</a> contains most of what we talked about here and a lot more</li>
<li><a href="http://web.archive.org/web/20090210045505/http://docs.mootools.net/Element/Element.Style">Element.style</a> gives you control over style properties (something we will dig into more in another tutorial)</li>
<li><a href="http://web.archive.org/web/20090210045505/http://docs.mootools.net/Element/Element.Dimensions">Element.dimensions</a> contains tools for dealing with position, coordinates and more</li>

</ul>
<h4>Tomorrow&#8217;s tutorial</h4>
<p><a href="http://web.archive.org/web/20090210045505/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-7-set-and-get-style-properties/">30 Days of Mootools, Day 7 - Setting and Getting Style Properties</a></p>
<h3>Tutorial Request or Questions</h3>
<p>Now that we have had a chance to cover some of the basics, the tutorials are going to start to pick up.  Feel free to drop a note with any suggestions, comments or questions.  Thanks and I hope you find this useful.</p>
					</div>