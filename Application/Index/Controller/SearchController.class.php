<?php 
namespace Index\Controller;
use Think\Controller;

/**
* 搜索控制器
*/
class SearchController extends CommonController
{
	public function index(){
		$keyword=I('post.keyword');
		//模糊查询商品第一名称
		$Goods=M('Goods');
		$Goods_category=M('Goods_category');
		$Goods_brand=M('Goods_brand');
		$count=$Goods->where(array('first_name'=>array('like','%'.$keyword.'%'),'is_sale'=>1,'sex'=>0))->count();
		if($count){
			$Page=getpage($count,C('THIRD_CATEGORY_GOODS_SHOW'));
			$show=$Page->show();
			$goods=$Goods->where(array('first_name'=>array('like','%'.$keyword.'%'),'is_sale'=>1,'sex'=>0))->order(array('sales'=>desc))->limit($Page->firstRow,$Page->listRows)->select();
			$this->goods=$goods;
			$this->keyword=$keyword;
			$this->page=$show;
			$this->display();
			return;
		}
		//模糊查询商品第一名称不存在，按商品三级分类查询(查分类时是精确查询)
		$category=$Goods_category->where(array('level'=>3,'name'=>$keyword))->find();
		if($category){
			$count=$Goods->where(array('shop_goods_category_id'=>$category['id'],'is_sale'=>1,'sex'=>0))->count();
			if($count){
				$Page=getpage($count,C('THIRD_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('shop_goods_category_id'=>$category['id'],'is_sale'=>1,'sex'=>0))->order(array('sales'=>desc))->limit($Page->firstRow,$Page->listRows)->select();
				$this->goods=$goods;
				$this->keyword=$keyword;
				$this->page=$show;
				$this->display();
				return;
			}
		}
		//商品三级分类查询不存在，按商品二级分类查询
		$category=$Goods_category->where(array('level'=>2,'name'=>$keyword))->find();
		if($category){
			$count=$Goods->where(array('second_category'=>$category['id'],'is_sale'=>1,'sex'=>0))->count();
			if($count){
				$Page=getpage($count,C('THIRD_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('second_category'=>$category['id'],'is_sale'=>1,'sex'=>0))->order(array('sales'=>desc))->limit($Page->firstRow,$Page->listRows)->select();
				$this->goods=$goods;
				$this->keyword=$keyword;
				$this->page=$show;
				$this->display();
				return;
			}
		}
		//商品二级分类查询不存在，按商品一级分类查询
		$category=$Goods_category->where(array('level'=>1,'name'=>$keyword))->find();
		if($category){
			$count=$Goods->where(array('first_category'=>$category['id'],'is_sale'=>1,'sex'=>0))->count();
			if($count){
				$Page=getpage($count,C('THIRD_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('first_category'=>$category['id'],'is_sale'=>1,'sex'=>0))->order(array('sales'=>desc))->limit($Page->firstRow,$Page->listRows)->select();
				$this->goods=$goods;
				$this->keyword=$keyword;
				$this->page=$show;
				$this->display();
				return;
			}
		}
		//商品一级分类查询不存在，按商品品牌查询
		$brand=$Goods_brand->where(array('name'=>$keyword))->find();
		if($brand){
			$count=$Goods->where(array('shop_goods_brand_id'=>$brand['id'],'is_sale'=>1,'sex'=>0))->count();
			if($count){
				$Page=getpage($count,C('THIRD_CATEGORY_GOODS_SHOW'));
				$show=$Page->show();
				$goods=$Goods->where(array('shop_goods_brand_id'=>$brand['id'],'is_sale'=>1,'sex'=>0))->order(array('sales'=>desc))->limit($Page->firstRow,$Page->listRows)->select();
				$this->goods=$goods;
				$this->keyword=$keyword;
				$this->page=$show;
				$this->display();
				return;	
			}
		}
		
		$this->keyword=$keyword;
		$this->display();
	}

}
 ?>