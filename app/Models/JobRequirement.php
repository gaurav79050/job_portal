<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
use Illuminate\Database\Eloquent\SoftDeletes;
class JobRequirement extends Model
{
    use HasFactory;
    use SoftDeletes; 
    public function job()
    {
        return $this->belongsTo(Job::class,'id', 'job_id');
    }
}
