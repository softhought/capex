<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function companyMaster()
    {
        return $this->belongsTo(Company::class, 'company');
    }

    public function gradeMaster()
    {
        return $this->belongsTo(Grade::class, 'grade');
    }
}
