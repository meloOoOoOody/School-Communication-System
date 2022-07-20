<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{

    protected $table = 'classes';

    public $timestamps = true;

    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    ##############################Relationships##############################
    public function class_group()
    {
        return $this->hasMany(ClassGroup::class);
    }

    public function class_subject()
    {
        return $this->hasMany(ClassSubject::class);
    }

    public function class_events()
    {
        return $this->hasMany(ClassEvent::class);
    }


    public function groupes()
    {
    	return $this -> belongsToMany('App\Models\Group', 'class_group', 'school_class_id','group_id', 'id', 'id');
    }

    public function events()
    {
    	return $this -> belongsToMany('App\Models\Event', 'class_event', 'school_class_id','event_id', 'id', 'id');
    }

    public function subjects()
    {
    	return $this -> belongsToMany('App\Models\Subject', 'class_subject', 'school_class_id','subject_id', 'id', 'id');
    }

    

}
