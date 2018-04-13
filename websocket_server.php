<?php
/**
 * Created by PhpStorm.
 * User: heimo
 * Date: 2017/6/8
 * Time: 下午10:52
 */

/*
创建wss

$ws = new swoole_websocket_server("0.0.0.0", 9502, SWOOLE_PROCESS, SWOOLE_SOCK_TCP | SWOOLE_SSL);
$ws->set(array(
    'ssl_cert_file' => '/ssl/xxxx.crt',
    'ssl_key_file' => '/ssl/xxxx.key',
));
*/


//创建websocket服务器对象，监听0.0.0.0:9502端口
$ws = new swoole_websocket_server("0.0.0.0", 9502);

//监听WebSocket连接打开事件
$ws->on('open', function ($ws, $request) {
    //var_dump($ws);
    //var_dump($request);
    echo "client-{$request->fd} is connected\n";
});

//监听WebSocket消息事件
$ws->on('message', function ($ws, $frame) {
    echo "client-{$frame->fd} send message：".$frame->data."\n";
    foreach($ws->connections as $fd)
    {
        echo "push message to client-{$fd} \n";
        $ws->push($fd, $frame->data);
    }
});

//监听WebSocket连接关闭事件
$ws->on('close', function ($ws, $fd) {
    echo "client-{$fd} is closed\n";
});

$ws->start();
