<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}

// use App\Models\User;
// class TestController extends Controller
// {
//     public function test() {
//         $users = User::all();
//         return view('test', compact('users'));
//     }
// }
