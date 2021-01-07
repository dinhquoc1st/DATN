<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
 
class UserController extends Controller
{
    public function getDangNhap(){
        return view('login');
    }
    public function postDangNhap(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|min:3|max:32'
        ],[
         'email.required' => 'Bạn chưa nhập Email',
         'password.required' => 'Bạn chưa nhập Password',
         'password.min' => 'Password không được nhỏ hơn 3 ký tự',
         'password.max' => 'Password không vượt quá 32 ký tự'
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('index')->with('thongbao','Đăng nhập thành công');
        }
        else{
            return redirect('index')->with('loi','Đăng nhập không thành công');
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect('index');
    }
    public function postRegister(Request $request)
    {
        $this->validate($request,
        [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email', 
            'password' => 'required',
        ],
        [
            'name.required'=>'Bạn chưa nhập Tên.',
            'name.min'=>'Độ dài kí tự phải trên 3',
            'name.max'=>'Độ dài kí tự không quá 50',
            'email.required'=>'Bạn chưa nhập Email.',
            'email.unique'=>'Email đã tồn tại.',
            'email.email'=>'Không đúng kiểu Email.',
            'password.required'=>'Nhập Password '
        ]
        );
        if ($request->ajax()) {
            $id =  User::insertGetId([
                'ten'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'roles' => 0
            ]);
            return response()->json($request->name);
        }
    }

}
