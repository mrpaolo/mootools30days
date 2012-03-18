/* 
Working examples for Day 21
*/

var BaseClass = new Class({
	initialize: function(input){
		this.inputVariable = input;
	},
	testFunction : function(){
		alert('BaseClass.testFunction() : ' + this.inputVariable);
	},
	definedVariable : "Defined in BaseClass"
});

var ImplementingClass = new Class({
	Implements : BaseClass
});

/* DEMO ONE */

var demo_one = function(){
	var test_class = new ImplementingClass();
	test_class.testFunction();
}

/* DEMO TWO */

var demo_two = function(){
	var test_class = new ImplementingClass('this is the input value');
	test_class.testFunction();
	alert('test_class.testVariable : ' + test_class.definedVariable);
}

/* DEMO THREE */

var demo_three = function(){
	var test_class = new ImplementingClass('this is the input value');
	test_class.testFunction();
	alert('test_class.testVariable : ' + test_class.definedVariable);
	test_class.anotherTestFunction();
	alert('test_class.anotherDefinedVariable : ' + test_class.anotherDefinedVariable);
}

/* DEMO FOUR */

var ExtendingClass = new Class({
	Extends : BaseClass,
	definedVariable : "Defined in ImplementingClass",
	testFunction : function(){
		alert('This function is also defined in BaseClass');
	}
});

var demo_four = function(){
	var test_class = new ExtendingClass('this is the input value');
	test_class.testFunction();
	alert('test_class.definedVariable : ' + test_class.definedVariable);
}

/* DEMO FIVE */

var ExtendingClass_2 = new Class({
	Extends : BaseClass,
	initialize: function(input){
		this.parent(input);
		this.otherVariable = "Original Input Was : " + input;
	}
});

var demo_five = function(){
	var test_class = new ExtendingClass_2('this is the input value');	
	test_class.testFunction();
	alert("test_class.otherVariable : " + test_class.otherVariable);
}

/* DEMO SIX */

var Calculator = new Class({
	initialize: function(first_number, second_number){
		this.first  = first_number;
		this.second = second_number;
	},
	add : function(){
		result = this.first + this.second;
		alert(result);
	},
	subtract : function(){
		result = this.first - this.second;
		alert(result);
	}
});

var demo_six = function(){
	Calculator.implement({
		multiply : function(){
			result = this.first * this.second;
			alert(result);
		}
	});	
	var myCalculator = new Calculator(100, 50);
	myCalculator.multiply();
}

/* DEMO SEVEN */

var demo_seven = function(){
	Calculator.implement({
		show_class : function(){
			alert(print_r(this, true));
		}
	});
	var myCalculator = new Calculator(100, 50);
	myCalculator.show_class();
}

/* DEMO EIGHT */

var demo_eight = function(){
	Element.implement({
		showStructure : function(){
			var structure = 'pre' + print_r(this, true) + '/pre';
			newWindow = window.open('','Element Debug', 'height=600,width=600,scrollbars=yes');
			newWindow.document.write(structure);
		}
	});
	$('demo_eight').showStructure();
}


window.addEvent('domready', function() {
	$('demo_one_button').addEvent('click', demo_one);
	$('demo_two_button').addEvent('click', demo_two);
	$('demo_three_button').addEvent('click', demo_three);
	$('demo_four_button').addEvent('click', demo_four);
	$('demo_five_button').addEvent('click', demo_five);
	$('demo_six_button').addEvent('click', demo_six);
	$('demo_seven_button').addEvent('click', demo_seven);
	$('demo_eight_button').addEvent('click', demo_eight);
	
});


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

