<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>网上服饰购物系统</title>
    <meta name="keywords" content="网上服饰购物系统后台">
    <meta name="description" content="网上服饰购物系统后台">

    <link rel="shortcut icon" href="favicon.ico"> <link href="/shop/Public/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/shop/Public/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/shop/Public/admin/css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="/shop/Public/admin/css/plugins/chosen/chosen.css" rel="stylesheet">
    
    <link href="/shop/Public/admin/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="/shop/Public/admin/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link href="/shop/Public/admin/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

    <link href="/shop/Public/admin/css/animate.min.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="/shop/Public/admin/webUploader/css/webuploader.css">
    <link rel="stylesheet" type="text/css" href="/shop/Public/admin/webUploader/css/style.css">
    <link href="/shop/Public/admin/css/style.min.css?v=4.0.0" rel="stylesheet">


</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
                    <div class="ibox-content">

                    <div class="col-sm-12">
                        <p>编辑商品
                        </p>
                    </div>
                        <form class="form-horizontal m-t" id="goodsForm" method="post" action="<?php echo U('goods/checkedit');?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">商品名称（大标题）：</label>
                                <div class="col-sm-8">
                                    <input id="firstname" name="firstname" class="form-control" type="text" value="<?php echo ($goods["first_name"]); ?>">
                                    <span class="help-block m-b-none" style="color: red" id="error1"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">商品名称（小标题，可不填）：</label>
                                <div class="col-sm-8">
                                    <input id="secondname" name="secondname" class="form-control" type="text" value="<?php echo ($goods["second_name"]); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">商品类别：</label>
                                <div class="col-sm-8">
                                     <input type="radio" value="0" name="sex" <?php if($goods['sex'] == 0): ?>checked="checked"<?php endif; ?> id="sex"> <i></i> 女装</label>
                                      <input type="radio" value="1" name="sex" id="sex" <?php if($goods['sex'] == 1): ?>checked="checked"<?php endif; ?> > <i></i> 男装</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">商品一级分类：</label>
                                 <div class="col-sm-3">
                                    <select class="form-control m-b" name="firstcategory" id="firstcategory">
                                        <option value="-1">请选择商品一级分类</option>
                                        <?php if(is_array($firstcategorys)): $i = 0; $__LIST__ = $firstcategorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i; if($goods['first_category'] == $category['id']): ?><option value="<?php echo ($category['id']); ?>" selected="selected"><?php echo ($category['name']); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo ($category['id']); ?>"><?php echo ($category['name']); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                    <span class="help-block m-b-none" style="color: red" id="error2"></span>
                                </div>
                            </div>
                            <div class="form-group" id="seconddiv">
                                <label class="col-sm-3 control-label">商品二级分类：</label>
                                 <div class="col-sm-3">
                                    <select class="form-control m-b" name="secondcategory" id="secondcategory">
                                        <option value="-1">请选择商品二级分类</option>
                                        <?php if(is_array($secondcategorys)): $i = 0; $__LIST__ = $secondcategorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i; if($goods['second_category'] == $category['id']): ?><option value="<?php echo ($category['id']); ?>" selected="selected"><?php echo ($category['name']); ?></option>
                                            <?php else: ?>
                                            <option value="<?php echo ($category['id']); ?>"><?php echo ($category['name']); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                    <span class="help-block m-b-none" style="color: red" id="error3"></span>
                                </div>
                            </div>
                            <div class="form-group" id="thirddiv">
                                <label class="col-sm-3 control-label">商品三级分类：</label>
                                 <div class="col-sm-3">
                                    <select class="form-control m-b" name="thirdcategory" id="thirdcategory">
                                        <option value="-1">请选择商品三级分类</option>
                                        <?php if(is_array($thirdcategorys)): $i = 0; $__LIST__ = $thirdcategorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i; if($goods['shop_goods_category_id'] == $category['id']): ?><option value="<?php echo ($category['id']); ?>" selected="selected"><?php echo ($category['name']); ?></option>
                                            <?php else: ?>
                                            <option value="<?php echo ($category['id']); ?>"><?php echo ($category['name']); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                    <span class="help-block m-b-none" style="color: red" id="error4"></span>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">品牌分类：</label>
                                 <div class="col-sm-3">
                                    <select class="form-control m-b" name="brand" id="brand">
                                        <option value="-1">请选择商品品牌</option>
                                        <?php if(is_array($brands)): $i = 0; $__LIST__ = $brands;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$brand): $mod = ($i % 2 );++$i; if($goods['shop_goods_brand_id'] == $brand['id']): ?><option value="<?php echo ($brand['id']); ?>" selected="selected"><?php echo ($brand['name']); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo ($brand['id']); ?>"><?php echo ($brand['name']); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                    <span class="help-block m-b-none" style="color: red" id="error5"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">包邮：</label>
                                <div class="col-sm-8">
                                     <input type="radio" value="mianyunfei" name="mianyunfei" id="mianyunfei" <?php if($goods['is_free_shipping'] == 0): ?>checked="checked"<?php endif; ?> > <i></i> 包邮</label>
                                      <input type="radio" value="bumianyunfei" name="mianyunfei" id="yunfei" <?php if($goods['is_free_shipping'] == 1): ?>checked="checked"<?php endif; ?> > <i></i> 不包邮</label>
                                </div>
                            </div>
                            <div class="form-group" id="yunfeijiage" <?php if($goods['is_free_shipping'] == 0): ?>style="display: none"<?php endif; ?> >
                                <label class="col-sm-3 control-label">运费价格：</label>
                                <div class="col-sm-8">
                                    <input id="yunfei" name="yunfei" class="form-control" type="text" <?php if($goods['is_free_shipping'] == 0): ?>placeholder="0.00" <?php else: ?>value="<?php echo ($goods['shipping_price']); ?>"<?php endif; ?> >
                                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 输入格式：xx.xx，例：10.00，单位元</span>
                                    <span class="help-block m-b-none" style="color: red" id="error6"></span>

                                </div>
                            </div>

                            <div class="form-group">
                            
                                <label class="col-sm-3 control-label">限时抢购开始时间：</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="input-sm form-control" name="qianggou_start" id="qianggou_start" <?php if($goods['discount_start'] > 0): ?>value="<?php echo (date('Y-m-d H:i:s',$goods['discount_start'])); ?>" <?php else: ?>placeholder="2016-01-01 00:00:00"<?php endif; ?>   />
                                        <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 日期输入格式xxxx-xx-xx xx:xx:xx，例：2016-01-01 00:00:00</span>
                                        <span class="help-block m-b-none" style="color: red" id="error7"></span>
                                    </div>

                            </div>

                            <div class="form-group">
                            
                                <label class="col-sm-3 control-label">限时抢购结束时间：</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="input-sm form-control" name="qianggou_end" id="qianggou_end" <?php if($goods['discount_end'] > 0): ?>value="<?php echo (date('Y-m-d H:i:s',$goods['discount_end'])); ?>" <?php else: ?>placeholder="2016-01-01 00:00:00"<?php endif; ?>  />
                                        <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 日期输入格式xxxx-xx-xx xx:xx:xx，例：2016-01-01 00:00:00</span>
                                        <span class="help-block m-b-none" style="color: red" id="error8"></span>
                                    </div>

                            </div>

                            <div class="form-group">
                            
                                <label class="col-sm-3 control-label">商品价格：</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="input-sm form-control" name="price" id="price" value="<?php echo ($goods["price"]); ?>" />
                                        <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 输入格式：xx.xx，例：10.00，单位元</span>
                                        <span class="help-block m-b-none" style="color: red" id="error10"></span>
                                    </div>

                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">商品封面：</label>
                                    <div class="col-sm-8">
                                        <input type="file" id="goodscover" name="goodscover">
                                        <br>
                                        <img id="upload_img" src="/shop/Public/<?php echo ($goods['big_picture']); ?>" onerror="this.src='img/a2.jpg'" style="height: 118px;width: 118px;margin: 3%" />
                                        <span class="help-block m-b-none" style="color: red" id="error9"></span>

                                    </div>
                                
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">商品展示图片：</label>
                                <div class="col-sm-8">
                                    <?php if(is_array($goods_pictures)): $i = 0; $__LIST__ = $goods_pictures;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods_picture): $mod = ($i % 2 );++$i;?><div style="margin: 3%;float: left">
                                    <img src="/shop/Public/<?php echo ($goods_picture['picture']); ?>" style="width:120px;height: 120px;">
                                    <br>
                                    <a href="<?php echo U('goods/deletegoodspicture',array('id'=>$goods_picture['id'],'goods_id'=>$goods['id']));?>" class="demo4">删除</a>
                                    <input type="hidden" name="id" value="<?php echo ($goods_picture['id']); ?>">
                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </div>

                            <div class="form-group" style="display:none">
                                <label class="col-sm-3 control-label">商品展示图片：</label>
                                <div class="col-sm-8">
                                    <div class="col-sm-12">
                                        <div class="ibox float-e-margins">
                                            <!-- <div class="ibox-content"> -->
                                                    <div id="uploader" class="wu-example">
                                                            <div class="queueList">
                                                                <div id="dndArea" class="placeholder">
                                                                    <div id="filePicker"></div>
                                                                        <p>或将照片拖到这里，单次最多可选300张</p>
                                                                    </div>
                                                            </div>
                                                        <div class="statusBar" style="display:none;">
                                                            <div class="progress1">
                                                                <span class="text">0%</span>
                                                                <span class="percentage"></span>
                                                            </div>
                                                        <div class="info"></div>
                                                        <div class="btns">
                                                            <div id="filePicker2"></div>
                                                            <div class="uploadBtn">开始上传</div>
                                                        </div>
                                                        </div>
                                                    </div>
                                            <!-- </div> -->
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-3 control-label">商品介绍：</label>
                                <div class="col-sm-8">
                                    
                                    <script type="text/javascript" charset="utf-8">
                                        window.UEDITOR_HOME_URL = "/shop/Public/admin/Ueditor/";
                                    </script>
                                    <script type="text/javascript" src="/shop/Public/admin/Ueditor/ueditor.config.js"></script>
                                    <script type="text/javascript" src="/shop/Public/admin/Ueditor/ueditor.all.min.js"></script>
                                    <script type="text/plain" id="editor" name="content" style="width:100%;height:300px;">
                                    <?php echo ($goods['introduce']); ?>
                                    </script>
                                    <script type="text/javascript" charset="utf-8">
                                        window.UEDITOR_HOME_URL = "/shop/Public/admin/Ueditor/";
                                        var ue = UE.getEditor('editor');
                                    </script>
                                </div>
                            </div>








                           
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-3">
                                    <input type="hidden" name="id" value="<?php echo ($goods['id']); ?>">
                                    <button class="btn btn-primary" type="button" id="goodsadd">编辑</button>&nbsp;&nbsp;&nbsp;
                                    <a href="javascript:history.back(-1)" class="btn btn-primary">返回</a>

                                </div>
                            </div>
                        </form>
                    </div>
              
   
        </div>
    </div>
    <script src="/shop/Public/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/shop/Public/admin/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/shop/Public/admin/js/content.min.js?v=1.0.0"></script>
    <script src="/shop/Public/admin/webUploader/js/webUploader.js"></script>
    <script src="/shop/Public/admin/webUploader/js/upload.js"></script>
    <script src="/shop/Public/admin/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="/shop/Public/admin/js/plugins/validate/messages_zh.min.js"></script>
    
    <script type="text/javascript">
            var secondCategoryList="<?php echo U('category/secondcategorylist');?>";
            var thirdCategoryList="<?php echo U('category/thirdcategorylist');?>";
    </script>
    <script src="/shop/Public/admin/js/goods/edit.js"></script>
    <script type="text/javascript">

    $("#goodscover").change(function(){
    var objUrl = getObjectURL(this.files[0]) ;
    console.log("objUrl = "+objUrl) ;
    if (objUrl) {
        $("#upload_img").attr("src", objUrl) ;
    }
});
    //建立一個可存取到該file的url
function getObjectURL(file) {
    var url = null ; 
    if (window.createObjectURL!=undefined) { // basic
        url = window.createObjectURL(file) ;
    } else if (window.URL!=undefined) { // mozilla(firefox)
        url = window.URL.createObjectURL(file) ;
    } else if (window.webkitURL!=undefined) { // webkit or chrome
        url = window.webkitURL.createObjectURL(file) ;
    }
    return url ;
}
    </script>
</body>

</html>