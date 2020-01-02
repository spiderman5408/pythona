@extends('admin.layouts')
@section('css')
    <link href="/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="padding-top:0;">
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="/admin/addNode" method="post" class="form-horizontal" onsubmit="return do_submit();">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <span class="caption-subject font-dark bold">基础信息</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="form-group">
                                                    <label for="is_relay" class="col-md-3 control-label">中转</label>
                                                    <div class="col-md-3">
                                                        <input type="checkbox" class="make-switch" id="is_relay" data-on-color="success" data-off-color="danger" data-on-text="是" data-off-text="否">
                                                    </div>
                                                    <label for="is_nat" class="col-md-2 control-label">NAT</label>
                                                    <div class="col-md-3">
                                                        <input type="checkbox" class="make-switch" id="is_nat" data-on-color="success" data-off-color="danger" data-on-text="是" data-off-text="否">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="is_dynamic" class="col-md-3 control-label">动态IP</label>
                                                    <div class="col-md-3">
                                                        <input type="checkbox" class="make-switch" id="is_dynamic" data-on-color="success" data-off-color="danger" data-on-text="是" data-off-text="否">
                                                    </div>
                                                    <label for="is_udp" class="col-md-2 control-label">UDP</label>
                                                    <div class="col-md-3">
                                                        <input type="checkbox" class="make-switch" id="is_udp" checked data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="禁用">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-md-3 control-label"> 节点名称 </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="name" id="name" placeholder="" autofocus required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="server" class="col-md-3 control-label"> 域名 </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="server" id="server" placeholder="填则优先显示，为动态IP、NAT时必填">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ip" class="col-md-3 control-label"> IPv4地址 </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="ip" id="ip" placeholder="必填" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ipv6" class="col-md-3 control-label"> IPv6地址 </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="ipv6" id="ipv6" placeholder="填则优先展示，级别高于IPv4">
                                                    </div>
                                                </div>
                                                <div class="form-group" id="relay-server" style="display: none;">
                                                    <label for="relay_server" class="col-md-3 control-label"> 落地地址 </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="relay_server" id="relay_server" placeholder="中转时必填，可以是域名或IPv4">
                                                        <span class="help-block">使用VNet后端时，通信消息将推送至此地址</span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ssh_port" class="col-md-3 control-label"> SSH端口 </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="ssh_port" value="22" id="ssh_port" placeholder="必填" required>
                                                        <span class="help-block">填错将导致TCP阻断检测误报</span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="traffic_rate" class="col-md-3 control-label"> 流量比例 </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="traffic_rate" value="1.0" id="traffic_rate" placeholder="" required>
                                                        <span class="help-block"> 举例：0.1用100M结算10M，5用100M结算500M </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="level" class="col-md-3 control-label">等级</label>
                                                    <div class="col-md-8">
                                                        <select id="level" class="form-control" name="level">
                                                            @foreach(config('common.level_map') as $key => $val)
                                                                <option value="{{$key}}">{{$val}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="speed_limit" class="col-md-3 control-label">限速</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="speed_limit" id="speed_limit">
                                                            <option value="0" @if(\App\Components\Helpers::systemConfig()['default_speed_limit'] == 0) selected @endif>不限速</option>
                                                            <option value="131072" @if(\App\Components\Helpers::systemConfig()['default_speed_limit'] == 131072) selected @endif>1Mbps</option>
                                                            <option value="262144" @if(\App\Components\Helpers::systemConfig()['default_speed_limit'] == 262144) selected @endif>2Mbps</option>
                                                            <option value="393216" @if(\App\Components\Helpers::systemConfig()['default_speed_limit'] == 393216) selected @endif>3Mbps</option>
                                                            <option value="524288‬" @if(\App\Components\Helpers::systemConfig()['default_speed_limit'] == 524288) selected @endif>4Mbps</option>
                                                            <option value="655360" @if(\App\Components\Helpers::systemConfig()['default_speed_limit'] == 655360) selected @endif>5Mbps</option>
                                                            <option value="1048576" @if(\App\Components\Helpers::systemConfig()['default_speed_limit'] == 1048576) selected @endif>8Mbps</option>
                                                            <option value="1310720" @if(\App\Components\Helpers::systemConfig()['default_speed_limit'] == 1310720) selected @endif>10Mbps</option>
                                                            <option value="2621440" @if(\App\Components\Helpers::systemConfig()['default_speed_limit'] == 2621440) selected @endif>20Mbps</option>
                                                            <option value="3932160" @if(\App\Components\Helpers::systemConfig()['default_speed_limit'] == 3932160) selected @endif>30Mbps</option>
                                                            <option value="5242880" @if(\App\Components\Helpers::systemConfig()['default_speed_limit'] == 5242880) selected @endif>40Mbps</option>
                                                            <option value="6553600" @if(\App\Components\Helpers::systemConfig()['default_speed_limit'] == 6553600) selected @endif>50Mbps</option>
                                                            <option value="10485760" @if(\App\Components\Helpers::systemConfig()['default_speed_limit'] == 10485760) selected @endif>80Mbps</option>
                                                            <option value="13107200" @if(\App\Components\Helpers::systemConfig()['default_speed_limit'] == 13107200) selected @endif>100Mbps</option>
                                                            <option value="26214400" @if(\App\Components\Helpers::systemConfig()['default_speed_limit'] == 26214400) selected @endif>200Mbps</option>
                                                            <option value="39321600" @if(\App\Components\Helpers::systemConfig()['default_speed_limit'] == 39321600) selected @endif>300Mbps</option>
                                                            <option value="65536000" @if(\App\Components\Helpers::systemConfig()['default_speed_limit'] == 65536000) selected @endif>500Mbps</option>
                                                            <option value="134217728" @if(\App\Components\Helpers::systemConfig()['default_speed_limit'] == 134217728) selected @endif>1Gbps</option>
                                                        </select>
                                                        <span class="help-block"> 如果用户限速大于此值，则用户会被限速在此值 </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="client_limit" class="col-md-3 control-label">设备数限制</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="client_limit" value="0" id="client_limit">
                                                            <span class="input-group-addon">个</span>
                                                        </div>
                                                        <span class="help-block"> 0表示不限制，1表示同一个账号仅允许一个设备连接 </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="labels" class="col-md-3 control-label">标签</label>
                                                    <div class="col-md-8">
                                                        <select id="labels" class="form-control select2-multiple" name="labels[]" multiple>
                                                            @foreach($label_list as $label)
                                                                <option value="{{$label->id}}">{{$label->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="group_id" class="col-md-3 control-label"> 所属分组 </label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="group_id" id="group_id">
                                                            <option value="0">请选择</option>
                                                            @if(!$group_list->isEmpty())
                                                                @foreach($group_list as $group)
                                                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="country_code" class="col-md-3 control-label"> 国家/地区 </label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="country_code" id="country_code">
                                                            <option value="">请选择</option>
                                                            @if(!$country_list->isEmpty())
                                                                @foreach($country_list as $country)
                                                                    <option value="{{$country->code}}">{{$country->code}} - {{$country->name}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="desc" class="col-md-3 control-label"> 描述 </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="desc" id="desc" placeholder="简单描述">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="sort" class="col-md-3 control-label">排序</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="sort" value="1" id="sort" placeholder="">
                                                        <span class="help-block"> 值越大排越前 </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="status" class="col-md-3 control-label">状态</label>
                                                    <div class="col-md-8">
                                                        <input type="checkbox" class="make-switch" id="status" checked data-on-color="success" data-off-color="danger" data-on-text="正常" data-off-text="维护">
                                                    </div>
                                                </div>
                                                <!--
                                                <div class="form-group">
                                                    <label for="bandwidth" class="col-md-3 control-label">出口带宽</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="bandwidth" value="1000" id="bandwidth" placeholder="" required>
                                                            <span class="input-group-addon">M</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="traffic" class="col-md-3 control-label">每月可用流量</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control right" name="traffic" value="1000" id="traffic" placeholder="" required>
                                                            <span class="input-group-addon">G</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="monitor_url" class="col-md-3 control-label">监控地址</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control right" name="monitor_url" value="" id="monitor_url" placeholder="节点实时监控地址">
                                                        <span class="help-block"> 例如：http://us1.ssrpanel.com/api/monitor </span>
                                                    </div>
                                                </div>
                                                -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <span class="caption-subject font-dark bold">扩展信息</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="form-group">
                                                    <label for="is_bt" class="col-md-3 control-label"> 宝塔API </label>
                                                    <div class="col-md-8">
                                                        <input type="checkbox" class="make-switch" id="is_bt" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                        <span class="help-block"> 启用时务必填写端口和密钥，且需要到节点上启用宝塔API并设置IP白名单 </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="bt_port" class="col-md-3 control-label"> 宝塔端口 </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="bt_port" value="8888" id="bt_port" placeholder="宝塔端口">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="bt_key" class="col-md-3 control-label"> 宝塔API密钥 </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="bt_key" value="" id="bt_key" placeholder="宝塔API密钥">
                                                    </div>
                                                </div>
                                                <hr />
                                                <div class="form-group">
                                                    <label for="service" class="col-md-3 control-label">类型</label>
                                                    <div class="col-md-8">
                                                        <div class="mt-radio-inline">
                                                            <label class="mt-radio">
                                                                <input type="radio" name="service" value="1" checked> ShadowsocksR
                                                                <span></span>
                                                            </label>
                                                            <label class="mt-radio">
                                                                <input type="radio" name="service" value="2"> V2Ray
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- SS/SSR 设置部分 -->
                                                <div class="ssr-setting">
                                                    <div class="form-group">
                                                        <label for="single" class="col-md-3 control-label">单端口</label>
                                                        <div class="col-md-8">
                                                            <input type="checkbox" class="make-switch switch" id="single" data-on-color="success" data-off-color="danger" data-on-text="启用" data-off-text="关闭">
                                                        </div>
                                                    </div>
                                                    <div class="form-group single-setting hidden">
                                                        <label for="port" class="col-md-3 control-label"> 端口 </label>
                                                        <div class="col-md-8">
                                                            <input class="form-control" name="port" id="port" value="" placeholder="要开启的端口号，开启多个端口号需用,号隔开" />
                                                            <div class="help-block">Python版后端：<a href="javascript:showTnc();">配置示例</a>、<a href="javascript:showPortsOnlyConfig();">模式选择示例</a></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group single-setting hidden">
                                                        <label for="passwd" class="col-md-3 control-label"> 密码 </label>
                                                        <div class="col-md-8">
                                                            <input class="form-control" name="passwd" id="passwd" value="" placeholder="单端口通用连接密码" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="method" class="col-md-3 control-label">加密方式</label>
                                                        <div class="col-md-8">
                                                            <select class="form-control" name="method" id="method">
                                                                @foreach ($method_list as $method)
                                                                    <option value="{{$method->name}}" @if($method->is_default) selected @endif>{{$method->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="protocol" class="col-md-3 control-label">协议</label>
                                                        <div class="col-md-8">
                                                            <select class="form-control" name="protocol" id="protocol">
                                                                @foreach ($protocol_list as $protocol)
                                                                    <option value="{{$protocol->name}}" @if($protocol->is_default) selected @endif>{{$protocol->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="obfs" class="col-md-3 control-label">混淆</label>
                                                        <div class="col-md-8">
                                                            <select class="form-control" name="obfs" id="obfs">
                                                                @foreach ($obfs_list as $obfs)
                                                                    <option value="{{$obfs->name}}" @if($obfs->is_default) selected @endif>{{$obfs->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="obfs_param" class="col-md-3 control-label"> 混淆参数 </label>
                                                        <div class="col-md-8">
                                                            <textarea class="form-control" rows="5" name="obfs_param" id="obfs_param" placeholder="混淆为非plain时可填入参数进行流量伪装；混淆为http_simple时端口推荐80，混淆为tls时端口推荐为443；"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="push_port" class="col-md-3 control-label">消息推送端口</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="push_port" value="0" id="push_port">
                                                            <span class="help-block"> 使用VNet后端时必填 </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="compatible" class="col-md-3 control-label">兼容SS</label>
                                                        <div class="col-md-8">
                                                            <input type="checkbox" class="make-switch switch"  id="compatible" data-on-color="success" data-off-color="danger" data-on-text="是" data-off-text="否">
                                                            <span class="help-block"> 使用Python版后端时，请在配置协议和混淆时加上<span style="color:red">_compatible</span> </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="is_subscribe" class="col-md-3 control-label">订阅</label>
                                                        <div class="col-md-8">
                                                            <input type="checkbox" class="make-switch" id="is_subscribe" checked data-on-color="success" data-off-color="danger" data-on-text="允许" data-off-text="禁止">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="is_tcp_check" class="col-md-3 control-label">TCP阻断检测</label>
                                                        <div class="col-md-8">
                                                            <input type="checkbox" class="make-switch" id="is_tcp_check" data-on-color="success" data-off-color="danger" data-on-text="开启" data-off-text="关闭">
                                                            <span class="help-block"> 每30~60分钟随机进行TCP阻断检测 </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- V2ray 设置部分 -->
                                                <div class="v2ray-setting hidden">
                                                    <div class="form-group">
                                                        <label for="v2_alter_id" class="col-md-3 control-label">AlterID</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="v2_alter_id" value="16" id="v2_alter_id" placeholder="16">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="v2_port" class="col-md-3 control-label">端口</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="v2_port" value="10087" id="v2_port" placeholder="10087">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="v2_method" class="col-md-3 control-label">加密方式</label>
                                                        <div class="col-md-8">
                                                            <select class="form-control" name="v2_method" id="v2_method">
                                                                <option value="none">none</option>
                                                                <option value="aes-128-cfb">aes-128-cfb</option>
                                                                <option value="aes-128-gcm" selected>aes-128-gcm</option>
                                                                <option value="chacha20-poly1305">chacha20-poly1305</option>
                                                            </select>
                                                            <span class="help-block"> 使用WebSocket传输协议时不要使用none </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="v2_net" class="col-md-3 control-label">传输协议</label>
                                                        <div class="col-md-8">
                                                            <select class="form-control" name="v2_net" id="v2_net">
                                                                <option value="tcp" selected>TCP</option>
                                                                <option value="kcp">mKCP（kcp）</option>
                                                                <option value="ws">WebSocket（ws）</option>
                                                                <option value="h2">HTTP/2（h2）</option>
                                                            </select>
                                                            <span class="help-block"> 使用WebSocket传输协议时请启用TLS </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="v2_type" class="col-md-3 control-label">伪装类型</label>
                                                        <div class="col-md-8">
                                                            <select class="form-control" name="v2_type" id="v2_type">
                                                                <option value="none" selected>无伪装</option>
                                                                <option value="http">HTTP数据流</option>
                                                                <option value="srtp">视频通话数据 (SRTP)</option>
                                                                <option value="utp">BT下载数据 (uTP)</option>
                                                                <option value="wechat-video">微信视频通话</option>
                                                                <option value="dtls">DTLS1.2数据包</option>
                                                                <option value="wireguard">WireGuard数据包</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="v2_host" class="col-md-3 control-label">伪装域名</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="v2_host" id="v2_host">
                                                            <span class="help-block"> 伪装类型为http时多个伪装域名逗号隔开，使用WebSocket传输协议时只允许单个 </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="v2_path" class="col-md-3 control-label">ws/h2路径</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="v2_path" id="v2_path">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="v2_tls" class="col-md-3 control-label">TLS</label>
                                                        <div class="col-md-8">
                                                            <div class="mt-radio-inline">
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="v2_tls" value="1"> 是
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="v2_tls" value="0" checked> 否
                                                                    <span></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="v2_insider_port" class="col-md-3 control-label">内部端口</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="v2_insider_port" value="10550" id="v2_insider_port" placeholder="10550">
                                                            <span class="help-block"> 内部监听，当端口为0时启用，仅支持<a href="https://github.com/rico93/pay-v2ray-sspanel-v3-mod_Uim-plugin/" target="_blank">rico93版</a> </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="v2_outsider_port" class="col-md-3 control-label">内部端口</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="v2_outsider_port" value="443" id="v2_outsider_port" placeholder="443">
                                                            <span class="help-block"> 外部覆盖，当端口为0时启用，仅支持<a href="https://github.com/rico93/pay-v2ray-sspanel-v3-mod_Uim-plugin/" target="_blank">rico93版</a> </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn green">提 交</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
@endsection
@section('script')
    <script src="/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        // 标签选择器
        $('#labels').select2({
            theme: 'bootstrap',
            placeholder: '用户订阅时根据其所处网络环境自动推荐节点',
            allowClear: true,
            width:'100%'
        });

        // ajax同步提交
        function do_submit() {
            var name = $('#name').val();
            var labels = $("#labels").val();
            var group_id = $("#group_id option:selected").val();
            var country_code = $("#country_code option:selected").val();
            var server = $('#server').val();
            var ip = $('#ip').val();
            var ipv6 = $('#ipv6').val();
            var relay_server = $('#relay_server').val();
            var desc = $('#desc').val();
            var method = $('#method').val();
            var traffic_rate = $('#traffic_rate').val();
            var level = $("#level option:selected").val();
            var speed_limit = $("#speed_limit option:selected").val();
            var client_limit = $('#client_limit').val();
            var protocol = $('#protocol').val();
            var obfs = $('#obfs').val();
            var obfs_param = $('#obfs_param').val();
            var bandwidth = $('#bandwidth').val();
            var traffic = $('#traffic').val();
            var monitor_url = $('#monitor_url').val();
            var is_subscribe = Number($('#is_subscribe').bootstrapSwitch('state'));
            var is_nat = Number($('#is_nat').bootstrapSwitch('state'));
            var is_relay = Number($('#is_relay').bootstrapSwitch('state'));
            var is_dynamic = Number($('#is_dynamic').bootstrapSwitch('state'));
            var ssh_port = $('#ssh_port').val();
            var is_bt = Number($('#is_bt').bootstrapSwitch('state'));
            var bt_port = $('#bt_port').val();
            var bt_key = $('#bt_key').val();
            var compatible = Number($('#compatible').bootstrapSwitch('state'));
            var single = Number($('#single').bootstrapSwitch('state'));
            var port = $("#port").val();
            var passwd = $("#passwd").val();
            var push_port = $("#push_port").val();
            var sort = $('#sort').val();
            var status = Number($('#status').bootstrapSwitch('state'));
            var is_tcp_check = Number($('#is_tcp_check').bootstrapSwitch('state'));
            var is_udp = Number($('#is_udp').bootstrapSwitch('state'));

            var service = $("input:radio[name='service']:checked").val();
            var v2_alter_id = $('#v2_alter_id').val();
            var v2_port = $('#v2_port').val();
            var v2_method = $("#v2_method option:selected").val();
            var v2_net = $('#v2_net').val();
            var v2_type = $('#v2_type').val();
            var v2_host = $('#v2_host').val();
            var v2_path = $('#v2_path').val();
            var v2_tls = $("input:radio[name='v2_tls']:checked").val();
            var v2_insider_port = $('#v2_insider_port').val();
            var v2_outsider_port = $('#v2_outsider_port').val();

            $.ajax({
                type: "POST",
                url: "/admin/addNode",
                async: false,
                data: {
                    _token: '{{csrf_token()}}',
                    name: name,
                    labels: labels,
                    group_id: group_id,
                    country_code: country_code,
                    server: server,
                    ip: ip,
                    ipv6: ipv6,
                    relay_server: relay_server,
                    desc: desc,
                    method: method,
                    traffic_rate: traffic_rate,
                    level: level,
                    speed_limit: speed_limit,
                    client_limit: client_limit,
                    protocol: protocol,
                    obfs: obfs,
                    obfs_param: obfs_param,
                    bandwidth: bandwidth,
                    traffic: traffic,
                    monitor_url: monitor_url,
                    is_subscribe: is_subscribe,
                    is_nat: is_nat,
                    is_relay: is_relay,
                    is_dynamic: is_dynamic,
                    ssh_port: ssh_port,
                    is_bt: is_bt,
                    bt_port: bt_port,
                    bt_key: bt_key,
                    compatible: compatible,
                    single: single,
                    port: port,
                    passwd: passwd,
                    push_port: push_port,
                    sort: sort,
                    status: status,
                    is_tcp_check: is_tcp_check,
                    is_udp: is_udp,
                    type: service,
                    v2_alter_id: v2_alter_id,
                    v2_port: v2_port,
                    v2_method: v2_method,
                    v2_net: v2_net,
                    v2_type: v2_type,
                    v2_host: v2_host,
                    v2_path: v2_path,
                    v2_tls: v2_tls,
                    v2_insider_port: v2_insider_port,
                    v2_outsider_port: v2_outsider_port
                },
                dataType: 'json',
                success: function (ret) {
                    layer.msg(ret.message, {time:1000}, function() {
                        if (ret.status == 'success') {
                            window.location.href = '/admin/nodeList';
                        }
                    });
                }
            });

            return false;
        }

        // 设置单端口多用户
        $('#single').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var single = state ? 1 : 0;

                if (single) {
                    $(".single-setting").removeClass('hidden');
                    $("#port, #passwd").attr("required", "required");
                } else {
                    $(".single-setting").removeClass('hidden');
                    $(".single-setting").addClass('hidden');
                    $("#port, #passwd").removeAttr("required");
                }
            }
        });

        // 设置服务类型
        $("input:radio[name='service']").on('change', function() {
            var service = parseInt($(this).val());

            if (service === 1) {
                $(".ssr-setting").removeClass('hidden');
                $(".v2ray-setting").addClass('hidden');
            } else {
                $(".ssr-setting").addClass('hidden');
                $(".v2ray-setting").removeClass('hidden');
            }
        });

        // 设置是否为动态IP
        $('#is_dynamic').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_dynamic = state ? 1 : 0;

                if (is_dynamic) {
                    $("#ip").val("1.1.1.1").attr("readonly", "readonly");
                    $("#server").attr("required", "required");
                } else {
                    $("#ip").val("").removeAttr("readonly");
                    $("#server").removeAttr("required");
                }
            }
        });

        // 设置是否为中转
        $('#is_relay').on({
            'switchChange.bootstrapSwitch': function (event, state) {
                var is_relay = state ? 1 : 0;

                if (is_relay) {
                    $("#relay-server").show();
                    $("#relay_server").attr("required", "required");
                } else {
                    $("#relay-server").hide();
                    $("#relay_server").removeAttr("required");
                }
            }
        });

        // 服务条款
        function showTnc() {
            var content = '1.请勿直接复制黏贴以下配置，SSR(R)会报错的；'
                + '<br>2.确保服务器时间为CST；'
                + '<br>3.具体请看<a href="https://github.com/ssrpanel/SSRPanel/wiki/%E5%8D%95%E7%AB%AF%E5%8F%A3%E5%A4%9A%E7%94%A8%E6%88%B7%E7%9A%84%E5%9D%91" target="_blank">WIKI</a>；'
                + '<br>'
                + '<br>additional_ports" : {'
                + '<br>&ensp;&ensp;&ensp;&ensp;"80": {'
                + '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;"passwd": "password",'
                + '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;"method": "aes-128-ctr",'
                + '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;"protocol": "auth_aes128_md5",'
                + '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;"protocol_param": "#",'
                + '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;"obfs": "tls1.2_ticket_auth",'
                + '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;"obfs_param": ""'
                + '<br>&ensp;&ensp;&ensp;&ensp;},'
                + '<br>&ensp;&ensp;&ensp;&ensp;"443": {'
                + '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;"passwd": "password",'
                + '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;"method": "aes-128-ctr",'
                + '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;"protocol": "auth_aes128_sha1",'
                + '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;"protocol_param": "#",'
                + '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;"obfs": "tls1.2_ticket_auth",'
                + '<br>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;"obfs_param": ""'
                + '<br>&ensp;&ensp;&ensp;&ensp;}'
                + '<br>},';

            layer.open({
                type: 1
                ,title: '[节点 user-config.json 配置示例]'
                ,closeBtn: false
                ,area: '400px;'
                ,shade: 0.8
                ,id: 'tnc' //设定一个id，防止重复弹出
                ,resize: false
                ,btn: ['确定']
                ,btnAlign: 'c'
                ,moveType: 1 //拖拽模式，0或者1
                ,content: '<div style="padding: 20px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;">' + content + '</div>'
                ,success: function(layero){
                    //
                }
            });
        }

        // 模式提示
        function showPortsOnlyConfig() {
            var content = '严格模式：'
                + '<br>'
                + '"additional_ports_only": "true"'
                + '<br><br>'
                + '兼容模式：'
                + '<br>'
                + '"additional_ports_only": "false"';

            layer.open({
                type: 1
                ,title: '[节点 user-config.json 配置示例]'
                ,closeBtn: false
                ,area: '400px;'
                ,shade: 0.8
                ,id: 'po-cfg' //设定一个id，防止重复弹出
                ,resize: false
                ,btn: ['确定']
                ,btnAlign: 'c'
                ,moveType: 1 //拖拽模式，0或者1
                ,content: '<div style="padding: 20px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;">' + content + '</div>'
                ,success: function(layero){
                    //
                }
            });
        }
    </script>
@endsection
