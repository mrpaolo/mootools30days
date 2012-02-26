<h2>Set and Get Style Properties with Mootools 1.2</h2>
<p>If you haven&#8217;t already, be sure and check out the rest of the <a href="http://web.archive.org/web/20090210035108/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-1-intro-to-the-library/">Mootools 1.2 tutorials</a> in our 30 days series.</p>

<p>Welcome to day 7 of <strong>30 Days of Mootools</strong>.  Today we are going to look at how to manipulate styles with Mootools 1.2  Combined with what we have learned in the last few tutorials, this will give you a lot of control over your UI.  Dealing with styles is very simple, but there are going to be a few twists today.  For example, we are going introduce the idea of a key/value object.  We are also going to pass variables outside of the domready, liked we learned how to do in the <a href="http://web.archive.org/web/20090210035108/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-4-functions/">functions tutorial</a>.  From here on out, the tutorials are going to slowly ramp up in complexity to introduce a few necessary programming concepts. If you are new to JavaScript or learning Mootools for the first time, be sure you understand the previous articles and feel free to ask us any questions you may have.</p>
<h3>The Basics</h3>
<h4>.setStyle();</h4>
<p>This function lets you set a style property of an element.  We have used this one before in some of the previous examples.  All you do is tack .setStyle(); onto the end of your selector and it will change the style property of a single element or an array</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//define your selector</span>
<span style="color: #006600; font-style: italic;">//add .setStyle</span>

<span style="color: #006600; font-style: italic;">//define the style property and the value</span>
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">setStyle</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'#eeeeee'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
$$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.class_name'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">setStyle</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'#eeeeee'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>


<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;body_wrap&quot;&gt;
    &lt;div class=&quot;class_name&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;class_name&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;class_name&quot;&gt;&lt;/div&gt;

    &lt;div class=&quot;class_name&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</pre></div></div>

<h4>.getStyle();</h4>
<p>Again, this does pretty much what it says.  .getStyle(); will return the value of a style property of an element.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//first, set up your variable to hold the style value</span>
<span style="color: #003366; font-weight: bold;">var</span> styleValue <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">getStyle</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'background-color'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>If we ran this code on the example above, it would return &#8216;#eeeeee&#8217; to the variable styleValue.</p>
<h3>Setting and Getting Multiple Style Properties</h3>
<h4>.setStyles();</h4>
<p>.setStyles(), as you can imagine, lets you set multiple style properties onto a single element or an array.  The syntax for .setStyles(); is a little bit different so that it can allow for multiple style properties.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//start out by creating your selector, then add .setStyles({</span>
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">setStyles</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>

    <span style="color: #006600; font-style: italic;">//the pattern to follow is 'property': 'value',</span>
    <span style="color: #3366CC;">'width'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'1000px'</span><span style="color: #339933;">,</span>
    <span style="color: #3366CC;">'height'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'1000px'</span><span style="color: #339933;">,</span>

    <span style="color: #006600; font-style: italic;">//IMPORTANT: there is NO COMMA after the last property </span>
    <span style="color: #006600; font-style: italic;">//will mess up cross browser if you leave the comma</span>
    <span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'#eeeeee'</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p><strong>Note</strong>: You do not actually need the &#8217;single quotes&#8217; around the property selector unless there is a &#8216;-&#8217; in the property, like in &#8216;background-color,&#8217; but to keep it simple, its easier to remember to put them on every property selector.</p>

<p><strong>Also Note</strong>: There is more flexibility with the property value (like &#8216;100px&#8217; or &#8216;#eeeeee&#8217;).  Aside from strings (just a series of characters, but we will get into that deeper in a later tutorial), you can also pass it numbers without quotes (which will eventually be interpreted as px in most cases) and variables:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//this passes the variable firstBackgroundColor the STRING '#eeeeee'</span>
<span style="color: #003366; font-weight: bold;">var</span> firstBackgroundColor <span style="color: #339933;">=</span> <span style="color: #3366CC;">'#eeeeee'</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #006600; font-style: italic;">//you can pass a variable to another variable, </span>
<span style="color: #006600; font-style: italic;">//making backgroundColor equal the string '#eeeeee'</span>
<span style="color: #003366; font-weight: bold;">var</span> backgroundColor <span style="color: #339933;">=</span> firstBackgroundColor<span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//this passes the variable divWidth the NUMBER 500</span>
<span style="color: #003366; font-weight: bold;">var</span> divWidth <span style="color: #339933;">=</span> <span style="color: #CC0000;">500</span><span style="color: #339933;">;</span>

&nbsp;
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">setStyles</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
    <span style="color: #006600; font-style: italic;">//in this case, variables are words without quotes around them</span>
    <span style="color: #3366CC;">'width'</span><span style="color: #339933;">:</span> divWidth<span style="color: #339933;">,</span>
    <span style="color: #006600; font-style: italic;">//numbers are, well, numbers without quotes around them</span>

    <span style="color: #3366CC;">'height'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">1000</span><span style="color: #339933;">,</span>
    <span style="color: #006600; font-style: italic;">//another variable</span>
    <span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">:</span> backgroundColor<span style="color: #339933;">,</span>

    <span style="color: #006600; font-style: italic;">//strings are a series of characters inside 'single quotes'</span>
    <span style="color: #3366CC;">'color'</span><span style="color: #339933;">:</span> <span style="color: #3366CC;">'black'</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>.getStyles();</h4>
<p>This lets you get multiple styles in one fell swoop.  This works just a little bit different than what we saw above as it holds multiple SETS of data, a key (the property) and a value (the property value).  This set of data is called an OBJECT and .getStyles(); makes it very easy to throw multiple styles into these objects and keeps it simple to get them back.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//first define a variable for your object</span>
<span style="color: #006600; font-style: italic;">//next create a selector</span>
<span style="color: #006600; font-style: italic;">//then add .getStyles to your selector</span>
<span style="color: #006600; font-style: italic;">//finally create a comma separated list of style properties </span>
<span style="color: #006600; font-style: italic;">//be sure to keep the properties inside single quotes</span>
<span style="color: #003366; font-weight: bold;">var</span> bodyStyles <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'body_wrap'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">getStyles</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'width'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'height'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'background-color'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 

&nbsp;
<span style="color: #006600; font-style: italic;">//first we create a new variable to hold the property value</span>
<span style="color: #006600; font-style: italic;">//then we call a particular property by its key, which in this case, is the property name</span>
<span style="color: #006600; font-style: italic;">//put the property name inside of [brackets]</span>
<span style="color: #006600; font-style: italic;">//and be sure to put 'single quotes' around the property key</span>
<span style="color: #003366; font-weight: bold;">var</span> bgStyle <span style="color: #339933;">=</span> bodyStyles<span style="color: #009900;">&#91;</span><span style="color: #3366CC;">'background-color'</span><span style="color: #009900;">&#93;</span><span style="color: #339933;">;</span></pre></div></div>

<p>If we have the following styles in our CSS file:</p>

<div class="wp_syntax"><div class="code"><pre class="css"><span style="color: #cc00cc;">#body_wrap</span> <span style="color: #66cc66;">&#123;</span>
    <span style="color: #000000; font-weight: bold;">width</span><span style="color: #66cc66;">:</span> <span style="color: #933;">1000px</span><span style="color: #66cc66;">;</span>
    <span style="color: #000000; font-weight: bold;">height</span><span style="color: #66cc66;">:</span> <span style="color: #933;">1000px</span><span style="color: #66cc66;">;</span>

    <span style="color: #000000; font-weight: bold;">background-color</span><span style="color: #66cc66;">:</span> <span style="color: #cc00cc;">#eeeeee</span><span style="color: #66cc66;">;</span>
<span style="color: #66cc66;">&#125;</span></pre></div></div>

<p>then bgStyle will contain the value &#8216;#eeeeee.&#8217;</p>
<p><strong>Note</strong>: when you want to get a single property from your object of styles, first state the object variable (in this case, bodyStyles), then use brackets and single quotes (['']), finally place the property key (such as width or background-color). That&#8217;s all there is to it.</p>
<h3>Example</h3>

<p>In this example, we are going to use a few of the methods we learned above to get and set styles.  More than the use of style property manipulation, please note the structure itself.  To separate our functions from our domready, we need to pass those functions some variables that are set within the domready event. We accomplish this through adding a parameter to the function inside the domready, then referring to that variable outside of the domready.  Notice that the click events use anonymous functions - this lets us pass the variables from the domready event to the functions that are outside.  Don&#8217;t worry if this doesn&#8217;t make sense on your first read through, the example below should make it more clear.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//here are the functions</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//notice that this function has a parameter &quot;bgColor&quot;</span>
<span style="color: #006600; font-style: italic;">//this is passed from within the domready event</span>
<span style="color: #003366; font-weight: bold;">var</span> seeBgColor <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>bgColor<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span> 
	<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span>bgColor<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> seeBorderColor <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>borderColor<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
	<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span>borderColor<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>

&nbsp;
<span style="color: #006600; font-style: italic;">//we pass in playDiv giving the function access to the element</span>
<span style="color: #006600; font-style: italic;">//also keeps us from having to use the selector repeatedly</span>
<span style="color: #006600; font-style: italic;">//very useful when dealing with complicated selectors</span>
<span style="color: #003366; font-weight: bold;">var</span> seeDivWidth <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>playDiv<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

        <span style="color: #006600; font-style: italic;">//we are getting the style again, </span>
        <span style="color: #006600; font-style: italic;">//separate from the getStyles we use in the domready</span>
        <span style="color: #006600; font-style: italic;">//because we want the current value</span>
        <span style="color: #006600; font-style: italic;">//this keeps the width alert accurate </span>
        <span style="color: #006600; font-style: italic;">//even when it has been changed after the domready event has passed</span>
	<span style="color: #003366; font-weight: bold;">var</span> currentDivWidth <span style="color: #339933;">=</span> playDiv.<span style="color: #006600;">getStyle</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'width'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span>currentDivWidth<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> seeDivHeight <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>playDiv<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
	<span style="color: #003366; font-weight: bold;">var</span> currentDivHeight <span style="color: #339933;">=</span> playDiv.<span style="color: #006600;">getStyle</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'height'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span>currentDivHeight<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> setDivWidth <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>playDiv<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
	playDiv.<span style="color: #006600;">setStyle</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'width'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'50px'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 

<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> setDivHeight <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>playDiv<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
	playDiv.<span style="color: #006600;">setStyle</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'height'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'50px'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//note that this parameter can be named anything at this level</span>
<span style="color: #006600; font-style: italic;">//and it will be passed whatever value/element/what-have-you</span>
<span style="color: #006600; font-style: italic;">//that is placed within the () of the function within the domready</span>
<span style="color: #003366; font-weight: bold;">var</span> resetSIze <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>foo<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>

	foo.<span style="color: #006600;">setStyles</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #3366CC;">'height'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">200</span><span style="color: #339933;">,</span>
		<span style="color: #3366CC;">'width'</span><span style="color: #339933;">:</span> <span style="color: #CC0000;">200</span>

	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
window.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'domready'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
        <span style="color: #006600; font-style: italic;">//since we use this selector a lot, it saves us writing time to pass it to a var</span>
	<span style="color: #003366; font-weight: bold;">var</span> playDiv <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'playstyles'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
        <span style="color: #006600; font-style: italic;">//here we create an object of several style properties</span>
	<span style="color: #003366; font-weight: bold;">var</span> bodyStyles <span style="color: #339933;">=</span> playDiv.<span style="color: #006600;">getStyles</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'background-color'</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">'border-bottom-color'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 

&nbsp;
        <span style="color: #006600; font-style: italic;">//you can retrieve a style by calling the key and passing the result to a var</span>
&nbsp;
	<span style="color: #003366; font-weight: bold;">var</span> bgColor <span style="color: #339933;">=</span> bodyStyles<span style="color: #009900;">&#91;</span><span style="color: #3366CC;">'background-color'</span><span style="color: #009900;">&#93;</span><span style="color: #339933;">;</span> 
&nbsp;
        <span style="color: #006600; font-style: italic;">//here we use an anonymous function so we can pass a parameter outside the domready event </span>

	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'bgcolor'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		seeBgColor<span style="color: #009900;">&#40;</span>bgColor<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'border_color'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
                <span style="color: #006600; font-style: italic;">//instead of passing the style parameter to a variable, </span>
                <span style="color: #006600; font-style: italic;">//you can call it directly here in this alert</span>

		seeBorderColor<span style="color: #009900;">&#40;</span>bodyStyles<span style="color: #009900;">&#91;</span><span style="color: #3366CC;">'border-bottom-color'</span><span style="color: #009900;">&#93;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'div_width'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		seeDivWidth<span style="color: #009900;">&#40;</span>playDiv<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'div_height'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		seeDivHeight<span style="color: #009900;">&#40;</span>playDiv<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'set_width'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		setDivWidth<span style="color: #009900;">&#40;</span>playDiv<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'set_height'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		setDivHeight<span style="color: #009900;">&#40;</span>playDiv<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> 
&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'reset'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		resetSIze<span style="color: #009900;">&#40;</span>playDiv<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>heres the html</p>

<div class="wp_syntax"><div class="code"><pre>&lt;div id=&quot;playstyles&quot;&gt; &lt;/div&gt;

    &lt;br /&gt;
    &lt;button id=&quot;bgcolor&quot;&gt;See background-color&lt;/button&gt;
    &lt;button id=&quot;border_color&quot;&gt;See border-bottom-color&lt;/button&gt;&lt;br /&gt;&lt;br /&gt;

    &lt;button id=&quot;div_width&quot;&gt;See width&lt;/button&gt;
    &lt;button id=&quot;div_height&quot;&gt;See height&lt;/button&gt;&lt;br /&gt;&lt;br /&gt;
    &lt;button id=&quot;set_width&quot;&gt;Set weight to 50px&lt;/button&gt;

    &lt;button id=&quot;set_height&quot;&gt;Set height to 50px&lt;/button&gt;&lt;br /&gt;&lt;br /&gt;
    &lt;button id=&quot;reset&quot;&gt;Reset size&lt;/button&gt;</pre></div></div>

<p>heres the css</p>

<div class="wp_syntax"><div class="code"><pre>#playstyles {
	width: 200px<SEMI>
	height: 200px<SEMI>
	background-color: #eeeeee<SEMI>
	border: 3px solid #dd97a1<SEMI>
}</pre></div></div>

<div id="playstyles"></div>
<p>

<button id="bgcolor">See background-color</button><br />
<button id="border_color">See border-bottom-color</button></p>
<p><button id="div_width">See width</button><br />
<button id="div_height">See height</button></p>
<p><button id="set_width">Set weight to 50px</button><br />
<button id="set_height">Set height to 50px</button></p>
<p><button id="reset">Reset size</button></p>
<h3>To Learn More&#8230;</h3>
<h4><a href="http://web.archive.org/web/20090210035108/http://www.consideropen.com/downloads/30days_of_moo/mootorial_day7_styles.zip">Download a zip with everything you need to get started</a></h4>

<p>Including the Mootools 1.2 core, an external javascript file, a simple html page and a css file.</p>
<h4>More about styles</h4>
<p>To learn more about styles, take a look over the <a href="http://web.archive.org/web/20090210035108/http://docs.mootools.net/Element/Element.Style">Element.Style</a> docs.</p>
<h4>Tomorrow&#8217;s Mootools 1.2 Tutorial - Input Filtering Part 1 (Numbers)</h4>
<p><a href="http://web.archive.org/web/20090210035108/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-8-input-filtering-part-i-numbers/">Check in tomorrow for Day 8 - Input Filtering Part 1 (Numbers).  </a></p>
<h3>Tutorial Request or Questions</h3>

<p>As always, please drop us a note with any questions about this tutorial, and we would love to hear any requests for other entries later in the series.  Hope you have found this useful.</p>
					</div>