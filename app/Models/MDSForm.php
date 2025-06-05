<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MDSForm extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'mds_forms';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    protected $casts = [
        'neck_a' => 'boolean',
        'neck_b' => 'boolean',
        'shoulder_a' => 'boolean',
        'shoulder_b' => 'boolean',
        'upperBack_a' => 'boolean',
        'upperBack_b' => 'boolean',
        'upperArm_a_left' => 'boolean',
        'upperArm_a_right' => 'boolean',
        'upperArm_b_left' => 'boolean',
        'upperArm_b_right' => 'boolean',
        'elbow_a_left' => 'boolean',
        'elbow_a_right' => 'boolean',
        'elbow_b_left' => 'boolean',
        'elbow_b_right' => 'boolean',
        'lowerArm_a_left' => 'boolean',
        'lowerArm_a_right' => 'boolean',
        'lowerArm_b_left' => 'boolean',
        'lowerArm_b_right' => 'boolean',
        'wrist_a_left' => 'boolean',
        'wrist_a_right' => 'boolean',
        'wrist_b_left' => 'boolean',
        'wrist_b_right' => 'boolean',
        'hand_a_left' => 'boolean',
        'hand_a_right' => 'boolean',
        'hand_b_left' => 'boolean',
        'hand_b_right' => 'boolean',
        'lowerBack_a' => 'boolean',
        'lowerBack_b' => 'boolean',
        'thigh_a_left' => 'boolean',
        'thigh_a_right' => 'boolean',
        'thigh_b_left' => 'boolean',
        'thigh_b_right' => 'boolean',
        'knee_a_left' => 'boolean',
        'knee_a_right' => 'boolean',
        'knee_b_left' => 'boolean',
        'knee_b_right' => 'boolean',
        'calf_a_left' => 'boolean',
        'calf_a_right' => 'boolean',
        'calf_b_left' => 'boolean',
        'calf_b_right' => 'boolean',
        'ankle_a_left' => 'boolean',
        'ankle_a_right' => 'boolean',
        'ankle_b_left' => 'boolean',
        'ankle_b_right' => 'boolean',
        'feet_a_left' => 'boolean',
        'feet_a_right' => 'boolean',
        'feet_b_left' => 'boolean',
        'feet_b_right' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
        // If your foreign key isn't 'user_id', you need to specify it (like 'created_by')
    }

    public function assessee()
    {
        return $this->belongsTo(Assessee::class, 'assessee_id');
        // If your foreign key isn't 'user_id', you need to specify it (like 'assessee_id')
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
        // If your foreign key isn't 'user_id', you need to specify it (like 'assessee_id')
    }
    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
        // If your foreign key isn't 'user_id', you need to specify it (like 'task_id')
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
