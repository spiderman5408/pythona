@extends('admin.layouts')
@section('css')
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
                @if (Session::has('successMsg'))
                    <div class="alert alert-success">
                        <button class="close" data-close="alert"></button>
                        {{Session::get('successMsg')}}
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <span> {{$errors->first()}} </span>
                    </div>
                @endif
                <div class="note note-danger">
                    <p>警告：购买新套餐则会覆盖所有已购但未过期的旧套餐并删除这些旧套餐对应的流量，所以设置商品时请务必注意类型和有效期，流量包则可叠加。</p>
                </div>
                <!-- BEGIN PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-dark">编辑商品</span>
                        </div>
                        <div class="actions"></div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="/shop/editGoods/{{$goods->id}}" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="type" class="control-label col-md-3">类型</label>
                                    <div class="col-md-6">
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="type" value="1" @if($goods->type == 1) checked @endif disabled> 流量包
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="type" value="2" @if($goods->type == 2) checked @endif disabled> 套餐
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="type" value="3" @if($goods->type == 3) checked @endif disabled> 充值
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">商品名称</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name" value="{{$goods->name}}" id="name" required>
                                        <input type="hidden" name="id" value="{{$goods->id}}" />
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    </div>
                                </div>
                                <!--
                                <div class="form-group">
                                    <label class="control-label col-md-3">商品图片</label>
                                    <div class="col-md-6">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                @if ($goods->logo)
                                                    <img src="{{$goods->logo}}" alt="" />
                                                @else
                                                    <img src="/assets/images/noimage.png" alt="" />
                                                @endif
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                    <span class="fileinput-new"> 选择 </span>
                                                    <span class="fileinput-exists"> 更换 </span>
                                                    <input type="file" name="logo" id="logo">
                                                </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> 移除 </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                -->
                                <div class="form-group">
                                    <label class="control-label col-md-3">描述</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" rows="2" name="desc" id="desc" placeholder="商品的简单描述">{{$goods->desc}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">售价</label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="price" value="{{$goods->price}}" id="price" required>
                                            <span class="input-group-addon">元</span>
                                        </div>
                                    </div>
                                </div>
                                @if($goods->type == 3)
                                    <div class="form-group">
                                        <label for="amount" class="control-label col-md-3">到账金额</label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="amount" value="{{$goods->amount}}" id="amount" required>
                                                <span class="input-group-addon">元</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($goods->type <= 2)
                                    <div class="form-group">
                                        <label class="control-label col-md-3">内含流量</label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="traffic" value="{{$goods->traffic}}" id="traffic" disabled>
                                                <span class="input-group-addon">MiB</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="level" class="col-md-3 control-label">授予等级</label>
                                        <div class="col-md-6">
                                            <select id="level" class="form-control" name="level" disabled>
                                                @foreach(config('common.level_map') as $key => $val)
                                                    <option value="{{$key}}" @if($goods->level == $key) selected @endif>{{$val}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group package-money">
                                        <label for="speed" class="control-label col-md-3">授予速率</label>
                                        <div class="col-md-6">
                                            <select id="speed" class="form-control" name="speed" disabled>
                                                <option value="-1" @if($goods->speed == '-1') selected @endif>不改变已有速率</option>
                                                <option value="0" @if($goods->speed == '0') selected @endif>不限速</option>
                                                <option value="131072" @if($goods->speed == '131072') selected @endif>1Mbps</option>
                                                <option value="262144" @if($goods->speed == '262144') selected @endif>2Mbps</option>
                                                <option value="393216" @if($goods->speed == '393216') selected @endif>3Mbps</option>
                                                <option value="524288" @if($goods->speed == '524288') selected @endif>4Mbps</option>
                                                <option value="655360" @if($goods->speed == '655360') selected @endif>5Mbps</option>
                                                <option value="1048576" @if($goods->speed == '1048576') selected @endif>8Mbps</option>
                                                <option value="1310720" @if($goods->speed == '1310720') selected @endif>10Mbps</option>
                                                <option value="2621440" @if($goods->speed == '2621440') selected @endif>20Mbps</option>
                                                <option value="3932160" @if($goods->speed == '3932160') selected @endif>30Mbps</option>
                                                <option value="5242880" @if($goods->speed == '5242880') selected @endif>40Mbps</option>
                                                <option value="6553600" @if($goods->speed == '6553600') selected @endif>50Mbps</option>
                                                <option value="10485760" @if($goods->speed == '10485760') selected @endif>80Mbps</option>
                                                <option value="13107200" @if($goods->speed == '13107200') selected @endif>100Mbps</option>
                                                <option value="26214400" @if($goods->speed == '26214400') selected @endif>200Mbps</option>
                                                <option value="39321600" @if($goods->speed == '39321600') selected @endif>300Mbps</option>
                                                <option value="65536000" @if($goods->speed == '65536000') selected @endif>500Mbps</option>
                                                <option value="134217728" @if($goods->speed == '134217728') selected @endif>1Gbps</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group package-money">
                                        <label for="invite_num" class="control-label col-md-3">赠邀请码</label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="invite_num" value="{{$goods->invite_num}}" id="invite_num" disabled>
                                                <span class="input-group-addon">枚</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group package-money">
                                        <label for="limit_num" class="control-label col-md-3">限购次数</label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="limit_num" value="{{$goods->limit_num}}" id="limit_num" disabled>
                                                <span class="input-group-addon">次</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">有效期</label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="days" value="{{$goods->days}}" id="days" disabled>
                                                <span class="input-group-addon">天</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sort" class="col-md-3 control-label">排序</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="sort" value="{{$goods->sort}}" id="sort">
                                            <span class="help-block"> 值越大排越前 </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="color" class="col-md-3 control-label">颜色</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="color" id="color">
                                                <option value="green" @if($goods->color == 'green') selected @endif>绿</option>
                                                <option value="blue" @if($goods->color == 'blue') selected @endif>蓝</option>
                                                <option value="red" @if($goods->color == 'red') selected @endif>红</option>
                                                <option value="purple" @if($goods->color == 'purple') selected @endif>紫</option>
                                                <option value="white" @if($goods->color == 'white') selected @endif>白</option>
                                                <option value="grey" @if($goods->color == 'grey') selected @endif>灰</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_hot" class="col-md-3 control-label">热销</label>
                                        <div class="col-md-6">
                                            <div class="mt-radio-inline">
                                                <label class="mt-radio">
                                                    <input type="radio" name="is_hot" value="1" @if($goods->is_hot == 1) checked @endif> 是
                                                    <span></span>
                                                </label>
                                                <label class="mt-radio">
                                                    <input type="radio" name="is_hot" value="0" @if($goods->is_hot == 0) checked @endif> 否
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group last">
                                    <label class="control-label col-md-3">状态</label>
                                    <div class="col-md-6">
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="status" value="1" {{$goods->status == 1 ? 'checked' : ''}} /> 上架
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="status" value="0" {{$goods->status == 0 ? 'checked' : ''}} /> 下架
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-4">
                                        <button type="submit" class="btn green"> <i class="fa fa-check"></i> 提 交</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
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
    <script src="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
@endsection
