<?php

namespace App\Imports;

use App\Models\Voter;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VotersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Voter([
            'fullname' => $row['fullname'],
            'username' => $row['username'],
            'password' => bcrypt($row['password']),
            'password_text' => $row['password'],
        ]);
    }
}
