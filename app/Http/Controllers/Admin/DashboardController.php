<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        $postsCount = Post::count();

        $usersCount = User::count();

        return view('admin.dashboard', [
            'postsCount' => $postsCount,
            'usersCount' => $usersCount
        ]);
    }
}
