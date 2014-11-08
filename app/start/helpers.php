<?php

/*
 |------------------------------------------------
 | 
 |------------------------------------------------
 */
if(!function_exists('page_prop'))
{
	function page_prop(array $page_prop = array())
	{
		return implode(' ', array_map(function($prop, $value){return $prop.'="'.$value.'"';},array_keys($page_prop), $page_prop));
	}
}