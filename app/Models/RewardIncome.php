<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RewardIncome extends Model
{
    use HasFactory;

    protected $table = 'reward_incomes';

    protected $fillable = [
        'memberid',
        'team_count',
        'reward',
        'reward_status',
        'status',
    ];

    public function member()
    {
        return $this->belongsTo(MemberDetail::class, 'memberid', 'memberid');
    }
}
