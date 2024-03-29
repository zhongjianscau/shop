<?php 
namespace Index\Controller;
use Think\Controller;

/**
* 商城前台分类控制器
*/
class CategoryController extends CommonController
{
	public function index(){
		//获取URL参数，level表示分类级别，cid表示分类id
		//一、二级分类，三级分类分别使用不同的页面显示
		$get=I('get.');
		$Goods=M('Goods');
		//三级分类页面
		if($get['level']==3){
			if(!$get['sort']){
				$get['sort']=1;
			}
			if(!$get['price']){
				$get['price']=1;
			}
			if(!$get['sex']){
				$get['sex']=0;	//默认女性
			}
			//直接点击分类
			if(($get['sort']==1)&&($get['price']==1)){
				$count=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1))->count();
				$Page=getpage($count,C('THIRD_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				//默认按流行排序（浏览次数）
				$goods=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1))->order('-views')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=1;
				$price=1;
			}
			//分类页面排序选择流行，价格选择0~100
			if(($get['sort']==1)&&($get['price']==2)){
				$count=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('0','100'))))->count();
				$Page=getpage($count,C('THIRD_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('0','100'))))->order('-views')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=1;
				$price=2;
			}
			//分类页面排序选择流行，价格选择101~200
			if(($get['sort']==1)&&($get['price']==3)){
				$count=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('101','200'))))->count();
				$Page=getpage($count,C('THIRD_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('101','200'))))->order('-views')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=1;
				$price=3;
			}
			//分类页面排序选择流行，价格选择201~500
			if(($get['sort']==1)&&($get['price']==4)){
				$count=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('201','500'))))->count();
				$Page=getpage($count,C('THIRD_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('201','500'))))->order('-views')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=1;
				$price=4;
			}
			//分类页面排序选择流行，价格选择500元以上
			if(($get['sort']==1)&&($get['price']==5)){
				$count=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('gt',500)))->count();
				$Page=getpage($count,C('THIRD_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('gt',500)))->order('-views')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=1;
				$price=5;
			}

			//分类页面排序选择热销，价格选择全部
			if(($get['sort']==2)&&($get['price']==1)){
				$count=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1))->count();
				$Page=getpage($count,C('THIRD_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1))->order('-sales')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=2;
				$price=1;
			}
			//分类页面排序选择热销，价格选择0~100
			if(($get['sort']==2)&&($get['price']==2)){
				$count=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('0','100'))))->count();
				$Page=getpage($count,C('THIRD_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('0','100'))))->order('-sales')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=2;
				$price=2;
			}
			//分类页面排序选择热销，价格选择101~200
			if(($get['sort']==2)&&($get['price']==3)){
				$count=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('101','200'))))->count();
				$Page=getpage($count,C('THIRD_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('101','200'))))->order('-sales')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=2;
				$price=3;
			}
			//分类页面排序选择热销，价格选择201~500
			if(($get['sort']==2)&&($get['price']==4)){
				$count=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('201','500'))))->count();
				$Page=getpage($count,C('THIRD_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('201','500'))))->order('-sales')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=2;
				$price=4;
			}
			//分类页面排序选择热销，价格选择500元以上
			if(($get['sort']==2)&&($get['price']==5)){
				$count=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('gt',500)))->count();
				$Page=getpage($count,C('THIRD_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('gt',500)))->order('-sales')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=2;
				$price=5;
			}
			//分类页面排序选择最新，价格选择全部
			if(($get['sort']==3)&&($get['price']==1)){
				$count=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1))->count();
				$Page=getpage($count,C('THIRD_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1))->order('-add_time')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=3;
				$price=1;
			}
			//分类页面排序选择最新，价格选择0~100
			if(($get['sort']==3)&&($get['price']==2)){
				$count=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('0','100'))))->count();
				$Page=getpage($count,C('THIRD_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('0','100'))))->order('-add_time')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=3;
				$price=2;
			}
			//分类页面排序选择最新，价格选择101~200
			if(($get['sort']==3)&&($get['price']==3)){
				$count=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('101','200'))))->count();
				$Page=getpage($count,C('THIRD_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('101','200'))))->order('-add_time')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=3;
				$price=3;
			}
			//分类页面排序选择最新，价格选择201~500
			if(($get['sort']==3)&&($get['price']==4)){
				$count=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('201','500'))))->count();
				$Page=getpage($count,C('THIRD_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('201','500'))))->order('-add_time')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=3;
				$price=4;
			}
			//分类页面排序选择最新，价格选择500元以上
			if(($get['sort']==3)&&($get['price']==5)){
				$count=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('gt',500)))->count();
				$Page=getpage($count,C('THIRD_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('shop_goods_category_id'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('gt',500)))->order('-add_time')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=3;
				$price=5;
			}


			//获取分类名称
			$Goods_category=M('Goods_category');
			$third_category=$Goods_category->where(array('id'=>$get['cid']))->find();

			$this->page=$show;
			$this->goods=$goods;
			$this->sort=$sort;
			$this->price=$price;
			$this->sex=$get['sex'];
			$this->third_category=$third_category;
			$this->display('index3');
		}
		//二级分类页面
		if($get['level']==2){
			if(!$get['sort']){
				$get['sort']=1;
			}
			if(!$get['price']){
				$get['price']=1;
			}
			if(!$get['sex']){
				$get['sex']=0;
			}
			//直接点击二级分类
			if(($get['sort']==1)&&($get['price']==1)){
				$count=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				//默认按流行排序（浏览次数）
				$goods=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1))->order('-views')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=1;
				$price=1;
			}
			//分类页面排序选择流行，价格选择0~100
			if(($get['sort']==1)&&($get['price']==2)){
				$count=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('0','100'))))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('0','100'))))->order('-views')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=1;
				$price=2;
			}
			//分类页面排序选择流行，价格选择101~200
			if(($get['sort']==1)&&($get['price']==3)){
				$count=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('101','200'))))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('101','200'))))->order('-views')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=1;
				$price=3;
			}
			//分类页面排序选择流行，价格选择201~500
			if(($get['sort']==1)&&($get['price']==4)){
				$count=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('201','500'))))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('201','500'))))->order('-views')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=1;
				$price=4;
			}
			//分类页面排序选择流行，价格选择500元以上
			if(($get['sort']==1)&&($get['price']==5)){
				$count=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('gt',500)))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('gt',500)))->order('-views')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=1;
				$price=5;
			}
			//分类页面排序选择热销，价格选择全部
			if(($get['sort']==2)&&($get['price']==1)){
				$count=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1))->order('-sales')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=2;
				$price=1;
			}
			//分类页面排序选择热销，价格选择0~100
			if(($get['sort']==2)&&($get['price']==2)){
				$count=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('0','100'))))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('0','100'))))->order('-sales')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=2;
				$price=2;
			}
			//分类页面排序选择热销，价格选择101~200
			if(($get['sort']==2)&&($get['price']==3)){
				$count=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('101','200'))))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('101','200'))))->order('-sales')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=2;
				$price=3;
			}
			//分类页面排序选择热销，价格选择201~500
			if(($get['sort']==2)&&($get['price']==4)){
				$count=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('201','500'))))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('201','500'))))->order('-sales')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=2;
				$price=4;
			}
			//分类页面排序选择热销，价格选择500元以上
			if(($get['sort']==2)&&($get['price']==5)){
				$count=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('gt',500)))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('gt',500)))->order('-sales')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=2;
				$price=5;
			}
			//分类页面排序选择最新，价格选择全部
			if(($get['sort']==3)&&($get['price']==1)){
				$count=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1))->order('-add_time')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=3;
				$price=1;
			}
			//分类页面排序选择最新，价格选择0~100
			if(($get['sort']==3)&&($get['price']==2)){
				$count=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('0','100'))))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('0','100'))))->order('-add_time')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=3;
				$price=2;
			}
			//分类页面排序选择最新，价格选择101~200
			if(($get['sort']==3)&&($get['price']==3)){
				$count=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('101','200'))))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('101','200'))))->order('-add_time')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=3;
				$price=3;
			}
			//分类页面排序选择最新，价格选择201~500
			if(($get['sort']==3)&&($get['price']==4)){
				$count=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('201','500'))))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('201','500'))))->order('-add_time')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=3;
				$price=4;
			}
			//分类页面排序选择最新，价格选择500元以上
			if(($get['sort']==3)&&($get['price']==5)){
				$count=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('gt',500)))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('second_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('gt',500)))->order('-add_time')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=3;
				$price=5;
			}


			//获取二级分类名称
			$Goods_category=M('Goods_category');
			$second_category=$Goods_category->where(array('id'=>$get['cid']))->find();
			//获取三级分类名称
			$third_categorys=$Goods_category->where(array('pid'=>$get['cid']))->select();

			$this->page=$show;
			$this->goods=$goods;
			$this->sort=$sort;
			$this->price=$price;
			$this->sex=$get['sex'];
			$this->second_category=$second_category;
			$this->third_categorys=$third_categorys;
			$this->display('index2');
		}
		//一级分类页面
		if($get['level']==1){
			if(!$get['sort']){
				$get['sort']=1;
			}
			if(!$get['price']){
				$get['price']=1;
			}
			if(!$get['sex']){
				$get['sex']=0;
			}
			//直接点击一级分类
			if(($get['sort']==1)&&($get['price']==1)){
				$count=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				//默认按流行排序（浏览次数）
				$goods=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1))->order('-views')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=1;
				$price=1;
			}
			//分类页面排序选择流行，价格选择0~100
			if(($get['sort']==1)&&($get['price']==2)){
				$count=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('0','100'))))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('0','100'))))->order('-views')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=1;
				$price=2;
			}
			//分类页面排序选择流行，价格选择101~200
			if(($get['sort']==1)&&($get['price']==3)){
				$count=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('101','200'))))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('101','200'))))->order('-views')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=1;
				$price=3;
			}
			//分类页面排序选择流行，价格选择201~500
			if(($get['sort']==1)&&($get['price']==4)){
				$count=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('201','500'))))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('201','500'))))->order('-views')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=1;
				$price=4;
			}
			//分类页面排序选择流行，价格选择500元以上
			if(($get['sort']==1)&&($get['price']==5)){
				$count=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('gt',500)))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('gt',500)))->order('-views')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=1;
				$price=5;
			}
			//分类页面排序选择热销，价格选择全部
			if(($get['sort']==2)&&($get['price']==1)){
				$count=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1))->order('-sales')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=2;
				$price=1;
			}
			//分类页面排序选择热销，价格选择0~100
			if(($get['sort']==2)&&($get['price']==2)){
				$count=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('0','100'))))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('0','100'))))->order('-sales')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=2;
				$price=2;
			}
			//分类页面排序选择热销，价格选择101~200
			if(($get['sort']==2)&&($get['price']==3)){
				$count=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('101','200'))))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('101','200'))))->order('-sales')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=2;
				$price=3;
			}
			//分类页面排序选择热销，价格选择201~500
			if(($get['sort']==2)&&($get['price']==4)){
				$count=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('201','500'))))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('201','500'))))->order('-sales')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=2;
				$price=4;
			}
			//分类页面排序选择热销，价格选择500元以上
			if(($get['sort']==2)&&($get['price']==5)){
				$count=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('gt',500)))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('gt',500)))->order('-sales')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=2;
				$price=5;
			}
			//分类页面排序选择最新，价格选择全部
			if(($get['sort']==3)&&($get['price']==1)){
				$count=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1))->order('-add_time')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=3;
				$price=1;
			}
			//分类页面排序选择最新，价格选择0~100
			if(($get['sort']==3)&&($get['price']==2)){
				$count=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('0','100'))))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('0','100'))))->order('-add_time')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=3;
				$price=2;
			}
			//分类页面排序选择最新，价格选择101~200
			if(($get['sort']==3)&&($get['price']==3)){
				$count=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('101','200'))))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('101','200'))))->order('-add_time')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=3;
				$price=3;
			}
			//分类页面排序选择最新，价格选择201~500
			if(($get['sort']==3)&&($get['price']==4)){
				$count=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('201','500'))))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('between',array('201','500'))))->order('-add_time')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=3;
				$price=4;
			}
			//分类页面排序选择最新，价格选择500元以上
			if(($get['sort']==3)&&($get['price']==5)){
				$count=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('gt',500)))->count();
				$Page=getpage($count,C('SECOND_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('first_category'=>$get['cid'],'sex'=>$get['sex'],'is_sale'=>1,'price'=>array('gt',500)))->order('-add_time')->limit($Page->firstRow,$Page->listRows)->select();
				$sort=3;
				$price=5;
			}


			//获取一级分类名称
			$Goods_category=M('Goods_category');
			$first_category=$Goods_category->where(array('id'=>$get['cid']))->find();
			$second_categorys=$Goods_category->where(array('pid'=>$first_category['id']))->select();
	    	//一级分类下的二级分类下的三级分类
	    	$i=1;
	    	$third_categorys=array();
	    	foreach ($second_categorys as $second_category) {
	    		$third_categorys[$i]=$Goods_category->where(array('pid'=>$second_category['id']))->select();
	    		$i++;
	    	}

			$this->page=$show;
			$this->goods=$goods;
			$this->sort=$sort;
			$this->sex=$get['sex'];
			$this->price=$price;
			$this->first_category=$first_category;
			$this->second_categorys=$second_categorys;
			$this->third_categorys=$third_categorys;
			$this->display('index');
		}

		// $this->display();
	}
}

 ?>