<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class SubForm extends Model
{
    use SoftDeletes;
    
    protected $table = 'sub_forms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'project_name',
        'project_type',
        'comments',
        'terms_and_conditions'
    ];

    /**
     * Get user for sub_form
     * @return array
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get services for sub_form
     * @return array
     */
    public function services()
    {
        return $this->belongsToMany('App\Models\Service', 'sub_form_service', 'sub_form_id', 'service_id');
    }

    public static function submitForm($input)
    {
        $insert['user_id']              = $input['user_id'];
        $insert['project_name']         = $input['project_name'];
        $insert['project_type']         = $input['project_type'];
        $insert['comments']             = $input['comments'];
        $insert['terms_and_conditions'] = ($input['terms_and_conditions'] == 'on') ? 1 : 0;
        $insert['created_at']           = Carbon::now();
        $insert['updated_at']           = Carbon::now();
        
        $result = DB::table('sub_forms')->insertGetId($insert);
        $submitted_form = self::findOrFail($result);
        if($submitted_form) {
            $services_ids = $input['services'];
            foreach ($services_ids as $services_id) {
                $submitted_form->services()->attach($services_id);
            }
        }
        return $result;
    }
}
