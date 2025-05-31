<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Project extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'projects';
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

    public function status()
    {
        return $this->belongsTo(ProjectStatus::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'created_by');
        // If your foreign key isn't 'user_id', you need to specify it (like 'created_by')
    }
    public function assessees()
    {
        return $this->hasMany(Assessee::class);
        // If your foreign key isn't 'user_id', you need to specify it (like 'created_by')
    }
    public function employees()
    {
        return $this->hasMany(Employee::class);
        // If your foreign key isn't 'user_id', you need to specify it (like 'created_by')
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
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

    public function getDurationFormattedAttribute()
    {
        return $this->duration . ' day(s)';
    }
}
