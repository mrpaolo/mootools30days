/* 
Working examples for Day 22
*/

var startFXElement = function(){
	this.start({
		'0': {
			'height': [50, 200],
			'width': 50,
			'background-color': '#87AEE1'
		},
		'1': {
			'width': [100, 200],
			'border': '5px dashed #333'
		}
	});
}

var startFXElementB = function(){
	this.start({
		'0': {
			'width': 500,
			'background-color': '#333'
		},
		'1': {
			'width': 500,
			'border': '10px solid #DC1E6D'
		}
	});
}

var setFXElement = function(){
	this.set({
		'0': {
			'height': 50,
			'background-color': '#FFFFCC',
			'width': 100
		},
		'1': {
			'height': 50,
			'width': 100,
			'border': 'none'
		}
	});
}

window.addEvent('domready', function() {
	var fxElementsArray = $$('.myElementClass');
	var startInd = $('start_ind');
	var cancelInd = $('cancel_ind');
	var completeInd = $('complete_ind');
	var chainCompleteInd = $('chain_complete_ind');
	var fxElementsObject = new Fx.Elements(fxElementsArray, {
		//Fx Options
		link: 'chain',
		duration: 1000,
		transition: 'sine:in:out',
		//Fx Events
		onStart: function(){
			startInd.highlight('#C3E608');
		},
		onCancel: function(){
			cancelInd.highlight('#C3E608');
		},
		onComplete: function(){
			completeInd.highlight('#C3E608');
		},
		onChainComplete: function(){
			chainCompleteInd.highlight('#C3E608'); 
		}
	});

	$('fxstart').addEvent('click', startFXElement.bind(fxElementsObject));
	$('fxstartB').addEvent('click', startFXElementB.bind(fxElementsObject));
	$('fxset').addEvent('click', setFXElement.bind(fxElementsObject));
	$('fxpause').addEvent('click', function(){
		fxElementsObject.pause();
	});
	$('fxresume').addEvent('click', function(){
		fxElementsObject.resume();
	});
});