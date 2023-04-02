<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $guarded = array('id');
    protected $fillable = [
        'user_id',
        'shop_id',
        'reserve_at',
        'reserve_person',
    ];
    protected $dates = [
        'reserve_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }
    public function reserves()
    {
        return $this->hasMany('App\Models\Evaluation');
    }
}
