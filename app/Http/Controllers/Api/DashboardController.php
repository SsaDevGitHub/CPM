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

use App\Models\Assignment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DB;
use Validator;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function clientlist($id=null){

        $user = Auth::user();
        if(!$user){
            return response()->json([
                'status' => false,
                'msg' =>'User is not authenticated!',
            ],400);
        }

        if($id !== null){
            $client = Client::where('id',$id)->first();
            $msg = "Client Details fetched Successfully";
        }else{
            $client = Client::get();
            $msg = "Client List fetched Successfully";
        }

        $data = array(
            'client' => $client ,
        );
        return response()->json([
            'msg'=>$msg,
            'data'=>$data,
        ]);

    }
    

    public function addclient(Request $request){
        
        $user = Auth::user();
        if(!$user){
            return response()->json([
                'status' => false,
                'msg' =>'User is not authenticated!',
            ],400);
        }

        $id = $request->id;

        $vald = [
            "name"      => 'required',
            "communication_address"     => 'required',
            "pan"   => 'required',
            "mobile"    => 'required',
            "email"     => 'required',
            "status"    => 'required',
            "gstin"     => 'required',
            "state"     => 'required',
            "dob"   => 'required|date',
        ];


        $clientEmail = Client::where('email',$request->email)->get();
        if($id == null){
            if(count($clientEmail) > 0){
                return response()->json([
                    'status' => false,
                    'msg' => 'The email has already been taken',
                    'data' => '',
                ],400);
            }
            $msg = "Client Created Successfully";
        }else{
            $clientid = Client::where('id',$id)->first();

            if($clientid->email != $request->email && count($clientEmail) > 0){
                return response()->json([
                    'status' => false,
                    'msg' => 'The email has already been taken',
                    'data' => '',
                ],400);
            }
            $msg = "Client Updated Successfully";
        }

        $validator = Validator::make($request->all(),$vald);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first(),
                'data' => '',
            ],400);
        }

        $data = Client::updateOrCreate(['id'=>$id],[
            "name"      =>   $request->name,
            "group"     =>   $request->group,
            "kind_att"      =>   $request->kind_att,
            "communication_address"     =>   $request->communication_address,
            "pan"   =>   $request->pan,
            "tan_no"    =>   $request->tan_no,
            "active_status"     =>   $request->active_status,
            "mobile"    =>   $request->mobile,
            "email"     =>   $request->email,
            "associated_from"   =>   $request->associated_from,
            "status"    =>   $request->status,
            "gstin"     =>   $request->gstin,
            "state"     =>   $request->state,
            "dob"   =>   $request->dob,
        ]);

        return response()->json([
            'msg'=>$msg,
            'data'=>$data,
        ],200);

    }

    public function deleteclient($id){

        $user = Auth::user();
        if(!$user){
            return response()->json([
                'status' => false,
                'msg' =>'User is not authenticated!',
            ],400);
        }

        $client = Client::where('id',$id)->first();
        if(!$client){
            return response()->json([
                'msg'=>'Client Does Not Exist!',
                'data'=>'',
            ],200);
        }
        $client->delete();
        return response()->json([
            'msg'=>'Client Has Been Deleted Successfully',
            'data'=>'',
        ],200);

    }


    public function Assignmentlist($id=null){

        $user = Auth::user();
        if(!$user){
            return response()->json([
                'status' => false,
                'msg' =>'User is not authenticated!',
            ],400);
        }

        if($id !== null){
            $Assignment = Assignment::where('id',$id)->first();
            $msg = "Assignment fetched successfully";
        }else{
            $Assignment = Assignment::get();
            $msg = "Assignment list fetched successfully";
        }

        $data = array(
            'Assignment' => $Assignment ,
        );
        return response()->json([
            'msg'=>$msg,
            'data'=>$data,
        ]);

    }
    

    public function addAssignment(Request $request){
        
        $user = Auth::user();
        if(!$user){
            return response()->json([
                'status' => false,
                'msg' =>'User is not authenticated!',
            ],400);
        }

        $vald = [
            "name"      => 'required',
            "practice"     => 'required',
            "status"   => 'required',
        ];

        $id = $request->id;

        $Assignmentname = Assignment::where('name',$request->name)->get();
        if($id == null){
            if(count($Assignmentname) > 0){
                return response()->json([
                    'status' => false,
                    'msg' => 'The name has already been taken',
                    'data' => '',
                ],400);
            }
            $msg = "Assignment Created Successfully";
        }else{
            $Assignmentid = Assignment::where('id',$id)->first();

            if($Assignmentid->name != $request->name && count($Assignmentname) > 0){
                return response()->json([
                    'status' => false,
                    'msg' => 'The name has already been taken',
                    'data' => '',
                ],400);
            }
            $msg = "Assignment Updated Successfully";
        }

        $validator = Validator::make($request->all(),$vald);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first(),
                'data' => '',
            ],400);
        }

        $data = Assignment::updateOrCreate(['id'=>$id],[
            "name"      =>   $request->name,
            "practice"     =>   $request->practice,
            "status"      =>   $request->status,
        ]);

        return response()->json([
            'msg'=>$msg,
            'data'=>$data,
        ],200);

    }

    public function deleteAssignment($id){

        $user = Auth::user();
        if(!$user){
            return response()->json([
                'status' => false,
                'msg' =>'User is not authenticated!',
            ],400);
        }

        $Assignment = Assignment::where('id',$id)->first();
        if(!$Assignment){
            return response()->json([
                'msg'=>'Assignment Does Not Exist!',
                'data'=>'',
            ],200);
        }
        $Assignment->delete();
        return response()->json([
            'msg'=>'Assignment Has Been Deleted Successfully',
            'data'=>'',
        ],200);

    }

    public function dropdown_list(){

        $assigment = DB::table('assignment')->select(['name','id'])->get();
        $client = DB::table('client')->select(['name','id'])->get();
        $employee = DB::table('employee')->select(['name','id'])->get();
        $states = DB::table('states')->get();
        $groups = DB::table('groups')->get();

        $data = array(
            'assigment' => $assigment ,
            'client' => $client ,
            'employee' => $employee ,
            'states' => $states ,
            'groups' => $groups ,
        );

        return response()->json([
            'msg'=>'list fetched Success fully',
            'data'=>$data,
        ]);

    }

    public function employee_cost(Request $request){

        $id = $request['id']; 

        $employee = DB::table('employee')->where('id',$id)->select(['name','id','ctc_annual','ctc_per_hour','rc_per_hour'])->first();

        $data = array(
            'employee' => $employee ,
        );
        return response()->json([
            'msg'=>'list fetched Success fully',
            'data'=>$data,
        ]);

    }

    public function assignment_map_list(Request $request){

        $user = Auth::user();
        if(!$user){
            return response()->json([
                'status' => false,
                'msg' =>'User is not authenticated!',
            ],400);
        }

        $aassignmentMap = AssigmentMap::with(['client','assignment'])->get();

        return response()->json([
            'status' => false,
            'msg' =>'Assignment Map List fetched successfully',
            'data' =>$aassignmentMap,
        ],200);

    }
    
    public function assignment_map_step_one(Request $request){
        $user = Auth::user();
        $id = $request->assignment_map_id;
        if(!$user){
            return response()->json([
                'status' => false,
                'msg' =>'User is not authenticated!',
            ],400);
        }

        if(!$id){
            return response()->json([
                'status' => false,
                'msg' =>'Assignment Map Id not Defined!',
            ],400);
        }

        $aassignmentMap = AssigmentMap::where('id',$id)->with(['client','assignment'])->first();
        if(!$aassignmentMap){
            return response()->json([
                'status' => false,
                'msg' =>'Assignment Map does not exist!',
            ],400);
        }

        return response()->json([
            'status' => false,
            'msg' =>'Assignment Map details fetched successfully',
            'data' =>$aassignmentMap,
        ],200);

    }

    public function assignment_map_submit_step_one(Request $request){

        $user = Auth::user();

        if(!$user){
            return response()->json([
                'status' => false,
                'msg' =>'User is not authenticated!',
            ],400);
        }

        $vald = [
            "client_id" => "required",
            "assignemnt_id" => "required",
            "period" => "required",
            "period_end" => "required|date",
            "total_agreed_fees" => "required",
        ];

        $validator = Validator::make($request->all(),$vald);

        $id = $request->id;

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first(),
                'data' => '',
            ],400);
        }

        try {

            if($id){
                $assignmentmap = AssigmentMap::findOrFail($id);
            }else{
                $assignmentmap = new AssigmentMap;
            }
            $assignmentmap->client_id = $request['client_id'];
            $assignmentmap->assignemnt_id = $request['assignemnt_id'];
            $assignmentmap->period = $request['period'];
            $assignmentmap->period_end = Carbon::parse($request['period_end'])->format('Y-m-d');
            $assignmentmap->total_agreed_fees = $request['total_agreed_fees'];
            $assignmentmap->save();

        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'msg' => 'Something went wrong',
                'data' => '',
            ],400);
        }
        return response()->json([
            'status' => true,
            'msg' =>'Details submitted succesfully',
            'data' =>$assignmentmap->id,
        ],200);

    }


    public function assignment_map_step_two(Request $request){
        $user = Auth::user();
        $id = $request->assignment_map_id;
        if(!$user){
            return response()->json([
                'status' => false,
                'msg' =>'User is not authenticated!',
            ],400);
        }

        if(!$id){
            return response()->json([
                'status' => false,
                'msg' =>'Assignment Map Id not Defined!',
            ],400);
        }

        $aassignmentMap = AssigmentMap::where('id',$id)->first();
        if(!$aassignmentMap){
            return response()->json([
                'status' => false,
                'msg' =>'Assignment Map does not exist!',
            ],400);
        }

        $am_Employee = AM_Employee::where('assignment_map_id',$id)->with('employee_one')->get();
        
        return response()->json([
            'status' => false,
            'msg' =>'Assignment Map Employee list fetched successfully',
            'data' =>$am_Employee,
        ],200);

    }

    public function assign_map_emp(Request $request){

        $user = Auth::user();
        $id = $request->assignment_map_id;
        $employee_id = $request->employee_id;
        if(!$user){
            return response()->json([
                'status' => false,
                'msg' =>'User is not authenticated!',
            ],400);
        }

        if(!$id){
            return response()->json([
                'status' => false,
                'msg' =>'Assignment Map Id not Defined!',
            ],400);
        }

        $aassignmentMap = AssigmentMap::where('id',$id)->first();
        if(!$aassignmentMap){
            return response()->json([
                'status' => false,
                'msg' =>'Assignment Map does not exist!',
            ],400);
        }

        $am_Employee = AM_Employee::where('assignment_map_id',$id)->where('employee_id',$employee_id)->with('employee_one')->first();
        
        return response()->json([
            'status' => false,
            'msg' =>'Assignment Map Employee list fetched successfully',
            'data' =>$am_Employee,
        ],200);

    }

    public function assignment_map_submit_step_two(Request $request){

        $user = Auth::user();

        if(!$user){
            return response()->json([
                'status' => false,
                'msg' =>'User is not authenticated!',
            ],400);
        }

        $vald = [
            "assignment_map_id" => "required",
            "employee_id" => "required",
            "from_date" => "required",
            "to_date" => "required",
            "hours" => "required",
            "rc_cost" => "required",
            "actual_cost" => "required",
            "agreed_fees" => "required",
            "tl" => "required",
        ];

        $id = $request['id'];

        $validator = Validator::make($request->all(),$vald);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first(),
                'data' => '',
            ],400);
        }

        if(isset($id) && !empty($id)){
            $AM_Employee = AM_Employee::findOrFail($id);
        }else{
            $AM_Employee = new AM_Employee;
        }
        $AM_Employee->assignment_map_id = $request['assignment_map_id'];
        $AM_Employee->employee_id = $request['employee_id'];
        $AM_Employee->from_date = $request['from_date'];
        $AM_Employee->to_date = $request['to_date'];
        $AM_Employee->hours = $request['hours'];
        $AM_Employee->rc_cost = $request['rc_cost'];
        $AM_Employee->actual_cost = $request['actual_cost'];
        $AM_Employee->agreed_fees = $request['agreed_fees'];
        $AM_Employee->tl = $request['tl'];
        $AM_Employee->save();

        return response()->json([
            'status' => true,
            'msg' =>'Details submitted succesfully',
            'data' => '',
        ],200);

    }


    public function assignment_map_step_three(Request $request,$assignment_map_id){
        $user = Auth::user();
        if(!$user){
            return response()->json([
                'status' => false,
                'msg' =>'User is not authenticated!',
            ],400);
        }

        $aassignmentMap = AssigmentMap::where('id',$assignment_map_id)->first();
        $AM_Employee = AM_Employee::where('assignment_map_id',$assignment_map_id)
        ->selectRaw('SUM(rc_cost) as rc_cost_sum')
        ->selectRaw('SUM(actual_cost) as actual_cost_sum')
        ->first();
        

        if(!$AM_Employee){
            return response()->json([
                'status' => false,
                'msg' =>'Assignment Map does not have any employee',
            ],400);
        }

        $AM_Partner = AM_Partner::where('assignment_map_id',$assignment_map_id)->first();

        $AM_Employee->rc_cost_margin = 1-($AM_Employee->rc_cost_sum/$aassignmentMap->total_agreed_fees);
        $AM_Employee->actual_cost_margin = 1-($AM_Employee->actual_cost_sum/$aassignmentMap->total_agreed_fees);

        $data = array(
            'am_employee'=>$AM_Employee,
            'am_partner'=>$AM_Partner,
        );

        return response()->json([
            'status' => true,
            'msg' =>'Assignment Employees',
            'data' =>$data,
        ],200);

    }


    public function assignment_map_submit_step_three(Request $request){

        $user = Auth::user();

        if(!$user){
            return response()->json([
                'status' => false,
                'msg' =>'User is not authenticated!',
            ],400);
        }


        $vald = [
            "assignment_map_id" => "required",
            "total_recoverable_c" => "required",
            "recovery_margin" => "required",
            "total_actual_c" => "required",
            "actual_margin" => "required",
            "bd" => "required",
            "co_bd_1" => "required",
            "co_bd_2" => "required",
            "co_bd_3" => "required",
            "executive_bd" => "required",
            "status" => "required",
        ];

        $id = $request['id'];

        $validator = Validator::make($request->all(),$vald);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first(),
                'data' => '',
            ],400);
        }

        if(isset($id) && !empty($id)){
            $datasub = AM_Partner::findOrFail($id);
        }else{
            $datasub = new AM_Partner;
        }
        $datasub->assignment_map_id = $request->assignment_map_id;
        $datasub->total_recoverable_c = $request->total_recoverable_c;
        $datasub->recovery_margin = $request->recovery_margin;
        $datasub->total_actual_c = $request->total_actual_c;
        $datasub->actual_margin = $request->actual_margin;
        $datasub->bd = $request->bd;
        $datasub->co_bd_1 = $request->co_bd_1;
        $datasub->co_bd_2 = $request->co_bd_2;
        $datasub->co_bd_3 = $request->co_bd_3;
        $datasub->executive_bd = $request->executive_bd;
        $datasub->status = $request->status;
        $datasub->save();

        return response()->json([
            'status' => true,
            'msg' =>'Details submitted succesfully',
            'data' => '',
        ],200);

    }

        

}