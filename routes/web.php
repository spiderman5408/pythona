<?php

Route::get('s/{code}', 'SubscribeController@getSubscribeByCode'); // 节点订阅地址
Route::get('b/{code}', 'AdminController@getBarkMessage'); // 通过Bark查看消息详情
Route::get('i/{code}', 'SubscribeController@shadowrocket'); // Shadowrocket在线导入并启用规则、自动加入订阅连接

Route::group(['middleware' => ['isForbidden', 'affiliate']], function () {
    Route::get('lang/{locale}', 'AuthController@switchLang'); // 语言切换
    Route::any('login', 'AuthController@login')->middleware('isSecurity'); // 登录
    Route::get('logout', 'AuthController@logout'); // 退出
    Route::any('register', 'AuthController@register'); // 注册
    Route::any('resetPassword', 'AuthController@resetPassword'); // 重设密码
    Route::any('reset/{token}', 'AuthController@reset'); // 重设密码
    Route::any('activeUser', 'AuthController@activeUser'); // 激活账号
    Route::get('active/{token}', 'AuthController@active'); // 激活账号
    Route::post('sendCode', 'AuthController@sendCode'); // 发送注册验证码
    Route::get('free', 'AuthController@free'); // 免费邀请码
    Route::get('makePasswd', 'Controller@makePasswd'); // 生成密码
    Route::get('makeVmessId', 'Controller@makeVmessId'); // 生成VmessId
    Route::get('makeSecurityCode', 'Controller@makeSecurityCode'); // 生成网站安全码
});

Route::group(['middleware' => ['isForbidden', 'isLogin', 'isAdmin', 'permission']], function () {
    Route::get('admin', 'AdminController@index'); // 后台首页
    Route::get('admin/userList', 'AdminController@userList'); // 账号列表
    Route::any('admin/addUser', 'AdminController@addUser'); // 添加账号
    Route::any('admin/editUser/{id}', 'AdminController@editUser'); // 编辑账号
    Route::post('admin/delUser', 'AdminController@delUser'); // 删除账号
    Route::post('admin/batchAddUsers', 'AdminController@batchAddUsers'); // 批量生成账号
    Route::get('admin/nodeList', 'AdminController@nodeList'); // 节点列表
    Route::any('admin/addNode', 'AdminController@addNode'); // 添加节点
    Route::any('admin/editNode', 'AdminController@editNode'); // 编辑节点
    Route::post('admin/delNode', 'AdminController@delNode'); // 删除节点
    Route::get('admin/nodeRealTimeStatus', 'AdminController@nodeRealTimeStatus'); // 节点实时状态
    Route::get('admin/nodeMonitor/{id}', 'AdminController@nodeMonitor'); // 节点流量监控
    Route::get('admin/articleList', 'AdminController@articleList'); // 文章列表
    Route::any('admin/addArticle', 'AdminController@addArticle'); // 添加文章
    Route::any('admin/editArticle', 'AdminController@editArticle'); // 编辑文章
    Route::post('admin/delArticle', 'AdminController@delArticle'); // 删除文章
    Route::get('admin/groupList', 'AdminController@groupList'); // 分组列表
    Route::any('admin/addGroup', 'AdminController@addGroup'); // 添加分组
    Route::any('admin/editGroup/{id}', 'AdminController@editGroup'); // 编辑分组
    Route::post('admin/delGroup/{id}', 'AdminController@delGroup'); // 删除分组
    Route::get('admin/labelList', 'AdminController@labelList'); // 标签列表
    Route::any('admin/addLabel', 'AdminController@addLabel'); // 添加标签
    Route::any('admin/editLabel', 'AdminController@editLabel'); // 编辑标签
    Route::post('admin/delLabel', 'AdminController@delLabel'); // 删除标签
    Route::get('ticket/ticketList', 'TicketController@ticketList'); // 工单列表
    Route::any('ticket/addTicket', 'TicketController@addTicket'); // 发起工单
    Route::any('ticket/replyTicket', 'TicketController@replyTicket'); // 回复工单
    Route::post('ticket/closeTicket', 'TicketController@closeTicket'); // 关闭工单
    Route::get('admin/orderList', 'AdminController@orderList'); // 订单列表
    Route::post('admin/closeOrder', 'AdminController@closeOrder'); // 手动关闭订单
    Route::get('admin/inviteList', 'AdminController@inviteList'); // 邀请码列表
    Route::post('admin/makeInvite', 'AdminController@makeInvite'); // 生成邀请码
    Route::get('admin/exportInvite', 'AdminController@exportInvite'); // 导出邀请码
    Route::get('admin/applyList', 'AdminController@applyList'); // 提现申请列表
    Route::get('admin/applyDetail', 'AdminController@applyDetail'); // 提现申请详情
    Route::post('admin/setApplyStatus', 'AdminController@setApplyStatus'); // 设置提现申请状态
    Route::any('coupon/couponList', 'CouponController@couponList'); // 优惠券列表
    Route::any('coupon/addCoupon', 'CouponController@addCoupon'); // 添加优惠券
    Route::post('coupon/delCoupon', 'CouponController@delCoupon'); // 删除优惠券
    Route::get('coupon/exportCoupon', 'CouponController@exportCoupon'); // 导出优惠券
    Route::any('shop/goodsList', 'ShopController@goodsList'); // 商品列表
    Route::any('shop/addGoods', 'ShopController@addGoods'); // 添加商品
    Route::any('shop/editGoods/{id}', 'ShopController@editGoods'); // 编辑商品
    Route::post('shop/delGoods', 'ShopController@delGoods'); // 删除商品
    Route::get('rule/ruleList', 'RuleController@ruleList'); // 审计规则列表
    Route::post('rule/addRule', 'RuleController@addRule'); // 添加审计规则
    Route::post('rule/delRule/{id}', 'RuleController@delRule'); // 删除审计规则
    Route::get('rule/ruleGroupList', 'RuleController@ruleGroupList'); // 审计规则分组列表
    Route::any('rule/addRuleGroup', 'RuleController@addRuleGroup'); // 添加审计规则分组
    Route::any('rule/editRuleGroup', 'RuleController@editRuleGroup'); // 编辑审计规则分组
    Route::post('rule/delRuleGroup/{id}', 'RuleController@delRuleGroup'); // 删除审计规则分组
    Route::any('rule/assignNode', 'RuleController@assignNode'); // 规则分组关联节点
    Route::get('rule/ruleLogList', 'RuleController@ruleLogList'); // 用户触发审计规则日志
    Route::post('rule/clearLog', 'RuleController@clearLog'); // 清除所有审计触发日志
    Route::any('admin/config', 'AdminController@config'); // 配置列表
    Route::any('admin/addConfig', 'AdminController@addConfig'); // 添加配置
    Route::post('admin/delConfig', 'AdminController@delConfig'); // 删除配置
    Route::post('admin/addCountry', 'AdminController@addCountry'); // 增加国家/地区
    Route::post('admin/updateCountry', 'AdminController@updateCountry'); // 更新国家/地区
    Route::post('admin/delCountry', 'AdminController@delCountry'); // 删除国家/地区
    Route::post('admin/setDefaultConfig', 'AdminController@setDefaultConfig'); // 设置默认配置
    Route::get('admin/system', 'AdminController@system'); // 系统设置
    Route::post('admin/setExtend', 'AdminController@setExtend'); // 设置客服、统计代码
    Route::post('admin/setConfig', 'AdminController@setConfig'); // 设置某个配置项
    Route::get('admin/userBalanceLogList', 'AdminController@userBalanceLogList'); // 余额变动记录
    Route::get('admin/userTrafficLogList', 'AdminController@userTrafficLogList'); // 流量变动记录
    Route::get('admin/userRebateList', 'AdminController@userRebateList'); // 返利流水记录
    Route::get('admin/userBanLogList', 'AdminController@userBanLogList'); // 用户封禁记录
    Route::get('admin/export/{id}', 'AdminController@export'); // 导出(查看)配置信息
    Route::get('admin/userMonitor/{id}', 'AdminController@userMonitor'); // 用户流量监控
    Route::post('admin/resetUserSubscribe', 'AdminController@resetUserSubscribe'); // 重置用户订阅
    Route::post('admin/resetUserTraffic', 'AdminController@resetUserTraffic'); // 重置用户流量
    Route::post('admin/handleUserBalance', 'AdminController@handleUserBalance'); // 用户余额充值
    Route::post("admin/switchToUser", "AdminController@switchToUser"); // 转换成某个用户的身份
    Route::get("admin/userSubscribeLog", "AdminController@userSubscribeLog"); // 订阅访问日志
    Route::get('subscribe/subscribeList', 'SubscribeController@subscribeList'); // 订阅码列表
    Route::post('subscribe/setSubscribeStatus', 'SubscribeController@setSubscribeStatus'); // 启用禁用用户的订阅
    Route::get("marketing/emailList", "MarketingController@emailList"); // 邮件消息列表
    Route::get("admin/onlineIPMonitor", "AdminController@onlineIPMonitor"); // 在线IP监控
    Route::get('admin/download', 'AdminController@download'); // 下载转换过的JSON配置
    Route::any('admin/convert', 'AdminController@convert'); // 格式转换
    Route::any('admin/import', 'AdminController@import'); // 数据导入
    Route::get('admin/trafficLog', 'AdminController@trafficLog'); // 流量日志
    Route::get('admin/emailLog', 'AdminController@emailLog'); // 邮件发送日志
    Route::get("payment/callbackList", "PaymentController@callbackList"); // 支付回调日志
    Route::get("sensitiveWords/list", "SensitiveWordsController@sensitiveWordslist"); // 敏感词列表
    Route::post("sensitiveWords/add", "SensitiveWordsController@addSensitiveWords"); // 添加敏感词
    Route::post("sensitiveWords/del", "SensitiveWordsController@delSensitiveWords"); // 删除敏感词
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index'); // 系统运行日志
    Route::any('admin/profile', 'AdminController@profile'); // 修改个人信息
    Route::get('admin/makePort', 'AdminController@makePort'); // 生成端口
    Route::get('admin/getNodeStatus', 'AdminController@getNodeStatus'); // 查询节点实时状态
    Route::get('admin/accessList', 'AdminController@accessList'); // 节点授权列表
    Route::post('admin/addAccess', 'AdminController@addAccess'); // 添加节点授权
    Route::post('admin/delAccess', 'AdminController@delAccess'); // 删除节点授权
    Route::post('admin/refreshAccess', 'AdminController@refreshAccess'); // 重置节点授权KEY
    Route::get('admin/makeAccessConfig/{id}', 'AdminController@makeAccessConfig'); // 生成节点WEBAPI配置文件
    Route::post('admin/sendBarkTestMessage', 'AdminController@sendBarkTestMessage'); // 发送Bark测试消息

    # 权限管理
    Route::get("permission/permissionList", "PermissionController@permissionList"); // 行为列表
    Route::any("permission/addPermission", "PermissionController@addPermission"); // 创建行为
    Route::any("permission/editPermission", "PermissionController@editPermission"); // 编辑行为
    Route::post("permission/deletePermission", "PermissionController@deletePermission"); // 删除行为
    Route::get("permission/roleList", "PermissionController@roleList"); // 角色列表
    Route::any("permission/addRole", "PermissionController@addRole"); // 创建角色
    Route::any("permission/editRole", "PermissionController@editRole"); // 编辑角色
    Route::post("permission/deleteRole", "PermissionController@deleteRole"); // 删除角色
    Route::get("permission/masterList", "PermissionController@masterList"); // 管理员列表
    Route::post("permission/deleteMaster", "PermissionController@deleteMaster"); // 删除管理员
    Route::any("permission/assignPermission", "PermissionController@assignPermission"); // 分配行为
    Route::any("permission/assignRole", "PermissionController@assignRole"); // 分配角色
});

Route::group(['middleware' => ['isForbidden', 'isLogin']], function () {
    Route::any('/', 'UserController@index'); // 用户首页
    Route::any('article', 'UserController@article'); // 文章详情
    Route::post('exchangeSubscribe', 'UserController@exchangeSubscribe'); // 更换节点订阅地址
    Route::get('nodeList', 'UserController@nodeList'); // 节点列表
    Route::get("subscribeLog", "UserController@subscribeLog"); // 订阅访问日志
    Route::get("userBanLog", "UserController@userBanLog"); // 用户封禁日志
    Route::post('checkIn', 'UserController@checkIn'); // 签到
    Route::get('services', 'UserController@services'); // 商品列表
    Route::get('tickets', 'UserController@ticketList'); // 工单
    Route::post('addTicket', 'UserController@addTicket'); // 快速添加工单
    Route::any('replyTicket', 'UserController@replyTicket'); // 回复工单
    Route::post('closeTicket', 'UserController@closeTicket'); // 关闭工单
    Route::get('invoices', 'UserController@invoices'); // 订单列表
    Route::get('invoice/{sn}', 'UserController@invoiceDetail'); // 订单明细
    Route::any('buy/{id}', 'UserController@buy'); // 购买商品
    Route::post('redeemCoupon', 'UserController@redeemCoupon'); // 使用优惠券
    Route::get('invite', 'UserController@invite'); // 邀请码
    Route::post('makeInvite', 'UserController@makeInvite'); // 生成邀请码
    Route::any('profile', 'UserController@profile'); // 修改个人信息
    Route::get('referral', 'UserController@referral'); // 推广返利
    Route::post('extractMoney', 'UserController@extractMoney'); // 申请提现
    Route::post("switchToAdmin", "UserController@switchToAdmin"); // 转换成管理员的身份
    Route::post("charge", "UserController@charge"); // 卡券余额充值
    Route::get("help", "UserController@help"); // 帮助中心

    Route::post('payment/create', 'PaymentController@create'); // 创建支付
    Route::get('payment/getStatus', 'PaymentController@getStatus'); // 获取支付单状态
    Route::get('payment/{sn}', 'PaymentController@detail'); // 支付单详情

});

// 第三方回调接口
Route::group(['namespace' => 'Callback', 'prefix' => 'callback', 'middleware' => ['callback']], function () {
    Route::resource('codepay', 'CodePayController');
    Route::resource('epay', 'EPayController');
    Route::resource('alipay', 'AlipayController');
    Route::resource('f2fpay', 'F2fpayController');
    Route::resource('telegram', 'TelegramController');
});
