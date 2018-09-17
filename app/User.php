<?php

declare(strict_types=1);

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use EntrustUserTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name','last_name','email', 'role_type','status','password'];  // All field of user table here


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function expiredTask()
    {
        return $this->belongsToMany('App\Models\Tasks', 'saveTask', 'userId', 'taskId')->with('taskPostedUser');
    }

    public function saveTask()
    {
        return $this->belongsToMany('App\Models\Tasks', 'saveTask', 'userId', 'taskId')->with('taskPostedUser')->groupBy('saveTask.taskId')->orderBy('saveTask.id', 'desc');
    }


    public function reportedDetails()
    {
        return $this->hasMany('App\Models\Complains', 'postedUserId')->with('reportedUser');
    }

    public function openTask()
    {
        return $this->hasMany('App\Models\Tasks', 'userId')->where('status', 'open')->with('taskPostedUser');
    }
    public function postedTask2()
    {
        return $this->hasMany('App\Models\Tasks', 'userId')->select(
            '*',
            'id as taskId',
                 \DB::raw('(
                        CASE 
                        when COALESCE(dueDate,CURRENT_DATE) < current_date then "expired" 
                        when post_tasks.taskDoerId!=0 then "assigned"
                        when post_tasks.taskDoerId=0 then "open"
                        ELSE 
                        status end) as status')
        )->with('taskPostedUser');
    }

    public function postedTask()
    {
        return $this->hasMany('App\Models\Tasks', 'userId')->with('taskPostedUser', 'taskAssignedUser');
    }
    public function pendingTask()
    {
        return $this->hasMany('App\Models\Tasks', 'userId')->with('taskPostedUser')->where('status', 'pending');
    }
    public function assignedTask()
    {
        return $this->hasMany('App\Models\Tasks', 'userId')->with('taskPostedUser');
    }
    public function completedTask()
    {
        return $this->hasMany('App\Models\Tasks', 'userId')->with('taskPostedUser')->where('status', 'completed');
    }
    public function offer_task()
    {
        // return $this->hasMany('App\Models\Offers','interestedUserId')->with('mytask');

        return $this->belongsToMany('App\Models\Tasks', 'offers', 'interestedUserId', 'taskId')->with('taskPostedUser')->groupBy('offers.taskId')->orderBy('offers.id', 'desc');
    }



    public function offers_accepting()
    {
        // return $this->hasMany('App\Models\Offers','interestedUserId')->with('mytask');

        return $this->belongsToMany('App\Models\Tasks', 'offers', 'interestedUserId', 'taskId')
             ->select(
                 '*',
                 \DB::raw(
                 '
                    (
                        CASE 
                        when post_tasks.taskDoerId=offers.interestedUserId then "accepted"
                        ELSE 
                        status end)
                         as status'
                        )
                    )
             ->with('taskPostedUser')->groupBy('offers.taskId')->orderBy('offers.id', 'desc');
    }



    public function myOffer()
    {
        // return $this->hasMany('App\Models\Offers','interestedUserId')->with('mytask');

        return $this->belongsToMany('App\Models\Tasks', 'offers', 'interestedUserId', 'taskId')->with('taskPostedUser')->groupBy('offers.taskId')->orderBy('offers.id', 'desc');
    }


    public function save_task()
    {
        return $this->belongsToMany('App\Models\Tasks', 'saveTask', 'userId', 'taskId')->select(
            '*',
                 \DB::raw('(
                        CASE 
                        when COALESCE(dueDate,CURRENT_DATE) < current_date then "expired" 
                        when post_tasks.taskDoerId!=saveTask.userId then "assigned"
                        ELSE 
                        status end) as status')
        )->with('taskPostedUser')->groupBy('saveTask.taskId')->orderBy('saveTask.id', 'desc');
    }

    public function offers_pending()
    {
        return $this->belongsToMany('App\Models\Tasks', 'offers', 'interestedUserId', 'taskId')
            ->select(
                '*',
                \DB::raw('
                    (
                        CASE 
                        when post_tasks.taskDoerId=offers.interestedUserId then "accepted"
                        when post_tasks.taskDoerId=0 then "pending"
                        ELSE 
                        "assigned" end)
                         as status')
                    )
            ->with('taskPostedUser');
    }

    public function postTaskSeeker()
    {
        return $this->hasMany('App\Models\Tasks', 'taskDoerId');
    }

    public function taskTransaction()
    {
        return $this->hasMany('App\Models\Tasks', 'taskOwnerId');
    }


    public function followTaskDetail()
    {
        return $this->belongsToMany('App\Models\Tasks', 'follow_tasks', 'userId', 'taskId')->with('taskPostedUser')->orderBy('follow_tasks.id', 'desc');
    }


    public function offer_count()
    {
        return $this->belongsToMany('App\Models\Tasks', 'offers', 'interestedUserId', 'taskId')->select(\DB::raw('count(*) as total_offer'));
    }

    public function doerReview()
    {
        return $this->hasMany('App\Models\Reviews', 'taskDoerId', 'id')->select('id', 'taskId', 'taskDoerId', 'doerReview', 'doerRating', 'IsDoerFeedbackEntered');
    }

    public function posterReview()
    {
        return $this->hasMany('App\Models\Reviews', 'posterUserId', 'id')->select('id', 'taskId', 'posterUserId', 'posterReview', 'posterRating', 'IsPosterFeedbackEntered');
    }

    public function reviewDetails()
    {
        return $this->belongsToMany('App\Models\Tasks', 'reviews', 'posterUserId', 'taskId')->with('taskPostedUser', 'doerUserDetail');
    }


    public function taskAsPoster()
    {
        return $this->hasMany('App\Models\Tasks', 'userId', 'id')->with('taskPostedUser', 'doerUserDetail')->with(['avgRatingByPoster' => function ($q) {
            $q->select('taskId', 'posterReview', 'posterUserId', 'IsPosterFeedbackEntered', \DB::raw('(ROUND(avg(posterRating),1)) as avgRating'));
        }]);
    }

    public function taskAsDoer()
    {
        return $this->hasMany('App\Models\Tasks', 'taskDoerId', 'id')->with('doerUserDetail')->with('taskPostedUser')->with(['avgRatingByDoer' => function ($q) {
            $q->select('taskId', 'doerReview', 'taskDoerId', 'IsDoerFeedbackEntered', \DB::raw('(ROUND(avg(doerRating),1)) as avgRating'));
        }]);
    }
}
