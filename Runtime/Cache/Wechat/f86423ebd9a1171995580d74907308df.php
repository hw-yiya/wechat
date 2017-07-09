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
        <div class="blank"></div>
        <h3 class="noticeDetailTitle"><strong><?php echo ($list["title"]); ?></strong></h3>
        <div class="noticeDetailInfo">发布者:<?php echo ($list["id"]); ?></div>
        <div class="noticeDetailInfo">发布时间：<?php echo (date('Y-m-d H:i:s',$list["create_time "])); ?></div>
        <div class="noticeDetailInfo pull-right"><a class="ajax-get confirm" data-act="<?php echo ($list["id"]); ?>" href="#">申请参与活动</a></div>
        <div class="noticeDetailContent">
            <?php echo ($list["content"]); ?>
        </div>
    </div>

</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/Public/Wechat/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/Public/Wechat/bootstrap/js/bootstrap.js"></script>

    <script>
        $('.confirm').click(function () {
            var url = '/index.php?s=/Wechat/Activity/apply';
            var id = $(this).attr('data-act');
            //console.debug(id);
            if(!confirm('确定执行该操作吗？')){
                return false;
            }
            $.get(url,{'id':id},function (data) {
                if(data.status == 0){
                    location.href = '/index.php?s=/Wechat/Activity/error';
                }else if(data.status == -1){
                    alert('你已经申请过该活动');
                }else{
                    alert('申请成功');
                }
            })
        })
    </script>

</body>
</html>