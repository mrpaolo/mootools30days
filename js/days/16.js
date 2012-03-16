/* 
Working examples for Day 16
*/

window.addEvent('load', function() {

	var sortableListsArray = $$('#numberlist, #letterlist');
	var sortableLists = new Sortables(sortableListsArray, {
		//creates a clone to follow my cursor when i drag
		clone: true,
		//defines the class of the drag handle
		handle: '.handle',
		//will let you create an effect for the
		//item returning to list after drag
		revert: {
			//accepts Fx options
			duration: 50
		},
		//determines opacity of list element, not drag clone
		opacity: .5,
		onStart: function(el){
			//passes element you are dragging
			$('start_ind').highlight('#F3F865');
			el.highlight('#F3F865');
		},
		onSort: function(el) {
			//passes element you are dragging
			$('sort_ind').highlight('#F3F865');
		},
		onComplete: function(el) {
			//passes element you are dragging
			$('complete_ind').highlight('#F3F865');

			var listOne = sortableLists.serialize(0);
			var listTwo = sortableLists.serialize(1);

			$('numberOrder').set('text', listOne).highlight('#F3F865');
			$('letterOrder').set('text', listTwo).highlight('#F3F865');
		}
	}).detach(); //disables the handles, so you must push the button to get them going
	
	var addListoSort = $('addListTest');
	
	$('addListButton').addEvent('click', function(){
		sortableLists.addLists(addListoSort);
	});

	$('removeListButton').addEvent('click', function(){
		sortableLists.removeLists(addListoSort);
	});

	$('enable_handles').addEvent('click', function(){
		sortableLists.attach();
	});

	$('disable_handles').addEvent('click', function(){
		sortableLists.detach();
	});

	var itemOne = $('one');

	$('add_item').addEvent('click', function(){
		sortableLists.addItems(itemOne);
	});

	$('remove_item').addEvent('click', function(){
		sortableLists.removeItems(itemOne);
	});
});