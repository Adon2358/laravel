<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class LoginModel extends Model
{
     //指定表名
     protected $table = 'user';

     /*
      * 注册
      */
     public function m_rigster($res)
     {
         $username = $res['username'];
         $data1 = DB::table($this->table)->where('username',$username)->first();
         if($data1)
         {
             return 2;
         }else{
             $data = DB::table($this->table)->insert($res);

             if($data)
             {
                 return 1;
             }else{
                 return 2;
             }
         }

     }
     /*
      * 登录
      */
     public function m_login($res)
     {
         $username = $res['username'];
         $password = $res['password'];
         $data = DB::table($this->table)->where('username',$username)->first();
         if($data)
         {
             if($password == $data->password)
             {
                 return 1;
             } else {
                 return 3;
             }

         }else{
             return 2;
         }
     }

     /*
      * 规则验证
      */
//    public function rules()
//    {
//        return [
//            'username' => 'required|string|max:30|unique:mi_user',
//            'password' => 'required|string|max:32',
//            'mobile' => 'required|string|max:11|unique:mi_user',
//            'verificode' => 'required|captcha',

//        ];
//    }
}