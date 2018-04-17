<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Base extends Controller
{
    public function operate($model,$data,$where)
    {
        $status    = 0;
        $message   = '操作失败';
        $count = 0;
        $validate=validate($model);
        if(!$validate->check($data)){
            $message = $validate->getError();
        }else if($where&&!model($model)->get($data['id'])){
            unset($data['id']);
            model($model)->allowField(true)->save($data);
            $status  = 1;
            $message = '操作成功';
        }else if($where&&model($model)->allowField(true)->save($data, ['id' => $data['id']])){
                $status  = 1;
                $message = '操作成功';
        }
        else if(model($model)->allowField(true)->save($data)) {
                $status  = 1;
                $message = '新增成功';
        }
        return [
            'status'  => $status,
            'message' => $message,
        ];
    }
    public function delete($model,$post_data)
    {
        $status    = 0;
        $message   = '删除失败';    
        if (model($model)->destroy(intval($post_data['id']))) {
            $status  = 1;
            $message = '删除成功';
        }
        return [
            'status'  => $status,
            'message' => $message,
            'count' =>model($model)->count(),
        ];
    }
}
