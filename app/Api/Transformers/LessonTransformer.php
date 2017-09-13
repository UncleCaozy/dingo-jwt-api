<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/13
 * Time: 14:26
 */
namespace App\Api\Transformers;
use App\Lesson;
use League\Fractal\TransformerAbstract;

class LessonTransformer extends TransformerAbstract
{
    public function transform(Lesson $lessons){
        return[
            'title'=>$lessons['title'],
            'content'=>$lessons['body'],
            'is_free'=>(boolean)$lessons['free']
        ];
    }
}