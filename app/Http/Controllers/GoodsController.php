<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use Illuminate\Http\Request;
use App\Models\Goods;
use App\DataTables\GoodsDataTables;
use Illuminate\Support\Facades\Mail;
use Str;

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

    public function contact()
    {
        return view('feane.contact');
    }

    public function upload()
    {
        $file = request()->file('file');
        $ext = Str::after($file->getMimeType(),'/');
        $path = $file->storeAs(
            'contact', request()->name."_".date('ymdhis').".".$ext,['disk'=>'public']
        );
        $url = asset("storage".$path);

        $data = [
            'name' => request()->name,
            'phone' => request()->phone,
            'subject' => request()->subject,
            'msg' => request()->message,
            'path' => $url,
        ];
        $result = Mail::to('biig@kakao.com')->send(new TestEmail($data));
        return $result;
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

    public function list(GoodsDataTables $dataTable)
    {
        $goods = new Goods();

        return $dataTable->render('admin.goods.index');
    }
}
