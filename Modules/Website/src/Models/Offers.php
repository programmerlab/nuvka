<?php

declare(strict_types=1);
namespace Modules\Website\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Offers extends Authenticatable
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'offers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /**
     * The primary key used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    //protected $dates = ['due_date'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $guarded = ['created_at', 'updated_at', 'id'];


    public function assignUser()
    {
        return $this->hasOne('App\User', 'id', 'assignUserId') ;
    }

    public function interestedUser()
    {
        return $this->hasMany('App\User', 'id', 'interestedUserId')->select('id', 'first_name', 'last_name', 'profile_image') ;
    }

    public function task()
    {
        return $this->belongsTo('App\Models\Tasks', 'taskId', 'id');
    }


    public function mytask()
    {
        return $this->hasOne('App\Models\Tasks', 'id', 'taskId');
    }
}
