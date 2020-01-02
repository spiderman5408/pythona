@extends('admin.layouts')
@section('css')
    <link href="/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

    <style>
        a:hover {
            color:white;
        }
        a:link {
            color: white;
        }
        a:visited {
            color: white;
        }
        a:active {
            color: white;
        }
    </style>
@endsection
@section('title', '控制面板')
@section('content')
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="padding-top:0;">
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <span class="caption-subject"> 管理员列表 </span>
                        </div>
                        <div class="actions">
                            <div class="btn-group btn-group-devided">
                                <button class="btn blue" onclick="addMaster()"> 添加管理员 </button>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-hover table-light">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> 名称 </th>
                                        <th> 拥有角色 </th>
                                        <th> 操作 </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($list->isEmpty())
                                        <tr>
                                            <td colspan="14" style="text-align: center;">暂无数据</td>
                                        </tr>
                                    @else
                                        @foreach ($list as $vo)
                                            <tr class="odd gradeX">
                                                <td> {{$vo->id}} </td>
                                                <td> <span class="label label-danger"> <a href="/admin/editUser?id={{$vo->id}}">{{$vo->username}}</a> </span> </td>
                                                <td>
                                                    @foreach($vo->roles as $role)
                                                        <span class="label label-info"> {{$role}} </span>&ensp;
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if($vo->id != 1)
                                                        <button type="button" class="btn btn-sm blue btn-outline" onclick="assign('{{$vo->id}}')">
                                                            授权
                                                        </button>
                                                        <button type="button" class="btn btn-sm red btn-outline" onclick="revoke('{{$vo->id}}')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
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
                                <div class="dataTables_info" role="status" aria-live="polite">共 {{$list->total()}} 个管理员</div>
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
    <script src="/js/layer/layer.js" type="text/javascript"></script>

    <script type="text/javascript">
        // 添加管理员
        function addMaster() {
            layer.alert("第一步：添加角色，对角色分配相应的行为；<br>第二步：编辑用户，将用户设置为管理员；<br>第三步：给管理员授予角色；", {title:"提示"});
        }

        // 给管理员授予角色
        function assign(user_id) {
            window.location.href = "/permission/assignRole?user_id=" + user_id;
        }

        // 删除管理员
        function revoke(user_id) {
            layer.confirm('此操作将产生如下效果：<br><b>&ensp;&ensp;[取消所有授权]</b><br><b>&ensp;&ensp;[置为普通用户]</b><br><br>确定继续操作吗？', {icon: 7, title:'警告'}, function(index) {
                $.post("/permission/deleteMaster", {user_id:user_id, _token:'{{csrf_token()}}'}, function(ret) {
                    layer.msg(ret.message, {time:1000}, function() {
                        if (ret.status == 'success') {
                            window.location.reload();
                        }
                    });
                });

                layer.close(index);
            });
        }
    </script>
@endsection
