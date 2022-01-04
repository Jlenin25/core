<?php

include_once 'config/config.php';

$url = !empty($_GET['url']) ? $_GET['url']:null;
$arrUrl = explode('/',$url);
$controller = $arrUrl[0];
$method = $arrUrl[0];
$params = '';
if(!empty($arrUrl[1])) {
    if($arrUrl[1]!='') {
        $method = $arrUrl[1];
    }
}
if(!empty($arrUrl[2])) {
    if($arrUrl[2]!='') {
        for($i=2;$i<count($arrUrl);$i++) {
            $params .= $arrUrl[$i].',';
        }
        $params = trim($params,',');
    }
}
spl_autoload_register(function($class) {
    if(file_exists('libs/'.$class.'.php')) {
        require_once('libs/'.$class.'.php');
    }
});

include_once 'libs/Load.php';