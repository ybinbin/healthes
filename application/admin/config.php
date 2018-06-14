<?php

//配置文件
return [
    'user_administrator' => 1, //管理员用户ID
    // 视图输出字符串内容替换
    'replace_str' => [
        '__JS__' => TPL_PATH . 'admin/js',
        '__CSS__' => TPL_PATH . 'admin/css',
        '__STATIC__' => TPL_PATH . 'static',
        '__IMG__' => TPL_PATH . 'admin/images',
        '__UPLOAD__' => TPL_PATH . 'upload/default',
    ],
];
