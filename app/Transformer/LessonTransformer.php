<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/31
 * Time: 10:57
 */

namespace App\Transformer;

class LessonTransformer extends Transformer
{
    public function transform($lessons)
    {
        return[
            'title'=>$lessons['title'],
            'content'=>$lessons['body'],
            'is_free'=>(boolean)$lessons['free']
        ];
    }
}