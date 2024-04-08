<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;



class Entity extends Model

{

   	    protected $table='entity';

    	protected $primaryKey='id';

    	public  $timestamps = false;

    	public  $fillable = [ 
                "name",
            "address",
            "pan",
            "gstin",
            "state",
            "entity_pc",
            "lut",
            "bank_name",
            "acc_no",
            "ifsc",
            "branch",
        ];
}
