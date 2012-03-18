/* 
Working examples for Day 18
*/

window.addEvent('domready', function() {
	$('run_demo_1').addEvent('click', run_demo_one);
	$('run_demo_2').addEvent('click', run_demo_2);
	$('run_demo_3').addEvent('click', run_demo_3);
	$('run_demo_4').addEvent('click', run_demo_4);
	$('run_demo_5').addEvent('click', run_demo_5);
	$('run_demo_6').addEvent('click', run_demo_6);
	$('run_demo_7').addEvent('click', demo_7);
	
	

});


/* *****************************
DEMO 1
****************************** */

//Create a new class named class_one
//with two internal variables
var Class_one = new Class({
	variable_one : "I'm First",
	variable_two : "I'm Second"
});

var run_demo_one = function(){
	//instantiate a Class_one class called demo_1
	var demo_1 = new Class_one();
	//Display the variables inside demo_one
	alert( demo_1.variable_one );
	alert( demo_1.variable_two );	
}

/* *****************************
DEMO 2
****************************** */

var Class_two = new Class({
	variable_one : "I'm First",
	variable_two : "I'm Second",
	function_one : function(){
		alert('First Value : ' + this.variable_one);
	},
	function_two : function(){
		alert('Second Value : ' + this.variable_two);
	}
});

var run_demo_2 = function(){
	//Instantiate a version of class_two
	var demo_2 = new Class_two();
	//Call function_one
	demo_2.function_one();
	//Call function_two
	demo_2.function_two();
}

/* *****************************
DEMO 3
****************************** */

var Class_three = new Class({
	//Function run when class is created
	initialize : function(one, two, true_false_option){
		this.variable_one = one;
		this.variable_two = two;
		if (true_false_option){
			this.boolean_option = "True Selected";
		} else {
			this.boolean_option = "False Selected";
		}
	},
	//Method Definitions
	function_one : function(){
		alert('First Value : ' + this.variable_one);
	},
	function_two : function(){
		alert('Second Value : ' + this.variable_two);
	}	
});

var run_demo_3 = function(){
	var demo_3 = new Class_three("First Argument", "Second Argument");
	demo_3.function_one();
	demo_3.function_two();
}

/* *****************************
DEMO 4
****************************** */

var Class_four = new Class({	
	Implements: Options,
	options: {
		option_one : "Default Value For First Option",
		option_two : "Default Value For Second Option",
	},
	initialize: function(options){
		this.setOptions(options);
	},   
	show_options : function(){
		alert(this.options.option_one + "\n" + this.options.option_two);
	},
});

var run_demo_4 = function(){
	var demo_4 = new Class_four({
		option_one : "New Value"
	});
	demo_4.show_options();
}

var run_demo_5 = function(){
	var demo_5 = new Class_four();
	demo_5.show_options();
	demo_5.setOptions({option_two : "New Value"});
	demo_5.show_options();
}

//Create a new class_four class with
//a new option called new_variable
var run_demo_6 = function(){
	var demo_6 = new Class_four({
		new_option : "This is a new option"
	});
	demo_6.show_options();
}

/* *****************************
DEMO 5
****************************** */

var Class_five = new Class({
	//We're using options
	Implements: Options,
	//Set our default options
	options : {
		option_one : "DEFAULT_1",
		option_two : "DEFAULT_2",	
	},
	//Have our initialization function 
	//set the options using setOptions
	initialize : function(options){
		this.setOptions(options);
	},
	//Method to send an alert with a
	//formatted printout of the options array
	show_options : function(){
		alert(print_r(this.options, true));
	},
	//Method to switch the values
	//of the two options using setOptions
	swap_options : function(){
		this.setOptions({
			option_one : this.options.option_two,
			option_two : this.options.option_one
		})
	}
});

function demo_7(){
	var demo_7 = new Class_five();
	demo_7.show_options();
	demo_7.setOptions({option_one : "New Value"});
	demo_7.swap_options();
	demo_7.show_options();
}

/* *****************************
PRINT_R
http://phpjs.org/functions/print_r:493
****************************** */

function print_r (array, return_val) {
    // Prints out or returns information about the specified variable  
    // 
    // version: 1109.2015
    // discuss at: http://phpjs.org/functions/print_r
    // +   original by: Michael White (http://getsprink.com)
    // +   improved by: Ben Bryan
    // +      input by: Brett Zamir (http://brett-zamir.me)
    // +      improved by: Brett Zamir (http://brett-zamir.me)
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // -    depends on: echo
    // *     example 1: print_r(1, true);
    // *     returns 1: 1
    var output = '',
        pad_char = ' ',
        pad_val = 4,
        d = this.window.document,
        getFuncName = function (fn) {
            var name = (/\W*function\s+([\w\$]+)\s*\(/).exec(fn);
            if (!name) {
                return '(Anonymous)';
            }
            return name[1];
        },
        repeat_char = function (len, pad_char) {
            var str = '';
            for (var i = 0; i < len; i++) {
                str += pad_char;
            }
            return str;
        },
        formatArray = function (obj, cur_depth, pad_val, pad_char) {
            if (cur_depth > 0) {
                cur_depth++;
            }
 
            var base_pad = repeat_char(pad_val * cur_depth, pad_char);
            var thick_pad = repeat_char(pad_val * (cur_depth + 1), pad_char);
            var str = '';
 
            if (typeof obj === 'object' && obj !== null && obj.constructor && getFuncName(obj.constructor) !== 'PHPJS_Resource') {
                str += 'Array\n' + base_pad + '(\n';
                for (var key in obj) {
                    if (Object.prototype.toString.call(obj[key]) === '[object Array]') {
                        str += thick_pad + '[' + key + '] => ' + formatArray(obj[key], cur_depth + 1, pad_val, pad_char);
                    }
                    else {
                        str += thick_pad + '[' + key + '] => ' + obj[key] + '\n';
                    }
                }
                str += base_pad + ')\n';
            }
            else if (obj === null || obj === undefined) {
                str = '';
            }
            else { // for our "resource" class
                str = obj.toString();
            }
 
            return str;
        };
 
    output = formatArray(array, 0, pad_val, pad_char);
 
    if (return_val !== true) {
        if (d.body) {
            this.echo(output);
        }
        else {
            try {
                d = XULDocument; // We're in XUL, so appending as plain text won't work; trigger an error out of XUL
                this.echo('<pre xmlns="http://www.w3.org/1999/xhtml" style="white-space:pre;">' + output + '</pre>');
            } catch (e) {
                this.echo(output); // Outputting as plain text may work in some plain XML
            }
        }
        return true;
    }
    return output;
}



