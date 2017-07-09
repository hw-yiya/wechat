<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>微信物业管理系统</title>

    <!-- Bootstrap -->
    <link href="/Public/Wechat/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/Public/Wechat/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/Public/Wechat/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="/Public/Wechat/cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .main{margin-bottom: 60px;}
        .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
    </style>
    
</head>
<body>
<div class="main">
    <!--导航部分-->
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid text-center">
            <div class="col-xs-3">
                <p class="navbar-text"><a href="<?php echo U('Index/index');?>" class="navbar-link">首页</a></p>
            </div><div class="col-xs-3">
            <p class="navbar-text"><a href="<?php echo U('Service/listIndex');?>" class="navbar-link">服务</a></p>
        </div><div class="col-xs-3">
            <p class="navbar-text"><a href="/Find/all.html" class="navbar-link">发现</a></p>
        </div><div class="col-xs-3">
            <p class="navbar-text"><a href="<?php echo U('Center/index');?>" class="navbar-link">我的</a></p>
        </div>	</div>
    </nav>
    
    <!--导航结束-->

    <div class="container-fluid">
        <form class="login-form" action="<?php echo U('User/register');?>" method="post">
            <h2 class="form-signin-heading">用户注册</h2>
            <p>
                <label for="inputUsername" class="sr-only">用户名</label>
                <input type="text" name="username" id="inputUsername" class="form-control" placeholder="用户名" required autofocus>
            </p>
            <p>
                <label for="inputPassword" class="sr-only">密码</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="密码" required>
            </p>
            <p>
                <label for="inputrePassword" class="sr-only">确认密码</label>
                <input type="password" name="repassword" id="inputrePassword" class="form-control" placeholder="确认密码" required>
            </p>
            <p>
                <label for="inputEmail" class="sr-only">邮箱</label>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="邮箱" required>
            </p>
            <p>
                <label for="inputCaptcha" class="sr-only">验证码</label>
                <input type="text" name="verify" id="inputCaptcha" class="form-control" placeholder="请输入验证码" required>
            </p>
            <div class="controls" style="margin-bottom: 20px;">
                <img class="verifyimg reloadverify" alt="点击切换"  src="<?php echo U('verify');?>" style="cursor:pointer;height: 40px;">
            </div>
            <p>
                <button class="btn btn-lg btn-primary btn-block" type="submit">注册</button>
            </p>
        </form>
        <p class="text-right"><a href="<?php echo U('User/login');?>">已有账号，直接登录</a></p>
    </div>

</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/Public/Wechat/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/Public/Wechat/bootstrap/js/bootstrap.js"></script>

    <script type="text/javascript">

        $(document)
            .ajaxStart(function(){
                $("button:submit").addClass("log-in").attr("disabled", true);
            })
            .ajaxStop(function(){
                $("button:submit").removeClass("log-in").attr("disabled", false);
            });


        $("form").submit(function(){
            var self = $(this);
            $.post(self.attr("action"), self.serialize(), success, "json");
            return false;

            function success(data){
                if(data.status){
                    window.location.href = data.url;
                } else {
                    self.find(".Validform_checktip").text(data.info);
                    //刷新验证码
                    $(".reloadverify").click();
                }
            }
        });

        $(function(){
            var verifyimg = $(".verifyimg").attr("src");
            $(".reloadverify").click(function(){
                if( verifyimg.indexOf('?')>0){
                    $(".verifyimg").attr("src", verifyimg+'&random='+Math.random());
                }else{
                    $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
                }
            });
        });
    </script>

</body>
</html>