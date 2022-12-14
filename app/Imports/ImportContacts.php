<?php

namespace App\Imports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Collection;
class ImportContacts implements ToCollection,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function collection(Collection $rows)
    {

        foreach($rows as $row) {
            Contact::updateOrCreate([
                'mobile' => $row[3],
            ],[
                'title' => $row[0],
                'first_name' => $row[1],
                'last_name' => $row[2],
                'company_name' => $row[4]
            ]);
        }

        return "success";

        
    }

    public function startRow(): int {
        return 2;
    }
}
