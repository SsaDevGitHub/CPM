<?php



namespace App\Models;


use App\Models\Client;
use App\Models\Assignment;
use Illuminate\Database\Eloquent\Model;



class AssigmentMap extends Model

{

		protected $table='assignment_map';

		protected $primaryKey='id';

		public  $timestamps = false;

		public  $fillable = ['client_id','assignemnt_id','period','period_end','total_agreed_fees',];

		public function client(){
			return $this->hasOne(Client::class,'id','client_id');
		}
		public function assignment(){
			return $this->hasOne(Assignment::class,'id','assignemnt_id');
		}
		public function assingment_employee(){
			return $this->hasMany(AM_Employee::class,'assignment_map_id','id');
		}
		public function assingment_partner(){
			return $this->hasOne(AM_Partner::class,'assignment_map_id','id');
		}

}
