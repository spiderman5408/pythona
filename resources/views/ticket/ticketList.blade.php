@extends('admin.layouts')
@section('css')
    <link href="/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
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
                            <span class="caption-subject"> 工单列表 </span>
                        </div>
                        <div class="actions">
                            <div class="btn-group">
                                <button class="btn blue" onclick="addTicket()"> 发起工单 </button>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row" style="padding-bottom:5px;">
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <input type="text" class="col-md-4 form-control" name="username" value="{{Request::get('username')}}" id="username" placeholder="用户名" autocomplete="off" onkeydown="if(event.keyCode==13){do_search();}">
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <button type="button" class="btn blue" onclick="do_search();">查询</button>
                                <button type="button" class="btn grey" onclick="do_reset();">重置</button>
                            </div>
                        </div>
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-hover table-light">
                                <thead>
                                <tr>
                                    <th style="width: 10%;"> # </th>
                                    <th style="width: 20%;"> 用户名 </th>
                                    <th style="width: 50%;"> 标题 </th>
                                    <th style="width: 20%; text-align: center;"> 状态 </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($ticketList->isEmpty())
                                    <tr>
                                        <td colspan="4" style="text-align: center;">暂无数据</td>
                                    </tr>
                                @else
                                    @foreach($ticketList as $ticket)
                                        <tr class="odd gradeX">
                                            <td> {{$ticket->id}} </td>
                                            <td>
                                                @if(!$ticket->user)
                                                    【账号已删除】
                                                @else
                                                    <a href="/admin/userList?id={{$ticket->user->id}}" target="_blank">{{$ticket->user->username}}</a> </td>
                                                @endif
                                            <td> <a href="/ticket/replyTicket?id={{$ticket->id}}" target="_blank">{{$ticket->title}}</a> </td>
                                            <td style="text-align: center;">
                                                @if ($ticket->status == 0)
                                                    <span class="label label-info"> 待处理 </span>
                                                @elseif ($ticket->status == 1)
                                                    <span class="label label-danger"> 已回复 </span>
                                                @else
                                                    <span class="label label-default"> 已关闭 </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="dataTables_info" role="status" aria-live="polite">共 {{$ticketList->total()}} 个工单</div>
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <div class="dataTables_paginate paging_bootstrap_full_number pull-right">
                                    {{ $ticketList->links() }}
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
        // 发起工单
        function addTicket() {
            window.location.href = '/ticket/addTicket';
        }

        // 回复工单
        function reply(id) {
            window.location.href = '/ticket/replyTicket?id=' + id;
        }

        // 搜索
        function do_search() {
            var username = $("#username").val();

            window.location.href = '/ticket/ticketList?username=' + username;
        }

        // 重置
        function do_reset() {
            window.location.href = '/ticket/ticketList';
        }
    </script>
@endsection
