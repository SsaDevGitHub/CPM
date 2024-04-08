<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DB;

class ReportController extends Controller
{

    public function viewdashboard(){
        $user = Auth::user();
        $data = [
            'user'=>$user,
        ];
        return response()->json([
            'status' => true,
            'msg' =>'Details fetched succesfully',
            'data' => $data,
        ],200);
    }

}