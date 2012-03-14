/* 
Working examples for Day 05
*/

var keyStrokeEvent = function(event){
    if (event.key == 'k') { 
	    alert("This Mootorial was brought to you by the letter 'k.'")  
    };
}

var mouseLeaveFunction = function(){
    alert('this element now recognizes the mouse leave event');
}

var mouseEnterFunction = function(){
    alert('this element now recognizes the mouse enter event');
}

var clickFunction = function(){
    alert('this element now recognizes the click event');
}

window.addEvent('domready', function() {
    $('click').addEvent('click', clickFunction);
    $('enter').addEvent('mouseenter', mouseEnterFunction);
    $('leave').addEvent('mouseleave', mouseLeaveFunction);
    $('keyevent').addEvent('keydown', keyStrokeEvent);
});