/* 
Working examples for Day 15
*/

window.addEvent('domready', function() {
	var SliderObject = new Slider('slider', 'knob', {
		//options
		range: [0, 10],
		snap: false,
		steps: 10,
		offset: 0,
		wheel: true,
		mode: 'horizontal',
		//callback events
		onChange: function(step){
			$('change').highlight('#F3F825');
			$('steps_number').set('html', step);
		},
		onTick: function(pos){
			$('tick').highlight('#F3F825');
			$('knob_pos').set('html', pos);
			//this line is very necessary (left with horizontal)
			this.knob.setStyle('left', pos);
		},
		onComplete: function(step){
			$('complete').highlight('#F3F825')
			$('steps_complete_number').set('html', step);
			this.set(step);
		}
	});

	var SliderObjectV = new Slider('sliderv', 'knobv', {
		range: [-10, 0],
		snap: true,
		steps: 10,
		offset: 0,
		wheel: true,
		mode: 'vertical',
		onTick: function(pos){
			//this line is very necessary (top with vertical)
			this.knob.setStyle('top', pos);
		},
		onChange: function(step){
			$('stepsV_number').set('html', step*-1);
		}
	});

	//sets the vertical one to start at 0
	//without this it would start at the top
	SliderObjectV.set(0);

	//sets the slider to step 7
	$('set_knob').addEvent('click', function(){ SliderObject.set(7)});
});