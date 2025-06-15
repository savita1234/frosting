<?php

namespace App\Imports;

use App\Models\Sale;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class SalesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Sale|null
     */
    public function model(array $row)
    {
        // dd($row);
        $formattedDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date'])->format('Y-m-d');
        return new Sale([
           'date'     => $formattedDate,
           'branch_id'    => $row['branch_id'], 
           'total_cash' => $row['total_cash'],
           'total_gpay' => $row['online_amount'],
           'collection' => $row['daily_collection'],
           'material_amount' => $row['material_amount'],
           'essentials_amount' => $row['expenses'],

        ]);
    }
}