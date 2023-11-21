<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $dataUser = User::all();
        foreach ($dataUser as &$item) {
            $item->is_admin = (int) $item->is_admin;
        }
        unset($item);
        return response()->json($dataUser);
    }
}
