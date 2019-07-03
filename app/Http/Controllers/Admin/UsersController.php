<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入数据库
//use DB;
//导入Hash加密类
use Hash;
//导入表单校验类
use App\Http\Requests\UsersInsertRequest;
//导入模型类
use App\Models\Userss;
//导入自定义类
use A;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取搜索的参数
        $k=$request->input("keyword");
        $key=$request->input("keywords");
        //获取列表数据
        //通过模型获取数据
        $data=Userss::where("username","like","%".$k."%")->where("email","like","%".$key."%")->paginate(2);
        //$data=DB::table("users")->where("username","like","%".$k."%")->where("email","like","%".$key."%")->paginate(2);
        //加载模板
        return view("Admin.Users.index",['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加模板
        return view("Admin.Users.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersInsertRequest $request)
    {
        //处理添加方法
        // dd($request->all());
        $data=$request->except(['repassword','_token']);
        //加密密码
        $data['password']=Hash::make($data['password']);
        $data['status']=1;
        $data['token']=str_random(50);
        // dd($data);
        if(Userss::create($data)){
            return redirect("/adminusers")->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //获取会员详情数据
    public function show($id)
    {
        //调用关联数据
        $info=Userss::find($id)->info;
        // dd($info);
        return view("Admin.Users.info",['info'=>$info]);
    }

    //获取会员的收货地址
    public function address($id){
        $address=Userss::find($id)->address;
        return view("Admin.Users.address",['address'=>$address]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        //获取修改的数据
        $data=Userss::find($id);
        //加载一个修改页面
        return view("Admin.Users.edit",['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //获取修改的数据
        $data=$request->except(["_token",'_method']);
        //执行修改
        if(Userss::where("id","=",$id)->update($data)){
            return redirect("/adminusers")->with("success","修改成功");
        }else{
            return back()->with("error","修改失败");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // echo"删除的是".$id;
        // 删除
        if(Userss::where("id","=","$id")->delete()){
            return redirect("/adminusers")->with("success","删除成功");
        }else{
            return back()->with("error","删除失败");
        }
    }
    //自定义函数
    public function a(){
        fun(13562192933);
    }
    //自定义类
    public function xxoo(){
        //实例化类A
        $class = new A();
        $class->sendphone();
    }
     public function d(){
        
        pays(time(),"商品支付","0.01","商品支付");
    }

    public function returnurl(){
        
        echo "支付ok";
    }
}
