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

/*
 |------------------------------------------------
 |
 |------------------------------------------------
 */
if (!function_exists('process_parent_nav')) {
	function process_parent_nav(array $nav_item)
	{
		$nav_htm = '';
		
		$url = isset($nav_item["url"]) ? $nav_item["url"] : "#";
		$url_target = isset($nav_item["url_target"]) ? 'target="'.$nav_item["url_target"].'"' : "";
		$icon_badge = isset($nav_item["icon_badge"]) ? '<em>'.$nav_item["icon_badge"].'</em>' : '';
		$icon = isset($nav_item["icon"]) ? '<i class="fa fa-lg fa-fw '.$nav_item["icon"].'">'.$icon_badge.'</i>' : "";
		$nav_title = isset($nav_item["title"]) ? $nav_item["title"] : "(No Name)";
		$label_htm = isset($nav_item["label_htm"]) ? $nav_item["label_htm"] : "";
		$nav_htm .= '<a href="'.$url.'" '.$url_target.' title="'.$nav_title.'">'.$icon.' <span class="menu-item-parent">'.$nav_title.'</span>'.$label_htm.'</a>';

		if (isset($nav_item["sub"]) && $nav_item["sub"])
			$nav_htm .= process_sub_nav($nav_item["sub"]);

		return '<li '.(isset($nav_item["active"]) ? 'class = "active"' : '').'>'.$nav_htm.'</li>';
	}
}

/*
 |------------------------------------------------
 |
 |------------------------------------------------
 */
if(!function_exists('process_sub_nav'))
{
	function process_sub_nav($nav_item) {
		$sub_item_htm = "";
		if (isset($nav_item["sub"]) && $nav_item["sub"]) {
			$sub_nav_item = $nav_item["sub"];
			$sub_item_htm = process_sub_nav($sub_nav_item);
		} else {
			$sub_item_htm .= '<ul>';
			foreach ($nav_item as $key => $sub_item) {
				$url = isset($sub_item["url"]) ? $sub_item["url"] : "#";
				$url_target = isset($sub_item["url_target"]) ? 'target="'.$sub_item["url_target"].'"' : "";
				$icon = isset($sub_item["icon"]) ? '<i class="fa fa-lg fa-fw '.$sub_item["icon"].'"></i>' : "";
				$nav_title = isset($sub_item["title"]) ? $sub_item["title"] : "(No Name)";
				$label_htm = isset($sub_item["label_htm"]) ? $sub_item["label_htm"] : "";
				$sub_item_htm .=
					'<li '.(isset($sub_item["active"]) ? 'class = "active"' : '').'>
						<a href="'.$url.'" '.$url_target.'>'.$icon.' '.$nav_title.$label_htm.'</a>
						'.(isset($sub_item["sub"]) ? process_sub_nav($sub_item["sub"]) : '').'
					</li>';
			}
			$sub_item_htm .= '</ul>';
		}
		return $sub_item_htm;
	}
}

/**
 * set document type
 * @param string $type type of document
 */
function set_content_type($type = 'application/json') {
    header('Content-Type: '.$type);
}

/**
 * Read CSV from URL or File
 * @param  string $filename  Filename
 * @param  string $delimiter Delimiter
 * @return array            [description]
 */
function read_csv($filename, $delimiter = ",") {
    $file_data = array();
    $handle = @fopen($filename, "r") or false;
    if ($handle !== FALSE) {
        while (($data = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
            $file_data[] = $data;
        }
        fclose($handle);
    }
    return $file_data;
}

/**
 * Print Log to the page
 * @param  mixed  $var    Mixed Input
 * @param  boolean $pre    Append <pre> tag
 * @param  boolean $return Return Output
 * @return string/void     Dependent on the $return input
 */
function plog($var, $pre=true, $return=false) {
    $info = print_r($var, true);
    $result = $pre ? "<pre>$info</pre>" : $info;
    if ($return) return $result;
    else echo $result;
}

/**
 * Log to file
 * @param  string $log Log
 * @return void
 */
function elog($log, $fn = "debug.log") {
    $fp = fopen($fn, "a");
    fputs($fp, "[".date("d-m-Y h:i:s")."][Log] $log\r\n");
    fclose($fp); 
}