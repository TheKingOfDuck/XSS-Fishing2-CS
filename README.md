# XSS-Fishing2-CS

鱼儿在cs上线后自动收杆|Automatically stop fishing in javascript after the fish is hooked

✔️即兴开发，Enjoy it~~

### 场景：

使用xss弹窗提示钓鱼的时候会面临这样一个问题，如果鱼儿已经上线了，页面那边还在不停的弹窗，很容易引起鱼儿怀疑，权限说没就没了。

### 开发

cs插件:

![](https://thekingofduck.github.io/post-images/fishing2.png)

没啥难度，都是照着官方函数库复制...魔性的是我的ubantu死活跑不起来，centos可以...

php端：

![](https://thekingofduck.github.io/post-images/fishing1.png)

都是基本 语法，基本逻辑，但是遇到一个有趣的弱类型问题：

```
fwrite("ips.txt", "127.0.0.1");
```
写入的结果是127，之后的内容会被当做小点数被忽略掉，所以图中代码那个base64并非我闲着没事做...

### 使用

1.将xss.php放到自己的服务器上去并修改第三行的钓鱼Payload。

2.修改xssFisher.cna第4行中的企业微信机器人的密钥，第23行中的xss.php的实际地址。

3.加载cs插件，将xss的Payload插入目标页面。

### 特点

1.企业微信上线提示

2.机器上线后立即停止钓鱼的弹窗

3.只停止单个IP的弹窗，其他IP仍然可以继续弹窗，继续上线。

### TODO

1.特定网段上线的问题（？这个场景没有很清楚）
2.内网ip也判断下，避免出现多个目标在一个小的局域网共用一个外网IP，其中一台上线后其他机器就不弹窗了。

