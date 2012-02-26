<h2>Mootools 1.2 Sortables</h2>
<p>If you haven&#8217;t already, be sure and check out the rest of the <a href="http://web.archive.org/web/20090207062824/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-1-intro-to-the-library/">Mootools 1.2 tutorials</a> in our 30 days series.</p>

<p>Today we are going to look at another of the bundled plugins from the &#8220;more&#8221; library.  Sortables is a very powerful plugin and can really open up the options with your user interface designs.  The sortables also include a great function called &#8220;serialize&#8221; that will output and array of the list element ids - great for integrating with server side scripting.  Read on to learn how to create a new set of sortable items, and be sure to check out the live demo at the end.</p>
<h3>The Basics</h3>
<h4>Creating a New Sortable Object</h4>
<p>First, we are going to send our elements over to variables.  For sortables, if you want multiple lists to have the potential to drag and drop list items between them, you are going to want to put all the lists inside an array like so:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> sortableListsArray <span style="color: #339933;">=</span> $$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#listA, #listB'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>This places the ids of two uls into an array.  We can now create a new sortable object from this array:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> sortableLists <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Sortables<span style="color: #009900;">&#40;</span>sortableListsArray<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>If we use the following html</p>

<div class="wp_syntax"><div class="code"><pre>&lt;ul id=&quot;listA&quot;&gt;
	&lt;li&gt;Item A1&lt;/li&gt;
	&lt;li&gt;Item A2&lt;/li&gt;
	&lt;li&gt;Item A3&lt;/li&gt;

	&lt;li&gt;Item A4&lt;/li&gt;
&lt;/ul&gt;
&nbsp;
&lt;ul id=&quot;listB&quot;&gt;
	&lt;li&gt;Item B1&lt;/li&gt;
	&lt;li&gt;Item B2&lt;/li
	&lt;li&gt;Item B3&lt;/li&gt;

	&lt;li&gt;Item B4&lt;/li&gt;
&lt;/ul&gt;</pre></div></div>

<p>then our sortable lists would come out looking something like this:</p>
<ul id="listA">
<li>Item A1</li>
<li>Item A2</li>
<li>Item A3</li>

<li>Item A4</li>
</ul>
<ul id="listB">
<li>Item B1</li>
<li>Item B2</li>
<li>Item B3</li>
<li>Item B4</li>
</ul>
<h3>Sortables Options</h3>
<p>If want to customize the functionality of your sortable list, you are going to need to tweak the options.</p>

<h4>constrain</h4>
<p>default - false</p>
<p>This option will determine whether your sortable list elements can jump between uls within the sortable object.  For example, if you have two uls in the sortable object, you can &#8220;constrain&#8221; the list items to their parent ul by setting &#8220;constrain: true.&#8221;</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> sortableLists <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Sortables<span style="color: #009900;">&#40;</span>sortableListsArray<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

    constrain<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">false</span> <span style="color: #006600; font-style: italic;">//false is default</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>clone</h4>
<p>default - false</p>
<p>Clone lets you add a &#8220;clone&#8221; element that will stay under your cursor when you sort, leaving the original element in place.  Check out the example below to see a clone.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> sortableLists <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Sortables<span style="color: #009900;">&#40;</span>sortableListsArray<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>
    clone<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">true</span> <span style="color: #006600; font-style: italic;">//false is default</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>handle</h4>
<p>default - false</p>
<p>Handle will accept an element to act as the drag handle.  This is very handy if you want to keep the text in your list items selectable or you want other actions within the li.  The default (false) will make the sortable element (the li) the drag handle.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> handleElements <span style="color: #339933;">=</span> $$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'.handlesClass'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #003366; font-weight: bold;">var</span> sortableLists <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Sortables<span style="color: #009900;">&#40;</span>sortableListsArray<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>
    handle<span style="color: #339933;">:</span> handleElements <span style="color: #006600; font-style: italic;">//false is default</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>opacity</h4>
<p>default - 1</p>
<p>Opacity lets you adjust the sort element.  If you use a clone, opacity affects the element that sorts, not the element that follows your cursor.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> sortableLists <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Sortables<span style="color: #009900;">&#40;</span>sortableListsArray<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

    opacity<span style="color: #339933;">:</span> <span style="color: #CC0000;">1</span> <span style="color: #006600; font-style: italic;">//default is 1</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>revert</h4>
<p>default - false</p>
<p>Revert will accept either &#8220;false&#8221; or Fx options.  If you set Fx options within revert, it will create an effect for the sorted element to settle into place.  For example, you could set &#8220;duration: long&#8221; and the clone would take its time to go back to its place in the list when you let go.  To see revert in action, check out example below</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> sortableLists <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Sortables<span style="color: #009900;">&#40;</span>sortableListsArray<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>
    revert<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">false</span> <span style="color: #006600; font-style: italic;">//this is the default</span>

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//you can also set Fx options</span>
<span style="color: #003366; font-weight: bold;">var</span> sortableLists <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Sortables<span style="color: #009900;">&#40;</span>sortableListsArray<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

    revert<span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>
        duration<span style="color: #339933;">:</span> <span style="color: #CC0000;">50</span>
    <span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h4>snap</h4>

<p>default - 4</p>
<p>Snap lets you set how many px the user will drag the mouse before the element starts following.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> sortableLists <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Sortables<span style="color: #009900;">&#40;</span>sortableListsArray<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

    snap<span style="color: #339933;">:</span> <span style="color: #CC0000;">10</span> <span style="color: #006600; font-style: italic;">//user will have to drag 10 px to start the list sorting</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<h3>Sortable Events</h3>
<p>The sortable events are nice and straightforward.  Each will pass the element being sorted (not the clone you are dragging, if you are using clone).</p>
<ul>
<li>onStart - fires when the drag starts (once snap kicks over)</li>

<li>onSort - fires when the items change order</li>
<li>onComplete - fires when you drop an element in place</li>
</ul>
<p>We will check out the events in more detail (and you can see them in action) in the example below.</p>
<h3>Sortable Methods</h3>
<p>We haven&#8217;t talked specifically about methods before, though we have used them plenty of times.  Methods are essentially functions that belong to classes.  While classes are a subject for another day, let&#8217;s take a quick second to establish a general idea.  This plugin (and the others we have looked at), all follow a similar pattern - initiate a &#8220;new&#8221; instance of the plugin, define one or more selector parameters, define your options, add some events and just like that you have a new sortable or tween.  That pattern is the basis of a class.  A class basically allows you to store options and functions to use over again.  Methods are specific functions that exist within and add functionality of a given class.  .set() and .get() for instance, are Methods that extend the element property.  Within the Fx.Tween, .start() is a method.  To get a better idea, let&#8217;s take a look over the sortable methods:</p>

<h4>.detach();</h4>
<p>With .detach();, you can &#8220;detach&#8221; all the current handles, making the entire list object not sortable.  Useful for disabling sort.</p>
<h4>.attach();</h4>
<p>This method will &#8220;attach&#8221; the handles to the sort items, works to enable sorting after .detach();.</p>
<h4>.addItems();</h4>
<p>This allows you to add new items to your sortable list.  Let&#8217;s say that you have a sortable list where the user can add a new item, once you add that new item, you will need to enable sorting on that new item.</p>

<h4>.removeItems();</h4>
<p>This method lets you remove the sorting capability of an item within a sortable list.  This is useful when you want to lock a particular item within a specific list and not let it sort with others.</p>
<h4>.addLists();</h4>
<p>Instead of just adding a new item to an existing list, you may want to add a whole new list to the sortable object.  .addLists(); even lets you add multiple lists, making it really easy to add more sortables.</p>
<h4>.removeLists();</h4>
<p>Lets you remove entire lists from the sortable object.  This is useful for when you want to lock a particular list in place.  You can remove the list, leaving another lists still in the object sortable, but locking the content of the removed list.</p>
<h4>.serialize();</h4>
<p>All of that sorting is great, but what if you want to do something with the data?  .serialize(); will return a list of the item ids as well as their order on the list.  You can choose which list to get data from with in the object by index number.</p>
<p>There are much bigger implications to methods than we are covering here, but let this serve as a introduction to the concept if it&#8217;s new, and we will get deeper into methods and classes in a later tutorial.</p>

<h3>Example</h3>
<p>The following example uses several options, all the events and all the methods described above.  Hopefully the code will speak for itself, but refer to the comments for further info. Remember, everything below needs to go inside the domready event.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> sortableListsArray <span style="color: #339933;">=</span> $$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#numberlist, #letterlist'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #003366; font-weight: bold;">var</span> sortableLists <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Sortables<span style="color: #009900;">&#40;</span>sortableListsArray<span style="color: #339933;">,</span> <span style="color: #009900;">&#123;</span>

        <span style="color: #006600; font-style: italic;">//creates a clone to follow my cursor when i drag</span>
	clone<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">true</span><span style="color: #339933;">,</span>
        <span style="color: #006600; font-style: italic;">//defines the class of the drag handle</span>
	handle<span style="color: #339933;">:</span> <span style="color: #3366CC;">'.handle'</span><span style="color: #339933;">,</span>

        <span style="color: #006600; font-style: italic;">//will let you create an effect for the</span>
        <span style="color: #006600; font-style: italic;">//item returning to list after drag</span>
	revert<span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>
	    <span style="color: #006600; font-style: italic;">//accepts Fx options</span>
		duration<span style="color: #339933;">:</span> <span style="color: #CC0000;">50</span>

	<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
        <span style="color: #006600; font-style: italic;">//determines opacity of list element, not drag clone</span>
	opacity<span style="color: #339933;">:</span> .<span style="color: #CC0000;">5</span><span style="color: #339933;">,</span>
&nbsp;
	onStart<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>el<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		<span style="color: #006600; font-style: italic;">//passes element you are dragging</span>
		$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'start_ind'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#F3F865'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		el.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#F3F865'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
	onSort<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>el<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
		<span style="color: #006600; font-style: italic;">//passes element you are dragging</span>
		$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'sort_ind'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#F3F865'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
	onComplete<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>el<span style="color: #009900;">&#41;</span> <span style="color: #009900;">&#123;</span>
		<span style="color: #006600; font-style: italic;">//passes element you are dragging</span>
		$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'complete_ind'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#F3F865'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

		<span style="color: #003366; font-weight: bold;">var</span> listOne <span style="color: #339933;">=</span> sortableLists.<span style="color: #006600;">serialize</span><span style="color: #009900;">&#40;</span><span style="color: #CC0000;">0</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		<span style="color: #003366; font-weight: bold;">var</span> listTwo <span style="color: #339933;">=</span> sortableLists.<span style="color: #006600;">serialize</span><span style="color: #009900;">&#40;</span><span style="color: #CC0000;">1</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

		$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'numberOrder'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'text'</span><span style="color: #339933;">,</span> listOne<span style="color: #009900;">&#41;</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#F3F865'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>	<span style="color: #339933;">;</span>
		$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'letterOrder'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">set</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'text'</span><span style="color: #339933;">,</span> listTwo<span style="color: #009900;">&#41;</span>.<span style="color: #006600;">highlight</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'#F3F865'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>	<span style="color: #339933;">;</span>

	<span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">detach</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span> <span style="color: #006600; font-style: italic;">//disables the handles, so you must push the button to get them going</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> addListoSort <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'addListTest'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'addListButton'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
        sortableLists.<span style="color: #006600;">addLists</span><span style="color: #009900;">&#40;</span>addListoSort<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'removeListButton'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	sortableLists.<span style="color: #006600;">removeLists</span><span style="color: #009900;">&#40;</span>addListoSort<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'enable_handles'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	sortableLists.<span style="color: #006600;">attach</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'disable_handles'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	sortableLists.<span style="color: #006600;">detach</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> itemOne <span style="color: #339933;">=</span> $<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'one'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'add_item'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

	sortableLists.<span style="color: #006600;">addItems</span><span style="color: #009900;">&#40;</span>itemOne<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'remove_item'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">addEvent</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'click'</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

	sortableLists.<span style="color: #006600;">removeItems</span><span style="color: #009900;">&#40;</span>itemOne<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>The handles are not enabled by default (take a close look over the code).  To start sorting, you will need to &#8220;enable handles.&#8221;</p>
<div id="start_ind" class="ind">
    	onStart</p></div>
<div id="sort_ind" class="ind">

    	onSort</p></div>
<div id="complete_ind" class="ind">
    	onComplete</p></div>
<p>	<button id="enable_handles">Enable Handles</button><br />
	<button id="disable_handles">Disable Handles</button></p>
<p>	<button id="add_item">Add item one</button><br />
	<button id="remove_item">Remove item one</button></p>

<div id="numberOrder" class="order">Top List Order</div>
<ul id="numberlist" class="sortlists">
<li id="one"><span class="handle"></span>1</li>
<li id="two"><span class="handle"></span>2</li>
<li id="three"><span class="handle"></span>3</li>
<li id="four"><span class="handle"></span>4</li>
<li id="five"><span class="handle"></span>5</li>
<li id="six"><span class="handle"></span>6</li>
<li id="seven"><span class="handle"></span>7</li>

</ul>
<div id="letterOrder" class="order">Bottom List Order</div>
<ul id="letterlist" class="sortlists">
<li id="lettera"><span class="handle"></span>A</li>
<li id="letterb"><span class="handle"></span>B</li>
<li id="letterc"><span class="handle"></span>C</li>
<li id="letterd"><span class="handle"></span>D</li>
<li id="lettere"><span class="handle"></span>E</li>
<li id="letterf"><span class="handle"></span>F</li>
<li id="letterg"><span class="handle"></span>G</li>

</ul>
<p>	<button id="addListButton">Add List</button><br />
	<button id="removeListButton">Remove List</button></p>
<ul id="addListTest" class="sortlists">
<li id=""><span class="handle"></span>add A</li>
<li id=""><span class="handle"></span>add B</li>
<li id=""><span class="handle"></span>add C</li>
<li id=""><span class="handle"></span>add D</li>
<li id=""><span class="handle"></span>add E</li>

<li id=""><span class="handle"></span>add F</li>
<li id=""><span class="handle"></span>add G</li>
</ul>
<h3>To Learn More&#8230;</h3>
<p>Check out the <a href="http://web.archive.org/web/20090207062824/http://docs.mootools.net/Plugins/Sortables">docs entry about sortable lists</a>.</p>
<h4><a href="http://web.archive.org/web/20090207062824/http://www.consideropen.com/downloads/30days_of_moo/mootorial_day16_sortables.zip">Download a zip of everything you need to get started</a></h4>
<p>Including the example above, an external javascript file, a css style sheet, a simple html file and the Mootools 1.2 core and more libraries.</p>
<h4>Tomorrow&#8217;s Tutorial</h4>

<p>Check out Day 17 where we will explore the <a href="http://web.archive.org/web/20090207062824/http://www.consideropen.com/blog/2008/09/30-days-of-mootools-12-tutorials-day-17-accordion/">accordion plugin</a></p>
<h3>Questions, Comments, Suggestions</h3>
<p>Please drop us a note if you have any questions or if you have anything to add to this tutorial.  Thanks and hope you find it useful.</p>
					