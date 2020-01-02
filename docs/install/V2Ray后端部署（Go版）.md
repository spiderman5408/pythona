## V2Ray Go版 完整配置示例（类型：TCP）

#### 校准节点系统时间
```
cp /usr/share/zoneinfo/Asia/Shanghai /etc/localtime
yum install ntpdate
ntpdate -u time.nist.gov
```

#### 面板里添加一个V2Ray的节点
[![1.png](https://i.loli.net/2019/01/07/5c3343be53678.png)](https://i.loli.net/2019/01/07/5c3343be53678.png)

#### 安装SSRPanel的V2Ray Go版插件
```
curl -L -s https://raw.githubusercontent.com/ColetteContreras/v2ray-ssrpanel-plugin/master/install-release.sh | sudo bash
```

#### 配置V2Ray
`vim /etc/v2ray/config.json` 


（TCP模式）然后将如下配置黏贴进去，修改，然后`删除所有//开头的注释(注意//前有一个空格也要删除)`并保存
```
{
  "log": {
    "loglevel": "debug"
  },
  "api": {
    "tag": "api",
    "services": [
      "HandlerService",
      "LoggerService",
      "StatsService"
    ]
  },
  "stats": {},
  "inbounds": [
    {
      "port": 10086,
      "protocol": "vmess",
      "tag": "proxy"
    },
    {
      "listen": "127.0.0.1",
      "port": 10085,
      "protocol": "dokodemo-door",
      "settings": {
        "address": "127.0.0.1"
      },
      "tag": "api"
    }
  ],
  "outbounds": [
    {
      "protocol": "freedom"
    }
  ],
  "routing": {
    "rules": [
      {
        "type": "field",
        "inboundTag": [
          "api"
        ],
        "outboundTag": "api"
      }
    ],
    "strategy": "rules"
  },
  "policy": {
    "levels": {
      "0": {
        "statsUserUplink": true,
        "statsUserDownlink": true
      }
    },
    "system": {
      "statsInboundUplink": true,
      "statsInboundDownlink": true
    }
  },
  "ssrpanel": {
    "nodeId": 1, //面板里添加完节点后生成的自增ID
    "checkRate": 60,
    "user": {
      "inboundTag": "proxy",
      "level": 0,
      "alterId": 16, //必须跟面板里设定的alterId一致
      "security": "none"
    },
    "mysql": {
      "host": "144.33.X.X", //数据库所在地址，建议填IP
      "port": 3306,
      "user": "ssrpanel", //数据库连接账号
      "password": "password", //数据库连接密码
      "dbname": "ssrpanel" //数据库名称
    }
  }
}
```

（KCP模式）
```
{
  "log": {
    "loglevel": "debug"
  },
  "api": {
    "tag": "api",
    "services": [
      "HandlerService",
      "LoggerService",
      "StatsService"
    ]
  },
  "stats": {},
  "inbounds": [
    {
      "port": 10086,
      "protocol": "vmess",
      "streamSettings":{
      "network":"kcp",
      "kcpSettings": {
        "mtu": 1350,
        "tti": 20,
        "uplinkCapacity": 50,
        "downlinkCapacity": 100,
        "congestion": false,
        "readBufferSize": 2,
        "writeBufferSize": 2,
        "header": {
          "type": "dtls"
        }
      }
    },
      "tag": "proxy"
    },
    {
      "listen": "127.0.0.1",
      "port": 10085,
      "protocol": "dokodemo-door",
      "settings": {
        "address": "127.0.0.1"
      },
      "tag": "api"
    }
  ],
  "outbounds": [
    {
      "protocol": "freedom"
    }
  ],
  "routing": {
    "rules": [
      {
        "type": "field",
        "inboundTag": [
          "api"
        ],
        "outboundTag": "api"
      }
    ],
    "strategy": "rules"
  },
  "policy": {
    "levels": {
      "0": {
        "statsUserUplink": true,
        "statsUserDownlink": true
      }
    },
    "system": {
      "statsInboundUplink": true,
      "statsInboundDownlink": true
    }
  },
  "ssrpanel": {
    "nodeId": 1,
    "checkRate": 60,
    "user": {
      "inboundTag": "proxy",
      "level": 0,
      "alterId": 16,
      "security": "none"
    },
    "mysql": {
      "host": "面板所在机器的公网IP",
      "port": 3306,
      "user": "root",
      "password": "数据库ROOT密码",
      "dbname": "ssrpanel"
    }
  }
}
```

（WebSocket模式）
```
{
  "log": {
    "loglevel": "debug"
  },
  "api": {
    "tag": "api",
    "services": [
      "HandlerService",
      "LoggerService",
      "StatsService"
    ]
  },
  "stats": {},
  "inbounds": [
    {
      "port": 10086,
      "protocol": "vmess",
      "streamSettings": {
        "network": "ws",
        "wsSettings": {
        "path": "/phpmyadmin"
        }
      },
      "tag": "proxy"
    },
    {
      "listen": "127.0.0.1",
      "port": 10085,
      "protocol": "dokodemo-door",
      "settings": {
        "address": "127.0.0.1"
      },
      "tag": "api"
    }
  ],
  "outbounds": [
    {
      "protocol": "freedom"
    }
  ],
  "routing": {
    "rules": [
      {
        "type": "field",
        "inboundTag": [
          "api"
        ],
        "outboundTag": "api"
      }
    ],
    "strategy": "rules"
  },
  "policy": {
    "levels": {
      "0": {
        "statsUserUplink": true,
        "statsUserDownlink": true
      }
    },
    "system": {
      "statsInboundUplink": true,
      "statsInboundDownlink": true
    }
  },
  "ssrpanel": {
    "nodeId": 1,
    "checkRate": 60,
    "user": {
      "inboundTag": "proxy",
      "level": 0,
      "alterId": 16,
      "security": "none"
    },
    "mysql": {
      "host": "面板所在机器的公网IP",
      "port": 3306,
      "user": "root",
      "password": "数据库ROOT密码",
      "dbname": "ssrpanel"
    }
  }
}
```

如果使用WebSocket这种方法，并且和面板在同一台机器内部署，那就肯定只能去用Nginx实现了：
```
nano /etc/nginx/conf.d/v2raywebsocket.conf

server {
    listen       443 ssl http2;
    server_name  moon.koko.cat;

    ssl_certificate    /etc/nginx/certs/moon.koko.cat/fullchain.cer;
    ssl_certificate_key    /etc/nginx/certs/moon.koko.cat/moon.koko.cat.key;
    ssl_protocols TLSv1 TLSv1.1 TLSv1.2;
    ssl_ciphers ECDHE-RSA-AES128-GCM-SHA256:HIGH:!aNULL:!MD5:!RC4:!DHE;
    ssl_prefer_server_ciphers on;
    ssl_session_cache shared:SSL:10m;
    ssl_session_timeout 10m;
    error_page 497  https://$host$request_uri;

    location /phpmyadmin {
        proxy_pass       http://127.0.0.1:10086;
        proxy_redirect             off;
        proxy_http_version         1.1;
        proxy_set_header Upgrade   $http_upgrade;
        proxy_set_header Connection "upgrade";
        proxy_set_header Host      $http_host;
    }
}

然后用acme的standalone模式申请一个证书：
systemctl stop nginx
cd ~/.acme.sh && ./acme.sh --issue -d moon.koko.cat --standalone
mkdir -p /etc/nginx/certs/moon.koko.cat

和之前一样安装证书：
./acme.sh --install-cert -d moon.koko.cat \
--key-file /etc/nginx/certs/moon.koko.cat/moon.koko.cat.key \
--fullchain-file /etc/nginx/certs/moon.koko.cat/fullchain.cer \
--reloadcmd "systemctl force-reload nginx.service"

systemctl start nginx

如果是在别的节点安装的话就可以用Caddy代替Nginx了，Caddy配置简单方便，并且支持自动申请SSL证书/续期，一键安装：

curl https://getcaddy.com | bash -s personal
创建caddy配置文件存放目录和ssl证书存放目录编辑配置文件：

mkdir -p /etc/caddy && mkdir -p /etc/ssl/caddy
新建一个配置文件：

nano /etc/caddy/Caddyfile
写入：

sun.koko.cat {
	log stdout
	tls example@qq.com
	proxy /phpmyadmin localhost:10086 {
		websocket
		header_upstream -Origin
	}
}
创建Systemd服务文件：

nano /etc/systemd/system/caddy.service
写入：

[Unit]
Description=Caddy HTTP/2 web server
Documentation=https://caddyserver.com/docs
After=network-online.target
Wants=network-online.target systemd-networkd-wait-online.service

[Service]
Restart=on-abnormal
User=root
Group=root
Environment=CADDYPATH=/etc/ssl/caddy
ExecStart=/usr/local/bin/caddy -log stdout -agree=true -conf=/etc/caddy/Caddyfile
ExecReload=/bin/kill -USR1 \$MAINPID
KillMode=mixed
KillSignal=SIGQUIT
TimeoutStopSec=5s

[Install]
WantedBy=multi-user.target
启动：

systemctl start caddy
systemctl enable caddy
```

##### 测试运行
```
/usr/bin/v2ray/v2ray -config /etc/v2ray/config.json
```

#### 客户端配置
[![2.png](https://i.loli.net/2019/01/07/5c3343be6fd4a.png)](https://i.loli.net/2019/01/07/5c3343be6fd4a.png)

##### 后台运行
```
touch v2ray_logrun.sh
vim v2ray_logrun.sh

黏贴如下

nohup /usr/bin/v2ray/v2ray -config /etc/v2ray/config.json >> v2ray_run.log 2>&1 &

保存并执行： chmod a+x v2ray_logrun.sh && sh v2ray_logrun.sh
```