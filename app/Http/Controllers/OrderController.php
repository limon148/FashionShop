<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function index()
    {
        $this->AdminAuthCheck();
        $all_order_info=DB::table('tbl_order')
                        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
                        ->select('tbl_order.*','tbl_customer.customer_name')
                        ->get();
        $manage_order=view('admin.manage_order')
            ->with('all_order_info',$all_order_info);
        return view('admin_layout')
            ->with('admin.manage_order',$manage_order);
        
    }
    public function unactive_order($order_id)
    {
        DB::table('tbl_order')
            ->where('order_id',$order_id)
            ->update(['order_status' => 'delivered']);
        Session::put('message','Order delivered successfully !!');
        return Redirect::to('/manage-order');
    }
    public function active_order($order_id)
    {
        DB::table('tbl_order')
            ->where('order_id',$order_id)
            ->update(['order_status' => 'pending']);
        Session::put('message','Order activateded successfully !!');
        return Redirect::to('/manage-order');
    }
    public function view_order($order_id)
    {
        $this->AdminAuthCheck();
        $order_by_id=DB::table('tbl_order')
                        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
                        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
                        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
                        ->select('tbl_order.*','tbl_customer.*','tbl_order_details.*','tbl_shipping.*')
                        ->get();
        $view_order=view('admin.view_order')
            ->with('order_by_id',$order_by_id);
        return view('admin_layout')
            ->with('admin.view_order',$view_order);
        // echo "<pre>";
        // print_r($order_by_id);
        // echo "</pre>";
        
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
