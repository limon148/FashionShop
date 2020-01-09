<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Str;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class SliderController extends Controller
{
    public function index()
    {
        return view('admin.add_slider');
    }
    public function save_slider(Request $request)
    {
        $this->AdminAuthCheck();
        $data=array();
        $data['publication_status']=$request->publication_status;
        $image=$request->file('slider_image');
        if($image){
            $image_name=Str::random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $img_full_name=$image_name.'.'.$ext;
            $upload_path='slider/';
            $img_url=$upload_path.$img_full_name;
            $success=$image->move($upload_path, $img_full_name);
            if($success){
                $data['slider_image']=$img_url;
                    DB::table('tbl_slider')->insert($data);
                    Session::put('message', 'Slider Successfully Added');
                    return Redirect::to ('/add-slider');
            }

        }
        $data['slider_image']='';
            DB::table('tbl_slider')->insert($data);
            Session::put('message', 'Slider Added Successfully without image');
            return Redirect::to ('/add-slider');
    }
    public function all_slider()
    {
        $this->AdminAuthCheck();
        $all_slider=DB::table('tbl_slider')->get();
        $manage_slider=view('admin.all_slider')
            ->with('all_slider',$all_slider);
        return view('admin_layout')
            ->with('admin.all_slider',$manage_slider);
    }
    public function unactive_slider($slider_id)
    {
        DB::table('tbl_slider')
            ->where('slider_id',$slider_id)
            ->update(['publication_status' => 0]);
        Session::put('message','Slider unactivateded successfully !!');
        return Redirect::to('/all-slider');
    }
    public function active_slider($slider_id)
    {
        DB::table('tbl_slider')
            ->where('slider_id',$slider_id)
            ->update(['publication_status' => 1]);
        Session::put('message','Slider activateded successfully !!');
        return Redirect::to('/all-slider');
    }
    public function delete_slider($slider_id)
    {
        DB::table('tbl_slider')
            ->where('slider_id',$slider_id)
            ->delete();
        Session::put('message','Slider Deleted successfully');
        return Redirect::to('/all-slider');
    }

    public function AdminAuthCheck()
    {
        $admin_id=Session::get('admin_id');
        if ($admin_id) {
            return;
        }else {
            return Redirect::to('/admin')->send();
        }
    }
}
