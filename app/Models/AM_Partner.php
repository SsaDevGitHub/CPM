<?php



namespace App\Models;

use App\Models\Employee;

use Illuminate\Database\Eloquent\Model;



class AM_Partner extends Model

{

   	    protected $table='am_partner';

    	protected $primaryKey='id';

    	public  $timestamps = false;

    	public  $fillable = [
            "assignment_map_id",
            "total_recoverable_c",
            "recovery_margin",
            "total_actual_c",
            "actual_margin",
            "bd",
            "co_bd_1",
            "co_bd_2",
            "co_bd_3",
            "executive_bd",
            "status",
        ];

       

}
