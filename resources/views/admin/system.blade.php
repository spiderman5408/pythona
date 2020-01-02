@extends('admin.layouts')
@section('css')
    <link href="/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="padding-top:0;">
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PROFILE CONTENT -->
                <div class="profile-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title tabbable-line">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_1" data-toggle="tab"> 常规设置 </a>
                                        </li>
                                        <li>
                                            <a href="#tab_2" data-toggle="tab"> 拓展设置 </a>
                                        </li>
                                        <li>
                                            <a href="#tab_3" data-toggle="tab"> 签到设置 </a>
                                        </li>
                                        <li>
                                            <a href="#tab_4" data-toggle="tab"> 推广返利设置 </a>
                                        </li>
                                        <li>
                                            <a href="#tab_5" data-toggle="tab"> 警告提醒设置 </a>
                                        </li>
                                        <li>
                                            <a href="#tab_6" data-toggle="tab"> 自动化任务 </a>
                                        </li>
                                        <li>
                                            <a href="#tab_7" data-toggle="tab"> 支付网关 </a>
                                        </li>
                                        <li>
                                            <a href="#tab_8" data-toggle="tab"> 其他设置 </a>
                                        </li>
                                        <li id="li_tab_geetest" class="tab_captcha" style="display:none;">
                                            <a href="#tab_geetest" data-toggle="tab"> Geetest 极验 </a>
                                        </li>
                                        <li id="li_tab_googleCaptcha" class="tab_captcha" style="display:none;">
                                            <a href="#tab_googleCaptcha" data-toggle="tab"> Google reCAPTCHA </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1">
                                            <form action="#" method="post" class="form-horizontal">
                                                <div class="portlet-body">
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="website_name" class="col-md-3 control-label">网站名称</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="website_name" value="{{$website_name}}" id="website_name" autocomplete="off" />
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setWebsiteName()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 发邮件时展示 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="website_url" class="col-md-3 control-label">网站地址</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="website_url" value="{{$website_url}}" id="website_url" autocomplete="off" />
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setWebsiteUrl()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 生成重置密码、在线支付必备，示例：https://www.ssrpanel.com </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="website_security_code" class="col-md-3 control-label">网站安全码</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="website_security_code" value="{{$website_security_code}}" id="website_security_code" autocomplete="off" />
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-default" type="button" onclick="makeWebsiteSecurityCode()">生成</button>
                                                                        <button class="btn btn-success" type="button" onclick="setWebsiteSecurityCode()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 非空时必须通过 <a href="/login?securityCode=" target="_blank">安全入口</a> 加上安全码才可访问 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="webmaster_email" class="col-md-3 control-label">管理员收信地址</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="webmaster_email" value="{{$webmaster_email}}" id="webmaster_email" placeholder="master@ssrpanel.com" autocomplete="off" />
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setWebmasterEmail()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 填写此值则节点离线、用户回复工单都会自动提醒 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">

                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_register" class="col-md-3 control-label">用户注册</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($is_register) checked @endif id="is_register" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 关闭后无法注册 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_reset_password" class="col-md-3 control-label">重置密码</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($is_reset_password) checked @endif id="is_reset_password" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 启用后用户可以通过邮件重置密码 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_invite_register" class="col-md-3 control-label">邀请注册</label>
                                                            <div class="col-md-9">
                                                                <select id="is_invite_register" class="form-control select2" name="is_invite_register">
                                                                    <option value="0" @if($is_invite_register == '0') selected @endif>关闭</option>
                                                                    <option value="1" @if($is_invite_register == '1') selected @endif>可选</option>
                                                                    <option value="2" @if($is_invite_register == '2') selected @endif>必须</option>
                                                                </select>
                                                                <span class="help-block"> 注册时邀请码是否必须 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_free_code" class="col-md-3 control-label">免费邀请码</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($is_free_code) checked @endif id="is_free_code" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 关闭后免费邀请码不可见 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_register_type" class="col-md-3 control-label">注册限制模式</label>
                                                            <div class="col-md-9">
                                                                <select id="is_register_type" class="form-control select2" name="is_register_type">
                                                                    <option value="0" @if($is_register_type == '0') selected @endif>不限制</option>
                                                                    <option value="1" @if($is_register_type == '1') selected @endif>黑名单</option>
                                                                    <option value="2" @if($is_register_type == '2') selected @endif>白名单</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_verify_register" class="col-md-3 control-label">注册校验验证码</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($is_verify_register) checked @endif id="is_verify_register" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 注册时需要先通过邮件获取验证码，‘激活账号’失效 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_captcha" class="col-md-3 control-label">验证码</label>
                                                            <div class="col-md-9">
                                                                <select id="is_captcha" class="form-control select2" name="is_captcha">
                                                                    <option value="0" @if($is_captcha == '0') selected @endif>关闭</option>
                                                                    <option value="1" @if($is_captcha == '1') selected @endif>普通验证码</option>
                                                                    <option value="2" @if($is_captcha == '2') selected @endif>Geetest 极验</option>
                                                                    <option value="3" @if($is_captcha == '3') selected @endif>Google reCAPTCHA</option>
                                                                </select>
                                                                <span class="help-block"> 启用后登录、注册需要输入验证码 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_active_register" class="col-md-3 control-label">激活账号</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($is_active_register) checked @endif id="is_active_register" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 启用后用户需要通过邮件来激活账号 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_forbid_china" class="col-md-3 control-label">阻止大陆访问</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($is_forbid_china) checked @endif id="is_forbid_china" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 开启后大陆IP禁止访问 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_forbid_oversea" class="col-md-3 control-label">阻止海外访问</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($is_forbid_oversea) checked @endif id="is_forbid_oversea" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 开启后非大陆IP禁止访问 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_forbid_robot" class="col-md-3 control-label">阻止机器人访问</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($is_forbid_robot) checked @endif id="is_forbid_robot" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 如果是机器人、爬虫、代理访问网站则会抛出404错误 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="tab_2">
                                            <form action="#" method="post" class="form-horizontal">
                                                <div class="portlet-body">
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_rand_port" class="col-md-3 control-label">随机端口</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($is_rand_port) checked @endif id="is_rand_port" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 注册、添加用户时随机生成端口 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label class="col-md-3 control-label">端口范围</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group input-large input-daterange">
                                                                    <input type="text" class="form-control" name="min_port" value="{{$min_port}}" id="min_port">
                                                                    <span class="input-group-addon"> ~ </span>
                                                                    <input type="text" class="form-control" name="max_port" value="{{$max_port}}" id="max_port">
                                                                </div>
                                                                <span class="help-block"> 端口范围：1000 - 65535 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_namesilo" class="col-md-3 control-label">Namesilo</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($is_namesilo) checked @endif id="is_namesilo" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 添加、编辑节点的绑定域名时自动更新域名DNS记录值为节点IP（<a href="https://www.namesilo.com/account_api.php?rid=326ec20pa" target="_blank">创建API KEY</a>） </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="namesilo_key" class="col-md-3 control-label">Namesilo API KEY</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="namesilo_key" value="{{$namesilo_key}}" id="namesilo_key" placeholder="填入Namesilo上申请的API KEY" />
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setNamesiloKey()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 域名必须是<a href="https://www.namesilo.com/?rid=326ec20pa" target="_blank">www.namesilo.com</a>上购买的 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--
                                                    <div class="form-group">
                                                        <label for="is_user_rand_port" class="col-md-2 control-label">自定义端口</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="checkbox" class="make-switch" @if($is_user_rand_port) checked @endif id="is_user_rand_port" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                            <span class="help-block"> 用户可以自定义端口 </span>
                                                        </div>
                                                    </div>
                                                    -->
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="default_days" class="col-md-3 control-label">默认有效期</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="default_days" value="{{$default_days}}" id="default_days" />
                                                                    <span class="input-group-addon">天</span>
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setDefaultDays()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 用户注册时、批量生成用户时的有效期，为0即当天到期 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="default_traffic" class="col-md-3 control-label">默认流量</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="default_traffic" value="{{$default_traffic}}" id="default_traffic" />
                                                                    <span class="input-group-addon">MiB</span>
                                                                    <span class="input-group-btn">
                                                                    <button class="btn btn-success" type="button" onclick="setDefaultTraffic()">修改</button>
                                                                </span>
                                                                </div>
                                                                <span class="help-block"> 用户注册时、批量生成用户时可用流量 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="invite_num" class="col-md-3 control-label">可生成邀请码数</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="invite_num" value="{{$invite_num}}" id="invite_num" />
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setInviteNum()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 用户注册时、批量生成用户时可以生成的邀请码数 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="reset_password_times" class="col-md-3 control-label">重置密码次数</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="reset_password_times" value="{{$reset_password_times}}" id="reset_password_times" />
                                                                    <span class="input-group-btn">
                                                                    <button class="btn btn-success" type="button" onclick="setResetPasswordTimes()">修改</button>
                                                                </span>
                                                                </div>
                                                                <span class="help-block"> 24小时内可以通过邮件重置密码次数 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="active_times" class="col-md-3 control-label">激活账号次数</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="active_times" value="{{$active_times}}" id="active_times" />
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setActiveTimes()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 24小时内可以通过邮件激活账号次数 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="register_ip_limit" class="col-md-3 control-label">同IP注册限制</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="register_ip_limit" value="{{$register_ip_limit}}" id="register_ip_limit" />
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setRegisterIpLimit()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 同IP在24小时内允许注册数量，为0时不限制 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="subscribe_domain" class="col-md-3 control-label">通用订阅地址</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="subscribe_domain" value="{{$subscribe_domain}}" id="subscribe_domain" />
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setSubscribeDomain()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> （推荐）防止面板域名被DNS投毒后无法正常订阅，需带http://或https://，无法通过该域名访问网站 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="subscribe_max" class="col-md-3 control-label">订阅节点数</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="subscribe_max" value="{{$subscribe_max}}" id="subscribe_max" />
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setSubscribeMax()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 客户端订阅时取得几个节点，为0时返回全部节点 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="website_callback_url" class="col-md-3 control-label">通用支付回调地址</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="website_callback_url" value="{{$website_callback_url}}" id="website_callback_url"/>
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setWebsiteCallbackUrl()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> （推荐）防止因为面板域名被投毒后导致支付无法正常进行回调，需带http://或https:// </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="default_speed_limit" class="col-md-3 control-label">默认限速值</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" name="default_speed_limit" id="default_speed_limit">
                                                                    <option value="0" @if($default_speed_limit == '0') selected @endif>不限速</option>
                                                                    <option value="131072" @if($default_speed_limit == '131072') selected @endif>1Mbps</option>
                                                                    <option value="262144" @if($default_speed_limit == '262144') selected @endif>2Mbps</option>
                                                                    <option value="393216" @if($default_speed_limit == '393216') selected @endif>3Mbps</option>
                                                                    <option value="524288" @if($default_speed_limit == '524288') selected @endif>4Mbps</option>
                                                                    <option value="655360" @if($default_speed_limit == '655360') selected @endif>5Mbps</option>
                                                                    <option value="1048576" @if($default_speed_limit == '1048576') selected @endif>8Mbps</option>
                                                                    <option value="1310720" @if($default_speed_limit == '1310720') selected @endif>10Mbps</option>
                                                                    <option value="2621440" @if($default_speed_limit == '2621440') selected @endif>20Mbps</option>
                                                                    <option value="3932160" @if($default_speed_limit == '3932160') selected @endif>30Mbps</option>
                                                                    <option value="5242880" @if($default_speed_limit == '5242880') selected @endif>40Mbps</option>
                                                                    <option value="6553600" @if($default_speed_limit == '6553600') selected @endif>50Mbps</option>
                                                                    <option value="10485760" @if($default_speed_limit == '10485760') selected @endif>80Mbps</option>
                                                                    <option value="13107200" @if($default_speed_limit == '13107200') selected @endif>100Mbps</option>
                                                                    <option value="26214400" @if($default_speed_limit == '26214400') selected @endif>200Mbps</option>
                                                                    <option value="39321600" @if($default_speed_limit == '39321600') selected @endif>300Mbps</option>
                                                                    <option value="65536000" @if($default_speed_limit == '65536000') selected @endif>500Mbps</option>
                                                                    <option value="134217728" @if($default_speed_limit == '134217728') selected @endif>1Gbps</option>
                                                                </select>
                                                                <span class="help-block"> 举例：100Mbps的下载速度约为12.5MB/s </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="user_invite_days" class="col-md-3 control-label">邀请码有效期（用户）</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="user_invite_days" value="{{$user_invite_days}}" id="user_invite_days" />
                                                                    <span class="input-group-addon">天</span>
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setUserInviteDays()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 用户自行生成邀请的有效期 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="admin_invite_days" class="col-md-3 control-label">邀请码有效期（管理员）</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="admin_invite_days" value="{{$admin_invite_days}}" id="admin_invite_days" />
                                                                    <span class="input-group-addon">天</span>
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setAdminInviteDays()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 管理员生成邀请码的有效期 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="mix_subscribe" class="col-md-3 control-label">混合订阅</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($mix_subscribe) checked @endif id="mix_subscribe" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 启用后，订阅信息中将包含V2Ray节点信息（仅支持Shadowrocket、Quantumult、v2rayN） </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="subscribe_default_node" class="col-md-3 control-label">订阅默认节点</label>
                                                            <div class="col-md-9">
                                                                <select id="subscribe_default_node" class="form-control select2" name="subscribe_default_node">
                                                                    <option value="0">不设置</option>
                                                                    @foreach($nodeList as $node)
                                                                        <option value="{{$node->id}}" @if($subscribe_default_node == $node->id) selected @endif>{{$node->id . ' - ' . $node->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="help-block"> 过期时间、剩余流量、自定义信息默认使用的节点配置 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_show_subscribe_expire" class="col-md-3 control-label">订阅加过期时间</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($is_show_subscribe_expire) checked @endif id="is_show_subscribe_expire" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 启用后，订阅信息顶部将显示过期时间 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_show_subscribe_traffic" class="col-md-3 control-label">订阅加剩余流量</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($is_show_subscribe_traffic) checked @endif id="is_show_subscribe_traffic" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 启用后，订阅信息顶部将显示剩余流量 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_show_subscribe_level" class="col-md-3 control-label">订阅加节点等级</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($is_show_subscribe_level) checked @endif id="is_show_subscribe_level" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 启用后，订阅时节点前显示节点等级并且优先按等级排序 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="subscribe_custom_words" class="col-md-3 control-label">订阅加自定义信息</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="subscribe_custom_words" value="{{$subscribe_custom_words}}" id="subscribe_custom_words" />
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setSubscribeCustomWords()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 非空时，订阅时展示自定义信息 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="tab_3">
                                            <form action="#" method="post" class="form-horizontal">
                                                <div class="portlet-body">
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_checkin" class="col-md-3 control-label">签到加流量</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($is_checkin) checked @endif id="is_checkin" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 登录时将根据流量范围随机得到流量 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="traffic_limit_time" class="col-md-3 control-label">时间间隔</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="traffic_limit_time" value="{{$traffic_limit_time}}" id="traffic_limit_time" />
                                                                    <span class="input-group-addon">分钟</span>
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setTrafficLimitTime()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 间隔多久才可以再次签到 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label class="col-md-3 control-label">流量范围</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group input-large input-daterange">
                                                                    <input type="text" class="form-control" name="min_rand_traffic" value="{{$min_rand_traffic}}" id="min_rand_traffic">
                                                                    <span class="input-group-addon"> ~ </span>
                                                                    <input type="text" class="form-control" name="max_rand_traffic" value="{{$max_rand_traffic}}" id="max_rand_traffic">
                                                                </div>
                                                                <span class="help-block"> 单位：M </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="tab_4">
                                            <form action="#" method="post" class="form-horizontal">
                                                <div class="portlet-body">
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="referral_status" class="col-md-3 control-label">本功能</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($referral_status) checked @endif id="referral_status" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 关闭后用户不可见，但是不影响其正常邀请返利 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="referral_traffic" class="col-md-3 control-label">注册送流量</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="referral_gift_traffic" value="{{$referral_traffic}}" id="referral_traffic" />
                                                                    <span class="input-group-addon">MiB</span>
                                                                    <span class="input-group-btn">
                                                                    <button class="btn btn-success" type="button" onclick="setReferralTraffic()">修改</button>
                                                                </span>
                                                                </div>
                                                                <span class="help-block"> 根据推广链接、邀请码注册则赠送相应的流量 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="referral_percent" class="col-md-3 control-label">返利比例</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="referral_percent" value="{{$referral_percent * 100}}" id="referral_percent" />
                                                                    <span class="input-group-addon">%</span>
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setReferralPercent()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 根据推广链接注册的账号每笔消费推广人可以分成的比例 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="referral_money" class="col-md-3 control-label">提现限制</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="referral_money" value="{{$referral_money}}" id="referral_money" />
                                                                    <span class="input-group-addon">元</span>
                                                                    <span class="input-group-btn">
                                                                    <button class="btn btn-success" type="button" onclick="setReferralMoney()">修改</button>
                                                                </span>
                                                                </div>
                                                                <span class="help-block"> 满多少元才可以申请提现 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="tab_5">
                                            <form action="#" method="post" class="form-horizontal">
                                                <div class="portlet-body">
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="expire_warning" class="col-md-3 control-label">用户过期警告</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($expire_warning) checked @endif id="expire_warning" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 启用后账号距到期还剩阈值设置的值时自动发邮件提醒用户 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="expire_days" class="col-md-3 control-label">过期警告阈值</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="expire_days" value="{{$expire_days}}" id="expire_days" />
                                                                    <span class="input-group-addon">天</span>
                                                                    <span class="input-group-btn">
                                                                    <button class="btn btn-success" type="button" onclick="setExpireDays()">修改</button>
                                                                </span>
                                                                </div>
                                                                <span class="help-block"> 账号距离过期还差多少天时发警告邮件 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="traffic_warning" class="col-md-3 control-label">用户流量警告</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($traffic_warning) checked @endif id="traffic_warning" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 启用后账号已使用流量超过警告阈值时自动发邮件提醒用户 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="traffic_warning_percent" class="col-md-3 control-label">流量警告阈值</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="traffic_warning_percent" value="{{$traffic_warning_percent}}" id="traffic_warning_percent" />
                                                                    <span class="input-group-addon">%</span>
                                                                    <span class="input-group-btn">
                                                                    <button class="btn btn-success" type="button" onclick="setTrafficWarningPercent()">修改</button>
                                                                </span>
                                                                </div>
                                                                <span class="help-block"> 建议设置在70%~90% </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_node_crash_warning" class="col-md-3 control-label">节点离线提醒</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($is_node_crash_warning) checked @endif id="is_node_crash_warning" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 启用后如果节点离线则推送提醒 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="node_crash_warning_times" class="col-md-3 control-label">节点离线提醒</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="node_crash_warning_times" value="{{$node_crash_warning_times}}" id="node_crash_warning_times" placeholder="" autocomplete="off" />
                                                                    <span class="input-group-addon">次</span>
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setNodeCrashWarningTimes()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 提醒几次后不再提醒，为0时不限制，不超过60 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_tcp_check" class="col-md-3 control-label">TCP阻断检测</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($is_tcp_check) checked @endif id="is_tcp_check" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 每30~60分钟内随机检测节点是否被TCP阻断并提醒 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="tcp_check_warning_times" class="col-md-3 control-label">阻断检测提醒</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="tcp_check_warning_times" value="{{$tcp_check_warning_times}}" id="tcp_check_warning_times" placeholder="" />
                                                                    <span class="input-group-addon">次</span>
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setTcpCheckWarningTimes()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 提醒几次后自动下线节点，为0时不限制，不超过12 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_server_chan" class="col-md-3 control-label">ServerChan</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($is_server_chan) checked @endif id="is_server_chan" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 推送节点离线提醒、用户流量异常警告、节点使用报告、用户发起的工单（<a href="http://sc.ftqq.com" target="_blank">绑定微信</a>） </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="server_chan_key" class="col-md-3 control-label">SCKEY</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="server_chan_key" value="{{$server_chan_key}}" id="server_chan_key" placeholder="请到ServerChan申请" />
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setServerChanKey()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 启用ServerChan，请务必填入本值（<a href="http://sc.ftqq.com" target="_blank">申请SCKEY</a>） </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_bark" class="col-md-3 control-label">Bark</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($is_bark) checked @endif id="is_bark" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 推送消息到iOS设备，需要在iOS设备里装一个名为Bark的应用，功能同ServerChan </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="bark_device" class="col-md-3 control-label">Bark设备号</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="bark_device" value="{{$bark_device}}" id="bark_device" placeholder="安装并打开Bark后取得" />
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setBarkDevice()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 启用Bark，请务必填入本值（<a href="javascript:sendBarkTestMessage();">发送测试消息</a>） </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_telegram" class="col-md-3 control-label">Telegram</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($is_telegram) checked @endif id="is_telegram" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> Telegram消息推送机器人，功能同ServerChan </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="telegram_token" class="col-md-3 control-label">Telegram Token</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="telegram_token" value="{{$telegram_token}}" id="telegram_token" placeholder="" />
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setTelegramToken()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 搜索 @BotFather，申请一个Bot </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="telegram_chatid" class="col-md-3 control-label">Telegram ChatID</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="telegram_chatid" value="{{$telegram_chatid}}" id="telegram_chatid" placeholder="" />
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setTelegramChatID()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 搜索 @get_id_bot 这个机器人，它会自动把你的Chat ID发给你 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="tab_6">
                                            <form action="#" method="post" class="form-horizontal">
                                                <div class="portlet-body">
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_clear_log" class="col-md-3 control-label">自动清除日志</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($is_clear_log) checked @endif id="is_clear_log" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> （推荐）启用后自动清除无用日志 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="reset_traffic" class="col-md-3 control-label">流量自动重置</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($reset_traffic) checked @endif id="reset_traffic" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 用户会按其购买套餐的日期自动重置可用流量 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_subscribe_ban" class="col-md-3 control-label">订阅异常自动封禁</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($is_subscribe_ban) checked @endif id="is_subscribe_ban" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 启用后用户订阅链接请求超过设定阈值则自动封禁 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="subscribe_ban_times" class="col-md-3 control-label">订阅请求阈值</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="subscribe_ban_times" value="{{$subscribe_ban_times}}" id="subscribe_ban_times" />
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setSubscribeBanTimes()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 24小时内订阅链接请求次数限制 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_traffic_ban" class="col-md-3 control-label">流量异常自动封禁</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($is_traffic_ban) checked @endif id="is_traffic_ban" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 30分钟内流量超过异常阈值则自动封禁代理 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="traffic_ban_value" class="col-md-3 control-label">流量异常阈值</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="traffic_ban_value" value="{{$traffic_ban_value}}" id="traffic_ban_value" />
                                                                    <span class="input-group-addon">GiB</span>
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setTrafficBanValue()">修改</button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="traffic_ban_time" class="col-md-3 control-label">封号时长</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="traffic_ban_time" value="{{$traffic_ban_time}}" id="traffic_ban_time" />
                                                                    <span class="input-group-addon">分钟</span>
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setTrafficBanTime()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 触发流量异常导致用户被封禁代理的时长，到期后自动解封 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="auto_release_port" class="col-md-3 control-label">端口自动释放</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($auto_release_port) checked @endif id="auto_release_port" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                                <span class="help-block"> 被封禁和过期一个月的用户端口自动释放 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="is_ban_status" class="col-md-3 control-label">过期自动封禁</label>
                                                            <div class="col-md-9">
                                                                <input type="checkbox" class="make-switch" @if($is_ban_status) checked @endif id="is_ban_status" data-on-color="danger" data-off-color="danger" data-on-text="封禁整个账号" data-off-text="仅封禁代理">
                                                                <span class="help-block"> (慎重)封禁整个账号会重置账号的所有数据且会导致用户无法登录 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="node_daily_report" class="col-md-3 control-label">节点使用报告</label>
                                                            <div class="col-md-9">
                                                            <input type="checkbox" class="make-switch" @if($node_daily_report) checked @endif id="node_daily_report" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                            <span class="help-block"> 每天早上9点推送昨天节点的使用情况 </span>
                                                        </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="tab_7">
                                            <form action="#" method="post" class="form-horizontal">
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <label for="payment_gateway" class="col-md-3 control-label">在线支付网关</label>
                                                        <div class="col-md-6">
                                                            <select class="form-control select2" name="payment_gateway" id="payment_gateway">
                                                                <option value="0" @if($payment_gateway == '0') selected @endif>不启用</option>
                                                                <option value="2" @if($payment_gateway == '2') selected @endif>码支付</option>
                                                                <option value="3" @if($payment_gateway == '3') selected @endif>易支付</option>
                                                                <option value="4" @if($payment_gateway == '4') selected @endif>支付宝国际</option>
                                                                <option value="5" @if($payment_gateway == '5') selected @endif>当面付</option>
                                                            </select>
                                                            <span class="help-block"> 选择完支付网关后需要配置支付网关信息 </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="portlet box blue">
                                                    <div class="portlet-title">
                                                        <div class="caption"> 码支付 </div>
                                                        <div class="tools">
                                                            <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body" style="padding-top: 20px;">
                                                        <div class="form-group">
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label class="col-md-3 control-label">开通</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> 请到 <a href="https://codepay.fateqq.com/i/377289">码支付</a> 申请账号，然后下载登录其挂机软件 </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label for="codepay_url" class="col-md-3 control-label">码支付URL</label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="text" name="codepay_url" value="{{$codepay_url}}" id="codepay_url" />
                                                                        <span class="input-group-btn">
                                                                            <button class="btn btn-success" type="button" onclick="setCodepayUrl()">修改</button>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label for="codepay_id" class="col-md-3 control-label">码支付ID</label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="text" name="codepay_id" value="{{$codepay_id}}" id="codepay_id" />
                                                                        <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setCodepayId()">修改</button>
                                                                    </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label for="codepay_key" class="col-md-3 control-label">码支付通信密钥</label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="text" name="codepay_key" value="{{$codepay_key}}" id="codepay_key" />
                                                                        <span class="input-group-btn">
                                                                            <button class="btn btn-success" type="button" onclick="setCodepayKey()">修改</button>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="portlet box blue">
                                                    <div class="portlet-title">
                                                        <div class="caption"> 易支付 </div>
                                                        <div class="tools">
                                                            <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body" style="padding-top: 20px;">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="alert alert-info" style="text-align: center;">
                                                                    本接口适配彩虹易支付及其常见衍生版（<a href="https://t.me/pandatom" target="_blank" style="color:red;">特殊定制请联系我</a>）<br />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label class="col-md-3 control-label">广告位</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> <a href="https://t.me/pandatom" target="_blank" style="color:red;">￥800/月</a> </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label for="epay_url" class="col-md-3 control-label">支付商URL</label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="text" name="epay_url" value="{{$epay_url}}" id="epay_url" placeholder="http://xxx.com/submit.php" />
                                                                        <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setEpayUrl()">修改</button>
                                                                    </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label for="epay_mch_id" class="col-md-3 control-label">商户ID</label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="text" name="epay_mch_id" value="{{$epay_mch_id}}" id="epay_mch_id" />
                                                                        <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setEpayMchId()">修改</button>
                                                                    </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label for="epay_key" class="col-md-3 control-label">商户签名</label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="text" name="epay_key" value="{{$epay_key}}" id="epay_key" />
                                                                        <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setEpayKey()">修改</button>
                                                                    </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="portlet box blue">
                                                    <div class="portlet-title">
                                                        <div class="caption"> 支付宝国际 </div>
                                                        <div class="tools">
                                                            <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body" style="padding-top: 20px;">
                                                        <div class="form-group">
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label class="col-md-3 control-label">开通</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> 请到 <a href="https://global.alipay.com/" target="_blank">支付宝国际</a> 申请 partner 和 key </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label for="alipay_currency" class="col-md-3 control-label">结算币种</label>
                                                                <div class="col-md-9">
                                                                    <select id="alipay_currency" class="form-control select2" name="alipay_currency">
                                                                        <option value="USD" @if($alipay_currency == 'USD') selected @endif>美元</option>
                                                                        <option value="HKD" @if($alipay_currency == 'HKD') selected @endif>港币</option>
                                                                        <option value="JPY" @if($alipay_currency == 'JPY') selected @endif>日元</option>
                                                                        <option value="EUR" @if($alipay_currency == 'EUR') selected @endif>欧元</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label for="alipay_sign_type" class="col-md-3 control-label">加密方式</label>
                                                                <div class="col-md-9">
                                                                    <select id="alipay_sign_type" class="form-control select2" name="alipay_sign_type">
                                                                        <option value="MD5" @if($alipay_sign_type == 'MD5') selected @endif>MD5</option>
                                                                        <option value="RSA" @if($alipay_sign_type == 'RSA') selected @endif>RSA</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label for="alipay_transport" class="col-md-3 control-label">启用SSL验证</label>
                                                                <div class="col-md-9">
                                                                    <select id="alipay_transport" class="form-control select2" name="alipay_transport">
                                                                        <option value="http" @if($alipay_transport == 'http') selected @endif>否</option>
                                                                        <option value="https" @if($alipay_transport == 'https') selected @endif>是</option>
                                                                    </select>
                                                                    <span class="help-block"> HTTPS站点需启用 </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label for="alipay_partner" class="col-md-3 control-label">partner</label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="text" name="alipay_partner" value="{{$alipay_partner}}" id="alipay_partner" />
                                                                        <span class="input-group-btn">
                                                                            <button class="btn btn-success" type="button" onclick="setAlipayPartner()">修改</button>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label for="alipay_key" class="col-md-3 control-label">key</label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="password" name="alipay_key" value="{{$alipay_key}}" id="alipay_key" />
                                                                        <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setAlipayKey()">修改</button>
                                                                    </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label for="alipay_private_key" class="col-md-3 control-label">RSA私钥</label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="password" name="alipay_private_key" value="{{$alipay_private_key}}" id="alipay_private_key" />
                                                                        <span class="input-group-btn">
                                                                            <button class="btn btn-success" type="button" onclick="setAlipayPrivateKey()">修改</button>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label for="alipay_public_key" class="col-md-3 control-label">RSA公钥</label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="password" name="alipay_public_key" value="{{$alipay_public_key}}" id="alipay_public_key" />
                                                                        <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setAlipayPublicKey()">修改</button>
                                                                    </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="portlet box blue">
                                                    <div class="portlet-title">
                                                        <div class="caption"> 当面付 </div>
                                                        <div class="tools">
                                                            <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body" style="padding-top: 20px;">
                                                        <div class="form-group">
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label class="col-md-3 control-label">开通</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> 请到 <a href="https://open.alipay.com/platform/home.htm" target="_blank">蚂蚁金服开放平台</a> 申请权限及应用 </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label for="alipay_partner" class="col-md-3 control-label">应用ID</label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="text" name="f2fpay_app_id" value="{{$f2fpay_app_id}}" id="f2fpay_app_id"/>
                                                                        <span class="input-group-btn">
                                                                            <button class="btn btn-success" type="button" onclick="setF2fpayAppId()">修改</button>
                                                                        </span>
                                                                    </div>
                                                                    <span class="help-block"> 即：APPID </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label for="alipay_private_key"
                                                                        class="col-md-3 control-label">RSA私钥</label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="text" name="f2fpay_private_key" value="{{$f2fpay_private_key}}" id="f2fpay_private_key"/>
                                                                        <span class="input-group-btn">
                                                                            <button class="btn btn-success" type="button" onclick="setF2fpayPrivateKey()">修改</button>
                                                                        </span>
                                                                    </div>
                                                                    <span class="help-block"> 即：rsa_private_key，不包括首尾格式 </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label for="alipay_public_key"
                                                                        class="col-md-3 control-label">支付宝公钥</label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="text" name="f2fpay_public_key" value="{{$f2fpay_public_key}}" id="f2fpay_public_key"/>
                                                                        <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setF2fpayPublicKey()">修改</button>
                                                                    </span>
                                                                    </div>
                                                                    <span class="help-block"> 注意不是RSA公钥 </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label for="f2fpay_subject_name"
                                                                        class="col-md-3 control-label">自定义商品名称</label>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="text" name="f2fpay_subject_name" value="{{$f2fpay_subject_name}}" id="f2fpay_subject_name"/>
                                                                        <span class="input-group-btn">
                                                                            <button class="btn btn-success" type="button" onclick="setF2fpaySubjectName()">修改</button>
                                                                        </span>
                                                                    </div>
                                                                    <span class="help-block"> 用于在用户支付宝客户端显示 </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="tab_8">
                                            <form action="/admin/setExtend" method="post" enctype="multipart/form-data" class="form-horizontal" role="form" id="setExtend">
                                                {{csrf_field()}}
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <label class="control-label col-md-2 col-xs-4">首页LOGO</label>
                                                        <div class="col-md-8 col-xs-8">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                    @if ($website_home_logo)
                                                                        <img src="{{$website_home_logo}}" alt="" />
                                                                    @else
                                                                        <img src="/assets/images/noimage.png" alt="" />
                                                                    @endif
                                                                </div>
                                                                <span class="help-block"> 推荐尺寸：300 X 90，透明背景 </span>
                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                <div>
                                                                    <span class="btn default btn-file">
                                                                        <span class="fileinput-new"> 选择 </span>
                                                                        <span class="fileinput-exists"> 更换 </span>
                                                                        <input type="file" name="website_home_logo" id="website_home_logo">
                                                                    </span>
                                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> 移除 </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <label class="control-label col-md-2 col-xs-4">站内LOGO</label>
                                                        <div class="col-md-8 col-xs-8">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                    @if ($website_logo)
                                                                        <img src="{{$website_logo}}" alt="" />
                                                                    @else
                                                                        <img src="/assets/images/noimage.png" alt="" />
                                                                    @endif
                                                                </div>
                                                                <span class="help-block"> 推荐尺寸：150 X 30，透明背景 </span>
                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                <div>
                                                                    <span class="btn default btn-file">
                                                                        <span class="fileinput-new"> 选择 </span>
                                                                        <span class="fileinput-exists"> 更换 </span>
                                                                        <input type="file" name="website_logo" id="website_logo">
                                                                    </span>
                                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> 移除 </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <label for="website_analytics" class=" control-label col-md-2 col-xs-4">统计代码</label>
                                                        <div class="col-md-8 col-xs-6">
                                                            <textarea class="form-control" rows="10" name="website_analytics" id="website_analytics">{{$website_analytics}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <label for="website_customer_service" class=" control-label col-md-2 col-xs-4">客服代码</label>
                                                        <div class="col-md-8 col-xs-6">
                                                            <textarea class="form-control" rows="10" name="website_customer_service" id="website_customer_service">{{$website_customer_service}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-offset-2 col-md-10">
                                                        <button type="submit" class="btn blue">提交</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="tab_geetest">
                                            <form action="#" method="post" class="form-horizontal">
                                                <div class="portlet-body">
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="alipay_private_key"
                                                            class="col-md-3 control-label">ID</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="geetest_id" value="{{$geetest_id}}" id="geetest_id"/>
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setGeetestId()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 本功能需要 <a href="https://auth.geetest.com/login/" target="_blank">极验后台</a> 申请权限及应用 </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="alipay_public_key"
                                                                   class="col-md-3 control-label">KEY</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="geetest_key" value="{{$geetest_key}}" id="geetest_key"/>
                                                                    <span class="input-group-btn">
                                                                    <button class="btn btn-success" type="button" onclick="setGeetestKey()">修改</button>
                                                                </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="tab_googleCaptcha">
                                            <form action="#" method="post" class="form-horizontal">
                                                <div class="portlet-body">
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="alipay_private_key"
                                                            class="col-md-3 control-label">网站密钥</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="google_captcha_sitekey" value="{{$google_captcha_sitekey}}" id="google_captcha_sitekey"/>
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-success" type="button" onclick="setGoogleCaptchaId()">修改</button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-block"> 本功能需要 <a href="https://www.google.com/recaptcha/admin" target="_blank">Google reCAPTCHA后台</a> 申请权限及应用 （申请需科学上网，日常验证不用） </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="alipay_public_key"
                                                                   class="col-md-3 control-label">密钥</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="google_captcha_secret" value="{{$google_captcha_secret}}" id="google_captcha_secret"/>
                                                                    <span class="input-group-btn">
                                                                    <button class="btn btn-success" type="button" onclick="setGoogleCaptchaKey()">修改</button>
                                                                </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PROFILE CONTENT -->
            </div>
        </div>
        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
@endsection
@section('script')
    <script src="/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        // 启用、禁用随机端口
        $('#is_rand_port').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_rand_port = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'is_rand_port',
                    value: is_rand_port
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 启用、禁用屏蔽大陆访问
        $('#is_forbid_china').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_forbid_china = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'is_forbid_china',
                    value: is_forbid_china
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 启用、禁用屏蔽海外访问
        $('#is_forbid_oversea').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_forbid_oversea = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'is_forbid_oversea',
                    value: is_forbid_oversea
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 启用、禁用机器人访问
        $('#is_forbid_robot').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_forbid_robot = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'is_forbid_robot',
                    value: is_forbid_robot
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 启用、禁用注册校验验证码
        $('#is_verify_register').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_verify_register = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'is_verify_register',
                    value: is_verify_register
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 启用、禁用自定义端口
        $('#is_user_rand_port').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_user_rand_port = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'is_user_rand_port',
                    value: is_user_rand_port
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 启用、禁用登录加积分
        $('#is_checkin').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_checkin = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'is_checkin',
                    value: is_checkin
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 启用、禁用注册
        $('#is_register').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_register = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'is_register',
                    value: is_register
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 启用、可选、禁用邀请注册
        $('#is_invite_register').change(function () {
            var is_invite_register = $(this).val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'is_invite_register',
                value: is_invite_register
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        });

        // 注册限制模式
        $('#is_register_type').change(function () {
            var is_register_type = $(this).val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'is_register_type',
                value: is_register_type
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        });

        // 启用、禁用用户重置密码
        $('#is_reset_password').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_reset_password = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'is_reset_password',
                    value: is_reset_password
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 启用、禁用验证码
        $('#is_captcha').change(function () {
            var is_captcha = $(this).val();
            toggleCaptchaTab(is_captcha);

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'is_captcha',
                value: is_captcha
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        });

        // 启用、禁用免费邀请码
        $('#is_free_code').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_free_code = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'is_free_code',
                    value: is_free_code
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 启用、禁用用户激活用户
        $('#is_active_register').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_active_register = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'is_active_register',
                    value: is_active_register
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 启用、禁用用户到期自动邮件提醒
        $('#expire_warning').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var expire_warning = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'expire_warning',
                    value: expire_warning
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 启用、禁用节点离线发件提醒管理员
        $('#is_node_crash_warning').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_node_crash_warning = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'is_node_crash_warning',
                    value: is_node_crash_warning
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 启用、禁用节点离线发ServerChan微信消息提醒
        $('#is_server_chan').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_server_chan = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'is_server_chan',
                    value: is_server_chan
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // Bark消息推送
        $('#is_bark').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_bark = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'is_bark',
                    value: is_bark
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // Telegram消息推送
        $('#is_telegram').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_telegram = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'is_telegram',
                    value: is_telegram
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 启用、禁用Namesilo
        $('#is_namesilo').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_namesilo = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'is_namesilo',
                    value: is_namesilo
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 启用、禁用混合订阅
        $('#mix_subscribe').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var mix_subscribe = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'mix_subscribe',
                    value: mix_subscribe
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 订阅默认节点
        $('#subscribe_default_node').change(function () {
            var subscribe_default_node = $(this).val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'subscribe_default_node',
                value: subscribe_default_node
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        });

        // 订阅时是否显示过期时间
        $('#is_show_subscribe_expire').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_show_subscribe_expire = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'is_show_subscribe_expire',
                    value: is_show_subscribe_expire
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 订阅时是否显示剩余流量
        $('#is_show_subscribe_traffic').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_show_subscribe_traffic = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'is_show_subscribe_traffic',
                    value: is_show_subscribe_traffic
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 启用、禁用订阅时显示节点等级
        $('#is_show_subscribe_level').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_show_subscribe_level = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'is_show_subscribe_level',
                    value: is_show_subscribe_level
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 订阅时展示自定义内容
        function setSubscribeCustomWords() {
            var subscribe_custom_words = $("#subscribe_custom_words").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'subscribe_custom_words',
                value: subscribe_custom_words
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 启用、禁用TCP阻断探测
        $('#is_tcp_check').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_tcp_check = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'is_tcp_check',
                    value: is_tcp_check
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 启用、禁用订阅异常自动封禁
        $('#is_subscribe_ban').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_subscribe_ban = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'is_subscribe_ban',
                    value: is_subscribe_ban
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 启用、禁用退关返利用户可见与否
        $('#referral_status').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var referral_status = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'referral_status',
                    value: referral_status
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 启用、禁用随机端口
        $('#traffic_warning').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var traffic_warning = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'traffic_warning',
                    value: traffic_warning
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 启用、禁用随机端口
        $('#is_clear_log').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_clear_log = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'is_clear_log',
                    value: is_clear_log
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 启用、禁用流量自动重置
        $('#reset_traffic').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var reset_traffic = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'reset_traffic',
                    value: reset_traffic
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 启用、禁用流量异常自动封号
        $('#is_traffic_ban').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_traffic_ban = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'is_traffic_ban',
                    value: is_traffic_ban
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 启用、禁用端口自动释放
        $('#auto_release_port').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var auto_release_port = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'auto_release_port',
                    value: auto_release_port
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 启用、禁用节点使用报告
        $('#node_daily_report').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var node_daily_report = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'node_daily_report',
                    value: node_daily_report
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 过期封禁是否禁止账号
        $('#is_ban_status').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_ban_status = state ? 1 : 0;

                $.post("/admin/setConfig", {
                    _token: '{{csrf_token()}}',
                    name: 'is_ban_status',
                    value: is_ban_status
                }, function (ret) {
                    layer.msg(ret.message, {time: 1000}, function () {
                        if (ret.status == 'fail') {
                            window.location.reload();
                        }
                    });
                });
            }
        });

        // 流量异常阈值
        function setTrafficBanValue() {
            var traffic_ban_value = $("#traffic_ban_value").val();

            if (traffic_ban_value < 1) {
                layer.msg('不能小于1', {time: 1000});
                return;
            }

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'traffic_ban_value',
                value: traffic_ban_value
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置用户封号时长
        function setTrafficBanTime() {
            var traffic_ban_time = $("#traffic_ban_time").val();

            if (traffic_ban_time < 0) {
                layer.msg('不能小于0', {time: 1000});
                return;
            }

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'traffic_ban_time',
                value: traffic_ban_time
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置节点离线警告收件地址
        function setWebmasterEmail() {
            var webmaster_email = $("#webmaster_email").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'webmaster_email',
                value: webmaster_email
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置ServerChan的SCKEY
        function setServerChanKey() {
            var server_chan_key = $("#server_chan_key").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'server_chan_key',
                value: server_chan_key
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置bark设备号
        function setBarkDevice() {
            var bark_device = $("#bark_device").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'bark_device',
                value: bark_device
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置Telegram Token
        function setTelegramToken() {
            var telegram_token = $("#telegram_token").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'telegram_token',
                value: telegram_token
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置Telegram ChatID
        function setTelegramChatID() {
            var telegram_chatid = $("#telegram_chatid").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'telegram_chatid',
                value: telegram_chatid
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置Namesilo API KEY
        function setNamesiloKey() {
            var namesilo_key = $("#namesilo_key").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'namesilo_key',
                value: namesilo_key
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置节点离线提醒次数
        function setNodeCrashWarningTimes() {
            var node_crash_warning_times = $("#node_crash_warning_times").val();

            if (node_crash_warning_times < 0 || node_crash_warning_times > 60) {
                layer.msg('只能在0-60之间', {time: 1000});
                return;
            }

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'node_crash_warning_times',
                value: node_crash_warning_times
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置TCP阻断检测提醒次数
        function setTcpCheckWarningTimes() {
            var tcp_check_warning_times = $("#tcp_check_warning_times").val();

            if (tcp_check_warning_times < 0 || tcp_check_warning_times > 12) {
                layer.msg('只能在0-12之间', {time: 1000});
                return;
            }

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'tcp_check_warning_times',
                value: tcp_check_warning_times
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置订阅封禁阈值
        function setSubscribeBanTimes() {
            var subscribe_ban_times = $("#subscribe_ban_times").val();

            if (subscribe_ban_times < 0) {
                layer.msg('不能小于0', {time: 1000});
                return;
            }

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'subscribe_ban_times',
                value: subscribe_ban_times
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置码支付ID
        function setCodepayId() {
            var codepay_id = $("#codepay_id").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'codepay_id',
                value: codepay_id
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置码支付密钥
        function setCodepayKey() {
            var codepay_key = $("#codepay_key").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'codepay_key',
                value: codepay_key
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置码支付URL
        function setCodepayUrl() {
            var codepay_url = $("#codepay_url").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'codepay_url',
                value: codepay_url
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置alipay加密方式
        $('#alipay_sign_type').change(function () {
            var alipay_sign_type = $(this).val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'alipay_sign_type',
                value: alipay_sign_type
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        });

        // 设置alipay是否启用SSL验证
        $('#alipay_transport').change(function () {
            var alipay_transport = $(this).val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'alipay_transport',
                value: alipay_transport
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        });

        //设置alipay的partner
        function setAlipayPartner() {
            var alipay_partner = $("#alipay_partner").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'alipay_partner',
                value: alipay_partner
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        //设置alipay的key
        function setAlipayKey() {
            var alipay_key = $("#alipay_key").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'alipay_key',
                value: alipay_key
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        //设置alipay的私钥
        function setAlipayPrivateKey() {
            var alipay_private_key = $("#alipay_private_key").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'alipay_private_key',
                value: alipay_private_key
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        //设置alipay的公钥
        function setAlipayPublicKey() {
            var alipay_public_key = $("#alipay_public_key").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'alipay_public_key',
                value: alipay_public_key
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置alipay结算币种
        $('#alipay_currency').change(function () {
            var alipay_currency = $(this).val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'alipay_currency',
                value: alipay_currency
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        });

        // 设置f2fpay的应用id
        function setF2fpayAppId() {
            var f2fpay_app_id = $("#f2fpay_app_id").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'f2fpay_app_id',
                value: f2fpay_app_id
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置f2fpay的私钥
        function setF2fpayPrivateKey() {
            var f2fpay_private_key = $("#f2fpay_private_key").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'f2fpay_private_key',
                value: f2fpay_private_key
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置f2fpay的公钥
        function setF2fpayPublicKey() {
            var f2fpay_public_key = $("#f2fpay_public_key").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'f2fpay_public_key',
                value: f2fpay_public_key
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 自动去除公钥和私钥中的空格和换行
        $("#alipay_public_key,#alipay_private_key,#f2fpay_public_key,#f2fpay_private_key").on('input', function () {
            $(this).val($(this).val().replace(/(\s+)/g, ''));
        });

        // 设置f2fpay的商品名称
        function setF2fpaySubjectName() {
            var f2fpay_subject_name = $("#f2fpay_subject_name").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'f2fpay_subject_name',
                value: f2fpay_subject_name
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置易支付支付商URL
        function setEpayUrl() {
            var epay_url = $("#epay_url").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'epay_url',
                value: epay_url
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置易支付商户ID
        function setEpayMchId() {
            var epay_mch_id = $("#epay_mch_id").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'epay_mch_id',
                value: epay_mch_id
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置易支付商户签名
        function setEpayKey() {
            var epay_key = $("#epay_key").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'epay_key',
                value: epay_key
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置极验的Id
        function setGeetestId() {
            var geetest_id = $("#geetest_id").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'geetest_id',
                value: geetest_id
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置极验的Key
        function setGeetestKey() {
            var geetest_key = $("#geetest_key").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'geetest_key',
                value: geetest_key
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置Google reCAPTCHA的Id
        function setGoogleCaptchaId() {
            var google_captcha_sitekey = $("#google_captcha_sitekey").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'google_captcha_sitekey',
                value: google_captcha_sitekey
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置Google reCAPTCHA的Key
        function setGoogleCaptchaKey() {
            var google_captcha_secret = $("#google_captcha_secret").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'google_captcha_secret',
                value: google_captcha_secret
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 隐藏未选择的验证码Tab
        function toggleCaptchaTab(captcha){
            var is_captcha = captcha ? parseInt(captcha) : {{\App\Components\Helpers::systemConfig()['is_captcha']}};

            switch (is_captcha) {
                case 2:
                    $('.tab_captcha').hide().parent().find('#li_tab_geetest').show();
                    break;
                case 3:
                    $('.tab_captcha').hide().parent().find('#li_tab_googleCaptcha').show();
                    break;
                default:
                    $('.tab_captcha').hide();
                    break;
            }
        }
        toggleCaptchaTab();

        // 设置最小积分
        $("#min_rand_traffic").change(function () {
            var min_rand_traffic = $(this).val();
            var max_rand_traffic = $("#max_rand_traffic").val();

            if (parseInt(min_rand_traffic) < 0) {
                layer.msg('最小积分值不能小于0', {time: 1000});
                return;
            }

            if (parseInt(min_rand_traffic) >= parseInt(max_rand_traffic)) {
                layer.msg('最小积分值必须小于最大积分值', {time: 1000});
                return;
            }

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'min_rand_traffic',
                value: min_rand_traffic
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        });

        // 设置最大积分
        $("#max_rand_traffic").change(function () {
            var min_rand_traffic = $("#min_rand_traffic").val();
            var max_rand_traffic = $(this).val();

            if (parseInt(max_rand_traffic) > 99999) {
                layer.msg('最大积分值不能大于99999', {time: 1000});
                return;
            }

            if (parseInt(min_rand_traffic) >= parseInt(max_rand_traffic)) {
                layer.msg('最大积分值必须大于最小积分值', {time: 1000});
                return;
            }

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'max_rand_traffic',
                value: max_rand_traffic
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        });

        // 设置最小端口
        $("#min_port").change(function () {
            var min_port = $(this).val();
            var max_port = $("#max_port").val();

            // 最大端口必须大于最小端口
            if (parseInt(max_port) <= parseInt(min_port)) {
                layer.msg('必须小于最大端口', {time: 1000});
                return;
            }

            if (parseInt(min_port) < 1000) {
                layer.msg('最小端口不能小于1000', {time: 1000});
                return;
            }

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'min_port',
                value: min_port
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        });

        // 设置最大端口
        $("#max_port").change(function () {
            var min_port = $("#min_port").val();
            var max_port = $(this).val();

            // 最大端口必须大于最小端口
            if (parseInt(max_port) <= parseInt(min_port)) {
                layer.msg('必须大于最小端口', {time: 1000});
                return;
            }

            if (parseInt(max_port) > 65535) {
                layer.msg('最大端口不能大于65535', {time: 1000});
                return;
            }

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'max_port',
                value: max_port
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        });

        // 设置注册时默认有效期
        function setDefaultDays() {
            var default_days = parseInt($("#default_days").val());

            if (default_days < 0) {
                layer.msg('不能小于0', {time: 1000});
                return;
            }

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'default_days',
                value: default_days
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置注册时默认流量
        function setDefaultTraffic() {
            var default_traffic = parseInt($("#default_traffic").val());

            if (default_traffic < 0) {
                layer.msg('不能小于0', {time: 1000});
                return;
            }

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'default_traffic',
                value: default_traffic
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置可生成邀请码数量
        function setInviteNum() {
            var invite_num = parseInt($("#invite_num").val());

            if (invite_num < 0) {
                layer.msg('不能小于0', {time: 1000});
                return;
            }

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'invite_num',
                value: invite_num
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置重置密码次数
        function setResetPasswordTimes() {
            var reset_password_times = $("#reset_password_times").val();

            if (reset_password_times < 0) {
                layer.msg('不能小于0', {time: 1000});
                return;
            }

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'reset_password_times',
                value: reset_password_times
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置激活用户次数
        function setActiveTimes() {
            var active_times = parseInt($("#active_times").val());

            if (active_times < 0) {
                layer.msg('不能小于0', {time: 1000});
                return;
            }

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'active_times',
                value: active_times
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置节点订阅地址
        function setSubscribeDomain() {
            var subscribe_domain = $("#subscribe_domain").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'subscribe_domain',
                value: subscribe_domain
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置节点订阅随机展示节点数
        function setRegisterIpLimit() {
            var register_ip_limit = parseInt($("#register_ip_limit").val());

            if (register_ip_limit < 0) {
                layer.msg('不能小于0', {time: 1000});
                return;
            }

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'register_ip_limit',
                value: register_ip_limit
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置节点订阅随机展示节点数
        function setSubscribeMax() {
            var subscribe_max = parseInt($("#subscribe_max").val());

            if (subscribe_max < 0) {
                layer.msg('不能小于0', {time: 1000});
                return;
            }

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'subscribe_max',
                value: subscribe_max
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置用户生成邀请码有效期
        function setUserInviteDays() {
            var user_invite_days = parseInt($("#user_invite_days").val());

            if (user_invite_days <= 0) {
                layer.msg('必须大于0', {time: 1000});
                return;
            }

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'user_invite_days',
                value: user_invite_days
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置管理员生成邀请码有效期
        function setAdminInviteDays() {
            var admin_invite_days = parseInt($("#admin_invite_days").val());

            if (admin_invite_days <= 0) {
                layer.msg('必须大于0', {time: 1000});
                return;
            }

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'admin_invite_days',
                value: admin_invite_days
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置流量警告阈值
        function setTrafficWarningPercent() {
            var traffic_warning_percent = $("#traffic_warning_percent").val();

            if (traffic_warning_percent < 0) {
                layer.msg('不能小于0', {time: 1000});
                return;
            }

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'traffic_warning_percent',
                value: traffic_warning_percent
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置用户过期提醒阈值
        function setExpireDays() {
            var expire_days = parseInt($("#expire_days").val());

            if (expire_days < 0) {
                layer.msg('不能小于0', {time: 1000});
                return;
            }

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'expire_days',
                value: expire_days
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置网站名称
        function setWebsiteName() {
            var website_name = $("#website_name").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'website_name',
                value: website_name
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置网站地址
        function setWebsiteUrl() {
            var website_url = $("#website_url").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'website_url',
                value: website_url
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 生成网站安全码
        function makeWebsiteSecurityCode() {
            $.get("/makeSecurityCode",  function(ret) {
                $("#website_security_code").val(ret);
            });
        }

        // 设置网站安全码
        function setWebsiteSecurityCode() {
            var website_security_code = $("#website_security_code").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'website_security_code',
                value: website_security_code
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置通用支付回调地址
        function setWebsiteCallbackUrl() {
            var website_callback_url = $("#website_callback_url").val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'website_callback_url',
                value: website_callback_url
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置默认限速值
        $('#default_speed_limit').change(function () {
            var default_speed_limit = $(this).val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'default_speed_limit',
                value: default_speed_limit
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        });

        // 设置支付网关
        $('#payment_gateway').change(function () {
            var payment_gateway = $(this).val();

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'payment_gateway',
                value: payment_gateway
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        });

        // 登录加积分的时间间隔
        function setTrafficLimitTime() {
            var traffic_limit_time = parseInt($("#traffic_limit_time").val());

            if (traffic_limit_time < 0) {
                layer.msg('不能小于0', {time: 1000});
                return;
            }

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'traffic_limit_time',
                value: traffic_limit_time
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置根据推广链接注册送流量
        function setReferralTraffic() {
            var referral_traffic = parseInt($("#referral_traffic").val());

            if (referral_traffic < 0) {
                layer.msg('不能小于0', {time: 1000});
                return;
            }

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'referral_traffic',
                value: referral_traffic
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置根据推广链接注册人每产生一笔消费，则推广人可以获得的返利比例
        function setReferralPercent() {
            var referral_percent = $("#referral_percent").val();

            if (referral_percent < 0) {
                layer.msg('不能小于0', {time: 1000});
                return;
            }

            if (referral_percent > 100) {
                layer.msg('不能大于100', {time: 1000});
                return;
            }

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'referral_percent',
                value: referral_percent
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 设置返利满多少元才可以提现
        function setReferralMoney() {
            var referral_money = $("#referral_money").val();

            if (referral_money < 0) {
                layer.msg('不能小于0', {time: 1000});
                return;
            }

            $.post("/admin/setConfig", {
                _token: '{{csrf_token()}}',
                name: 'referral_money',
                value: referral_money
            }, function (ret) {
                layer.msg(ret.message, {time: 1000}, function () {
                    if (ret.status == 'fail') {
                        window.location.reload();
                    }
                });
            });
        }

        // 发送Bark测试消息
        function sendBarkTestMessage()
        {
            $.post('/admin/sendBarkTestMessage', {_token:'{{csrf_token()}}'}, function(ret) {
                layer.msg("发送成功，请查看手机是否收到推送消息", {time: 1000});
            });
        }
    </script>
@endsection
