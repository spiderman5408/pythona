@extends('admin.layouts')
@section('css')
    <style type="text/css">
        input,select {
            margin-bottom: 15px;
        }
    </style>
@endsection
@section('content')
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="padding-top:0;">
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <span class="caption-subject"> 格式转换 </span><small>Shadowsocks 转 ShadowsocksR</small>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <select class="form-control" name="protocol" id="protocol">
                                    <option value="" @if(Request::get('protocol') == '') selected @endif>加密方式</option>
                                    @foreach ($protocol_list as $protocol)
                                        <option value="{{$protocol->name}}">{{$protocol->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <select class="form-control" name="method" id="method">
                                    <option value="" @if(Request::get('method') == '') selected @endif>协议</option>
                                    @foreach ($method_list as $method)
                                        <option value="{{$method->name}}">{{$method->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <select class="form-control" name="obfs" id="obfs">
                                    <option value="" @if(Request::get('obfs') == '') selected @endif>混淆</option>
                                    @foreach ($obfs_list as $obfs)
                                        <option value="{{$obfs->name}}">{{$obfs->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <input type="text" class="col-md-4 form-control" name="obfs_param" value="{{Request::get('obfs_param')}}" id="obfs_param" placeholder="混淆参数">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <textarea class="form-control" rows="22" name="content" id="content" placeholder="请填入要转换的配置信息" autofocus></textarea>
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="22" name="result" id="result" onclick="this.focus();this.select()" readonly="readonly"></textarea>
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-md-6">
                                <button class="btn blue btn-block" onclick="doConvert()">转 换</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn red btn-block" onclick="doDownload()">下 载</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>
        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
@endsection
@section('script')
    <script type="text/javascript">
        // 转换
        function doConvert() {
            var _token = '{{csrf_token()}}';
            var method = $('#method').val();
            var transfer_enable = $('#transfer_enable').val();
            var protocol = $('#protocol').val();
            var protocol_param = $('#protocol_param').val();
            var obfs = $('#obfs').val();
            var obfs_param = $('#obfs_param').val();
            var content = $('#content').val();

            if (content == '') {
                layer.msg('请填入要转换的配置信息', {time:1000});
                return ;
            }

            layer.confirm('确定继续转换吗？', {icon: 2, title:'警告'}, function(index) {
                $.ajax({
                    type: "POST",
                    url: "/admin/convert",
                    async: false,
                    data: {_token:_token, method:method, transfer_enable:transfer_enable, protocol:protocol, protocol_param:protocol_param, obfs:obfs, obfs_param:obfs_param, content: content},
                    dataType: 'json',
                    success: function (ret) {
                        if (ret.status == 'success') {
                            $("#result").val(ret.data);
                        } else {
                            $("#result").val(ret.message);
                        }
                    }
                });

                layer.close(index);
            });

            return false;
        }

        // 下载
        function doDownload() {
            window.location.href = '/admin/download?type=1';
        }
    </script>
@endsection
