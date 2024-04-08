<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\User;
use App\Models\Client;
use App\Models\Employee;
use App\Models\AssigmentMap;
use App\Models\Assignment;
use App\Models\AM_Employee;
use App\Models\AM_Partner;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use DB;
use Validator;
class employeeController extends Controller
{


    

    
    public function deleteemployee(Request $request){ 
        $sesionAmin = session('Admin_id');
        
        if(empty($sesionAmin)){
            return redirect('/');
        }
        
        $getid = $request['id'];
        $datatable = DB::table('employee')->where('id',$getid)->delete();
        return redirect()->back();
    }
    
    public function addemployeeview(){
 
        $sesionAmin = session('Admin_id');
        
        if(empty($sesionAmin)){
            return redirect('/');
        }
        
        $data = array(
            'active' => "employee",
            'activetxt' => "employeeadd",
        );

        return view('Admin/employee/addemployee')->with($data);

    }

    
    public function getEmpData(Request $request){
         
        $sesionAmin = session('Admin_id');
        
        if(empty($sesionAmin)){
            return redirect('/');
        }
        
        $datatable = DB::table('employee')->where('id',$request->Itemdata)->first();
        return response()->json([
            'status'=>true,"msg"=>"Employee Details","data"=>$datatable
        ],200);
    }

    public function employeelist(){
         
        $sesionAmin = session('Admin_id');
        
        if(empty($sesionAmin)){
            return redirect('/');
        }
        
        $active       = 'employee';
        $activetxt    = 'employeelist';
        $datatable = DB::table('employee')->orderByDesc('id')->get();

        $data = array(

            'datatable'        => $datatable,
            'active'        => $active,
            'activetxt'     => $activetxt,  
        
        );
        return view('Admin/employee/employeelist')->with($data);
    }


    public function addemployee(Request $request){
         
        $sesionAmin = session('Admin_id');
        
        if(empty($sesionAmin)){
            return redirect('/');
        }
        
        $vald = [
            "name"      => "required",
            "official_email"     => "required",
            "entity"     => "required",
            "department"     => "required",
            "sub_department"     => "required",
            "emppc"     => "required",
            "location"     => "required",
            "designation"     => "required",
            "moderator"     => "required",
            "fname"     => "required",
            "caddress"     => "required",
            "adhaar"   => "required",
            "pan"   => "required",
            "email"     => "required",
            "mobile"     => "required",
            "dob"      => "required",
            "doj"     => "required",
            "status"     => "required",
            "ctc_annual"    => "required",
            "ctc_per_hour"    => "required",
            "rc_per_hour"     => "required",
        ];

        $validator = Validator::make($request->all(),$vald);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        DB::table('employee')->insert([
            "name"      =>   $request->name,
            "official_email"     =>   $request->official_email,
            "entity"     =>   $request->entity,
            "department"     =>   $request->department,
            "subdepartment"     =>   $request->sub_department,
            "emppc"     =>   $request->emppc,
            "location"     =>   $request->location,
            "designation"     =>   $request->designation,
            "moderator"     =>   $request->moderator,
            "fname"     =>   $request->fname,
            "caddress"     =>   $request->caddress,
            "paddress"     =>   $request->paddress?$request->paddress:$request->caddress,
            "adhaar"   =>   $request->adhaar,
            "pan"   =>   $request->pan,
            "qualification"   =>   $request->qualification,
            "membership_no"   =>   $request->membership_no,
            "email"     =>   $request->email,
            "mobile"     =>   $request->mobile,
            "dob"      =>   $request->dob,
            "doj"     =>   $request->doj,
            "date_n"    =>   $request->date_n,
            "status"     =>   $request->status,
            "ctc_annual"    =>   $request->ctc_annual,
            "ctc_per_hour"    =>   $request->ctc_per_hour,
            "rc_per_hour"     =>   $request->rc_per_hour,
        ]);

        return redirect()->route('Admin.employeelist');
         
    }
    
    public function editemployeeview(Request $request){ 
        $sesionAmin = session('Admin_id');
        
        if(empty($sesionAmin)){
            return redirect('/');
        }
        
        $getid = $request->id;
        $tabledata = DB::table('employee')->where('id',$getid)->first();
           
        $active       = 'employee';
        $activetxt    = 'employeelist';

        $data = array(
            'tabledata' => $tabledata,
            'active'        => $active,
            'activetxt'     => $activetxt,  
        );
        return view('Admin/employee/editemployee')->with($data);        
    }

    public function editemployee(Request $request , $id){
 
        $sesionAmin = session('Admin_id');
        
        if(empty($sesionAmin)){
            return redirect('/');
        }
        
        $vald = [
            "name"      => "required",
            "employee_id"      => "required",
            "official_email"     => "required",
            "entity"     => "required",
            "department"     => "required",
            "sub_department"     => "required",
            "emppc"     => "required",
            "location"     => "required",
            "designation"     => "required",
            "moderator"     => "required",
            "fname"     => "required",
            "caddress"     => "required",
            "adhaar"   => "required",
            "pan"   => "required",
            "email"     => "required",
            "mobile"     => "required",
            "dob"      => "required",
            "doj"     => "required",
            "status"     => "required",
            "ctc_annual"    => "required",
            "ctc_per_hour"    => "required",
            "rc_per_hour"     => "required",
        ];

        $validator = Validator::make($request->all(),$vald);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        $user = Employee::find($id);
        $user->name      =   $request->name;
        $user->official_email     =   $request->official_email;
        $user->entity     =   $request->entity;
        $user->department     =   $request->department;
        $user->subdepartment     =   $request->sub_department;
        $user->emppc     =   $request->emppc;
        $user->location     =   $request->location;
        $user->designation     =   $request->designation;
        $user->moderator     =   $request->moderator;
        $user->fname     =   $request->fname;
        $user->caddress     =   $request->caddress;
        $user->paddress     =   $request->paddress;
        $user->adhaar   =   $request->adhaar;
        $user->pan   =   $request->pan;
        $user->qualification   =   $request->qualification;
        $user->membership_no   =   $request->membership_no;
        $user->email     =   $request->email;
        $user->mobile     =   $request->mobile;
        $user->dob      =   $request->dob;
        $user->doj     =   $request->doj;
        $user->date_n    =   $request->date_n;
        $user->status     =   $request->status;
        $user->ctc_annual    =   $request->ctc_annual;
        $user->ctc_per_hour    =   $request->ctc_per_hour;
        $user->rc_per_hour     =   $request->rc_per_hour;
        $user->save();
        return redirect()->route('Admin.employeelist');

    }



    






    
    public function deleteassignment(Request $request){
        $getid = $request['id'];
        $datatable = DB::table('assignment')->where('id',$getid)->delete();
        return redirect()->back();
    }
    
    public function addassignmentview(){

        $data = array(
            'active' => "assignment",
            'activetxt' => "assignmentadd",
        );

        return view('Admin/assignment/addassignment')->with($data);

    }

    public function assignmentlist(){
        
        $active       = 'assignment';
        $activetxt    = 'assignmentlist';
        $datatable = DB::table('assignment')->orderByDesc('id')->get();

        $data = array(

            'datatable'        => $datatable,
            'active'        => $active,
            'activetxt'     => $activetxt,  
        
        );
        return view('Admin/assignment/assignmentlist')->with($data);
    }


    public function addassignment(Request $request){
        
        DB::table('assignment')->insert([
            "name"      =>   $request->name,
            "practice"     =>   $request->practice,
            "status"     =>   $request->status,
        ]);

        return redirect()->route('Admin.assignmentlist');
         
    }
    
    public function editassignmentview(Request $request){
        $getid = $request->id;
        $tabledata = DB::table('assignment')->where('id',$getid)->first();
           
        $active       = 'assignment';
        $activetxt    = 'assignmentlist';

        $data = array(
            'tabledata' => $tabledata,
            'active'        => $active,
            'activetxt'     => $activetxt,  
        );
        return view('Admin/assignment/editassignment')->with($data);        
    }

    public function editassignment(Request $request , $id){

        $user = Assignment::find($id);
        $user->name      =   $request->name;
        $user->practice     =   $request->practice;
        $user->status     =   $request->status;
        $user->save();     
        return redirect()->route('Admin.assignmentlist');

    }








    
    public function deleteassignment_map(Request $request){
        $getid = $request['id'];
        $datatable = DB::table('assignment_map')->where('id',$getid)->delete();
        return redirect()->back();
    }
    
    public function addassignment_mapview(){

        $data = array(
            'active' => "assignment_map",
            'activetxt' => "assignment_mapadd",
        );

        return view('Admin/assignment_map/addassignment_map')->with($data);

    }

    public function assignment_maplist(){
        
        $active       = 'assignment_map';
        $activetxt    = 'assignment_maplist';
        $datatable = AssigmentMap::with(['client','assignment'])->get();

        $data = array(

            'datatable'        => $datatable,
            'active'        => $active,
            'activetxt'     => $activetxt,  
        
        );
        return view('Admin/assignment_map/assignment_maplist')->with($data);
    }


    public function addassignment_map(Request $request){
        
        $sesionAmin = session('Admin_id');
                
        if(empty($sesionAmin)){
            return redirect('/');
        }

        $vald = [
            "client_id" => "required",
            "assignemnt_id" => "required",
            "period" => "required",
            "period_end" => "required|date",
            "total_agreed_fees" => "required",
            
            // "assignment_map_id" => "required",

            // "employee_id" => "required",
            // "from_date" => "required",
            // "to_date" => "required",
            // "hours" => "required",
            // "rc_cost" => "required",
            // "actual_cost" => "required",
            // "agreed_fees" => "required",
            // "tl" => "required",
            
            // "assignment_map_id" => "required",
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

        $validator = Validator::make($request->all(),$vald);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        $id = $request->id;

        $assignmentmap = new AssigmentMap;
        $assignmentmap->client_id = $request['client_id'];
        $assignmentmap->assignemnt_id = $request['assignemnt_id'];
        $assignmentmap->period = $request['period'];
        $assignmentmap->period_end = Carbon::parse($request['period_end'])->format('Y-m-d');
        $assignmentmap->total_agreed_fees = $request['total_agreed_fees'];
        $assignmentmap->save();

        

        $assignment_map_id = $assignmentmap->id;
        $employee_id = $request['employee_id'];
        $from_date = $request['from_date'];
        $to_date = $request['to_date'];
        $hours = $request['hours'];
        $rc_cost = $request['rc_cost'];
        $actual_cost = $request['actual_cost'];
        $agreed_fees = $request['agreed_fees'];
        $tl = $request['tl'];


        foreach($employee_id as $key => $employees){

            $AM_Employee = new AM_Employee;
            $AM_Employee->assignment_map_id = $assignment_map_id;
            $AM_Employee->employee_id = $employees;
            $AM_Employee->from_date = Carbon::parse($from_date[$key])->format('Y-m-d');
            $AM_Employee->to_date = Carbon::parse($to_date[$key])->format('Y-m-d');
            $AM_Employee->hours = $hours[$key];
            $AM_Employee->rc_cost = $rc_cost[$key];
            $AM_Employee->actual_cost = $actual_cost[$key];
            $AM_Employee->agreed_fees = $agreed_fees[$key];
            $AM_Employee->tl = $tl[$key]?$tl[$key]:0;
            $AM_Employee->save();

        }
        

        $datasub = new AM_Partner;        
        $datasub->assignment_map_id = $assignment_map_id;
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

        return redirect()->route('Admin.assignment_maplist');
         
    }
    
    public function editassignment_mapview(Request $request){

        $getid = $request->id;
        $tabledata = AssigmentMap::where('id',$getid)->first();
        $AM_Employee = AM_Employee::where('assignment_map_id',$tabledata->id)->get();
        $AM_Partner = AM_Partner::where('assignment_map_id',$tabledata->id)->first();
           
        $active       = 'assignment_map';
        $activetxt    = 'assignment_maplist';

        $data = array(
            'tabledata' => $tabledata,
            'AM_Employee' => $AM_Employee,
            'AM_Partner' => $AM_Partner,
            'active'        => $active,
            'activetxt'     => $activetxt,  
        );
        return view('Admin/assignment_map/editassignment_map')->with($data);        

    }

    public function editassignment_map(Request $request , $id){

        $sesionAmin = session('Admin_id');
                
        if(empty($sesionAmin)){
            return redirect('/');
        }


        $vald = [
            "client_id" => "required",
            "assignemnt_id" => "required",
            "period" => "required",
            "period_end" => "required|date",
            "total_agreed_fees" => "required",
            
            // "assignment_map_id" => "required",

            // "employee_id" => "required",
            // "from_date" => "required",
            // "to_date" => "required",
            // "hours" => "required",
            // "rc_cost" => "required",
            // "actual_cost" => "required",
            // "agreed_fees" => "required",
            // "tl" => "required",
            
            // "assignment_map_id" => "required",
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

        $validator = Validator::make($request->all(),$vald);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        // dd($request->all());

        $assignmentmap = AssigmentMap::findOrFail($id);        
        if(!$assignmentmap){
            return redirect()->back()->withErrors('Assignment Map id does not exist!');
        }
        $assignmentmap->client_id = $request['client_id'];
        $assignmentmap->assignemnt_id = $request['assignemnt_id'];
        $assignmentmap->period = $request['period'];
        $assignmentmap->period_end = Carbon::parse($request['period_end'])->format('Y-m-d');
        $assignmentmap->total_agreed_fees = $request['total_agreed_fees'];
        $assignmentmap->save();

        
        $assignment_map_id = $assignmentmap->id;
        $AM_Employees_id = $request['AM_Employees_id'];
        $employee_id = $request['employee_id'];
        $from_date = $request['from_date'];
        $to_date = $request['to_date'];
        $hours = $request['hours'];
        $rc_cost = $request['rc_cost'];
        $actual_cost = $request['actual_cost'];
        $agreed_fees = $request['agreed_fees'];
        $tl = $request['tl'];


        foreach($employee_id as $key => $employees){
     
            if(!empty($AM_Employees_id[$key])){
                $AM_Employee = AM_Employee::findOrFail($AM_Employees_id[$key]);
            }else{
                $AM_Employee = new AM_Employee;
            }

            $AM_Employee->assignment_map_id = $assignment_map_id;
            $AM_Employee->employee_id = $employees;
            $AM_Employee->from_date = Carbon::parse($from_date[$key])->format('Y-m-d');
            $AM_Employee->to_date = Carbon::parse($to_date[$key])->format('Y-m-d');
            $AM_Employee->hours = $hours[$key];
            $AM_Employee->rc_cost = $rc_cost[$key];
            $AM_Employee->actual_cost = $actual_cost[$key];
            $AM_Employee->agreed_fees = $agreed_fees[$key];
            if(!empty($tl[$key])){
                $AM_Employee->tl = $tl[$key];
            }else{
                $AM_Employee->tl = 0;
            }
            $AM_Employee->save();

        }
        
        if($request['AM_Partner_id']){
            $datasub = AM_Partner::findOrFail($request['AM_Partner_id']);
        }else{
            $datasub = new AM_Partner;
        }
        $datasub->assignment_map_id = $assignment_map_id;
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

        return redirect()->route('Admin.assignment_maplist');

    }





}