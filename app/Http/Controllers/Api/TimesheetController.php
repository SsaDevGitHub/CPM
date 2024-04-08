<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Client;
use App\Models\AssigmentMap;
use App\Models\AM_Employee;
use App\Models\AM_Partner;
use App\Models\Timesheet;
use App\Models\Assignment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DB;
use Validator;
use Carbon\Carbon;

class TimesheetController extends Controller
{

    public function timesheetlist(Request $request){    

        $user = Auth::user();
        if(!$user){
            return response()->json([
                'status' => false,
                'msg' =>'User is not authenticated!',
            ],400);
        }

        $assignment_map_employee = [];
        $selected = "";
        $msg = "there are no assignment mapped to this employee";
        if(isset($request->employee_id)){
            $selected = $request->employee_id;
            $assignment_map_employee = AM_Employee::where('employee_id',$request->employee_id)->with(['employee_one','assignment_map','assignment_map_partner'])->get();
            $msg = "Assignment mapped to this employee fetched successfully";
        }

        $data = array(
            'assignment_map_employee'        => $assignment_map_employee,
            'selected'        => $selected,        
        );
        
        return response()->json([
            'msg'=>$msg,
            'data'=>$data,
        ],200);

        
    }



    public function edittimesheetview(Request $request,$id){
    
        $user = Auth::user();
        if(!$user){
            return response()->json([
                'status' => false,
                'msg' =>'User is not authenticated!',
            ],400);
        }
        $assignment_map_employee = AM_Employee::where('id',$id)->with(['employee_one','assignment_map','assignment_map_partner'])->first();
        $timesheet = Timesheet::where('am_employee_id',$id)->first();
        $data = array(
            'data' => $assignment_map_employee,
            'timesheet' => $timesheet,
        );
        return response()->json([
            'msg'=>'timesheet details fetched successfully',
            'data'=>$data,
        ],200);

    }

    public function edittimesheetsubmit(Request $request,$id){
        $user = Auth::user();
        if(!$user){
            return response()->json([
                'status' => false,
                'msg' =>'User is not authenticated!',
            ],400);
        }
        $AM_Employee = AM_Employee::where('id',$id)->with(['employee_one','assignment_map','assignment_map_partner'])->first();
        $timesheet = Timesheet::updateOrCreate(['am_employee_id'=> $id,],[

            "client_id"    => $AM_Employee->assignment_map->client->id,
            "employee_id"    => $AM_Employee->employee_one->id ,
            "assignment_id"      => $AM_Employee->assignment_map->assignment->id ,
            "assignment_map_id"    => $AM_Employee->assignment_map->id ,

            "hours"    => $request->hours ,
            "remarks"     => $request->remarks ,
            "mode"   => $request->mode ,
            "location"      => $request->location ,
            "amount"     => $request->amount ,
            "location_gps"   => $request->location_gps ,
            "location_address"    => $request->location_address ,
        ]);

        return response()->json([
            'msg'=>'timesheet details submitted successfully',
            'data'=>'',
        ],200);

    }

}