<?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='http://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"http://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
