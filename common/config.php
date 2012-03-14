<?php

echo 'config';

defined("CSS_PATH")  
    or define("CSS_PATH", realpath(dirname(__FILE__) . '/css'));  

echo constant(CSS_PATH);

defined("TEMPLATES_PATH")  
    or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/common'));  

?>