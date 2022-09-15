<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'japanese_word',
        'english_word',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getData()
    {
        return $this->japanese_word . ':' . $this->english_word;;
    }
}
