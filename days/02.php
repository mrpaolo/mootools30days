<h2>Mootools 1.2 Selectors</h2>
<p>If you haven&#8217;t already, be sure and check out <a href="http://web.archive.org/web/20090210045942/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-1-intro-to-the-library/">yesterday&#8217;s tutorial - Day 1 - Intro to the Library</a>.  There we cover how to install Mootools 1.2 and how to call your scripts within the domready event.</p>

<p>Welcome to day 2 of <strong>30 Days of Mootools 1.2 Tutorials</strong>.  In this tutorial, we are going to learn several methods to select HMTL elements.  In many ways, this is the basis of what Mootools is most commonly used for.  After all, to create an interactive user experience out of HTML elements, you first have to get your hands on them.</p>
<h3>The Basics</h3>
<h4>$();</h4>
<p>The $ function is the basic selector within Mootools.  With it, you can select a DOM element by ID.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//selects the element with the ID 'body_wrap'</span>
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>


<div class="wp_syntax"><div class="code"><pre>&nbsp;
&lt;div id=&quot;body_wrap&quot;&gt;
&lt;/div&gt;</pre></div></div>

<h4>.getElement();</h4>
<p>.getElement(); extends $, allowing you to refine your selection.  For example, you could select the ID body wrap with $, then select the first child anchor.  .getElement(); only selects a single element and will return the first if there are multiple options.  If you add a class name within .getElement();, you will  get the first occurrence of an element with that class name, not an array of all elements.  To select multiple elements, see getElements(); below.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//selects the first child anchor within the element with the ID 'body_wrap'</span>
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">getElement</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'a'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 

&nbsp;
<span style="color: #006600; font-style: italic;">//selects the element with the ID 'special_anchor' within the element 'body_wrap'</span>
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">getElement</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#special_anchor'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 
&nbsp;
<span style="color: #006600; font-style: italic;">//selects the first child with the class 'special_anchor_class' within the element 'body_wrap'</span>
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">getElement</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.special_anchor_class'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>


<div class="wp_syntax"><div class="code"><pre>&nbsp;
&lt;div id=&quot;body_wrap&quot;&gt;
        &lt;a href=&quot;#&quot;&gt;anchor&lt;/a&gt;
        &lt;a href=&quot;#&quot;&gt;another anchor&lt;/a&gt;

        &lt;a id=&quot;special_anchor&quot; href=&quot;#&quot;&gt;special anchor&lt;/a&gt;
        &lt;a class=&quot;special_anchor_class&quot; href=&quot;#&quot;&gt;special anchor&lt;/a&gt;

        &lt;a class=&quot;special_anchor_class&quot; href=&quot;#&quot;&gt;another special anchor&lt;/a&gt;
&lt;/div&gt;</pre></div></div>

<h4>$$();</h4>
<p>The $$ lets you quickly select multiple elements and places them into an array (a  type of list that lets you manipulate, retrieve, and reorder the list in all sorts of ways). You can select elements by name (such as div, a, img) or an ID, and you can even mix and match.  And as a reader pointed out, you can do a lot <a href="http://web.archive.org/web/20090210045942/http://blog.mootools.net/2007/6/11/selectors-on-fire">more with $$</a> than what we are covering here.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//all divs in the page</span>
$$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'div'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 
&nbsp;
<span style="color: #006600; font-style: italic;">//selects the element with the id 'id_name' and all divs</span>
$$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#id_name'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'div'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>


<div class="wp_syntax"><div class="code"><pre>&lt;div&gt;
    &lt;div&gt;a div&lt;/div&gt;
    &lt;span id=&quot;id_name&quot;&gt;a span&lt;/span&gt;
&lt;/div&gt;</pre></div></div>

<h4>.getElements();</h4>
<p>.getElements(); is similar to .getElement();, except it returns all elements that fit the criteria, placing them into an array.  You can use .getElements(); just like you would use .getElement();.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//selects all child anchors within the element with the ID 'body_wrap'</span>
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">getElements</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'a'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 
&nbsp;
<span style="color: #006600; font-style: italic;">//selects all children with the class 'special_anchor_class' within the element 'body_wrap'</span>

$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">getElements</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.special_anchor_class'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>


<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;body_wrap&quot;&gt;
        &lt;a href=&quot;#&quot;&gt;anchor&lt;/a&gt;

        &lt;a href=&quot;#&quot;&gt;another anchor&lt;/a&gt;
        &lt;a class=&quot;special_anchor_class&quot; href=&quot;#&quot;&gt;special anchor&lt;/a&gt;
        &lt;a class=&quot;special_anchor_class&quot; href=&quot;#&quot;&gt;another special anchor&lt;/a&gt;

&lt;/div&gt;</pre></div></div>

<h3>Including and Excluding Results with Operators</h3>
<h4>Operators</h4>
<p>Mootools 1.2 supports several operators that allow you to further refine your selections.  You can use operators within .getElements(); and include or exclude certain results. Mootools supports 4 operators, each of which can be used to select an input element by name:</p>
<ul>
<li>= : is equal to</li>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//selects the input with the name 'phone_number'</span>
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">getElements</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'input[name=phone_number]'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<li>^= : starts-with</li>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//selects the input with a name beginning with phone</span>
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">getElements</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'input[name^=phone]'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<li>$= : ends-with</li>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//selects the input with a name ending in number</span>
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">getElements</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'input[name$=number]'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<li>!= : is not equal to</li>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//selects the input which is not named address</span>
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">getElements</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'input[name!=address]'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

</ul>

<div class="wp_syntax"><div class="code"><pre>&nbsp;
&lt;div id=&quot;body_wrap&quot;&gt;
    &lt;input name=&quot;address&quot; type=&quot;text&quot; /&gt;
    &lt;input name=&quot;phone_number&quot; type=&quot;text&quot; /&gt; &lt;!-- all four  examples would select this element --&gt;

&lt;/div&gt;</pre></div></div>

<p>To use the operators, first define the element type (input), then define the attribute you would like to filter by (name), place your operator, then choose your filter string.</p>
<h3>Selectors based on Element Order</h3>
<h4>even</h4>
<p>Use this simple selector to choose evenly ordered elements. <strong>Note:</strong> this selector starts at 0, so the first element is even.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">// selects all even divs</span>

$$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'div:even'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>


<div class="wp_syntax"><div class="code"><pre>&lt;div&gt;Even&lt;/div&gt;&lt;!-- above example would select this element --&gt;
&lt;div&gt;Odd&lt;/div&gt;
&lt;div&gt;Even&lt;/div&gt;&lt;!-- above example would select this element --&gt;

&lt;div&gt;Odd&lt;/div&gt;</pre></div></div>

<h4>odd</h4>
<p>Just like even, except this one selects all odd elements.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">// selects all odd divs</span>
$$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'div:odd'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<div class="wp_syntax"><div class="code"><pre>&lt;div&gt;Even&lt;/div&gt;
&lt;div&gt;Odd&lt;/div&gt;&lt;!-- above example would select this element --&gt;
&lt;div&gt;Even&lt;/div&gt;
&lt;div&gt;Odd&lt;/div&gt;&lt;!-- above example would select this element --&gt;</pre></div></div>

<h4>.getParent();</h4>
<p>With .getParent(); you can get, well, the parent of an element.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">// selects the parent of the element with the ID 'child_id'</span>
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'child_id'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">getParent</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>


<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;parent_id&quot;&gt; &lt;!-- The above would return this element --&gt;

    &lt;div id=&quot;child_id&quot;&gt;Even&lt;/div&gt;
&lt;/div&gt;</pre></div></div>

<h3>Examples</h3>
<p>Any Mootools UI development is going to start with selectors.  Here are some very simple examples of how to use selectors to manipulate DOM elements.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//set the background color of all spans to #eee</span>
$$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'span'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">setStyle</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'#eee'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #006600; font-style: italic;">//set the background color of all odd children of #body_wrap to #eee</span>
$$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'span:odd'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">setStyle</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'#eee'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 
&nbsp;
<span style="color: #006600; font-style: italic;">//sets the background color of all elements with class .middle_spans to #eee</span>
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">getElements</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.middle_spans'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">setStyle</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'#eee'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>


<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;body_wrap&quot;&gt;
    &lt;span&gt;Even&lt;/span&gt;
    &lt;span class=&quot;middle_spans&quot;&gt;Odd&lt;/span&gt;
    &lt;span class=&quot;middle_spans&quot;&gt;Even&lt;/span&gt;

    &lt;span&gt;Odd&lt;/span&gt;
&lt;/div&gt;</pre></div></div>

<h4><a href="http://web.archive.org/web/20090210045942/http://www.consideropen.com/downloads/30days_of_moo/mootorial_day2.zip">Download the zip and try it out</a></h4>
<p>Here is a zip folder with a simple html file, the mootools 1.2 core, an external js file and the example you see above.</p>
<h3>To Learn More&#8230;</h3>
<p>This is by no means an exhaustive list of Mootools 1.2 selectors, rather it is intended to get you started and to give you an idea of what Mootools has to offer.  To learn more about selectors, check out some of the following areas within the docs:</p>

<ul>
<li>There are tons of great selectors within <a href="http://web.archive.org/web/20090210045942/http://docs.mootools.net/Element/Element">Element</a></li>
<li>Also take a look at <a href="http://web.archive.org/web/20090210045942/http://docs.mootools.net/Utilities/Selectors">Selectors</a></li>
</ul>
<h4>Mootools Blog Entry about $$ Selectors</h4>
<p>Here is a great blog entry at mootools.net about the <a href="http://web.archive.org/web/20090210045942/http://blog.mootools.net/2007/6/11/selectors-on-fire">$$ selector</a> and how diverse it is.  You can do an incredible amount with this selector, and it&#8217;s worth taking a look.</p>
<h4>Slickspeed Selectors</h4>

<p>Here is an experiment from the folks over at Mootools that measures how fast different libraries are able to retrieve elements.  This is cool unto itself, but more valuable are all the <a href="http://web.archive.org/web/20090210045942/http://mootools.net/slickspeed/">selector examples</a> they have there.  All of the selectors featured there should work with $$.</p>
<h4>W3C Selectors</h4>
<p>Mootools also lets you leverage the power of pseudo selectors (as demonstrated by slickspeed).  Here is the w3c&#8217;s entry on <a href="http://web.archive.org/web/20090210045942/http://www.w3.org/TR/2001/CR-css3-selectors-20011113/">selectors</a>, definitely worth a read over (if only for the list of selectors available to you).  I am not sure if every single selector on this page is supported by the $$ Mootools selector, but most are.  Would love to hear if anyone knows more details on this.</p>
<h4>Tomorrow&#8217;s Mootools 1.2 Tutorial</h4>
<p>Be sure and check out tomorrow&#8217;s tutorial - <a href="http://web.archive.org/web/20090210045942/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-3-intro-to-using-arrays/">Day 3 - Using Arrays</a>.</p>

<h3>Tutorial Request or Questions</h3>
<p>We still have 28 days to go and I would love to hear what subjects are of the most interest to you all.  Feel free to drop a note with any suggestions, comments or questions.  Thanks and I hope you find this useful.</p>
					</div>