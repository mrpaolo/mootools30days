/* 
Working examples for Day 10
*/

var tweenerFunction  = function() {
	$('tweener').tween('width', '300px');
}
 
var tweenerGoBack  = function() {
	$('tweener').tween('width', '100px');
}
 
//.fade will also accept 'out' and 'in', equaling 0 and 1 respectively
var tweenFadeOut = function() {
	$('tweener').fade('out');
}
 
var tweenFadeFifty = function() {
	$('tweener').fade('.5');
}
 
var tweenFadeIn = function() {
	$('tweener').fade('in');
}
 
var tweenHighlight = function(event) {
	event.target.highlight('#eaea16');
}
 
window.addEvent('domready', function() {
	console.log('ready');
	$('tween_button').addEvent('click', tweenerFunction);
	$('tween_reset').addEvent('click', tweenerGoBack);
	$('tween_fade_out').addEvent('click', tweenFadeOut);
	$('tween_fade_fifty').addEvent('click', tweenFadeFifty);
	$('tween_fade_in').addEvent('click', tweenFadeIn);
	$('tweener').addEvent('mouseover',tweenHighlight);
});