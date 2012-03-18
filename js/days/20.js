/* 
Working examples for Day 20
*/

//here are our functions to change the styles
var showFunction = function() {
	this.setStyle('display', 'block');
}

var hideFunction = function() {
	this.setStyle('display', 'none');
}

window.addEvent('domready', function() {
	//here we turn our content elements into vars
	var elOne = $('contentone');
	var elTwo = $('contenttwo');
	var elThree = $('contentthree');
	var elFour = $('contentfour');
	//add the events to the tabs
	$('one').addEvents({
		//set up the events types
		//and bind the function with the variable to pass
		'mouseenter': showFunction.bind(elOne),
		'mouseleave': hideFunction.bind(elOne)
	});
	$('two').addEvents({
		'mouseenter': showFunction.bind(elTwo),
		'mouseleave': hideFunction.bind(elTwo)
	});
	$('three').addEvents({
		'mouseenter': showFunction.bind(elThree),
		'mouseleave': hideFunction.bind(elThree)
	});
	$('four').addEvents({
		'mouseenter': showFunction.bind(elFour),
		'mouseleave': hideFunction.bind(elFour)
	});
});

/* ************************************************* */

var showFunction_2 = function() {
	$$('.hiddenB').setStyle('display', 'none'); 
	this.setStyle('display', 'block');
}

window.addEvent('domready', function() {
	var elOneB = $('contentoneB');
	var elTwoB = $('contenttwoB');
	var elThreeB = $('contentthreeB');
	var elFourB = $('contentfourB');
 
	$('oneB').addEvent('click', showFunction_2.bind(elOneB));
	$('twoB').addEvent('click', showFunction_2.bind(elTwoB));
	$('threeB').addEvent('click', showFunction_2.bind(elThreeB));
	$('fourB').addEvent('click', showFunction_2.bind(elFourB));
});

/* ************************************************* */

var showFunction_3 = function() {
	//resets all the styles before it morphs the current one
	$$('.hiddenM').setStyles({
		'display': 'none',
		'opacity': 0,
		'background-color': '#fff',
		'font-size': '16px'
	}); 
	//here we start the morph and set the styles to morph to
	this.start({
		'display': 'block',
		'opacity': 1,
		'background-color': '#d3715c',
		'font-size': '31px'
	});
}

window.addEvent('domready', function() {
	var elOneM = $('contentoneM');
	var elTwoM = $('contenttwoM');
	var elThreeM = $('contentthreeM');
	var elFourM = $('contentfourM');
	//creat morph object
	elOneM = new Fx.Morph(elOneM, {
		link: 'cancel'
	});
	elTwoM = new Fx.Morph(elTwoM, {
		link: 'cancel'
	});
	elThreeM = new Fx.Morph(elThreeM, {
		link: 'cancel'
	});
	elFourM = new Fx.Morph(elFourM, {
		link: 'cancel'
	});
	$('oneM').addEvent('click', showFunction_3.bind(elOneM));
	$('twoM').addEvent('click', showFunction_3.bind(elTwoM));
	$('threeM').addEvent('click', showFunction_3.bind(elThreeM));
	$('fourM').addEvent('click', showFunction_3.bind(elFourM));
});


/* ************************************************* */

//create a "hide all" function
//create a parameter so you can pass the element
var hideAll = function(fxElementObject){
	fxElementObject.set({
		'0': { 'display': 'none' },
		'1': { 'display': 'none' },
		'2': { 'display': 'none' },
		'3': { 'display': 'none' }
	});
}

//here we create a function for each content element
var showFunctionOne = function() {
	hideAll(this);
	this.start({
		'0': {
			'display': ['none', 'block'],
			'background-color': ['#fff', '#999'],
			'font-size': ['16px', '25px']
		}
	});
}

var showFunctionTwo = function() {
	hideAll(this);
	this.start({
		'1': {
			'display': ['none', 'block'],
			'background-color': ['#fff', '#999'],
			'font-size': ['16px', '25px']
		}
	});
}

var showFunctionThree = function() {
	hideAll(this);
	this.start({
		'2': {
			'display': ['none', 'block'],
			'background-color': ['#fff', '#999'],
			'font-size': ['16px', '25px']
		}
	});
}

var showFunctionFour = function() {
	hideAll(this);
	this.start({
		'3': {
			'display': ['none', 'block'],
			'background-color': ['#fff', '#999'],
			'font-size': ['16px', '25px']
		}
	});
}

window.addEvent('domready', function() {
	//create your array to pass to Fx.elements
	var morphElements = $$('.hiddenMel');
	//create a new Fx.Element object
	var elementEffects = new Fx.Elements(morphElements, {
		//set the "link" option to cancel
		link: 'cancel'
	}); 
	$('oneMel').addEvent('click', showFunctionOne.bind(elementEffects));
	$('twoMel').addEvent('click', showFunctionTwo.bind(elementEffects));
	$('threeMel').addEvent('click', showFunctionThree.bind(elementEffects)); 
	$('fourMel').addEvent('click', showFunctionFour.bind(elementEffects)); 
});


