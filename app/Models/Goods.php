<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Goods extends Model
{
    protected $table = 'tb_goods';
    public $timestamps = false;
    protected $connection = 'mysql';

    public function getItems()
    {
        $limit = 16;
        if(!request()->has('page')) $offset = 0;
        else $offset = ( request()->page - 1 ) * $limit;

        $qry = $this->select('category', DB::Raw("CONCAT(size,'(cm)') as size"),DB::Raw("IFNULL(CONCAT(size2,'(cm)'), '') AS size2"),'size3','name','id','code', 'code2','file_name')
            ->offset($offset)->limit($limit)->orderBy('code', 'desc');
        if(request()->cate == 'new') $qry->whereRaw("code like 'new%'");
        else if(request()->cate != '') $qry->where('category', request()->cate);

        if(request()->cate2 != '') $qry->where('size3', request()->cate2);
        if(request()->keyword != '') $qry->whereRaw("code2 like '%".request()->keyword."%' or name like '%".request()->keyword."%'");
        $datas = $qry->get();

        return $datas;
    }

    public function getTotalCnt()
    {
        $qry = $this->select(DB::Raw('count(*) as cnt'));

        if(request()->cate == 'new') $qry->whereRaw("code like 'new%'");
        else if(request()->cate != '') $qry->where('category', request()->cate);

        if(request()->cate2 != '') $qry->where('size3', request()->cate2);
        if(request()->keyword != '') $qry->whereRaw("code2 like '%".request()->keyword."%' or name like '%".request()->keyword."%'");

        $cnt = $qry->first();
        return $cnt;
    }

    public function getItem()
    {
        $datas = $this->select('tb_goods.*',DB::Raw('group_concat(tb_goods_detail.file_name) as details'))
            ->leftJoin('tb_goods_detail','tb_goods.id','=','tb_goods_detail.goods_id')
            ->where('tb_goods.id',request()->id)
            ->groupBy('tb_goods.id')
            ->first();

        return $datas;
    }

    public function getDetailCate()
    {
        $cate2 = $this->select(DB::Raw('size3'))->where('category', request()->cate)->groupBy('size3')
            ->orderByRaw("CASE WHEN size3 like '%자%' THEN 0 ELSE 1 END ASC, size3 DESC")
            ->get();
        return $cate2;
    }
}
