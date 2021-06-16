<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Store;
use App\Http\Controllers\Controller;
use App\Models\User\User;
use App\Pipeline\FirstHub;
use App\Pipeline\FirstPipe;
use App\Pipeline\SecondPipe;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class UserController extends Controller
{
    public function export()
    {
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=users.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0",
        ];

        $callback = function (){
            $users = User::all();
            $file = fopen('php://output', 'w');

            // Header Row
            fputcsv($file, ['ID', 'login', 'email', 'status']);

            //Body
            foreach ($users as $user){
                fputcsv($file, [$user->id, $user->login, $user->email, $user->status]);
            }
        };

        return \Response::stream($callback, 200, $headers);
    }
}
