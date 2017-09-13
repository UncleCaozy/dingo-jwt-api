<?php

namespace App\Providers;

use App\Lesson;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Lesson::saving(function($lesson){
            echo 'saving event is fired<br>';
        });

        Lesson::creating(function($lesson){
            echo 'creating event is fired<br>';
        });

        Lesson::created(function($lesson){
            echo 'created event is fired<br>';
        });

        Lesson::saved(function($lesson){
            echo 'saved event is fired<br>';
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
