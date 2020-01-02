<?php

// 节点WEBAPI
Route::group(['namespace' => 'Api\Web\v1', 'middleware' => ['webapi'], 'prefix' => 'web/v1'], function () {
    //Route::any('ping', 'PingController@ping'); // PING检测
    Route::get('node/{id}', 'AuthController@getNodeInfo'); // 获取节点信息
    Route::post('nodeStatus/{id}', 'AuthController@setNodeStatus'); // 上报节点心跳信息
    Route::post('nodeOnline/{id}', 'AuthController@setNodeOnline'); // 上报节点在线人数
    Route::get('userList/{id}', 'AuthController@getUserList'); // 获取节点可用的用户列表
    Route::post('userTraffic/{id}', 'AuthController@setUserTraffic'); // 上报用户流量日志
    Route::get('nodeRule/{id}', 'AuthController@getNodeRule'); // 获取节点的审计规则
    Route::post('trigger/{id}', 'AuthController@addRuleLog'); // 上报用户触发的审计规则记录
});


// 客户端API
Route::group(['namespace' => 'Api\Client\v1', 'prefix' => 'client/v1'], function () {
    Route::get('login', 'AuthController@login');
    Route::get('logout', 'AuthController@logout');
    Route::get('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
    Route::get('register', 'AuthController@register');
    Route::post('resetPassword', 'AuthController@resetPassword');
});
