<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;



class Employee extends Model

{

   	    protected $table='employee';

    	protected $primaryKey='id';

    	public  $timestamps = false;

        //     public  $nullable = [
        // ];

    	public  $fillable = [
                "qualification" ,
                "membership_no" ,
                "date_n",
                "name"      ,
            "official_email"     ,
            "entity"     ,
            "department"     ,
            "sub_department"     ,
            "emppc"     ,
            "location"     ,
            "designation"     ,
            "moderator"     ,
            "fname"     ,
            "caddress"     ,
            "adhaar"   ,
            "pan"   ,
            "email"     ,
            "mobile"     ,
            "dob"      ,
            "doj"     ,
            "status"     ,
            "ctc_annual"    ,
            "ctc_per_hour"    ,
            "rc_per_hour"     ,
        ];
}
