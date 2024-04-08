<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;



class Assignment extends Model

{

   	    protected $table='assignment';

    	protected $primaryKey='id';

    	public  $timestamps = false;

    	public  $fillable = [
                'name','practice','status',
        ];
}
