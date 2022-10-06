<?php

namespace App\Imports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportContacts implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
         new Contact([
            'title' => $row['title'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'mobile' => $row['mobile'],
            'company_name' => $row['company_name']
        ]);
        
    }
}
