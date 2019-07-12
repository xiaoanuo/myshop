<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StudentController extends Controller
{
    public function index(Request $request){
        DB::connection('myshop')->enableQueryLog();
        $res = DB::connection('myshop')->table('shop_admin')->get()->toArray();
        $sql = DB::connection('myshop')->getQueryLog();
        var_dump($sql);
        //访问次数
        $redis = new \Redis();
        $redis->connect('127.0.0.1','6379');
        $redis->incr('num');
        $num = $redis->get('num');
        echo "访问次".$num."数";
        $req = $request->all('num');
        $search = '';
        if(!empty($req['search'])){
            $search = $req['search'];
            $info = DB::table('students')->where('name','like','%'.$req['search'].'%')->paginate(2);
        }else{
            $info = DB::table('students')->paginate(2);
        }

        return view('studentList',['student'=>$info,'search'=>$search]);
    }


    /*
     * 修改视图
     * */
    public function update(Request $request){
        $res = $request->all();
        $info = Db::table('students')->where(['id'=>$res['id']])->first();
        return view('studentupdate',['student_info'=>$info]);
    }
    /*
     * 修改执行页面
     * */
    public function do_update(Request $request){
        $res = $request->all();
        unset($res['_token']);  //unset删除数组中的莫一条
        $result = Db::table('students')->where(['id'=>$res['id']])->update($res);
        if($result){
            return redirect('/student/index');
        }else{
            echo "fail";
        }
    }

    /*
     *添加学生信息、进入页面
     * */
    public function add(){

        return view('studentAdd',[]);
    }
    /*
     *添加学生信息、处理数据
     * */
    public function do_add(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'tel' => 'required',
        ],[
            'name.required'=>'姓名必填',
            'tel.required'=>'电话必填',
        ]);
        $info = $request->all();
        unset($info['_token']);  //unset删除数组中的莫一条
        $result = Db::table('students')->insert($info);
        if($result){
            return redirect('/student/index');
        }else{
            echo "fail";
        }
    }

    /*
     * 删除
     * */
    public function delete(Request $request){
        $res = $request->all();
        $result = Db::table('students')->where(['id'=>$res['id']])->delete();
        if($result){
            return redirect('/student/index');
        }else{
            echo "fail";
        }
    }

    public function login(){
        return view('studentlogin');
    }

    public function do_login(Request $request){
        $req = $request->all();
        $request->session()->put('username','name132');
        return redirect('student/index');
        echo '登录成功';
    }
}
