<p>Now that we&#8217;ve got our base class defined, we can access its functionality by creating another class which implements it. Note in the example below that our new class isn&#8217;t doing anything but implementing BaseClass.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #006600; font-style: italic;">//Build a class called ImplementingClass</span>
<span style="color: #003366; font-weight: bold;">var</span> ImplementingClass <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> <span style="color: #003366; font-weight: bold;">Class</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//All we do is implement Baseclass</span>
	Implements <span style="color: #339933;">:</span> BaseClass

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Now we can create an instance of ImplementingClass and access the functionality defined in BaseClass completely transparently.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> demo_one <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//Create a new instance of ImplementingClass</span>
	<span style="color: #003366; font-weight: bold;">var</span> test_class <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> ImplementingClass<span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #006600; font-style: italic;">//Call testFunction, which is defined in BaseClass</span>
	test_class.<span style="color: #006600;">testFunction</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span></pre></div></div>

<p><button id="demo_one_button">demo_one()</button></p>
<p>You can do the same with variables and the initialize function. Pretty much everything you define in the base class will be transferred to the implementing class, as if you declared it in the implementing class.</p>
<p><strong>Note</strong>: We&#8217;re going to be using this version of BaseClass in the rest of the examples.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> BaseClass <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> <span style="color: #003366; font-weight: bold;">Class</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//Assign the parameter value</span>
	<span style="color: #006600; font-style: italic;">//to the inputVariable variable</span>
	<span style="color: #006600; font-style: italic;">//belonging to this class</span>

	initialize<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>input<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">inputVariable</span> <span style="color: #339933;">=</span> input<span style="color: #339933;">;</span>

	<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
	<span style="color: #006600; font-style: italic;">//Display the value of inputVariable</span>
	testFunction <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'BaseClass.testFunction() : '</span> <span style="color: #339933;">+</span> <span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">inputVariable</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
	<span style="color: #006600; font-style: italic;">//Define an internal variable</span>
	<span style="color: #006600; font-style: italic;">//for all instances of this class</span>
	definedVariable <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;Defined in BaseClass&quot;</span><span style="color: #339933;">,</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> ImplementingClass <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> <span style="color: #003366; font-weight: bold;">Class</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//Once again, all we're doing</span>
	<span style="color: #006600; font-style: italic;">//is implementing the BaseClass</span>
	Implements <span style="color: #339933;">:</span> BaseClass

<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>The demo below demonstrates how the initialization routine, function calls, and variables are all accessed as if they belonged to the implementing class.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> demo_two <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//Build an instance of ImplementingClass</span>
	<span style="color: #003366; font-weight: bold;">var</span> test_class <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> ImplementingClass<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'this is the input value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
	<span style="color: #006600; font-style: italic;">//Call testFunction() (defined in BaseClass)</span>
	test_class.<span style="color: #006600;">testFunction</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//Display definedVariable</span>
	<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'test_class.testVariable : '</span> <span style="color: #339933;">+</span> test_class.<span style="color: #006600;">definedVariable</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span></pre></div></div>

<p><button id="demo_two_button">demo_two()</button></p>
<p>Once you&#8217;ve implemented a class, you can add whatever functionality you want to the implementing class definition.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> ImplementingClass <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> <span style="color: #003366; font-weight: bold;">Class</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>

	Implements <span style="color: #339933;">:</span> BaseClass<span style="color: #339933;">,</span>
	<span style="color: #006600; font-style: italic;">//Both of these are defined in BaseClass</span>
	definedVariable <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;Defined in ImplementingClass&quot;</span><span style="color: #339933;">,</span>

	testFunction <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'This function is also defined in BaseClass'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//Neither of these are defined in BaseClass</span>

	anotherDefinedVariable <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;Also Defined in ImplementingClass&quot;</span><span style="color: #339933;">,</span>
	anotherTestFunction <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'This function is defined in ImplementingClass'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>Note that we&#8217;re redefining testFunction and definedVariable in the implementing class as well as adding a new function and variable. Be aware that if you try to define a function or a variable that&#8217;s already declared in the base class <strong>using implements, the definition in the base class will supersede the definition in the implementing class</strong>. Check out the demo to see what I mean</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> demo_three <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

	<span style="color: #006600; font-style: italic;">//Build an instance of ImplementingClass</span>
	<span style="color: #003366; font-weight: bold;">var</span> test_class <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> ImplementingClass<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'this is the input value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//(defined in BaseClass)</span>

	test_class.<span style="color: #006600;">testFunction</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//Display definedVariable (defined in BaseClass)</span>
	<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'test_class.testVariable : '</span> <span style="color: #339933;">+</span> test_class.<span style="color: #006600;">definedVariable</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
	<span style="color: #006600; font-style: italic;">// (defined in ImplementingClass)</span>
	test_class.<span style="color: #006600;">anotherTestFunction</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//Display anotherDefinedVariable (defined in ImplementingClass)</span>
	<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'test_class.anotherDefinedVariable : '</span> <span style="color: #339933;">+</span> test_class.<span style="color: #006600;">anotherDefinedVariable</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span></pre></div></div>

<p><button id="demo_three_button">demo_three()</button></p>
<h3>Extends</h3>
<p>For situations where you want to overwrite what is defined in the base class you can use Extends. Simply replace the Implements with Extends.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> ExtendingClass <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> <span style="color: #003366; font-weight: bold;">Class</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>

	<span style="color: #006600; font-style: italic;">//Note the use of Extends instead of Implements</span>
	<span style="color: #003366; font-weight: bold;">Extends</span> <span style="color: #339933;">:</span> BaseClass<span style="color: #339933;">,</span>
	<span style="color: #006600; font-style: italic;">//Both of these are defined in BaseClass,</span>
	<span style="color: #006600; font-style: italic;">//but since we're using extend instead of</span>

	<span style="color: #006600; font-style: italic;">//implement, these override the ones defined</span>
	<span style="color: #006600; font-style: italic;">//in BaseClass</span>
	definedVariable <span style="color: #339933;">:</span> <span style="color: #3366CC;">&quot;Defined in ImplementingClass&quot;</span><span style="color: #339933;">,</span>
	testFunction <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'This function is also defined in BaseClass'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> demo_four <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

	<span style="color: #006600; font-style: italic;">//Build an instance of ImplementingClass</span>
	<span style="color: #003366; font-weight: bold;">var</span> test_class <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> ExtendingClass<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'this is the input value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//Call testFunction() (defined in BaseClass and ExtendingClass)</span>

	test_class.<span style="color: #006600;">testFunction</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//Display definedVariable (defined in BaseClass and ExtendingClass)</span>
	<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'test_class.definedVariable : '</span> <span style="color: #339933;">+</span> test_class.<span style="color: #006600;">definedVariable</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span></pre></div></div>

<p><button id="demo_four_button">demo_four()</button></p>
<p>Another useful feature when using extends is the ability to overwrite the initialization function defined in the base class while still running the initialization function. So if you define this initialization function in a base class&#8230;</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">initialize <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'base class'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span></pre></div></div>

<p>&#8230;and then define this initialization function in the extending class, you&#8217;ll get two alerts saying &#8220;base class&#8221; and &#8220;extending class.&#8221;</p>

<div class="wp_syntax"><div class="code"><pre class="javascript">initialize <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//Call parent constructor</span>

	<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">parent</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'extending class'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span></pre></div></div>

<p>If the parent initialization function is expecting input, make sure to require the same input and pass it on to the parent constructor. In the example below, note that we&#8217;re not assigning the input value to anything here&mdash;simply passing it on to the parent constructor which takes care of it for us.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> ExtendingClass <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> <span style="color: #003366; font-weight: bold;">Class</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//Once again, we're extending, not implementing</span>
	<span style="color: #003366; font-weight: bold;">Extends</span> <span style="color: #339933;">:</span> BaseClass<span style="color: #339933;">,</span>

	initialize<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>input<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #006600; font-style: italic;">//Calling this.parent runs the initialization</span>
		<span style="color: #006600; font-style: italic;">//function defined in the baseclass</span>
		<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">parent</span><span style="color: #009900;">&#40;</span>input<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

		<span style="color: #006600; font-style: italic;">//Doing so allows us to do additional</span>
		<span style="color: #006600; font-style: italic;">//setup tasks during initialization without</span>
		<span style="color: #006600; font-style: italic;">//rewriting the initalization code from the</span>
		<span style="color: #006600; font-style: italic;">//base class</span>
		<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">otherVariable</span> <span style="color: #339933;">=</span> <span style="color: #3366CC;">&quot;Original Input Was : &quot;</span> <span style="color: #339933;">+</span> input<span style="color: #339933;">;</span>

	<span style="color: #009900;">&#125;</span>
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #003366; font-weight: bold;">var</span> demo_five <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//Build our class</span>
	<span style="color: #003366; font-weight: bold;">var</span> test_class <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> ExtendingClass<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'this is the input value'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>	

&nbsp;
	<span style="color: #006600; font-style: italic;">//run testFunction</span>
	test_class.<span style="color: #006600;">testFunction</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//display otherVariable</span>
	<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">&quot;test_class.otherVariable : &quot;</span> <span style="color: #339933;">+</span> test_class.<span style="color: #006600;">otherVariable</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span></pre></div></div>

<p><button id="demo_five_button">demo_five()</button></p>
<h3>.implement()</h3>
<p>Not only can you use implement and extends within your class definitions, you can also use them on preexisting classes to add functionality one piece at a time. For this example we&#8217;re going to be using a simple calculator class which can add and subtract two numbers that you define when creating the class.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> Calculator <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> <span style="color: #003366; font-weight: bold;">Class</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>

	<span style="color: #006600; font-style: italic;">//Set two variables during initialization</span>
	initialize<span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span>first_number<span style="color: #339933;">,</span> second_number<span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">first</span>  <span style="color: #339933;">=</span> first_number<span style="color: #339933;">;</span>

		<span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">second</span> <span style="color: #339933;">=</span> second_number<span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
	<span style="color: #006600; font-style: italic;">//Function to add the two internal</span>
	<span style="color: #006600; font-style: italic;">//variables and return the result</span>

	add <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
		result <span style="color: #339933;">=</span> <span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">first</span> <span style="color: #339933;">+</span> <span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">second</span><span style="color: #339933;">;</span>

		<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span>result<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #339933;">,</span>
	<span style="color: #006600; font-style: italic;">//Function to subtract the two internal</span>
	<span style="color: #006600; font-style: italic;">//variables and return the result</span>
	subtract <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

		result <span style="color: #339933;">=</span> <span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">first</span> <span style="color: #339933;">-</span> <span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">second</span><span style="color: #339933;">;</span>
		<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span>result<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

	<span style="color: #009900;">&#125;</span>
&nbsp;
<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span></pre></div></div>

<p>While that&#8217;s all well and good if you&#8217;re just looking to add or subtract numbers, what if you want to multiply them? Using .implement(), we can just add a function on to the class and use it as if we had created another class that implemented Calculator as a base.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> demo_six <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

	<span style="color: #006600; font-style: italic;">//implement a new function</span>
	<span style="color: #006600; font-style: italic;">//in the calculator class</span>
	Calculator.<span style="color: #006600;">implement</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
		<span style="color: #006600; font-style: italic;">//Function to multiply the two internal</span>
		<span style="color: #006600; font-style: italic;">//variables and return the result</span>
		multiply <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

			result <span style="color: #339933;">=</span> <span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">first</span> <span style="color: #339933;">*</span> <span style="color: #000066; font-weight: bold;">this</span>.<span style="color: #006600;">second</span><span style="color: #339933;">;</span>
			<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span>result<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

		<span style="color: #009900;">&#125;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>	
&nbsp;
	<span style="color: #006600; font-style: italic;">//Build a calculator class</span>
	<span style="color: #003366; font-weight: bold;">var</span> myCalculator <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Calculator<span style="color: #009900;">&#40;</span><span style="color: #CC0000;">100</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">50</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
	<span style="color: #006600; font-style: italic;">//Call the multiply function</span>
	myCalculator.<span style="color: #006600;">multiply</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span></pre></div></div>

<p><button id="demo_six_button">demo_six()</button></p>
<p>In part I of Classes, we used the print_r function for <a href="http://web.archive.org/web/20090301052058/http://kevin.vanzonneveld.net/techblog/article/javascript_equivalent_for_phps_print_r/">javascript debugging</a>. Using implement, we can make it incredibly painless to print out the contents of the variable class simply by implementing a function in the Calculator class.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> demo_seven <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	<span style="color: #006600; font-style: italic;">//Implement a function to print out</span>
	<span style="color: #006600; font-style: italic;">//the contents of the Calculator class</span>
	Calculator.<span style="color: #006600;">implement</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>

		show_class <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
			<span style="color: #000066;">alert</span><span style="color: #009900;">&#40;</span>print_r<span style="color: #009900;">&#40;</span><span style="color: #000066; font-weight: bold;">this</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">true</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">&#125;</span>

	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #006600; font-style: italic;">//Build a calculator</span>
	<span style="color: #003366; font-weight: bold;">var</span> myCalculator <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">new</span> Calculator<span style="color: #009900;">&#40;</span><span style="color: #CC0000;">100</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">50</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

&nbsp;
	<span style="color: #006600; font-style: italic;">//Show the class details</span>
	myCalculator.<span style="color: #006600;">show_class</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
<span style="color: #009900;">&#125;</span></pre></div></div>

<p><button id="demo_seven_button">demo_seven()</button></p>
<h3>Example</h3>
<p>While neat, this isn&#8217;t a particularly useful feature for the calculator class due to its relatively straightforward nature. However, since most of the Mootools objects are built as classes, we can use the same methodology on them to get something a little more useful. The example below implements a function which throws out a pop-up window containing the structure of whatever HTML element you&#8217;d like to examine. This functionality is now automatically added to any HTML element you interact with, so all you have to do is add a showStructure() command to your element to get a full description of what that element is holding.</p>

<div class="wp_syntax"><div class="code"><pre class="javascript"><span style="color: #003366; font-weight: bold;">var</span> demo_eight <span style="color: #339933;">=</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>
	Element.<span style="color: #006600;">implement</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#123;</span>
		showStructure <span style="color: #339933;">:</span> <span style="color: #003366; font-weight: bold;">function</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #009900;">&#123;</span>

			<span style="color: #006600; font-style: italic;">//the &amp;lt; and &amp;gt; have been removed from the pre tags</span>
			<span style="color: #006600; font-style: italic;">//because they're interpreted by the browser, and</span>
			<span style="color: #006600; font-style: italic;">//wordpress isn't taking nicely to character codes</span>
			<span style="color: #006600; font-style: italic;">//embedded in pre blocks</span>
			<span style="color: #003366; font-weight: bold;">var</span> structure <span style="color: #339933;">=</span> <span style="color: #3366CC;">'pre'</span> <span style="color: #339933;">+</span> print_r<span style="color: #009900;">&#40;</span><span style="color: #000066; font-weight: bold;">this</span><span style="color: #339933;">,</span> <span style="color: #003366; font-weight: bold;">true</span><span style="color: #009900;">&#41;</span> <span style="color: #339933;">+</span> <span style="color: #3366CC;">'/pre'</span><span style="color: #339933;">;</span>

			<span style="color: #006600; font-style: italic;">//Open a popup window</span>
			newWindow <span style="color: #339933;">=</span> window.<span style="color: #000066;">open</span><span style="color: #009900;">&#40;</span><span style="color: #3366CC;">''</span><span style="color: #339933;">,</span><span style="color: #3366CC;">'Element Debug'</span><span style="color: #339933;">,</span><span style="color: #3366CC;">'height=600,width=600,scrollbars=yes'</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
			<span style="color: #006600; font-style: italic;">//Write the structure into the popup window</span>

			newWindow.<span style="color: #006600;">document</span>.<span style="color: #000066; font-weight: bold;">write</span><span style="color: #009900;">&#40;</span>structure<span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">&#125;</span>
	<span style="color: #009900;">&#125;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>
&nbsp;
	$<span style="color: #009900;">&#40;</span><span style="color: #3366CC;">'demo_eight'</span><span style="color: #009900;">&#41;</span>.<span style="color: #006600;">showStructure</span><span style="color: #009900;">&#40;</span><span style="color: #009900;">&#41;</span><span style="color: #339933;">;</span>

<span style="color: #009900;">&#125;</span></pre></div></div>

<p><strong>Note</strong>: you&#8217;ll need to disable popup blockers for this to work.</p>
<p><button id="demo_eight_button">demo_eight()</button></p>
<h3>To Learn More</h3>
<h4><a href="http://web.archive.org/web/20090301052058/http://www.consideropen.com/downloads/30days_of_moo/mootorial_day21_classes_2.zip">Download a zip containing everything you need to get started.</a></h4>
<p><a href="http://web.archive.org/web/20090301052058/http://mootools.net/docs/Class/Class">Mootools Class Docs</a><br />
An <a href="http://web.archive.org/web/20090301052058/http://www.mootorial.com/wiki/mootorial/02-class">excellent discussion</a> of some of the finer points of classes in Mootools.</p>

<h4>Tomorrow&#8217;s tutorial</h4>
<p><a href="http://web.archive.org/web/20090301052058/http://www.consideropen.com/blog/2008/12/30-days-of-mootools-12-tutorials-day-22-fxelements/">Morph multiple elements with Fx.Morph</a></p>
<h3>Questions, Comments, Suggestions</h3>
<p>As always, please let us know if you&#8217;ve got any questions on this tutorial, suggestions on how to improve it, or ideas for future tutorials.</p>
					