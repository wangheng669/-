<?php

namespace app\admin\validate;

use think\Validate;

class Group extends Validate
{
    //定义规则
    protected $rule    = [
        'id'       => 'number',
        'group_name' => 'require',
    ];
    protected $message = [
        'group_name.require' => '分组名称不能为空',
    ];
}
