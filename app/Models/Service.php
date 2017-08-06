<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    use SoftDeletes;
    
    protected $table = 'services';

    /**
     * Get sub_forms for service
     */
    public function subForms()
    {
        return $this->belongsToMany('App\Models\SubForm');
    }
}