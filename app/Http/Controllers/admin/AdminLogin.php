<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminLogin extends Controller
{
    public function login(Request $request) {
        // الكود الخاص بتسجيل الدخول للمشرفين
       $request->validate([
           'email' => 'required|email',
           'password' => 'required',
       ]);

      $admin =  Admin::where('email', $request->email)->first();
      if($admin && Hash::check($request->password, $admin->password)) {
         return redirect()->route('admin.dashboard');
      } else {
          return redirect()->back()->with('error', 'Invalid email or password');
      }
    }
}
