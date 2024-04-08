<?php



namespace App\Imports;



use App\Models\EmployeePayslip;

use Maatwebsite\Excel\Concerns\ToModel;

use Carbon\Carbon;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

class payslipCsvUploadImport implements ToModel,WithHeadingRow

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



            return new EmployeePayslip([

                'month_year' => date('Y-m-d', strtotime($row['month_year'])),                
                'employee_id' => $row['employee_id'],
                'name' => $row['name'],
                'pf_no' => $row['pf_no'],
                'esi_no' => $row['esi_no'],
                'nod' => $row['nod'],
                'f_name' => $row['f_name'],
                'uan' => $row['uan'],
                'pf' => $row['pf'],
                'esi' => $row['esi'],
                'basic' => $row['basic'],
                'hra' => $row['hra'],
                'fare_wages' => $row['fare_wages'],
                'lw' => $row['lw'],
                'bonus' => $row['bonus'],
                'prod_ince' => $row['prod'],
                'holi_comp' => $row['holi_comp'],
                'canteen' => $row['canteen'],
                'special_allowance' => $row['special_allowance'],
                'other_allowance' => $row['other_allowance'],
                'edu_allow' => $row['edu_allow'],
                'bank_acc' => $row['bank_acc'],
                'ifsc' => $row['ifsc'],
                'lwf' => $row['lwf'],
                'category' => $row['category'],
                'Performance_bonus' => $row['new_performance_bonus'],
                'department' => $row['department'],
                'dev_basic' => $row['dev_basic'],
                'dev_hra' => $row['dev_hra'],
                'dev_special_allowance' => $row['dev_special_allowance'],
                'dev_statutory_bonus' => $row['dev_statutory_bonus'],
                'dev_gross' => $row['dev_gross'],

            ]);

    }

}