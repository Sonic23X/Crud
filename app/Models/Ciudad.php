<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'city';

    protected $fillable = [
        'Name',
        'CountryCode',
        'District',
        'Population',
    ];
}
