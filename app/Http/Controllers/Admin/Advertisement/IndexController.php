<?php

namespace App\Http\Controllers\Admin\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke() {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }
}
