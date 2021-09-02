<?php


namespace App\Http\Controllers\Backend\Authentication;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{


    public function index()
    {
        session()->forget('email_resend');
        session()->forget('resent');
        return view('admin.auth.login');
    }

    public function store(Request $request)
    {
        $credential = $request->only('email', 'password');

        $remember = $request->has('remember');

        if (auth()->attempt($credential, $remember)) {

            if (auth()->user()->email_verified_at === null) {
                auth()->logout();
                return redirect()->back()->with('error', 'Vui lòng kích hoạt tài khoản trước khi tiếp tục');
            }
            return redirect()->route('home.page');
            /*if (auth()->user()->level === 4) {
                return redirect('/admin');
            }
            if (auth()->user()->level === 3) {
                return redirect('/users');
            }
            if (auth()->user()->level === 2) {
                return redirect('/staffs');
            }*/
        } else {
            return redirect()->back()->with('error', 'Đăng nhập thất bại');
        }
    }

    public function destroy()
    {
        Auth::logout();
        return view('admin.auth.login');
    }

}
