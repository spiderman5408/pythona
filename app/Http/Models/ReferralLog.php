<?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='http://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"http://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
