<?php

namespace App\Models;

use App\Observers\GeneralAnswer\GeneralAnswerVoteObserver;

/**
 * Class GeneralAnswerVote
 *
 * @package App\Models
 * @property integer $id
 * @property integer $answer_id
 * @property integer $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class GeneralAnswerVote extends AppModel
{
    /**
     * @var string
     */
    protected $table = 'general_answer_votes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'answer_id',
        'user_id',
    ];

    /**
     * Observer
     */
    protected static function boot()
    {
        parent::boot();

        self::observe(new GeneralAnswerVoteObserver());
    }
    /**
     * @param $query
     * @param $user
     * @param $answer
     * @return mixed
     */
    public function scopeVoted($query, $user, $answer)
    {
        return $query->where('user_id', $user)
            ->where('answer_id', $answer);
    }
}
