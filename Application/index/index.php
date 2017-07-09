<!DOCTYPE html>
<html lang="zh-CN">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>微信物业管理系统</title>

    <!-- Bootstrap -->
    <link href="/Public/Home/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/Home/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
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
                <p class="navbar-text"><a href="/index.php?s=/Home/Index/index.html" class="navbar-link">首页</a></p>
            </div><div class="col-xs-3">
                <p class="navbar-text"><a href="/index.php?s=/Home/Service/index.html" class="navbar-link">服务</a></p>
            </div><div class="col-xs-3">
                <p class="navbar-text"><a href="/index.php?s=/Home/Find/index.html" class="navbar-link">官网</a></p>
            </div><div class="col-xs-3">
                <p class="navbar-text"><a href="/index.php?s=/Home/Center/index.html" class="navbar-link">我的</a></p>
            </div>            </div>
    </nav>
    <!--导航结束-->

    <div id="top-alert" class="fixed alert alert-error" style="display: none;">
        <button class="close fixed" style="margin-top: 4px;">&times;</button>
        <div class="alert-content  text-center">这是内容</div>
        <!--<div id="main" class="main"></div>-->
    </div>



    <div class="container-fluid">
        <div class="indexImg row">
            <img src="/Public/Home/images/index.png" width="100%" />
        </div>
        <div class="serviceList text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xs-4">
                        <a href="/index.php?s=/Home/Notice/index.html">
                            <div class="indexLabel label-danger">
                                <span class="glyphicon glyphicon-bullhorn"></span><br/>
                                小区通知
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="/index.php?s=/Home/Service/index.html">
                            <div class="indexLabel label-warning">
                                <span class="glyphicon glyphicon-ok-circle"></span><br/>
                                便民服务
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="/index.php?s=/Home/Repair/index.html">
                            <div class="indexLabel label-info">
                                <span class="glyphicon glyphicon-heart-empty"></span><br/>
                                在线报修
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="/index.php?s=/Home/Shop/index.html">
                            <div class="indexLabel label-success">
                                <span class="glyphicon glyphicon-briefcase"></span><br/>
                                商家活动
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="/index.php?s=/Home/Sale/index.html">
                            <div class="indexLabel label-primary">
                                <span class="glyphicon glyphicon-usd"></span><br/>
                                小区租售
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="/index.php?s=/Home/Activity/index.html">
                            <div class="indexLabel label-default">
                                <span class="glyphicon glyphicon-apple"></span><br/>
                                小区活动
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/Public/Home/js/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/Public/Home/bootstrap/js/bootstrap.min.js"></script>





</body>
</html>