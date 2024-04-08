<?php



namespace App\Models;

use App\Models\Employee;
use App\Models\AssigmentMap;
use App\Models\AM_Partner;

use Illuminate\Database\Eloquent\Model;



class AM_Employee extends Model

{

   	    protected $table='am_employee';

    	protected $primaryKey='id';

    	public  $timestamps = false;

    	public  $fillable = ['assignment_map_id','employee_id','from_date','to_date','hours','rc_cost','actual_cost','agreed_fees','tl',];

        public function employee_one(){
            return $this->hasOne(Employee::class,'id','employee_id')->select(['id','name']);
        }
		public function assignment_map(){
            return $this->hasOne(AssigmentMap::class,'id','assignment_map_id')->with(['client','assignment']);
        }
		public function assignment_map_partner(){
            return $this->hasOne(AM_Partner::class,'assignment_map_id','assignment_map_id');
        }

}
