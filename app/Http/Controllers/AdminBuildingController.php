<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Building;
use App\Models\User;
use File;

class AdminBuildingController extends Controller
{
    function __construct(){
        $this->middleware(function($request, $next){
            session(['module_active' => 'building']);
            return $next($request);
        });
    }

    function show(){
        $buildings = Building::paginate(10);
        return view('admin.building.show', compact('buildings'));
    }

    function add(){
        $users = User::all();
        return view('admin.building.add', compact('users'));
    }

    function store(Request $request){
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'phone' => 'required|string',
                'email' => 'required|email',
                'address' => 'required',
                'manager' => 'required',
                'image' => 'required'
            ],
            [
                'max' => ':attribute có độ dài tối đa :max ký tự',
                'required' => ':attribute không được để trống',
            ],
            [
                'name' => 'Tên tòa nhà',
                'phone' => 'Số điện thoại',
                'email' => 'Email',
                'address' => 'Địa chỉ',
                'manager' => 'Người quản lý',
                'image' => 'Logo'
            ]
        );

        $input = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'id_manager' => $request->input('manager'),
            'actived' => (int)$request->input('status')
        ];

        if($request->hasFile('image')){
            $file = $request->image;
            $filename = $file->getClientOriginalName();
            $path = $file->move('public/uploads/building',$filename);
            $image = "public/uploads/building/". $filename;
            $input['logo'] = $image;
        }
        Building::create($input);
        return redirect('admin/building/list')->with('status','Thêm tòa nhà mới thành công');
    }
}
