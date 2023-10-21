<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackSetting extends Model
{
    use HasFactory;

    protected $table = "feedback_settings";
    protected $guarded = [];
}
