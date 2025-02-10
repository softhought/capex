<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapexRequest extends Model
{
    use HasFactory;
    protected $table = 'capex_request';
    public function approvalPathDetails()
    {
        return $this->hasMany(ApprovalPath::class, 'capex_request_id');
    }

    
}
