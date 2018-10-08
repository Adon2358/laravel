<?php
namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;

class LogModel
{
    public function insert_log()
    {
//        var_dump($_SERVER);die;
        $log = [
            'request_time' => $_SERVER['REQUEST_TIME'],
            'server_addr' => $_SERVER['SERVER_ADDR'],
            'address' => "北京海淀",
            'http_user_agent' => $_SERVER['HTTP_USER_AGENT'],
        ];
        $data = DB::table('user_insert_log')->insert($log);
    }
}