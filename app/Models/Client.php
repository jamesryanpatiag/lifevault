<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Client extends Model
{
    protected $guarded = [];
    public function businessInformation() {
        return $this->hasOne(BusinessInformation::class);
    }

    public function policies() {
        return $this->hasMany(ClientPolicyInformation::class, 'client_id', 'id');
    }

    public function dependencies() {
        return $this->hasMany(ClientDependentInformation::class, 'client_id', 'id');
    }

    public function clientStatus() {
        return $this->belongsTo(ClientStatus::class, 'client_status_id', 'id');
    }

    public function documents() {
        return $this->hasMany(ClientDocument::class, 'client_id', 'id');
    }

    protected function name() : Attribute {
        return Attribute::make(
            get: fn () => $this->first_name . ' ' . $this->last_name,
        );
    }
}
