<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    //
    function __construct()
    {
        // khai báo ràng buộc only ad trên 1 số phương thức khác nhau của lớp chúng ta đang thực thi gọi middleware 
        //only liệt kê những action được kích hoạt middleware
        $this->middleware('CheckAge')->only('index', 'show');
        //những user đi vào trong cần phải xác thực
        $this->middleware('auth');
        //cần biết middleware ad trên những action nào
        // $this->middleware('CheckAge')->except('show');
    }
    function index()
    {
        return view('admin');
    }
    function show()
    {
        return view('admin');
    }
    function dashboard()
    {
        //lấy quyền và tt người login quan eloquent orm
        $users = Auth::user();
        return $users->role->name;
        // return $users;
        // return "Ok";
    }
}
