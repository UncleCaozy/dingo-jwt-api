<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/31
 * Time: 10:50
 */
namespace App\Transformer;

abstract class Transformer
{
    public function transformCollection($items)
    {
        return array_map([$this,'transform'],$items);
    }

    public abstract function transform($items);
}