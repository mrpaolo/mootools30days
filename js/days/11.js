/* 
Working examples for Day 11
*/


var morphSet = function(){
	this.set({
		'width': 100,
		'height': 100,
		'background-color': '#eeeeee'
	});
}
 
var morphStart = function(){
	this.start({
		'width': 300,
		'height': 300,
		'background-color': '#d3715c'
	});
}
 
var morphReset = function(){
	this.set({
		'width': 0,
		'height': 0,
		'background-color': '#ffffff'
	});
}
 
window.addEvent('domready', function() {
	var morphElement = $('morph_element');
	var morphObject = new Fx.Morph(morphElement);
	$('morph_set').addEvent('click', morphSet.bind(morphObject));  
	$('morph_start').addEvent('click', morphStart.bind(morphObject));
	$('morph_reset').addEvent('click', morphReset.bind(morphObject));
});