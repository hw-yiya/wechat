<?php if (!defined('THINK_PATH')) exit();?><extend name="/Public/nav" />


    <div class="container-fluid">
        <div class="blank"></div>
        <h3 class="noticeDetailTitle"><strong><?php echo ($shop["title"]); ?></strong></h3>
        <div class="noticeDetailInfo">发布者:<?php echo ($shop["id"]); ?></div>
        <div class="noticeDetailInfo">发布时间：<?php echo (date('Y-m-d H:i:s',$shop["create_time"])); ?></div>
        <div class="noticeDetailContent">
            <?php echo ($shop["description"]); ?>
        </div>
    </div>