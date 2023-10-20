<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillSetting extends Model
{
    use HasFactory;

    protected $table = "skill_settings";
    protected $guarded = [];
}
