<?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='http://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"http://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('A3657BA94756BB4AAAQAAAAXAAAABJAAAACABAAAAAAAAAD/ePyAgGZUN+JvvaHFUXx3e6Sq23bMbTgGpuV8zQJlGeQPt9z0buvQsWG9ypyBVCpixMAXQaWzgtq+9iWkJYObWPUahY5OCvngPlefUQ1KCRFqKxX3W1Hurt3dFiTN5ax6d0l4oSexHXrjieEsiCokehn9Hn9B/VApYsJJzkaRB3M6t8QIFXM09YSn+I9KiSXhRwAAACAGAAByzkd/yNJuN/g/RfAmGPxcSMOchQl0Ua0pDdYoGoD0cX2q1fZ36e/ZcGN3PUh2bULqQIS8VASUpRfhaysUTBchwZow000wAVzH/anScfq8FwiOWJlbeucbZkbR3l8b+wiBtnjRuZG7FgMFGM3BetaSej9/ejNZzxceIrgF/jAk1foqWPIE/8JJdB+8RBht9bDmWduya2dGcbDub1oCKsQw1c0XVtabEyaRKgumTPSl/JoM8ic/yLeAx5SLA3NIUTS09GUv9nU0pM4Iz2RHShJx87uEtXUVHyqAN9pdoJ2U168/OSjo5JtDDpc4F6mPX/6CH2fdsDxbbxnr3hWsZ0Iqs+gDEdQGggJeeSrLHwlsbUNLMLRFAZ8ZD1o29KwfquUD2i6eNGu39xDCaBeoWgGlXECqjDpj37/xPz/zYZXcK1xizE6T/B8wf2nGV8Xzpn66bfR9+O5ZYrMHkDR42VniVr4CYWbpyVf2bqD3si/O7ur9PgD6FjPvmAoB2h5xwMnFyxh30xB+8GXoIx1Dvm6d1DGCPhnJFgjlxjgT81MFeyI+ZCzB1shnFifjGWWlzmYVdq+VB+V/Zn/gGAZQKedtznk8Jve1lqo8XmjdfloSlQjttfg7W38vzeEzuOP66EyxeM2z4s23Y8INHu4OUK6pt7ieGbDuVHi1YPLOqEwsyq4d0W4jrm4niNrsGWKo5K0tK6TBxz//nv4w8pWcymyrfo+iOGx+EJE8Pa6uKD2OslxofF7iOfpM+UW8GGZKlZN5V7XHG0C4YmnRR3nmTYUVi14EWVGfMg0AwB3N6d7R28gIZUaBa3ujHCXgsjgGSbm1NlmKaseazhOtKdWT5xvCmjxl/l9YmGKn/zHCh119x2Y/D8z69J5iR3736/PL+ri7w2LuTQfWL56pvnX5KkX/nwFUO6W9sC3YiGeC8KPGH2EQgfpqCpOaocZOLGc5JZLOxvKm0XjkZZEnp9X0ZFX0hCDDPS6N4cfmBAXuFlIKYJ+5lJGRwpGzdZI6Zmi4UZkiD9+fwFCNajnV52/drwctccyybXH7GMW/fJY5YuhkTYlvs9dn4uCx4nRZjNzTAmg/k9N3RxnEjkvmZJ7cGrPLHrlesyVtU68bJ4iF4Sp8bomZdERVsWDPcF2DCL7ZlRCaSXy3GvcxLAcYyjpBMhSrTL3Tl3TntV1EdhAD/H0gYfK4l966UCF7QpLDrycp3lIbSb5FyUS7Vr4RUDtnjv4+Y8pK6BUjjjcZlzWu2/yDyYTlvGu5ZsW+Y3nLhdFAZK3G8xMtHPA6T9BSl6ssMdMQMwtjrzdQloQSV+ZTpo2A4bh4pFALe12/izMpS5+FK/hv1h47kp/C8uTxFpJ5j1lDx3/998kJn1AVXtwIzY71V6VeTZ7+JqCiXDtlM8EZ8RlSp40lS8KuYz4hGSPzdiwouSgiLLD8qoAKGbGIPuV3dRZkvldnQvFGghdhQ6KJM8i8Lkw7TvMJiR6kWcn9jNFbhIMhW5CZBaoRHfKLshrRrkg8QVOtm6TVQps23qxyW/1CndZlAFM8/4EsqzUwLXKd402xoLYAOkIsMXDWyzvL8ecFyGw7gF5mYFWJibPVofcVRDblpG8DQvo/rylC5413Bia594NgxMdHWq+4WBQ82XRDjUA9OhoYitlbwsP/P2fYmbNtn8EYcNX743lNgeQ5YbnFOya7F62k3kyeq2zQ6xgy6aELTymV/7ecCNOea6svXjijdWi/mo/mXy/ZiNBeroepvjyTIJwEYTHRO1pVXpdXSqrhO3qHG1yk4PepB+w6zBUJX41VPM9LR4X//KaWou+cp34fQ01S1o8pymHZ8YWGNbrnC1661lkW16ukK7I3fqdUpU6mwo6yXMbMNtovaSzapFQLJ45zic3MT1pQLtV9klShxf5xClRX3uIli7msoxl6Ej/mp1ZSDcLQ0d4Onqlq2Xwnyq3r6BedadtBvPSNAE+NMCNaGCY7AsRqLfUNbjpMUvfJrYAP1pl4VZwMwt2mFtOcrZacKuQ+jTvzKSYSbRW8IySe6jG3ZzaRfmYbSRuFhxWV0JdSNSKP0kRI9TMJXm2qUxkX6ZEomnsElEgAAAAYBgAAwj9DTvF9DRs5b9RImf1Iy8XQ41feeA5VWtm3U7ooOQ/dS34I/exd0ttVg4+YuD7MMjE7cPwtZswaZzsOoQDEpuuZnxU0bpU+8O05pm+C5dIM/ls8bDB3ouuIOXiMx+ndSVDRbLBtL7oEZs4tAaME1Ibw1y0l31IsOIEuEJ9HXrBqyDHkmyPXfi242h7ifmRZjbhXX0Q14EX/91nLwyyV7YvkAHQ2vx14d21mKC4bTT+r98a+EePLQo5k1KhjcMP+MsnIZGuE2szxyCQswO7XCH1oSXes7PHyKghnfj0VyMsz5w4cBl5z9kFYLvbSAzsXN76GAYRJ4lPrmVCwSQnYK9+ECO/JKnZH0QQyhkJsqN9nssufUKdeaxsHkclRQF5WGezYANaG9aUfwsPvQwbsy3PQa1a8ZfVYgRT9gDoQj4dbSDNSJj1T+27IxNtpozVqF0nhsQpnJ9NxHFjGC/7ZO7+QyvC6mjX3AIMJCeAbptkk3RerpCLBuxfTrvNWuZVODEctGuOaqxWB/QKJy7z6/xnG1F9U0O5EHK8M1x4CeipaJzddj10lqaHcbUmM00/4XGFcR0EJoKtTkowCjPs4wwUTRhIrZqqd7pR4j+WPt3H2mxIsFwL4rxBCkIoMxaRZ4oYBauZnB7rPerH7QkvLd2utt7H4soZD+8QZ8PiIp7jbxcAddiMyNF8nSYxBHFJ1Mku29/sq/IvGijbFX2DZzV17OOnrZmBw9sLwc16Gmb01S7juN6PuHC5Aidz8Bw4BSCb/dOO1bgMMwyz1PiPeILWQI+wAGmp0sfXGlul0vp/Ahc52XWyRRLp/9n8Q7f7N3yH2+wsxgSUYfa73J1nsgfWbYBfKzWj+d1krRaR8FwjDSKB7qWsVWJ8PNiVzGlIi89gnumjGZjCoEK5aYF2DC8s6IIqMJF0tvvHmgd1pY6BW0HHGZUNb02Fcc2GqkCFNNRdbYr7EuNLp6OSX0hT06sGNmU/J1vOZ8xN8Bjps3v1WYU8CSRibToCdGiCeKLtEaj9v/M3YZPQPx9KyqhqmrfeSogPgkPh/XeiLECMRV4XtUrWdl3CYRwilLagK3pclJLLiLhIaRGkV7oqnPz6W+NCnvA4c+9D8vSTABqFqXGSpd6fv6nfCwObrbZMENQAoHeAw5KLzPuBb7VcODk7YF+WK+8fINZQgbOtzfkZ66ArOw0ab9AQumTVMo+uaAH5W7ktgDk2LRMv+0k2P4PzwR4rY0Tfk5zrb3iCcAQoRhY+3QGRkvzRanCUhErQ4lQ2g8Z4Ly/Cc6H0rRHss46ZkEC2kITnPYmNLzQ+NfS2EBwrVYhln2jC/zsLsSQ0A9sf6NXR5dJlsVpmfN3mn2bSDNV0n1g5bwmduvtb3dbomQugOQjfAvzPJkKBL201USkjJHQgo5uBHukmmU+a2ufmZZWyy6JV9PFI2FCFkjFVeEZH3mozPLeHyXWf+cIGHhxbq8HP4MFNoH3ZRcf8exl369XqNkhC3PHqFvYrYfET2NApzaK1fEeL8yx63uKvWqJWGxFL2w6SSqsBFvGpsURddhsLQeOLsxvp6o+HlzG6JM1iezQWV01JQQPB0ucvRVvEc7ZVXTUxCQkryHUaSNMZ4Sbb+7y055WHC3ekF9U7vp0IjamcPP28SfdhsfSpSxABaAwydSM+us+fYaTmUWXfrLPbOTHCtmF++Q1JeNtAqFqZ2T0/glHpdDU3bTsAhWJ73y25eTSMjnx+3YsnrA/jGaSkEkqXqF61CEHYzsHahneIOm3r7nC5o8W3Cvq174ILKw6/JvnL58n6k2GOAeA9W7Y5d3J+0otsAl7g3tUYovwU911wHGx4bouH1FG0N4b51ycL+LVaE6QFLNjxrXUA6HAe7EtmMHXfwbokcSENUDKLEVBUFplN4w5Qq2GcPKCPYh9CpEbqTY1FQZrN4VfWi+dCa6OWofNt/I/NElqEAkXJ7tdakok6xHVV1/dTdOHlzUOWmKiNWsNMZK6ZZhj7UrqF3QzKHg/fHDD/9mkvPZzbWdQJN6r3B71YqXcNkMEXoVhFcCwdqnNprbs24n3fB4NAHL0xcj5kDSQAAAPAFAADwPXr+/p1qv78RbYvwv/RtxJDPfsSfiYv5UeMKXTQmhfUPfCn2ZonahKyyfTAH5wqgORJL+WLC4WghQc/O+7OjYWsJWemZFAOk3ODoTUyiXDKeAg722PH+gexL+aS4bbf3CQcKj3HotYgGd24ejkSA7rqKOo3EUritclpOVfQ5nqqPK2kxAoPw29ob6axFT1a2sFBGhipvhhkwurSdoPMYg7EW8SqTtkR/MxAfGcdp/DMlyDwIJJGKv0o9a1Se4kWBG7qmjaK9QKWKNc2f0ZGR9iD23KePEk8g7o8SPmc5wf6Z3plCMYbztyGO5y1VhABLKt4+wSogXGdC4vPVEgR+rfYxpaMq5ZgajfMmW5BcNVHyas0vba4ufLKLQvX1cACLhRI2xTeO9HZ/gZw4vAbXASTQJVS7FFeGrIQDtpDIhwiiAHKlFOKpeGSeNmwqS3+YQep890rEBjk8Ah1qZY9ukPisxln7ftjxQIT7iSAX1GPAyC7MGo0RMe/aP8/OjT3g+mVJWLY29NEy0fKEElZVvYx1wT7M+7vuXJ20gUm+kKQQw+QYRGl4QEa+10mNuMrvC0uT8ASyB//IBi47x5horJAYbJi/7CowqaoQxkDdKsQZRb4KCJQJFJwtOPgLTbocqvcf4Lv/wSCa1a7Jtr2mfsOJZcPRmumZtGmz+XNRXL+v9YFPwTbZRPV5BsQagarBXGNZAqUCUfWA9YsNkQ8oTxYoFVm+mpsNGJO4FsYAeSXXqxr6XGuMzWw/W9W/hCAixX1i/wbcRWxrFrp9pg02hIyNwU/oLS57DqPCFvsocZY+/AFXhbkZ5ZFBJvhSpJJymNu9enIyBcm2njgZtRU3TVwWywlb6CX+psSSHjekkFsqBxliHHa65rWJSefPI68Agmc3dMrL6ceEXqHscOZK1ki04BcBdOkYbgaljIuu6Bc4REghPhbzEAk3KO+NQkPFEmlKbGva2rtQRZ3NcqQ/LZ84rA3gdE1l9lvIJYRxZRyF+PplOFhXJq3SOOLeS44l3mOVMAf2vHnTt3nS2XQyl5tb9YSLXbCTNdLTchXQqq4yqKbHVdQZJKDkvb2w5CnUjEKjqHRYY1FyNK/KmDyiBNyvtGXOiudHb071bvPY0lbathLZGrZ9838B68suj8UZWRr/AhEJ40vDzaJeV+vTYQQNJBS5iSJBIrd8ie0LTP6bMxMswzkgB/n3k0InsA3Hbz4bIECXPN8nI1l1f5IogbjUfyaUa4wgaBtSp7KgDdZi2tnICAOf6tWU1SgbW6S1tOi+U6nC5hSghXHC+5lEdoh1Uo8yLerd52nxbibMPrYNEnYHUZB6koVGQcS2vLw5MA43GJsAbzx+Y9WsjZvXCnO87ctSAAbu5AXk4MWtt5OQN4xhoK3cW/svG9wJbCFpMWhzaLD4Aa1ZOhrstK9pBGHFyLAJxV7Ibif5IQ+HxBGxSB78SHGch6RJCPazLz+cRetY2FxGSy3CWaCwU373FYkE3Nv/Jlj2jWPgAORL7vRV9o3B3gc8NZWzNI5YHqKBPLJTcs9FczfI4s/gC2Nlg603YU1iZZMY2Xf1tcst/CsWlluFeevBBkcfTLgudltxGG5mdT9viIblaJKO5n/IgNBxiuaW6721GfYQU6IJyafGpWFaODNBuklJkGoL0sGbTSW5Y04TE5KmCkfeGNGF3/hxT413ej3STR3Y/u9HEGgGwV5F2kcepTzy/oVYU+t1/wRYOYDdxTWyAA57nBXU4PsL7nL3Wg12MDHCfNCzFb11is4L2LB7TFNsy9VbeO7noADxngWHJT+OopRfsYrHAMbgZGHWnakrn2/kAezeYxTFffHib+4zHdmaEWsK3uJwZyVOy9fR9Iy2CHVxtA5MPgxICtt/Xjdp1aqxZ13e9TM7D+aGzfo9eIo5qpb4JNse4bzxdmgXnMLT5he+O0F+0dfAlbUFqIuNa+UlKsjMGjIbduYEPtCdhHlKWDwMDqRn8EX1EdyOFg0Mo0WAKwMZk7flzrW6MbtC3VA4P/+mzwAAAAA=');