@extends('user.layouts')
@section('css')
@endsection
@section('content')
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="padding-top:0;">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light">
                    <div class="portlet-body">
                        <ul class="list-inline">
                            <li>
                                <h4>
                                    <span class="font-blue">{{trans('home.account_expire')}}：</span>
                                    <span class="font-red">@if(date('Y-m-d') > Auth::user()->expire_time) {{trans('home.expired')}} @else {{Auth::user()->expire_time}} @endif</span>
                                </h4>
                            </li>
                            <li>
                                <h4>
                                    <span class="font-blue">{{trans('home.account_total_traffic')}}：</span>
                                    <span class="font-red">{{flowAutoShow(Auth::user()->transfer_enable)}}</span>
                                </h4>
                            </li>
                            <li>
                                <h4>
                                    <span class="font-blue">{{trans('home.account_bandwidth_usage')}}：</span>
                                    <span class="font-red">{{flowAutoShow(Auth::user()->u + Auth::user()->d)}}</span>
                                </h4>
                            </li>
                            <li>
                                <h4>
                                    <span class="font-blue">{{trans('home.account_limit_speed')}}：</span>
                                    <span class="font-red">{{formatNetSpeed(Auth::user()->speed_limit)}}</span>
                                </h4>
                            </li>
                            @if(Auth::user()->traffic_reset_day)
                            <li>
                                <h4>
                                    <span class="font-blue"> {{trans('home.account_reset_notice', ['reset_day' => Auth::user()->traffic_reset_day])}} </span>
                                </h4>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-blue bold">{{trans('home.subscribe_address')}}</span>
                        </div>
                        <div class="actions">
                            <span class="caption-subject">
                                <a class="btn btn-sm default" href="javascript:subscribeLog();"> {{trans('home.account_access_log')}} </a>
                                <a class="btn btn-sm default" href="javascript:userBanLog();"> {{trans('home.account_disable_log')}} </a>
                            </span>
                        </div>
                    </div>
                    @if(Auth::user()->subscribe->status)
                        @if($nodeList->isEmpty())
                            <div style="text-align: center;"><h2>请先<a href="/services">购买服务</a></h2></div>
                        @else
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 5px;">
                                        <div class="input-group">
                                            <input type="text" id="subscribe_link" class="form-control col-md-4 col-sm-4 col-xs-12" value="{{$link}}" />
                                            <span class="input-group-btn">
                                                <a href="#subscribe_qrcode" class="btn green" data-toggle="modal">
                                                    <i class="fa fa-qrcode"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <a href="javascript:exchangeSubscribe();" class="btn blue">{{trans('home.exchange_subscribe')}}</a>
                                        <button class="btn btn-info" id="copy_subscribe_link" data-clipboard-action="copy" data-clipboard-target="#subscribe_link"> {{trans('home.copy_subscribe_address')}} </button>
                                        @if(Agent::is('iPhone') || Agent::is('iPad'))
                                            <a href="{{$link_qrcode}}" class="btn red">一键订阅</a>
                                            <a href="{{$rule_qrcode}}" class="btn red">一键导入规则</a>
                                        @else
                                            <a href="#rule_qrcode" class="btn red" data-toggle="modal">规则</a>
                                        @endif
                                        @if(Agent::is('windows'))
                                            <a href="{{$windows_subscribe_link}}" class="btn red">一键订阅</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="tabbable-line">
                                    <ul class="nav nav-tabs ">
                                        <li class="active">
                                            <a href="#tools1" data-toggle="tab"> <i class="fa fa-apple"></i> Mac </a>
                                        </li>
                                        <li>
                                            <a href="#tools2" data-toggle="tab"> <i class="fa fa-windows"></i> Windows </a>
                                        </li>
                                        <li>
                                            <a href="#tools3" data-toggle="tab"> <i class="fa fa-linux"></i> Linux </a>
                                        </li>
                                        <li>
                                            <a href="#tools4" data-toggle="tab"> <i class="fa fa-apple"></i> iOS </a>
                                        </li>
                                        <li>
                                            <a href="#tools5" data-toggle="tab"> <i class="fa fa-android"></i> Android </a>
                                        </li>
                                        <li>
                                            <a href="#tools6" data-toggle="tab"> <i class="fa fa-gamepad"></i> Games </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" style="font-size:16px;">
                                        <div class="tab-pane active" id="tools1">
                                            @if($tutorial1)
                                                {!!$tutorial1->content!!}
                                            @else
                                                <div style="text-align: center;">
                                                    <h3>暂无教程</h3>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="tab-pane" id="tools2">
                                            @if($tutorial2)
                                                {!!$tutorial2->content!!}
                                            @else
                                                <div style="text-align: center;">
                                                    <h3>暂无教程</h3>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="tab-pane" id="tools3">
                                            @if($tutorial3)
                                                {!!$tutorial3->content!!}
                                            @else
                                                <div style="text-align: center;">
                                                    <h3>暂无教程</h3>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="tab-pane" id="tools4">
                                            @if(Agent::is('iPhone') || Agent::is('iPad'))
                                                @if(Agent::is('Safari'))
                                                    <ul class=" list-paddingleft-2"><li> <a href="{{$ipa_list}}" target="_blank">点击此处在线安装</a></li></ul>
                                                @else
                                                    <ul class=" list-paddingleft-2"><li> <a href="javascript:onlineInstallWarning();">点击此处在线安装</a></li></ul>
                                                @endif
                                                @if($tutorial4)
                                                    {!!$tutorial4->content!!}
                                                @else
                                                    <div style="text-align: center;">
                                                        <h3>暂无教程</h3>
                                                    </div>
                                                @endif
                                            @else
                                                <ul class=" list-paddingleft-2"><li> 请使用 Safari浏览器 访问本页面 </li></ul>
                                            @endif
                                        </div>
                                        <div class="tab-pane" id="tools5">
                                            @if($tutorial5)
                                                {!!$tutorial5->content!!}
                                            @else
                                                <div style="text-align: center;">
                                                    <h3>暂无教程</h3>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="tab-pane" id="tools6">
                                            @if($tutorial6)
                                                {!!$tutorial6->content!!}
                                            @else
                                                <div style="text-align: center;">
                                                    <h3>暂无教程</h3>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        <div style="text-align: center;"><h3>{{trans('home.subscribe_baned')}}</h3></div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @if(!$nodeList->isEmpty())
                    <button class="btn btn-danger margin-bottom-10 pull-right" id="copy_all_nodes" data-clipboard-text="{{$allNodes}}" style="width: 100%"> 点击此处复制所有节点 </button>
                    <div class="row widget-row">
                        @foreach($nodeList as $node)
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-10">
                                    <h4 class="widget-thumb-heading"><a data-toggle="modal" href="#txt_{{$node->id}}" title="{{$node->name}}"> {{str_limit($node->name, 46)}} </a></h4>
                                    <div class="widget-thumb-wrap">
                                        <div style="float:left;display: inline-block;padding-right:15px;">
                                            @if($node->country_code)
                                                <img src="{{asset('assets/images/country/' . $node->country_code . '.png')}}"/>
                                            @else
                                                <img src="{{asset('/assets/images/country/un.png')}}"/>
                                            @endif
                                        </div>
                                        <div class="widget-thumb-body">
                                            <span class="widget-thumb-body-stat pull-right">
                                                <a class="btn btn-sm green btn-outline" data-toggle="modal" href="#link_{{$node->id}}"> @if($node->type == 1) <i class="fa fa-paper-plane"></i> @else <i class="fa fa-vimeo"></i> @endif </a>
                                                <a class="btn btn-sm green btn-outline" data-toggle="modal" href="#qrcode_{{$node->id}}"> <i class="fa fa-qrcode"></i> </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        @foreach($nodeList as $node)
            <!-- 配置文本 -->
            <div class="modal fade draggable-modal" id="txt_{{$node->id}}" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">{{trans('home.setting_info')}}</h4>
                        </div>
                        <div class="modal-body">
                            <textarea class="form-control" rows="12" readonly="readonly">{{$node->txt}}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 配置链接 -->
            <div class="modal fade draggable-modal" id="link_{{$node->id}}" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">{{$node->name}}</h4>
                        </div>
                        <div class="modal-body">
                            @if($node->type == 1)
                                <textarea class="form-control" rows="5" readonly="readonly">{{$node->ssr_scheme}}</textarea>
                                <a href="{{$node->ssr_scheme}}" class="btn purple" style="display: block; width: 100%;margin-top: 10px;">打开SSR</a>
                                @if($node->ss_scheme)
                                    <p></p>
                                    <textarea class="form-control" rows="3" readonly="readonly">{{$node->ss_scheme}}</textarea>
                                    <a href="{{$node->ss_scheme}}" class="btn blue" style="display: block; width: 100%;margin-top: 10px;">打开SS</a>
                                @endif
                            @else
                                @if($node->v2_scheme)
                                    <p></p>
                                    <textarea class="form-control" rows="3" readonly="readonly">{{$node->v2_scheme}}</textarea>
                                    <a href="{{$node->v2_scheme}}" class="btn blue" style="display: block; width: 100%;margin-top: 10px;">打开V2ray</a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- 配置二维码 -->
            <div class="modal fade" id="qrcode_{{$node->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog @if($node->type == 2 || !$node->compatible) modal-sm @endif">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">{{trans('home.scan_qrcode')}}</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                @if($node->type == 1)
                                    @if($node->compatible)
                                        <div class="col-md-6">
                                            <div id="qrcode_ssr_img_{{$node->id}}" style="text-align: center;"></div>
                                            <div style="text-align: center;"><a id="download_qrcode_ssr_img_{{$node->id}}">{{trans('home.download')}}</a></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div id="qrcode_ss_img_{{$node->id}}" style="text-align: center;"></div>
                                            <div style="text-align: center;"><a id="download_qrcode_ss_img_{{$node->id}}">{{trans('home.download')}}</a></div>
                                        </div>
                                    @else
                                        <div class="col-md-12">
                                            <div id="qrcode_ssr_img_{{$node->id}}" style="text-align: center;"></div>
                                            <div style="text-align: center;"><a id="download_qrcode_ssr_img_{{$node->id}}">{{trans('home.download')}}</a></div>
                                        </div>
                                    @endif
                                @else
                                    <div class="col-md-12">
                                        <div id="qrcode_v2_img_{{$node->id}}" style="text-align: center;"></div>
                                        <div style="text-align: center;"><a id="download_qrcode_v2_img_{{$node->id}}">{{trans('home.download')}}</a></div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- 订阅二维码 -->
        <div class="modal fade" id="subscribe_qrcode" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">请使用Shadowrocket扫描</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="subscribe_qrcode_img" style="text-align: center;"></div>
                                <div style="text-align: center;"><a id="download_subscribe_qrcode_img">{{trans('home.download')}}</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 规则二维码 -->
        <div class="modal fade" id="rule_qrcode" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">请使用Shadowrocket扫描</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="rule_qrcode_img" style="text-align: center;"></div>
                                <div style="text-align: center;"><a id="download_rule_qrcode_img">{{trans('home.download')}}</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
@endsection
@section('script')
    <script src="/assets/global/plugins/clipboardjs/clipboard.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/jquery-qrcode/jquery.qrcode.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        // 在线安装警告提示
        function onlineInstallWarning() {
            layer.msg('仅限在Safari浏览器下有效', {time: 1000});
        }

        // 订阅访问日志
        function subscribeLog() {
            window.location.href = '/subscribeLog';
        }

        // 订阅封禁访问日志
        function userBanLog() {
            window.location.href = '/userBanLog';
        }
    </script>

    <script type="text/javascript">
        var UIModals = function () {
            var n = function () {
                @foreach($nodeList as $node)
                $("#txt_{{$node->id}}").draggable({handle: ".modal-header"});
                $("#qrcode_{{$node->id}}").draggable({handle: ".modal-header"});
                @endforeach
            };

            return {
                init: function () {
                    n()
                }
            }
        }();

        jQuery(document).ready(function () {
            UIModals.init()
        });

        // 循环输出节点scheme用于生成二维码
        @foreach ($nodeList as $node)
            @if($node->type == 1)
                $('#qrcode_ssr_img_{{$node->id}}').qrcode("{{$node->ssr_scheme}}");
                $('#download_qrcode_ssr_img_{{$node->id}}').attr({'download':'code','href':$('#qrcode_ssr_img_{{$node->id}} canvas')[0].toDataURL("image/png")})
            @if($node->ss_scheme)
                $('#qrcode_ss_img_{{$node->id}}').qrcode("{{$node->ss_scheme}}");
                $('#download_qrcode_ss_img_{{$node->id}}').attr({'download':'code','href':$('#qrcode_ss_img_{{$node->id}} canvas')[0].toDataURL("image/png")})
            @endif
            @else
                $('#qrcode_v2_img_{{$node->id}}').qrcode("{{$node->v2_scheme}}");
                $('#download_qrcode_v2_img_{{$node->id}}').attr({'download':'code','href':$('#qrcode_v2_img_{{$node->id}} canvas')[0].toDataURL("image/png")})
            @endif
        @endforeach

        // 生成订阅地址二维码
        $('#subscribe_qrcode_img').qrcode("{{$link_qrcode}}");
        $('#rule_qrcode_img').qrcode("{{$rule_qrcode}}");
        $('#download_subscribe_qrcode_img').attr({'download':'code','href':$('#subscribe_qrcode_img canvas')[0].toDataURL("image/png")})
        $('#download_rule_qrcode_img').attr({'download':'code','href':$('#rule_qrcode_img canvas')[0].toDataURL("image/png")})

        // 更换订阅地址
        function exchangeSubscribe() {
            layer.confirm('更换订阅地址将导致：<br>1.旧地址立即失效；<br>2.连接密码被更改；', {icon: 7, title:'警告'}, function(index) {
                $.post("/exchangeSubscribe", {_token:'{{csrf_token()}}'}, function (ret) {
                    layer.msg(ret.message, {time:1000}, function () {
                        if (ret.status == 'success') {
                            window.location.reload();
                        }
                    });
                });

                layer.close(index);
            });
        }
    </script>

    @if(!$nodeList->isEmpty())
        <script type="text/javascript">
            var copy_all_nodes = document.getElementById('copy_all_nodes');
            var clipboard = new Clipboard(copy_all_nodes);

            clipboard.on('success', function(e) {
                layer.alert("复制成功，通过右键菜单倒入节点链接即可", {icon:1, title:'提示'});
            });

            clipboard.on('error', function(e) {
                console.log(e);
            });
        </script>
    @endif

    <script type="text/javascript">
        var copy_subscribe_link = document.getElementById('copy_subscribe_link');
        var clipboard = new Clipboard(copy_subscribe_link);

        clipboard.on('success', function(e) {
            layer.msg("复制成功", {time:1000});
        });

        clipboard.on('error', function(e) {
            console.log(e);
        });
    </script>
@endsection
