/* 
Working examples for Day 19
*/

window.addEvent('domready', function() {
	// Tooltip One
	var customTips = $$('.tooltip_demo_one');
	var toolTips = new Tips(customTips);
	// Tooltip Two
	var customTipsB = $$('.tooltipB');
	var toolTipsB = new Tips(customTipsB, {
		className: 'custom_tip'
	});
	
	// Tooltip 3
	var customTips = $$('.tooltip_demo');
	var toolTips = new Tips(customTips, {
		showDelay: 1000,    //default is 100
		hideDelay: 100,   //default is 100
		className: 'anything', //default is null
		offsets: {
			'x': 100,       //default is 16
			'y': 16        //default is 16
		},
		fixed: false,      //default is false
		onShow: function(toolTipElement){
			toolTipElement.fade(.8);
			$('show').highlight('#FFF504');
		},
		onHide: function(toolTipElement){
			toolTipElement.fade(0);
			$('hide').highlight('#FFF504');
		}
	});
	var toolTipsTwo = new Tips('.tooltip2', {
		className: 'something_else', //default is null
	});
	$('tooltipID1').store('tip:text', 'You can replace the href with whatever text you want.');
	$('tooltipID1').store('tip:title', 'Here is a new title.');
	$('tooltipID1').set('rel', 'This will not change the tooltips text');
	$('tooltipID1').set('title', 'This will not change the tooltips title');
	toolTips.detach('#tooltipID2');
	toolTips.detach('#tooltipID4');
	toolTips.attach('#tooltipID4');
	
	
});