<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(request $request){
        $user = new User;
        $users = $user::paginate(10);
        return view('users.list', compact('users'));
    }
    public function active($id)
    {
        $user = User::findOrFail($id);
        $user->active = !$user->active; // Đảo ngược trạng thái
        $user->save();

        return back()->with('success', 'Cập nhật trạng thái thành công!');
    }

}
