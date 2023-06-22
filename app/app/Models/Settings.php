<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'token',
        'desc'
    ];

    public static function list() : array
    {
        return static::orderBy('name', 'asc')->pluck('name', 'id')->toArray();
    }
}
