/* 
Working examples for Day 06
*/

var newDiv = function() {
	var bodyWrapVar = $('newElementContainer');
	var idValue = $('id_input').get('value');
	var textValue = $('text_input').get('value');
	var newElementVar = new Element('div', {
    	        'id': idValue,
    	        'text': textValue
	});
	newElementVar.inject(bodyWrapVar, 'top');
};
 
var removeDiv = function() {
	$('newElementContainer').erase('html');
}
 
window.addEvent('domready', function() {
   $('new_div').addEvent('click', newDiv);
   $('remove_div').addEvent('click', removeDiv);
});