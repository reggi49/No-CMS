<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<style type="text/css">
	#message::empty{
        display:none;
    }
</style>
<h4>Installation Failed</h4>
<div id="message" class="alert alert-error"><?php
		echo 'Cannot upgrade "<em>'.$module_name.'</em>" on "'.$module_path.'" ';
	    echo anchor('main/module_management','Back');
	    echo br();
	    echo $message;
	?></div>
