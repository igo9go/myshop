<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function test()
    {
      $this->member_id =1;
        $seckill_set_key = 'seckillOrderSet';
        if(Redis::sismember($seckill_set_key, $this->member_id)){
           return array('status'=>false,'msg'=>'请勿重复参与');
        }
        for ($i=0; $i < 100; $i++) {
            Redis::sadd($seckill_set_key,$i);
        }
        //Redis::sadd($seckill_set_key,$this->member_id);
        Redis::expire($seckill_set_key,'100');
        dd(Redis::SMEMBERS($seckill_set_key));

    }
}
