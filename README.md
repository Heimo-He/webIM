# webIm

> webIm based on PHP Swoole

> 基于php swoole的 webIM聊天室

- **环境搭建**

`pecl install swoole`

- **使用方法**

1. 修改chat.html中wsServer的配置为自己的配置

```javascript
    var wsServer = 'ws://websocket_server_ip:9502';
```

2. 配置Nginx使用户能够访问到chat.html

3. 启动websocket_server

`php websocket_server.php`

![image](https://github.com/Heimo-He/webIM/raw/master/screenshots/01.gif)
