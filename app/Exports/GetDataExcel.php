<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class GetDataExcel implements ToCollection {

    public function collection(Collection $rows)
    {   
        return $rows;
    }
}

