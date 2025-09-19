<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientDependentInformation extends Model
{
    protected $guarded = ['is_same_as_primary'];
}
