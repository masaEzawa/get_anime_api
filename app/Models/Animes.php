<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animes extends Model
{
    use SoftDeletes;

    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'animes';

    protected $fillable = [
        'id',
        'title',
        'title_short1',
        'title_short2',
        'title_short3',
        'public_url',
        'twitter_account',
        'twitter_hash_tag',
        'cours_id'
    ];
}
