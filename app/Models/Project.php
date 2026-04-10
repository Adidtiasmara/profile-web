<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = ['profile_id', 'title', 'description', 'tech_stack', 'status', 'image'];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
