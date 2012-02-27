<h2>Intro to Using Arrays in Mootools 1.2</h2>
<p>If you haven&#8217;t already, be sure and check out <a href="http://web.archive.org/web/20090210050440/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-2-selectors/">yesterday&#8217;s tutorial - Day 2 - Selectors</a></p>

<p>In the last tutorial, we looked at selectors, many of which created arrays (a special list that gives you a lot control over the contents).  Today, we are going to take a look at how to use arrays to manage DOM elements.</p>
<h3>The Basics</h3>
<h4>.each();</h4>
<p>.each(); is your best friend when dealing with arrays.  It provides an easy way to iterate through a list of elements, applying whatever script logic is necessary.  For example, lets say you wanted to call one alert box for every div within a page:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">$$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'div'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">each</span><span style="color: #009900;">&#40;</span><span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

    <span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'a div'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>With this html, the code above would fire two alert boxes, one for each div.</p>

<div class="wp_syntax"><div class="code"><pre>&lt;div&gt;One&lt;/div&gt;
&lt;div&gt;Two&lt;/div&gt;</pre></div></div>

<p>.each(); doesn&#8217;t require you use $$.  Another way to create an array (liked we talked about yesterday), is to use .getElements();.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">getElements</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'div'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">each</span><span style="color: #009900;">&#40;</span><span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
    <span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'a div'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>


<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;body_wrap&quot;&gt;
    &lt;div&gt;One&lt;/div&gt;
    &lt;div&gt;Two&lt;/div&gt;

&lt;/div&gt;</pre></div></div>

<p>Still another way to accomplish the same task is to send the array to a variable, then use .each(); on that variable:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//first you declare your variable by saying &quot;var VARIABLE_NAME&quot;</span>
<span style="color: #006600; font-style: italic;">//then you use the equal sign &quot;=&quot; to define what goes in that variable</span>
<span style="color: #006600; font-style: italic;">//in this case, an array of divs</span>

<span style="color: #003366; font-weight: bold;">var</span> myArray <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">getElements</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'div'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//now, you can use that array variable just like an array selector</span>
myArray.<span style="color: #006600;">each</span><span style="color: #009900;">&#40;</span><span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

    <span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'a div'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Finally, you are going to want to separate out your function from the selector and .each();. We are going to talk more in depth about how to use functions in tomorrow&#8217;s tutorial, but for now, we can create a very simple one like this:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> myArray <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">getElements</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'div'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #006600; font-style: italic;">//to create a new function, you declare a variable just like before, then name it</span>
<span style="color: #006600; font-style: italic;">//after the equal sign you say &quot;function()&quot; to declare the variable as a function</span>
<span style="color: #006600; font-style: italic;">//finally, you place your function code between { and };</span>
<span style="color: #003366; font-weight: bold;">var</span> myFunction <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

    <span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'a div'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//here you just call the function inside .each();.</span>
myArray.<span style="color: #006600;">each</span><span style="color: #009900;">&#40;</span>myFunction<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p><strong>Note</strong>: When you call a function like we did here inside of .each();, you do not put any quotes around the function name.</p>

<h3>Making a Copy of an Array</h3>
<h4>$A</h4>
<p>Mootools provides a way to simply copy an array with the $A function.  Lets set up another array with a variable like we did above:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//create your array variable</span>
<span style="color: #003366; font-weight: bold;">var</span> myArray <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">getElements</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'div'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>To create a copy of the array:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//create a new variable, called &quot;myCopy,&quot; then assign the copy of &quot;myArray&quot; to your new variable</span>
<span style="color: #003366; font-weight: bold;">var</span> myCopy <span style="color: #339933;">=</span> $A<span style="color: #009900;">&#40;</span>myArray <span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Now myCopy contains the same elements as myArray.</p>
<h3>Grab a Specific Element within an Array</h3>
<h4>.getLast();</h4>
<p>.getLast(); will return the last element within an array.  First we set up our array:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> myArray <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">getElements</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'div'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Now we can grab the last element within the array:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> lastElement <span style="color: #339933;">=</span> myArray.<span style="color: #006600;">getLast</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>The variable lastElement now represents the last element within myArray.</p>
<h4>.getRandom();</h4>

<p>Works just like .getLast();, but will get a random element from the array.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> randomElement <span style="color: #339933;">=</span> myArray.<span style="color: #006600;">getRandom</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>The variable randomElement is now represents a randomly chosen element within myArray.</p>
<h3>Add an Element to an Array</h3>

<h4>.include();</h4>
<p>With this method, you can add another item into an array.  Simply place the element selector within .include(); and attach it to your array.  With the following html setup:</p>

<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;body_wrap&quot;&gt;
    &lt;div&gt;one&lt;/div&gt;
    &lt;div&gt;two&lt;/div&gt;

    &lt;span id=&quot;add_to_array&quot;&gt;add to array&lt;/span&gt;
&lt;/div&gt;</pre></div></div>

<p>we can create an array like we did before by calling all the divs that are children of &#8216;body_wrap.&#8217;</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> myArray <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">getElements</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'div'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>To add another element to that array, first add the element you want to include to a var, then use the method .include();.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//first add your element to a var</span>
<span style="color: #003366; font-weight: bold;">var</span> newToArray <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'add_to_array'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//then include the var in the array</span>

myArray.<span style="color: #006600;">include</span><span style="color: #009900;">&#40;</span>newToArray<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Now, the array contains both the divs and the span element.</p>
<h4>.combine();</h4>
<p>Works just like .include();, except it lets you add an new array to an existing existing array without having to worry about duplicate content.  Say we had two arrays from the following html:</p>

<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;body_wrap&quot;&gt;
    &lt;div&gt;one&lt;/div&gt;

    &lt;div&gt;two&lt;/div&gt;
    &lt;span class=&quot;class_name&quot;&gt;add to array&lt;/span&gt;
    &lt;span class=&quot;class_name&quot;&gt;add to array, also&lt;/span&gt;

    &lt;span class=&quot;class_name&quot;&gt;add to array, too&lt;/span&gt;
&lt;/div&gt;</pre></div></div>

<p>We could then build the following two arrays:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//create your array just like we did before</span>
<span style="color: #003366; font-weight: bold;">var</span> myArray<span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">getElements</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'div'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #006600; font-style: italic;">//then create an array from all elements with .class_name</span>
<span style="color: #003366; font-weight: bold;">var</span> newArrayToArray <span style="color: #339933;">=</span> $$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.class_name'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Now, we can use .combine(); to combine the two arrays, and the method will deal with any duplicate content so we don&#8217;t have to.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//then combine newArrayToArray with myArray</span>
myArray.<span style="color: #006600;">combine</span><span style="color: #009900;">&#40;</span>newArrayToArray <span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Now myArray contains all the elements from newArraytoArray.</p>
<h3>Examples</h3>
<p>Arrays let you do iterate through a list of items, applying the same chunk of code to each one.  In this example, notice the use of &#8220;item&#8221; as a placeholder for the current element.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//creates an array of all elements within #body_wrap with the class .class_name</span>
<span style="color: #003366; font-weight: bold;">var</span> myArray <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">getElements</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.class_name'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//first lets create a new element to add to our array</span>

<span style="color: #003366; font-weight: bold;">var</span> addSpan <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'addtoarray'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #006600; font-style: italic;">//now lets create an array to combine with our array</span>
<span style="color: #003366; font-weight: bold;">var</span> addMany <span style="color: #339933;">=</span> $$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.addMany'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #006600; font-style: italic;">//now we can include the new span</span>
myArray.<span style="color: #006600;">include</span><span style="color: #009900;">&#40;</span>addSpan<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #006600; font-style: italic;">//and combine our addMany array with myArray</span>
myArray.<span style="color: #006600;">combine</span><span style="color: #009900;">&#40;</span>addMany<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//create a function to go through each ITEM in the array</span>

<span style="color: #003366; font-weight: bold;">var</span> myArrayFunction <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #000066; font-weight: bold;">item</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//item now refers to the current element within the array</span>
	<span style="color: #000066; font-weight: bold;">item</span>.<span style="color: #006600;">setStyle</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'#eee'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//now you call the myArrayFunction for EACH item within the array</span>
myArray.<span style="color: #006600;">each</span><span style="color: #009900;">&#40;</span>myArrayFunction<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>


<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;body_wrap&quot;&gt;
    &lt;div class=&quot;class_name&quot;&gt;one&lt;/div&gt;&lt;!-- this has gray background --&gt;

    &lt;div&gt;two&lt;/div&gt;
    &lt;div class=&quot;class_name&quot;&gt;three&lt;/div&gt;&lt;!-- this has gray background --&gt;
    &lt;span id=&quot;addtoarray&quot;&gt;add to array&lt;/span&gt;  &lt;!-- this has gray background --&gt;

    &lt;br /&gt;&lt;span class=&quot;addMany&quot;&gt;one of many&lt;/span&gt;  &lt;!-- this has gray background --&gt;
    &lt;br /&gt;&lt;span class=&quot;addMany&quot;&gt;two of many&lt;/span&gt;  &lt;!-- this has gray background --&gt;

&lt;/div&gt;</pre></div></div>

<h3>To Learn More&#8230;</h3>
<p>This tutorial does not begin to cover the wonderful things you can do with arrays, but hopefully it has given you an idea of what Mootools has to offer.  To find out more about arrays, take a closer look at:</p>
<ul>
<li>the <a href="http://web.archive.org/web/20090210050440/http://docs.mootools.net/Native/Array">array section within the docs</a></li>
<li>this page has a lot of <a href="http://web.archive.org/web/20090210050440/http://www.hunlock.com/blogs/Mastering_Javascript_Arrays">information about JavaScript arrays</a></li>
</ul>
<h4><a href="http://web.archive.org/web/20090210050440/http://www.consideropen.com/downloads/30days_of_moo/mootorial_day3_arrays.zip">Download a zip with everything you need to get started</a></h4>

<p>Includes a simple html file, the Mootools 1.2 core, an external JavaScript file, a css file and the example above.</p>
<h4>Tomorrow</h4>
<p>Tomorrow we will look closer at <a href="http://web.archive.org/web/20090210050440/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-4-functions/">functions and how to use them in Mootools</a>.</p>
<h3>Tutorial Request or Questions</h3>
<p>For the next few days we are going to continue to cover the basics, but over the next few weeks we will move toward more complex projects, and I would love to hear what subjects are of the most interest to you all.  Feel free to drop a note with any suggestions, comments or questions.  Thanks and I hope you find this useful.</p>
					</div>