<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientPolicyInformation extends Model
{
    protected $guarded = ['user_id'];

    public function client() {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function policyOwner() {
        return $this->belongsTo(ClientDependentInformation::class, 'policy_owner_id', 'id');
    }

    public function policyInsured() {
        return $this->belongsTo(ClientDependentInformation::class, 'policy_insured_id', 'id');
    }

    public function policyStatus() {
        return $this->belongsTo(PolicyStatus::class, 'policy_status_id', 'id');
    }
}
