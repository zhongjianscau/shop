<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>网上服饰购物系统</title>
    <meta name="keywords" content="网上服饰购物系统后台">
    <meta name="description" content="网上服饰购物系统后台">

    <link rel="shortcut icon" href="/shop/Public/admin/favicon.ico"> 
    <link href="/shop/Public/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/shop/Public/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/shop/Public/admin/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="/shop/Public/admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

    <link href="/shop/Public/admin/css/animate.min.css" rel="stylesheet">
    <link href="/shop/Public/admin/css/style.min.css?v=4.0.0" rel="stylesheet"><!-- <base target="_blank"> -->
    <link rel="stylesheet" type="text/css" href="/shop/Public/admin/css/page.css">
    <script type="text/javascript" src="/shop/Public/index/date/WdatePicker.js"></script>
    
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeIn">
        <div class="row">
           
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class=""><a href="<?php echo U('order/index');?>">全部商品订单</a>
                        </li>
                        <li class="active"><a href="<?php echo U('order/list2');?>">查看指定日期订单</a>
                        </li>

                        <li class=""><a href="<?php echo U('order/list3');?>">查看指定订单号</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                    
                        <div id="tab-2" class="tab-pane active">
                            <div class="panel-body">
                                
                             <div class="col-sm-12">
                                <form action="<?php echo U('order/index2');?>" method="post" id="form" class="form-horizontal m-t">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">请输入日期：</label>
                                         <div class="col-sm-8">
                                            <input id="date" name="date" class="form-control" type="text" onfocus="WdatePicker({skin:'whyGreen',dateFmt:'yyyy-MM-dd'})" readonly="readonly" style="border-radius:6px !important;height:30px;width:170px;">
                                            <span class="help-block m-b-none" style="color: red" id="error1"></span>
                                        </div>
                                    </div>
                                   
                                    <!-- <br><br><br><br><br><br> -->
                                    <div class="form-group">
                                        <div class="col-sm-12 col-sm-offset-3">
                                            <button class="btn btn-primary" type="button" id="select">查询</button>
                                        </div>
                                    </div>
                                </form>
                                      
                        
                    </div>



                            </div>
                        </div>
                    
                       


                        


                    </div>


                </div>
            </div>

        </div>
 
       

        
    </div>
    <script src="/shop/Public/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/shop/Public/admin/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/shop/Public/admin/js/content.min.js?v=1.0.0"></script>
    <script src="/shop/Public/admin/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
    <script src="/shop/Public/admin/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
    <script src="/shop/Public/admin/js/plugins/sweetalert/sweetalert.min.js"></script>
</body>

</html>
<script type="text/javascript">
    $("#select").click(function(){
        var riqi=$("#date").val();
        if(riqi==""){
            $("#error1").html('请输入日期');
            return;
        }
        $("#form").submit();
    });
</script>