/* 
Working examples for Day 23
*/

window.addEvent('domready', function() {

	//EXAMPLE A
	var slideElement = $('slideA');
	var slideVar = new Fx.Slide(slideElement, {
		//Fx.Slide Options
		mode: 'horizontal', //default is 'vertical'
		//wrapper: this.element, //default is this.element
		//Fx Options
		link: 'cancel',
		transition: 'elastic:out',
		duration: 'long', 
		//Fx Events
		onStart: function(){
			$('start').highlight("#EBCC22");
		},
		onCancel: function(){
			$('cancel').highlight("#EBCC22");
		},
		onComplete: function(){
			$('complete').highlight("#EBCC22");
		}
	}).hide().show().hide(); //note, .hide and .show do not fire events 

	$('openA').addEvent('click', function(){
		slideVar.slideIn();
	});

	$('closeA').addEvent('click', function(){
		slideVar.slideOut();
	});

	//EXAMPLE B
	var slideElementB = $('slideB');
	var slideVarB = new Fx.Slide(slideElementB, {
		//Fx.Slide Options
		mode: 'vertical', //default is 'vertical'
		//Fx Options
		//notice how chaining lets you click multiple time 
		//then mouse away and the effects will keep going
		//for every click
		link: 'chain', 
		//Fx Events
		onStart: function(){
			$('start').highlight("#EBCC22");
		},
		onCancel: function(){
			$('cancel').highlight("#EBCC22");
		},
		onComplete: function(){
			$('complete').highlight("#EBCC22");
		}
	});

	$('openB').addEvent('click', function(){
		slideVarB.slideIn();
	});

	$('closeB').addEvent('click', function(){
		slideVarB.slideOut();
	});

	//EXAMPLE C
	var slideElementC = $('slideC');
	var slideVarC = new Fx.Slide(slideElementC, {
		//Fx.Slide Options
		mode: 'vertical', //default is 'vertical'
		//wrapper: this.element, //default is this.element
		//Fx Options
		//link: 'cancel',
		transition: 'sine:in',
		duration: 300, 
		//Fx Events
		onStart: function(){
			$('start').highlight("#EBCC22");
		},
		onCancel: function(){
			$('cancel').highlight("#EBCC22");
		},
		onComplete: function(){
			$('complete').highlight("#EBCC22");
		}
	}).hide();

	$('openC').addEvent('click', function(){
		slideVarC.toggle();
	});

	$('slideD').slide('hide');

	$('openD').addEvent('click', function(){
		$('slideD').slide('toggle');
	});
	
	//EXAMPLE C
	var slideElementE = $('slideE');
	var slideWrap = $('slide_wrap');
	var slideVarE = new Fx.Slide(slideElementE, {
		//Fx.Slide Options
		//mode: 'vertical', //default is 'vertical'
		wrapper: slideWrap //default is this.element
	}).hide(); 

	$('openE').addEvent('click', function(){
		slideVarE.toggle();
	});
});