<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;

class GoodsController extends Controller
{
    public function index()
    {
        if(!request()->has('page')) $page = 1;
        else $page = request()->page;

        $goods = new Goods();
        $cate2 = null;
        $queryString = '';
        if(request()->has('cate')) {
            $queryString .= "&cate=".request()->cate;
            if(request()->has('cate2')) $queryString .= "&cate2=".request()->cate2;
            $cate2 = $goods->getDetailCate();
        }
        if(request()->has('keyword')) $queryString .= "&keyword=".request()->keyword;

        $items = $goods->getItems();
        $totPage = $goods->getTotalCnt();

        return view('feane.main',
            [
                'items'=>$items,
                'cate2'=>$cate2,
                'queryString'=> $queryString,
                'pageInfo' => [
                    'page' => $page,
                    'totPage' => $totPage->cnt,
                    'block' => 16
                ],
            ]);
    }

    public function addItem()
    {
        $goods = new Goods();
        $result = $goods->getItems();
        return response()->json(array('data'=> $result), 200);
    }

    public function detail()
    {
        $goods = new Goods();
        $item = $goods->getItem();
        return view('feane.about', ['item'=>$item]);
    }
}
