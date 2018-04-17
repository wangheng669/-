<?php

namespace app\admin\validate;

use think\Validate;

class Score extends Validate
{
    //定义规则
    protected $rule    = [
        'id'       => 'number',
        'group_id' => 'require|number',
        'value' => 'require|number',
    ];
    protected $message = [
        'group_id.require' => '分组不能为空',
        'group_id.number' => '分组格式错误',
        'value.require' => '业绩不能为空',
        'value.number' => '业绩格式错误',
    ];
}
