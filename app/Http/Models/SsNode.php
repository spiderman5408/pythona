<?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='http://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"http://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
