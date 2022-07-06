<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class member_status extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'status_name',
        'kuota'
    ];

    /**
     * Get all of the User for the member_status
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function User()
    {
        return $this->hasMany(User::class);
    }

}
