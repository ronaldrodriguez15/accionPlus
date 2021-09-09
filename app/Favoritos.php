<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Favoritos extends Model
{
    protected $table = 'favoritos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'tema',
        'url',
        'user_id'
    ];

    /**
     * Relación uno a muchos
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
