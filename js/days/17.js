/* 
Working examples for Day 17
*/

window.addEvent('domready', function() {
	//Example 1
	var toggles = $$('.togglersA');
	var content = $$('.elementsA');
	var AccordionObject = new Fx.Accordion(toggles, content);
	
	//Example2
	//send the toggle and content arrays to vars
	var toggles = $$('.togglers');
	var content = $$('.elements');

	var AccordionObject = new Fx.Accordion(toggles, content, {
		show: 0, 
		height : true,
		width : false,
		opacity: true,
		fixedHeight: false, 
		fixedWidth: false,
		alwaysHide: true,
		onComplete: function(one, two, three, four, five){
			one.highlight('#5D80C8'); //blue
			two.highlight('#5D80C8');
			three.highlight('#5D80C8');
			four.highlight('#5D80C8'); 
			five.highlight('#5D80C8'); //the added section
			$('complete').highlight('#5D80C8');
		},
		onActive: function(toggler, element) {
			toggler.highlight('#76C83D'); //green
			element.highlight('#76C83D');
			$('active').highlight('#76C83D');
		},
		onBackground: function(toggler, element) {
			toggler.highlight('#DC4F4D'); //red
			element.highlight('#DC4F4D');	
			$('background').highlight('#DC4F4D');	
		}
	});

	$('add_section').addEvent('click', function(){
		AccordionObject.addSection('togglersID', 'elementsID', 0);    
	});

	$('display_section').addEvent('click', function(){
		AccordionObject.display(4);  
	});
});