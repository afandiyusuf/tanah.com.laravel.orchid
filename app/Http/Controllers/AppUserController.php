<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppUser;

class AppUserController extends Controller
{
    public function me(Request $request){
        $user = AppUser::where('token', $request->input('token'))->first();
        return response()->json(['user' => $user]);
    }
}
