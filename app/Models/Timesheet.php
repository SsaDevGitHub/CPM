<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;



class Timesheet extends Model

{

   	    protected $table='timesheet';

    	protected $primaryKey='id';

    	public  $timestamps = false;

        // public  $nullable = [              
        // ];

    	public  $fillable = [                  
            
                "am_employee_id"      ,

                "client_id"    ,
                "employee_id"      ,
                "assignment_id"      ,
                "assignment_map_id"      ,
                "hours"    ,
                "remarks"     ,
                "mode"   ,
                "location"      ,
                "amount"     ,
                "location_gps"   ,
                "location_address"    ,
        ];
}
