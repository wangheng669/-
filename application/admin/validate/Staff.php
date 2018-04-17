<?php

namespace app\admin\validate;

use think\Validate;

class Staff extends Validate
{
    //定义规则
    protected $rule    = [
        'id'       => 'number',
        'username' => 'require',
    ];
    protected $message = [
        'username.require' => '用户不能为空',
    ];
}
