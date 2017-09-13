<?php

namespace App\Http\Controllers;

use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CaptchaController extends Controller
{
    public function captcha()
    {
        $builder = new CaptchaBuilder();

        $builder->build(160,60,null);

        Session::flash('laravist-captcha',$builder->getPhrase());


        header('Cache-Control: no-cache,must-revalidate');
        header('Content-type: image/jpeg');
        $builder->output();
    }
}
