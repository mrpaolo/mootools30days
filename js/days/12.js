/* 
Working examples for Day 12
*/

window.addEvent('domready', function() {
	var dragElement = $('drag_me');
	var dragContainer = $('drag_cont');
	var dragHandle = $('drag_me_handle');
	var dropElement = $$('.draggable');
	
	var startEl = $('start');
	var completeEl = $('complete');
	var dragIndicatorEl = $('drag_ind');
	var enterDrop = $('enter');
	var leaveDrop = $('leave');
	var dropDrop = $('drop_in_droppable'); 

	var myDrag = new Drag.Move(dragElement, {
		// Drag.Move options
		droppables: dropElement,
		container: dragContainer,
		// Drag options
		handle: dragHandle,
		// Drag.Move Events
		onDrop: function(el, dr) {
			if (!dr) { }
			else {
				dropDrop.highlight('#FB911C'); //flashes orange
				el.highlight('#fff'); //flashes white
				dr.highlight('#667C4A'); //flashes green
			};
		},
		onLeave: function(el, dr) {
			leaveDrop.highlight('#FB911C'); //flashes orange
		},
		onEnter: function(el, dr) {
			enterDrop.highlight('#FB911C'); //flashes orange
		},
		// Drag Events
		onStart: function(el) {
			startEl.highlight('#FB911C'); //flashes orange
		},
		onDrag: function(el) {
			dragIndicatorEl.highlight('#FB911C'); //flashes orange
		},
		onComplete: function(el) {
			completeEl.highlight('#FB911C'); //flashes orange
		}
	});
});