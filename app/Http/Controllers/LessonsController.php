<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Transformer\LessonTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class LessonsController extends ApiController
{

    protected $lessonTransformer;
    public function __construct(LessonTransformer $lessonTransformer)
    {
        $this->lessonTransformer = $lessonTransformer;
        $this->middleware('auth.basic',['only'=>['store','update']]);
    }

    public function index()
    {
//        $data = array(
//            'title'=>'test model event',
//            'body'=>'test content',
//            'free'=>1
//        );
//        $lesson = Lesson::create($data);
//        if(!$lesson->exists){
//            echo '添加文章失败！';exit();
//        }
//        echo '&lt;'.$lesson->title.'&gt;保存成功！';
        $lessons = Lesson::all();
        return Response::json([
           'status'=>'success',
            'status_code'=>200,
            'data'=>$this->lessonTransformer->transformCollection($lessons->toArray())
        ]);
    }

    public function show($id)
    {
        $lessons = Lesson::find($id);
        if(!$lessons){
            return $this->responseNotFind();
        }
        return Response::json([
            'status'=>'success',
            'status_code'=>200,
            'data'=>$this->lessonTransformer->transform($lessons)
        ]);
    }

    public function store(Request $request)
    {
        if(!$request->get('title') or !$request->get('body')){
            return $this->setStatusCode(422)->responseError('validate fails');
        }
        Lesson::create($request->all());
        return Response::json([
            'status'=>'success',
            'message'=>'Lesson Create!',
            'status_code'=>201,
        ]);
    }



}
