<?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='http://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"http://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
