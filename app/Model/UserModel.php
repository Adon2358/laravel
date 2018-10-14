<?php
namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\Model\LogModel;

class UserModel extends Model
{
     //指定表名
     protected $table = 'user';

     /*
      * 注册
      */
     public function add($res)
     {
         $data = DB::table($this->table)->insert($res);

         return $data;
     }

     /*
      * 验证用户唯一性
      */
      public function userNameUnique($arr)
      {
          $userNamem = $arr['username'];
          $userUnique = DB::table($this->table)->where('mobile',$userNamem)->orwhere('email',$userNamem)->first();
 
          return $userUnique;
      }

     /*
      * 登录
      */
     public function getUserInfoByName($userName)
     {
         $data = DB::table($this->table)->where($userName)->first();

         return $data;
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