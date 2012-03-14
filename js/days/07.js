/* 
Working examples for Day 07
*/

var seeBgColor = function(bgColor) { 
	alert(bgColor);
}
 
var seeBorderColor = function(borderColor) {
	alert(borderColor);
}
 
var seeDivWidth = function(playDiv) {
	var currentDivWidth = playDiv.getStyle('width');
	alert(currentDivWidth);
}
 
var seeDivHeight = function(playDiv) {
	var currentDivHeight = playDiv.getStyle('height');
	alert(currentDivHeight);
}
 
var setDivWidth = function(playDiv) {
	playDiv.setStyle('width', '50px'); 
}
 
var setDivHeight = function(playDiv) {
	playDiv.setStyle('height', '50px');
}
 
var resetSIze = function(foo) {
	foo.setStyles({
		'height': 200,
		'width': 200
	});
}
 
window.addEvent('domready', function() {
	var playDiv = $('playstyles');
	var bodyStyles = playDiv.getStyles('background-color', 'border-bottom-color'); 
	var bgColor = bodyStyles['background-color']; 
	
	$('bgcolor').addEvent('click', function(){
		seeBgColor(bgColor);
	});
	$('border_color').addEvent('click', function(){
		seeBorderColor(bodyStyles['border-bottom-color']);
	});
	$('div_width').addEvent('click', function(){
		seeDivWidth(playDiv);
	});
	$('div_height').addEvent('click', function(){
		seeDivHeight(playDiv);
	});
	$('set_width').addEvent('click', function(){
		setDivWidth(playDiv);
	});
	$('set_height').addEvent('click', function(){
		setDivHeight(playDiv);
	}); 
	$('reset').addEvent('click', function(){
		resetSIze(playDiv);
	});
});