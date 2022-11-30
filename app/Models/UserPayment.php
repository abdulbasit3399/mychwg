<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{
    use HasFactory;
    protected $table = 'user_payments';

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
