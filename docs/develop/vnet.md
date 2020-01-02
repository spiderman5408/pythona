## VNET 1.0.0
作者：[徐常曦](https://t.me/xuchangxi)

#### 单端口
支持协议
- auth_chain_a
- http_simple

支持混淆
- tls1.2_ticket_auth


支持加密方式
```
bf-cfb
chacha20
chacha20-ietf
aes-128-cfb
aes-192-cfb
aes-256-cfb
aes-128-ctr
aes-192-ctr
aes-256-ctr
cast5-cfb
des-cfb
rc4-md5
salsa20
```

推荐配置1:

| 参数 | 值 |
| :---: | :--- |
| 端口 | 443、3306 |
| 密码 | 任意 |
| 加密方式 | aes-128-cfb |
| 协议 | auth_chain_a |
| 协议参数 | 代理端口:代理密码 |
| 混淆 | tls1.2_ticket_auth |
| 混淆参数 | cdn1.cloudflare.com |
注意：
混淆参数用小逗号隔开；
端口为443时，找个好用的CDN域名，例如：cdn1.cloudflare.com
端口为3306时，找个带mysql db前缀的域名，例如：zone14.azure.com,db4.azure.com  

推荐配置2:

| 参数 | 值 |
| :---: | :--- |
| 端口 | 任意 |
| 密码 | 任意 |
| 加密方式 | aes-128-cfb |
| 协议 | auth_chain_a |
| 协议参数 | 代理端口:代理密码 |
| 混淆 | http_simple |
| 混淆参数 | tse1-mm.cn.bing.net,tse2-mm.cn.bing.net |
注意：混淆参数必须跟面板里节点设置的混淆参数一致

## 多端口
支持加密方式
```
bf-cfb
chacha20
chacha20-ietf
aes-128-cfb
aes-192-cfb
aes-256-cfb
aes-128-ctr
aes-192-ctr
aes-256-ctr
cast5-cfb
des-cfb
rc4-md5
salsa20
aes-128-gcm
aes-192-gcm
aes-256-gcm
chacha20-ietf-poly1305
```

推荐配置1:

| 参数 | 值 |
| :---: | :--- |
| 端口 | 任意 |
| 密码 | 任意 |
| 加密方式 | aes-128-cfb |
| 协议 | origin |
| 协议参数 |  |
| 混淆 | tls1.2_ticket_auth |
| 混淆参数 | cdn1.cloudflare.com |

推荐配置2:

| 参数 | 值 |
| :---: | :--- |
| 端口 | 任意 |
| 密码 | 任意 |
| 加密方式 | aes-128-cfb |
| 协议 | origin |
| 协议参数 |  |
| 混淆 | http_simple |
| 混淆参数 | tse1-mm.cn.bing.net,tse2-mm.cn.bing.net |

推荐配置2:


## 原版推荐配置
| 参数 | 值 |
| :---: | :--- |
| 端口 | 任意 |
| 密码 | 任意 |
| 加密方式 | aes-128-gcm、chacha20-ietf-poly1305 |

## 启动

1.手动启动：`./vnet --api_host http://localhost --key fakekey --node_id 1`

```
PS C:\Users\rc452860\vnet> .\vnet.exe --help
shadowoscksr webapi version

Usage:
  vnet.exe [flags]

Flags:
      --api_host string   api host example: http://localhost
      --config string     config file default: config.json (default "config.json")
  -h, --help              help for vnet.exe
      --host string       host example: 0.0.0.0 (default "0.0.0.0")
      --key string        key
      --node_id string    node_id
```

2.通过加载配置文件启动：`./vnet --config /temp/vnet/config.json`


`config.json`配置示例：
```
{
    "api_host": "http://premium.ssrpanel.com",
    "key": "5ar996cfzye7pa45",
    "node_id": 2
}
```

## 注意
- 协议：用来做身份校验，多端口时不推荐使用任何协议，即仅用原协议：origin。
- 混淆：对数据包进行伪装（绕过QOS）。

## 后端行为
- 每60秒自动上报所有代理端口的连接IP信息
- 每60秒上报一次心跳信息


## 开放接口
- 请求格式：http://节点IP:端口/{API}

#### 添加用户
- 请求地址：`/api/user/add`
- 请求方式：`POST`
- 传入参数：JSON数据
``` JSON数据示例
{
    "uid": 571,
    "port": 5539,
    "passwd": "NCg2eh",
    "speed_limit": 10737418240
}
```

#### 删除用户
- 请求地址：`/api/user/del/{uid}`
- 请求方式：`POST`
- 传入参数：

| 字段 | 释义 | 参考值 | 
| :---: | :---: | :---: |
| uid | 用户ID | 321 |

#### 修改用户信息
- 请求地址：`/api/user/edit`
- 请求方式：`POST`
- 传入参数：JSON数据
``` JSON数据示例
{
    "uid": 571,
    "port": 5539,
    "passwd": "NCg2eh",
    "speed_limit": 10737418240
}
```


#### 获取用户列表
- 请求地址：`/api/user/list`
- 请求方式：`GET`
- 传入参数：

| 字段 | 释义 | 参考值 | 
| :---: | :---: | :---: |
| uid | 用户ID | 321 |
| port | 端口 | 10000 |


#### 批量增加用户
- 请求地址：`/api/v2/user/add/list`
- 请求方式：POST
- 传入参数：JSON数据
```
[
    {
        "uid": 571,
        "port": 5539,
        "passwd": "NCg2eh",
        "speed_limit": 10737418240
    },
    {
        "uid": 578,
        "port": 5589,
        "passwd": "NCop2eh",
        "speed_limit": 10737418240
    }
]
```

#### 批量删除用户
- 请求地址：`/api/v2/user/del/list`
- 请求方式：POST
- 传入参数：JSON数据
```
[4,5,6]
```

