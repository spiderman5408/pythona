<?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='http://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"http://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
