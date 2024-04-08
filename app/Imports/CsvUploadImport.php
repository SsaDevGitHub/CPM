<?php



namespace App\Imports;



use App\Models\Employee;

use Maatwebsite\Excel\Concerns\ToModel;

use Carbon\Carbon;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CsvUploadImport implements ToModel,WithHeadingRow

{

    /**

    * @param array $row

    *

    * @return \Illuminate\Database\Eloquent\Model|null

    */

    

    protected $company_id;



    public function __construct($company_id)

    {

        $this->company_id = $company_id;

    }



    public function model(array $row)

    {

        

        // $id = Auth()->user()->id;



        // $company_id = $this->company_id; 

        // dd($company_id);



            return new Employee([

                'employee_id' => $row['employee_id'],

                'company_id' => intval($this->company_id),

                'name' => $row['name'],

                'role' => $row['role'],

                'basic' => $row['basic'],

                'hra' => $row['hra'],

                'special_allowance' => $row['special_allowance'],

                'statutory_bonus' => $row['statutory_bonus'],

                'pf' => $row['pf'],
                'epf' => $row['epf'],

                'esic' => $row['esic'],
                'eesic' => $row['eesic'],

                'gross' => $row['gross'],

                'total_benefit' => $row['total_benefit'],

            ]);

    }

}