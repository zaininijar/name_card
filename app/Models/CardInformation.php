<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class CardInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'country',
        'address',
        'proffession',
        'about_me',
        'profile_photo',
        'instagram',
        'facebook',
        'twitter',
        'whatsapp',
        'linkedin',
        'tiktok',
        'youtube',
        'gallery_photo'
    ];

     /**
     * Get the user that owns the UserSession
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
