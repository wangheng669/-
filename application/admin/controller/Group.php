<?php

namespace app\admin\controller;

use app\admin\Controller\Base;

class Group extends Base
{
    public function saveGroup(){
        $post_data=request()->post();
        return $this->operate('Group',$post_data,false);
    }
    public function deleteGroup(){
        $data=request()->post();
        $post_data['id']=$data['group_id'];
        //删除该组的所有成员
        model('Score')->where(['group_id'=>$post_data['id']])->delete();
        model('staff')->where(['group_id'=>$post_data['id']])->delete();
        return $this->delete('Group',$post_data);
    }
}
