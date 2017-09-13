<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/30
 * Time: 14:39
 */

namespace App;
use Lavary\Menu\Menu;

class Sidebar
{
    public function __construct()
    {
        Menu::make('MyNavBar', function($menu){

            $menu->add('Home');
            $menu->add('About',    'about');
            $menu->add('services', 'services');
            $menu->add('Contact',  'contact');

        });
    }
}