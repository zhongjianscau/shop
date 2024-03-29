<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>网上服饰购物系统</title>

    <meta name="keywords" content="网上服饰购物系统后台">
    <meta name="description" content="网上服饰购物系统后台">

    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="/shop/Public/admin/favicon.ico">
    <link href="/shop/Public/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/shop/Public/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/shop/Public/admin/css/animate.min.css" rel="stylesheet">
    <link href="/shop/Public/admin/css/style.min.css?v=4.0.0" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span><img alt="image" class="img-circle" src="/shop/Public/<?php echo ($admin_message["headimage"]); ?>" width="65px" height="65px" /></span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong class="font-bold"><?php echo ($admin_message["username"]); ?></strong></span>
                                <span class="text-muted text-xs block">
                                <?php if($admin_message['level'] == 1): ?>超级管理员
                                <?php elseif($admin_message['level'] == 2): ?>
                                    商品管理员
                                <?php elseif($admin_message['level'] == 3): ?>
                                    商品分类管理员
                                <?php elseif($admin_message['level'] == 4): ?>
                                    订单管理员
                                <?php elseif($admin_message['level'] == 5): ?>
                                    评论管理员
                                <?php else: ?>
                                    用户管理员<?php endif; ?>
                                <b class="caret"></b></span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="J_menuItem" href="<?php echo U('user/message');?>">个人资料</a>
                                </li>
                                <li><a class="J_menuItem" href="<?php echo U('user/changepwd');?>">修改密码</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="<?php echo U('user/loginout');?>">安全退出</a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">H+
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo U('index/index');?>">
                            <i class="fa fa-home"></i>
                            <span class="nav-label">主页</span>
                        </a>
                       

                    </li>
                    <?php if(($admin_message['level'] == 1) OR ($admin_message['level'] == 2)): ?><li>
                        <a href="#">
                            <i class="fa fa-align-justify"></i> 
                            <span class="nav-navicon">商品管理</span>
                            <span class="fa arrow"></span>   
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="<?php echo U('goods/add');?>">添加商品</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="<?php echo U('goods/index');?>">商品列表</a>
                            </li>
                            
                            
                        </ul>
                    </li><?php endif; ?>
                    
                    <?php if(($admin_message['level'] == 1) OR ($admin_message['level'] == 3)): ?><li>
                        <a href="#">
                            <i class="fa fa-list-alt"></i> 
                            <span class="nav-label">分类管理</span>
                            <span class="fa arrow"></span>   
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="<?php echo U('category/add');?>">添加分类</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="<?php echo U('category/index');?>">分类列表</a>
                            </li>
                        </ul>
                    </li><?php endif; ?>

                    <?php if(($admin_message['level'] == 1) OR ($admin_message['level'] == 4)): ?><li>
                        <a href="#">
                            <i class="fa fa-paper-plane-o"></i> 
                            <span class="nav-label">订单管理</span>
                            <span class="fa arrow"></span>   
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="<?php echo U('order/index');?>">查看订单</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="<?php echo U('order/dealrecord');?>">成交记录</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="<?php echo U('order/refund');?>">退货退款</a>
                            </li>
                            
                        </ul>
                    </li><?php endif; ?>


                    <?php if(($admin_message['level'] == 1) OR ($admin_message['level'] == 5)): ?><li>
                        <a href="#">
                            <i class="fa fa-commenting"></i> 
                            <span class="nav-label">评论管理</span>
                            <span class="fa arrow"></span>   
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="<?php echo U('comment/index');?>">评论列表</a>
                            </li>
                            
                        </ul>
                    </li><?php endif; ?>

                    

                    <?php if(($admin_message['level'] == 1) OR ($admin_message['level'] == 6)): ?><li>
                        <a href="#">
                            <i class="fa fa-users"></i> 
                            <span class="nav-label">用户管理</span>
                            <span class="fa arrow"></span>   
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="<?php echo U('consumer/index');?>">用户列表</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="<?php echo U('consumer/search');?>">查找用户</a>
                            </li>
                        </ul>
                    </li><?php endif; ?>
    
                    <?php if($admin_message['level'] == 1): ?><li>
                        <a href="#">
                            <i class="fa fa-key"></i> 
                            <span class="nav-label">权限管理</span>
                            <span class="fa arrow"></span>   
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="<?php echo U('auth/index');?>">管理员列表</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="<?php echo U('auth/examine');?>">管理员审核</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="<?php echo U('auth/add');?>">添加管理员</a>
                            </li>
                        </ul>
                    </li>

            
                    <li>
                        <a href="#">
                            <i class="fa fa-gears"></i> 
                            <span class="nav-label">网站管理</span>
                            <span class="fa arrow"></span>   
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="<?php echo U('setting/index');?>">网站前台设置</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="<?php echo U('setting/lunbo');?>">轮播图片设置</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="<?php echo U('setting/register');?>">后台注册设置</a>
                            </li>
                            
                        </ul>
                    </li><?php endif; ?>

                </ul>
            </div>
        </nav>
        <!--左侧导航结束-->

        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown hidden-xs">
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row content-tabs">
                <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
                </button>
                <nav class="page-tabs J_menuTabs">
                    <div class="page-tabs-content">
                        <a href="javascript:;" class="active J_menuTab" data-id="index_v1.html">首页</a>
                    </div>
                </nav>
                <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i>
                </button>
                <div class="btn-group roll-nav roll-right">
                    <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span>

                    </button>
                    <ul role="menu" class="dropdown-menu dropdown-menu-right">
                        <li class="J_tabShowActive"><a>定位当前选项卡</a>
                        </li>
                        <li class="divider"></li>
                        <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                        </li>
                        <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                        </li>
                    </ul>
                </div>
                <a href="<?php echo U('user/loginout');?>" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
            </div>
            
<div class="row J_mainContent" id="content-main">
                <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="<?php echo U('index/message');?>" frameborder="0" data-id="index_v1.html" seamless></iframe>
            </div>
            <div class="footer">
            </div>
        </div>
        <!--右侧部分结束-->

    </div>
    <script src="/shop/Public/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/shop/Public/admin/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/shop/Public/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/shop/Public/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/shop/Public/admin/js/plugins/layer/layer.min.js"></script>
    <script src="/shop/Public/admin/js/hplus.min.js?v=4.0.0"></script>
    <script type="text/javascript" src="/shop/Public/admin/js/contabs.min.js"></script>
    <script src="/shop/Public/admin/js/plugins/pace/pace.min.js"></script>
</body>

</html>