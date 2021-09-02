<?php

namespace App\Http\Controllers\Backend\Orders;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        $payments = Payment::all();
        return view('admin.orders.payments.index', compact('payments'));
    }
    public function create(){
        $payments = Payment::all();
        return view('admin.orders.payments.create', compact('payments'));
    }
    public function store(Request $request){
        $payments = new Payment();
        $payments->payment_method = $request->input('inputName');

        $payments->save();
        if($payments){
            return back()->with('success', 'Thêm thành công');
        }else{
            return back()->with('error', 'Thêm thất bại');
        }
    }
    public function update(Request $request, $id){
        $payments = Payment::find($id);
        $payments->Payment_name = $request->input('inputName');
        $payments->Payment_email = $request->input('inputEmail');
        $payments->Payment_phone = $request->input('inputPhone');
        $payments->Payment_password = md5($request->input('inputPassword'));

        $payments->save();
        if($payments){
            return back()->with('success', 'Sửa thành công');
        }else{
            return back()->with('error', 'Sửa thất bại');
        }
    }
    public function edit($id){
        $payments =  Payment::all()->find($id);
        return view('admin.orders.payments.edit', compact('payments'));

    }
    public function delete($id){
        Payment::destroy($id);
        return back()->with('success','Dữ liệu xóa thành công.');

    }
    public function paymentChangeStatus(Request $request){
        $payments = Payment::find($request->payment_id);
        $payments->status = $request->status;
        $payments->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
