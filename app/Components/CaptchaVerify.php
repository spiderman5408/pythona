<?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='http://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"http://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
