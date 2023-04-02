<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluate extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    protected $fillable = [
        'reserve_id',
        'evaluate_comment',
        'evaluate_point',
    ];

    public function reserve()
    {
        return $this->belongsTo('App\Models\Reserve');
    }
}
