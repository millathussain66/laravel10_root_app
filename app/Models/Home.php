<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $table = 'homes';

    protected $fillable = [
        'cb_number',
        'account_number',
        'petitioner',
        'account_name',
        'accused_name',
        'branch_name_code',
        'case_filing_date',
        'case_number',
        'hc_division',
        'case_category',
        'case_type',
        'present_status',
        'request_type',
        'district',
        'suit_value',

    ];
}
