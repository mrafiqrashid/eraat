<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'employees';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];

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
    public function race()
    {
        return $this->belongsTo(Race::class, 'race_id');
    }
    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }
    public function maritialStatus()
    {
        return $this->belongsTo(MaritialStatus::class, 'maritial_status_id');
    }
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
        // If your foreign key isn't 'user_id', you need to specify it (like 'created_by')
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
    public function getRaceNameAttribute()
    {
        return $this->races?->race; // or whatever your column is
    }
    public function getEducationLevelNameAttribute()
    {
        return $this->educationLevel?->education_level; // or whatever your column is
    }
    public function getMaritialStatusNameAttribute()
    {
        return $this->maritialStatus?->maritial_status; // or whatever your column is
    }
}
