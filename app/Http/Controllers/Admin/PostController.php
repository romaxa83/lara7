<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Store;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->when(request('search'), function ($query, $search) {
                if (config('database.default') === 'mysql') {
                    $query->whereRaw('match(title, body) against(? in boolean mode)', [$search])
                        ->selectRaw('*, match(title, body) against(? in boolean mode) as score', [$search]);
                }

                if (config('database.default') === 'sqlite') {
                    throw new \Exception('This lesson does not support SQLite.');
                }

                if (config('database.default') === 'pgsql') {
                    $search = implode(' | ', array_filter(explode(' ', $search)));
                    $query->selectRaw("*, ts_rank(searchable, to_tsquery('english', ?)) as score", [$search])
                        ->whereRaw("searchable @@ to_tsquery('english', ?)", [$search])
                        ->orderByRaw("ts_rank(searchable, to_tsquery('english', ?)) desc", [$search]);
                }
            }, function ($query) {
                $query->latest('published_at');
            })
            ->paginate();

        return view('admin.post.index', ['posts' => $posts]);
    }
}
