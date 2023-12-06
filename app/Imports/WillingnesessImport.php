<?php

namespace App\Imports;

use App\Models\Willingness;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WillingnesessImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Willingness([
            'pin'               => $row['pin'],
            'start_date'        => $row['start_date'], 
            'end_date'          => $row['end_date'], 
            'day_code'          => $row['day_code'],
            'time_of_entry'     => $row['time_of_entry'], 
            'time_of_return'    => $row['time_of_return'], 
            'created_at'        => now(), 
        ]);
    }
}