<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IERAChecklist extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'iera_checklists';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    protected $casts = [
        'fe_ll_question_1a_applicable' => 'boolean',
        'fe_ll_question_1b_applicable' => 'boolean',
        'fe_ll_question_2a_applicable' => 'boolean',
        'fe_ll_question_2b_applicable' => 'boolean',
        'fe_ll_question_3a_applicable' => 'boolean',
        'fe_ll_question_3b_applicable' => 'boolean',
        'fe_ll_question_4a_applicable' => 'boolean',
        'fe_ll_question_4b_applicable' => 'boolean',
        'fe_ll_question_5a_applicable' => 'boolean',
        'fe_ll_question_5b_applicable' => 'boolean',
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
