<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class feedback_coaching extends Model
{
    protected $fillable=[
        'user_id','booking_id','sense','expectations','trust','listen','emotions','failure_provide','time_management','proper_feedback','drawing_goals','check_dimensions','solution_evaluation','homework','summary_comments','best_offer','effective_criticism','achievement','self_awareness','challenges','opportunities_you','future_expectations','suggestions_progress','satisfaction','comment','status'
    ];
}
