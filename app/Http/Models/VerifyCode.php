<?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='http://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"http://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');