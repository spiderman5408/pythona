@extends('admin.layouts')
@section('css')
    <style type="text/css">
        input,select {
            margin-bottom: 5px;
        }
    </style>
@endsection
@section('content')
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="padding-top:0;">
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <span class="caption-subject"> 回调日志 <small>(在线支付)</small> </span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <input type="text" class="col-md-4 form-control" name="out_trade_no" value="{{Request::get('out_trade_no')}}" id="out_trade_no" placeholder="本地订单号" autocomplete="off" onkeydown="if(event.keyCode==13){do_search();}">
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <input type="text" class="col-md-4 form-control" name="trade_no" value="{{Request::get('trade_no')}}" id="trade_no" placeholder="外部订单号" autocomplete="off" onkeydown="if(event.keyCode==13){do_search();}">
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <select class="form-control" name="type" id="type" onChange="doSearch()">
                                    <option value="" @if(Request::get('type') == '') selected @endif>支付方式</option>
                                    <option value="2" @if(Request::get('type') == '2') selected @endif>码支付</option>
                                    <option value="3" @if(Request::get('type') == '3') selected @endif>易支付</option>
                                    <option value="4" @if(Request::get('type') == '4') selected @endif>支付宝国际</option>
                                    <option value="5" @if(Request::get('type') == '5') selected @endif>当面付</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <select class="form-control" name="trade_status" id="trade_status" onChange="doSearch()">
                                    <option value="" @if(Request::get('trade_status') == '') selected @endif>交易状态</option>
                                    <option value="1" @if(Request::get('trade_status') == '1') selected @endif>成功</option>
                                    <option value="0" @if(Request::get('trade_status') == '0') selected @endif>失败</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <button type="button" class="btn blue" onclick="doSearch();">查询</button>
                                <button type="button" class="btn grey" onclick="doReset();">重置</button>
                            </div>
                        </div>
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-hover table-light">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> 支付方式 </th>
                                        <th> 平台订单号 </th>
                                        <th> 本地订单号 </th>
                                        <th> 交易金额 </th>
                                        <th> 状态 </th>
                                        <th> 创建时间 </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($list->isEmpty())
                                    <tr>
                                        <td colspan="7" style="text-align: center;">暂无数据</td>
                                    </tr>
                                @else
                                    @foreach($list as $vo)
                                        <tr class="odd gradeX">
                                            <td> {{$vo->id}} </td>
                                            <td> {{$vo->type_label}} </td>
                                            <td> {{$vo->trade_no}} </td>
                                            <td> <a href="/admin/orderList?order_sn={{$vo->out_trade_no}}" target="_blank"> {{$vo->out_trade_no}} </a> </td>
                                            <td> {{$vo->amount}}元 </td>
                                            <td> {!! $vo->trade_status_label !!} </td>
                                            <td> {{$vo->created_at}} </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="dataTables_info" role="status" aria-live="polite">共 {{$list->total()}} 条记录</div>
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <div class="dataTables_paginate paging_bootstrap_full_number pull-right">
                                    {{ $list->links() }}
                                </div>
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
    <script type="text/javascript">
        // 搜索
        function doSearch() {
            var trade_no = $("#trade_no").val();
            var out_trade_no = $("#out_trade_no").val();
            var type = $("#type option:selected").val();
            var trade_status = $("#trade_status option:selected").val();

            window.location.href = '/payment/callbackList?out_trade_no=' + out_trade_no + '&trade_no=' + trade_no + '&type=' + type + '&trade_status=' + trade_status;
        }

        // 重置
        function doReset() {
            window.location.href = '/payment/callbackList';
        }
    </script>
@endsection
