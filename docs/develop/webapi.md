## 通用WEBAPI
目前仅基于VNET后端适配使用


### 代码位置
- `app/Http/Controllers/Api/Web`

### 目录结构说明
- `app/Http/Controllers/Api/Web` 目录下按版本号进行划分，初版为v1

```
设计理由：方便接口定制或者版本化更新。

举例说明1：张三定制某客户端，其客户端有三个里程碑版本，可以按如下定义接口，以保证在发新版时不影响未更新版本的用户的正常使用。
第一版：app/Http/Controllers/Api/Zhangsan/v1
第二版：app/Http/Controllers/Api/Zhangsan/v2
第三版：app/Http/Controllers/Api/Zhangsan/v3


举例说明2：节点后端程序加入新特性，在新得节点上使用更新得版本，可以按如下接口定义，用于新节点并行测试。
第三版：app/Http/Controllers/Api/Web/v2
第三版：app/Http/Controllers/Api/Web/v3
```

### 公共头部
- 节点API安全验证由 `app/Http/Middleware/Webapi.php` 中间件处理
- 校验规则：节点机在所有请求的`头部`传入`key`、`timestamp`
- `key`：string 由管理后台创建应用取得
- `timestamp`：int(10) 每次请求的10位时间戳

## 注意
- 节点服务器和面板所在服务器时间误差不应该超过5分钟，否则API授权验证失败

#### 获取节点信息 
- 请求地址：`/api/web/v1/node/{节点ID}`
- 请求方式：`GET`
- 传入参数：无
- 返回结果：
```
失败：
{
    "status": "fail",
    "code": 404,
    "data": "",
    "message": "授权与节点不匹配"
}

{
    "status": "fail",
    "code": 404,
    "data": "",
    "message": "节点不存在"
}

成功：
{
    "status": "success",
    "code": 200,
    "data": {
        "id": 2,
        "method": "aes-256-cfb",
        "protocol": "origin",
        "obfs": "plain",
        "obfs_param": "",
        "is_udp": 1,
        "speed_limit": 6555555,
        "client_limit": 1,
        "single": 0,
        "port": "",
        "passwd": "",
        "push_port": 8081,
        "secret": "tdcpxpip"
    },
    "message": "获取节点信息成功"
}
```


----

#### 上报节点心跳信息 
- 请求地址：`/api/web/v1/nodeStatus/{节点ID}`
- 请求方式：`POST`
- 传入参数：JSON数据

| 名称 | 字段 | 类型 |
| :---: | :---: | :---: |
| cpu负载 | cpu | string |
| 内存负载 | mem | string |
| 网络负载 | net | string |
| 磁盘情况 | disk | string |
| 后端存活时长（单位：秒） | uptime | int |

示例：
```
{"cpu":"2%","mem":"36%","net":"1.5 GB\u2191-38 GB\u2193","disk":"4%","uptime":89582}
 
```

- 返回结果：
```
失败：
{
    "status": "fail",
    "code": 400,
    "data": "",
    "message": "上报节点心跳信息失败，请检查字段"
}

成功：
{
    "status": "success",
    "code": 200,
    "data": "",
    "message": "上报节点心跳信息成功"
}
```

----

#### 上报节点在线情况 
- 请求地址：`/api/web/v1/nodeOnline/{节点ID}`
- 请求方式：`POST`
- 传入参数：JSON数据

| 名称 | 字段 | 类型 |
| :---: | :---: | :---: |
| 用户ID | uid | int |
| 在线ip | ip | string |

示例：
```
[{"uid":14,"ip":"111.203.198.58,223.104.3.237,223.104.3.245"},{"uid":1,"ip":"117.30.139.216"}]
```

- 返回结果：
```
失败：
{
    "status": "fail",
    "code": 400,
    "data": "",
    "message": "上报节点在线情况失败，请检查字段"
}

成功：
{
    "status": "success",
    "code": 200,
    "data": "",
    "message": "上报节点在线情况成功"
}
```

----

#### 获取用户列表 
- 请求地址：`/api/web/v1/userList/{节点ID}`
- 请求方式：`GET`
- 传入参数：

| 名称 | 字段 | 类型 |
| :---: | :---: | :---: |
| 请求时间戳 | updateTime | unix time, 10位 |

- 返回结果：
```
{
    "status": "success",
    "code": 200,
    "data": [
        {
            "uid": 1,
            "port": 10000,
            "passwd": "@123",
            "method": "aes-256-cfb",
            "protocol": "origin",
            "obfs": "plain",
            "obfs_param": "",
            "speed_limit": 134217728,
            "enable": 1
        },
        {
            "uid": 2,
            "port": 10001,
            "passwd": "mGUZwX",
            "method": "aes-256-cfb",
            "protocol": "origin",
            "obfs": "plain",
            "obfs_param": "",
            "speed_limit": 131072,
            "enable": 1
        },
        {
            "uid": 3,
            "port": 10002,
            "passwd": "5bSyVp",
            "method": "aes-256-cfb",
            "protocol": "origin",
            "obfs": "plain",
            "obfs_param": "",
            "speed_limit": 262144,
            "enable": 1
        },
        {
            "uid": 7,
            "port": 10006,
            "passwd": "vi7gqV",
            "method": "aes-256-cfb",
            "protocol": "origin",
            "obfs": "plain",
            "obfs_param": "",
            "speed_limit": 2621440,
            "enable": 1
        }
    ],
    "message": "获取用户列表成功",
    "updateTime": 1565172630
}
```

----

#### 上报用户流量日志 
- 请求地址：`/api/web/v1/userTraffic/{节点ID}`
- 请求方式：`POST`
- 传入参数：JSON数据

| 名称 | 字段 | 类型 |
| :---: | :---: | :---: |
| 用户ID | uid | int |
| 上传 | upload | int |
| 下载 | download | int |

示例：
```
{"uid":14,"upload":52197,"download":3381985}
```

- 返回结果：
```
失败：
{
    "status": "fail",
    "code": 400,
    "data": "",
    "message": "上报用户流量日志失败，请检查字段"
}

成功：
{
    "status": "success",
    "code": 200,
    "data": "",
    "message": "上报用户流量日志成功"
}
```

----

#### 获取节点的审计规则 
- 请求地址：`/api/web/v1/nodeRule/{节点ID}`
- 请求方式：`GET`
- 传入参数：无
- 返回结果：
```
第一种：mode为all时，表示节点未设置任何审计规则，全部放行：
{
    "status": "success",
    "code": 200,
    "data": {
        "mode": "all",
        "rules": []
    },
    "message": "获取节点审计规则成功"
}

第二种：mode为reject时，表示节点设置了黑名单，对于节点来说，一黑全黑
{
    "status": "success",
    "code": 200,
    "data": {
        "mode": "reject",
        "rules": [
            {
                "id": 2, // 审计规则ID，用户触发审计规则时需要上报该ID
                "type": "reg", // 审计规则类型：reg-正则表达式、domain-域名、ip-IP、protocol-应用层协议（HTTP协议、FTP协议、TELNET协议、SFTP协议、BitTorrent协议、POP3协议、IMAP协议、SMTP协议、PPTP协议、L2TP协议）
                "pattern": "(Subject|HELO|SMTP)" // 审计规则的值
            },
            {
                "id": 3,
                "type": "reg",
                "pattern": "BitTorrent protocol"
            },
            {
                "id": 4,
                "type": "reg",
                "pattern": "(api|ps|sv|offnavi|newvector|ulog\\.imap|newloc)(\\.map|)\\.(baidu|n\\.shifen)\\.com"
            },
            {
                "id": 5,
                "type": "reg",
                "pattern": "(.*\\.||)(dafahao|minghui|dongtaiwang|epochtimes|ntdtv|falundafa|wujieliulan|zhengjian)\\.(org|com|net)"
            },
            {
                "id": 7,
                "type": "reg",
                "pattern": "(^.*\\@)(guerrillamail|guerrillamailblock|sharklasers|grr|pokemail|spam4|bccto|chacuo|027168)\\.(info|biz|com|de|net|org|me|la)"
            }
        ]
    },
    "message": "获取节点审计规则成功"
}

第三种：mode为allow时，表示节点设置了白名单，对于节点来说，一白全白
{
    "status": "success",
    "code": 200,
    "data": {
        "mode": "allow",
        "rules": [
            {
                "id": 3,
                "type": "reg",
                "pattern": "BitTorrent protocol"
            },
            {
                "id": 6,
                "type": "reg",
                "pattern": "(torrent|\\.torrent|peer_id=|info_hash|get_peers|find_node|BitTorrent|announce_peer|announce\\.php\\?passkey=)"
            },
            {
                "id": 9,
                "type": "domain",
                "pattern": "pornhub.com"
            },
            {
                "id": 10,
                "type": "ip",
                "pattern": "192.168.2.2"
            },
            {
                "id": 12,
                "type": "reg",
                "pattern": "234"
            }
        ]
    },
    "message": "获取节点审计规则成功"
}
```

----

#### 上报用户触发的审计规则记录 
- 请求地址：`/api/web/v1/trigger/{节点ID}`
- 请求方式：`POST`
- 传入参数：JSON数据

| 名称 | 字段 | 类型 |
| :---: | :---: | :---: |
| 用户ID | uid | int |
| 规则ID | rule_id | int |
| 触发原因 | reason | string |

```
{"uid":12,"rule_id":2,"reason":"https:\/\/sex.com\/images\/xx.png"}
```

- 返回结果：
```
失败：
{
    "status": "fail",
    "code": 400,
    "data": "",
    "message": "上报用户触发审计规则记录失败"
}

成功：
{
    "status": "success",
    "code": 200,
    "data": "",
    "message": "上报用户触发审计规则记录成功"
}
```
