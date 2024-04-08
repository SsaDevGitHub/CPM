<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;



class Client extends Model

{

   	    protected $table='client';

    	protected $primaryKey='id';

    	public  $timestamps = false;

        // public  $nullable = [              
        // ];

    	public  $fillable = [                  
                "group"    ,
                "kind_att"      ,
                "tan_no"    ,
                "active_status"     ,
                "associated_from"   ,

                "name"      ,
                "communication_address"     ,
                "pan"   ,
                "mobile"    ,
                "email"     ,
                "status"    ,
                "gstin"     ,
                "state"     ,
                "dob"   ,
        ];
}
