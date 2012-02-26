<p>
If you haven&#8217;t already, be sure and check out the rest of the <a href="http://web.archive.org/web/20090301044654/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-1-intro-to-the-library/">Mootools 1.2 tutorials</a> in our 30 days series.

</p>
<p>Today we&#8217;re going to be taking a look at the basics of creating and using classes with Mootools. </p>
<p>To put it simply, a class is a container for a collection of variables and functions which operate on those variables to perform specific tasks. Classes are incredibly helpful when working on a more involved project.</p>
<h3>Variables</h3>
<p>
You&#8217;ve already seen the use of Hashes with key/value pairs <a href="http://web.archive.org/web/20090301044654/http://www.consideropen.com/blog/2008/08/30-days-of-mootools-12-tutorials-day-14-periodical-and-intro-to-hashes/">earlier in the series</a>, So the example below of building a class which only contains variables should look pretty familiar:
</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//Create a new class named class_one</span>

<span style="color: #006600; font-style: italic;">//with two internal variables</span>
<span style="color: #003366; font-weight: bold;">var</span> Class_one <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> <span style="color: #003366; font-weight: bold;">Class</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
	variable_one <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;I'm First&quot;</span><span style="color: #339933;">,</span>

	variable_two <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;I'm Second&quot;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Similarly, you can access these variables in the same manner as you would access the variables in a hash, note in the code below that we&#8217;re creating a new class of the class_one type defined above.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> run_demo_one <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

	<span style="color: #006600; font-style: italic;">//instantiate a Class_one class called demo_1</span>
	<span style="color: #003366; font-weight: bold;">var</span> demo_1 <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Class_one<span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #006600; font-style: italic;">//Display the variables inside demo_one</span>

	<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span> demo_1.<span style="color: #006600;">variable_one</span> <span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span> demo_1.<span style="color: #006600;">variable_two</span> <span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>	
<span style="color: #009900;">&#125;</span></pre></div></div>

<p><button id="run_demo_1" class="demo_button">run_demo_1()</button></p>
<h3>Methods/Functions</h3>
<p>Method is the term used to refer to functions which belong to a specific class. These methods have to be called from an instance of this class, and can&#8217;t be called on their own. You define a method just like you would define a variable, except instead of giving it a static value, you pass it an anonymous function:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> Class_two <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> <span style="color: #003366; font-weight: bold;">Class</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>

	variable_one <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;I'm First&quot;</span><span style="color: #339933;">,</span>
	variable_two <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;I'm Second&quot;</span><span style="color: #339933;">,</span>
	function_one <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'First Value : '</span> <span style="color: #339933;">+</span> <span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">variable_one</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
	function_two <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'Second Value : '</span> <span style="color: #339933;">+</span> <span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">variable_two</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Note the use of <b>this</b> in the example above. Because the variables that these methods operate on are internal to the class, you need to access those variables using this, otherwise you&#8217;ll just get an undefined value.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">	<span style="color: #006600; font-style: italic;">//Works</span>
	working_method <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'First Value : '</span> <span style="color: #339933;">+</span> <span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">variable_one</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
	<span style="color: #006600; font-style: italic;">//Doesn't work</span>
	broken_method <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'Second Value : '</span> <span style="color: #339933;">+</span> variable_two<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #009900;">&#125;</span></pre></div></div>

<p>Calling the methods of the newly created class works like accessing the class variables</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> run_demo_2 <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//Instantiate a version of class_two</span>
	<span style="color: #003366; font-weight: bold;">var</span> demo_2 <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Class_two<span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #006600; font-style: italic;">//Call function_one</span>
	demo_2.<span style="color: #006600;">function_one</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #006600; font-style: italic;">//Call function_two</span>
	demo_2.<span style="color: #006600;">function_two</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span></pre></div></div>

<p><button id="run_demo_2" class="demo_button">run_demo_2()</button></p>
<h3>initialize : </h3>
<p>The initialize option in the Class object gives you a place to put any set-up work that needs to be done for the class, as well as giving you a place to setup user-configurable options and variables. You define it just like you define a method:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> Myclass <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> <span style="color: #003366; font-weight: bold;">Class</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>

	<span style="color: #006600; font-style: italic;">//Define an initalization function with one parameter</span>
	initialize <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>user_input<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #006600; font-style: italic;">//create a value variable belonging to</span>
		<span style="color: #006600; font-style: italic;">//this class and assign it the value</span>
		<span style="color: #006600; font-style: italic;">//of the user input</span>

		<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">value</span> <span style="color: #339933;">=</span> user_input<span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span></pre></div></div>

<p>You can also use the initialization to change other options or behavior:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> Myclass <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> <span style="color: #003366; font-weight: bold;">Class</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
	initialize <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>true_false_value<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #000066; font-weight: bold;">if</span> <span style="color: #009900;">&#40;</span>true_false_value<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

			<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">message</span> <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;Everything this message says is true&quot;</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">&#125;</span>
		<span style="color: #000066; font-weight: bold;">else</span> <span style="color: #009900;">&#123;</span>
			<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">message</span> <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;Everything this message says is false&quot;</span><span style="color: #339933;">;</span>

		<span style="color: #009900;">&#125;</span>
	<span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//Will set myClass_instance.message to </span>
<span style="color: #006600; font-style: italic;">//&quot;Everything this message says is true&quot;</span>
<span style="color: #003366; font-weight: bold;">var</span> myclass_instance <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Myclass<span style="color: #009900;">&#40;</span><span style="color: #003366; font-weight: bold;">true</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #006600; font-style: italic;">//Will set myClass_instance.message to </span>
<span style="color: #006600; font-style: italic;">//&quot;Everything this message says is false&quot;</span>
<span style="color: #003366; font-weight: bold;">var</span> myclass_instance <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Myclass<span style="color: #009900;">&#40;</span><span style="color: #003366; font-weight: bold;">false</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>All this works right alongside with any other variable or method declarations you&#8217;d like to make. Just remember the commas after each { key/value hash }.  It&#8217;s really easy to miss one and spend absurd amounts of time tracking down non-existent bugs.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> Class_three <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> <span style="color: #003366; font-weight: bold;">Class</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//Function run when class is created</span>

	initialize <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>one<span style="color: #339933;">,</span> two<span style="color: #339933;">,</span> true_false_option<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">variable_one</span> <span style="color: #339933;">=</span> one<span style="color: #339933;">;</span>

		<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">variable_two</span> <span style="color: #339933;">=</span> two<span style="color: #339933;">;</span>
		<span style="color: #000066; font-weight: bold;">if</span> <span style="color: #009900;">&#40;</span>true_false_option<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
			<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">boolean_option</span> <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;True Selected&quot;</span><span style="color: #339933;">;</span>

		<span style="color: #009900;">&#125;</span>
		<span style="color: #000066; font-weight: bold;">else</span> <span style="color: #009900;">&#123;</span>
			<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">boolean_option</span> <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;False Selected&quot;</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">&#125;</span>

	<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
	<span style="color: #006600; font-style: italic;">//Method Definitions</span>
	function_one <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'First Value : '</span> <span style="color: #339933;">+</span> <span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">variable_one</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

		<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
	function_two <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'Second Value : '</span> <span style="color: #339933;">+</span> <span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">variable_two</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #009900;">&#125;</span>	
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> run_demo_3 <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #003366; font-weight: bold;">var</span> demo_3 <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Class_three<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;First Argument&quot;</span><span style="color: #339933;">,</span> <span style="color: #3366CC;">&quot;Second Argument&quot;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	demo_3.<span style="color: #006600;">function_one</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	demo_3.<span style="color: #006600;">function_two</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span></pre></div></div>

<p><button id="run_demo_3" class="demo_button">run_demo_3()</button></p>
<h3>Implementing Options</h3>
<p>

When building classes, it&#8217;s often helpful to define some default values for the class to start with if the user doesn&#8217;t provide any input. You can do this manually by setting up default values in the initialization function, checking each of them to see if a parameter was passed, and replacing the default values when necessary. Or you could just make use of the <a href="http://web.archive.org/web/20090301044654/http://docs.mootools.net/Class/Class.Extras#Options">Options</a> class provided by Mootools in Class.extras. </p>
<p>
Adding the options functionality to your class is as simple as adding another key/value pair to the initialization options for your class:
</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> Myclass <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> <span style="color: #003366; font-weight: bold;">Class</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>

	Implements<span style="color: #339933;">:</span> Options
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span></pre></div></div>

<p>
Don&#8217;t worry to much about the details of the Implements option, we&#8217;ll be digging into that in more detail tomorrow. So now that you&#8217;ve got a class with the Options functionality, you need to define your default options. Just like everything else, this is done by adding another key/value pair to the class initialization options. Instead of passing a single value however, you&#8217;ll be defining a nested key value/set like so:
</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> Myclass <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> <span style="color: #003366; font-weight: bold;">Class</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>

	Implements<span style="color: #339933;">:</span> Options<span style="color: #339933;">,</span>
	options<span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>
		option_one <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;First Option&quot;</span><span style="color: #339933;">,</span>

		option_two <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;Second Option&quot;</span>
	<span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span></pre></div></div>

<p>Now that we&#8217;ve got the default values set, we need a way for the user to override those default values when instantiating the class. All you need to do is add one line to your initialize function, and Options takes care of the rest:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> Myclass <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> <span style="color: #003366; font-weight: bold;">Class</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>

	Implements<span style="color: #339933;">:</span> Options<span style="color: #339933;">,</span>
	options<span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>
		option_one <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;First Default Option&quot;</span><span style="color: #339933;">,</span>

		option_two <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;Second Default Option&quot;</span>
	<span style="color: #009900;">&#125;</span>
	initialize<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>options<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">setOptions</span><span style="color: #009900;">&#40;</span>options<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span></pre></div></div>

<p>
Once this is set up, you can override any or all of the default options by passing it  key/value pairs
</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//Override both of the default options</span>
<span style="color: #003366; font-weight: bold;">var</span> class_instance <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Myclass<span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>

	options_one <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;Override First Option&quot;</span><span style="color: #339933;">,</span>  
	options_two <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;Override Second Option&quot;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//Override one of the default options</span>

<span style="color: #003366; font-weight: bold;">var</span> class_instance <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Myclass<span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
	options_two <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;Override Second Option&quot;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span></pre></div></div>

<p>
Note the use of the setOptions method in the initialization function. This is a method that is provided by Options, and also allows you to set the options once the class has been instantiated.
</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> class_instance <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Myclass<span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #006600; font-style: italic;">//Set the first option</span>
class_instance.<span style="color: #006600;">setOptions</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>options_one <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;Override First Option&quot;</span><span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Once the options have been set, you can access them through the options variable</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> class_instance <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Myclass<span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #006600; font-style: italic;">//Get the value of the first option </span>
<span style="color: #003366; font-weight: bold;">var</span> class_option <span style="color: #339933;">=</span> class_instance.<span style="color: #006600;">options</span>.<span style="color: #006600;">options_one</span><span style="color: #339933;">;</span>

<span style="color: #006600; font-style: italic;">//class_option is now equal to &quot;First Default Option&quot;</span></pre></div></div>

<p>If you want to access the variable from inside the class, be sure to use the <i>this</i> syntax:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> Myclass <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> <span style="color: #003366; font-weight: bold;">Class</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>

	Implements<span style="color: #339933;">:</span> Options<span style="color: #339933;">,</span>
	options<span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>
		option_one <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;First Default Option&quot;</span><span style="color: #339933;">,</span>

		option_two <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;Second Default Option&quot;</span>
	<span style="color: #009900;">&#125;</span>
	test <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #006600; font-style: italic;">//Note that we're using this to</span>

		<span style="color: #006600; font-style: italic;">//refer to the class </span>
		<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">option_two</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> class_instance <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Myclass<span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #006600; font-style: italic;">//Will pop-up an alert saying &quot;Second Default Option&quot;</span>
class_instance.<span style="color: #006600;">test</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>All this wrapped together in a class looks like this :</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> Class_four <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> <span style="color: #003366; font-weight: bold;">Class</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>	
    Implements<span style="color: #339933;">:</span> Options<span style="color: #339933;">,</span>

	options<span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>
		option_one <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;Default Value For First Option&quot;</span><span style="color: #339933;">,</span>
		option_two <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;Default Value For Second Option&quot;</span><span style="color: #339933;">,</span>

	<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
	initialize<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>options<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">setOptions</span><span style="color: #009900;">&#40;</span>options<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>   
	show_options <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">options</span>.<span style="color: #006600;">option_one</span> <span style="color: #339933;">+</span> <span style="color: #3366CC;">&quot;<span style="color: #000099; font-weight: bold;">\n</span>&quot;</span> <span style="color: #339933;">+</span> <span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">options</span>.<span style="color: #006600;">option_two</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> run_demo_4 <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span> <span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #003366; font-weight: bold;">var</span> demo_4 <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Class_four<span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>

		option_one <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;New Value&quot;</span>
		<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	demo_4.<span style="color: #006600;">show_options</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> run_demo_5 <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

	<span style="color: #003366; font-weight: bold;">var</span> demo_5 <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Class_four<span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	demo_5.<span style="color: #006600;">show_options</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	demo_5.<span style="color: #006600;">setOptions</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>option_two <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;New Value&quot;</span><span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	demo_5.<span style="color: #006600;">show_options</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #006600; font-style: italic;">//Create a new class_four class with</span>
<span style="color: #006600; font-style: italic;">//a new option called new_variable</span>
<span style="color: #003366; font-weight: bold;">var</span> run_demo_6 <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

	<span style="color: #003366; font-weight: bold;">var</span> demo_6 <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Class_four<span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>new_option <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;This is a new option&quot;</span><span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	demo_6.<span style="color: #006600;">show_options</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span></pre></div></div>

<p><button id="run_demo_4" class="demo_button">demo_4()</button><br />
<button id="run_demo_5" class="demo_button">demo_5()</button><br />
<button id="run_demo_6" class="demo_button">demo_6()</button></p>
<h3>Example</h3>
<p>Those of you familiar with PHP may recognize the print_r() command used by the show_options method in the example below:</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">   	show_options <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

   		<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span>print_r<span style="color: #009900;">&#40;</span><span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">options</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">true</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
   	<span style="color: #009900;">&#125;</span></pre></div></div>

<p>This isn&#8217;t a native javascript function, but is a piece of code from the <a href="http://web.archive.org/web/20090301044654/http://kevin.vanzonneveld.net/techblog/category/php2js/">PHP2JS</a> project run by Kevin van Zonneveld. For those of you not versed in PHP, the print_r() function gives you a formatted string out the key/value pairs in an array. It&#8217;s an <a href="http://web.archive.org/web/20090301044654/http://kevin.vanzonneveld.net/techblog/article/javascript_equivalent_for_phps_print_r/">incredibly useful tool for debugging</a> your scripts, a copy of the function is included in the downloadable zip and I highly recommend it&#8217;s use for testing and exploration.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> Class_five <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> <span style="color: #003366; font-weight: bold;">Class</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//We're using options</span>
	Implements<span style="color: #339933;">:</span> Options<span style="color: #339933;">,</span>

	<span style="color: #006600; font-style: italic;">//Set our default options</span>
	options <span style="color: #339933;">:</span> <span style="color: #009900;">&#123;</span>
		option_one <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;DEFAULT_1&quot;</span><span style="color: #339933;">,</span>
		option_two <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;DEFAULT_2&quot;</span><span style="color: #339933;">,</span>	
	<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>

	<span style="color: #006600; font-style: italic;">//Have our initialization function </span>
	<span style="color: #006600; font-style: italic;">//set the options using setOptions</span>
	initialize <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>options<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">setOptions</span><span style="color: #009900;">&#40;</span>options<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
	<span style="color: #006600; font-style: italic;">//Method to send an alert with a</span>
	<span style="color: #006600; font-style: italic;">//formatted printout of the options array</span>
   	show_options <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
   		<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span>print_r<span style="color: #009900;">&#40;</span><span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">options</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">true</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

   	<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
	<span style="color: #006600; font-style: italic;">//Method to switch the values</span>
	<span style="color: #006600; font-style: italic;">//of the two options using setOptions</span>
	swap_options <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">setOptions</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>

			option_one <span style="color: #339933;">:</span> <span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">options</span>.<span style="color: #006600;">option_two</span><span style="color: #339933;">,</span>
			option_two <span style="color: #339933;">:</span> <span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">options</span>.<span style="color: #006600;">option_one</span>

		<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span>
	<span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">function</span> demo_7<span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #003366; font-weight: bold;">var</span> demo_7 <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Class_five<span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	demo_7.<span style="color: #006600;">show_options</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	demo_7.<span style="color: #006600;">setOptions</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>option_one <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;New Value&quot;</span><span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	demo_7.<span style="color: #006600;">swap_options</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	demo_7.<span style="color: #006600;">show_options</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span></pre></div></div>

<p><button id="run_demo_7" class="demo_button">run_demo_7()</button></p>
<h3>To learn more</h3>
<h4><a href="http://web.archive.org/web/20090301044654/http://www.consideropen.com/downloads/30days_of_moo/mootorial_day18_classes_1.zip">Download a zip containing everything you need to get started</a></h4>
<p><a href="http://web.archive.org/web/20090301044654/http://docs.mootools.net/Class/Class">Mootools Class Documentation</a><br />
<a href="http://web.archive.org/web/20090301044654/http://docs.mootools.net/Class/Class.Extras">Mootools Class.extras Documentation</a><br />

<a href="http://web.archive.org/web/20090301044654/http://kevin.vanzonneveld.net/techblog/article/javascript_equivalent_for_phps_print_r/">print_r() reference</a></p>
<h4>Tomorrow&#8217;s Tutorial</h4>
<p><a href="http://web.archive.org/web/20090301044654/http://www.consideropen.com/blog/2008/09/30-days-of-mootools-12-tutorials-day-19-tooltips/">Day 19 - Tooltips</a></p>
<h3>Questions, Comments, Suggestions</h3>
<p>As always, let us know if you&#8217;ve got any questions or suggestions, we&#8217;ll do our best to help you out. </p>
					