<?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='http://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"http://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');