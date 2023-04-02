<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = array('id');
    protected $fillable = [
        'shop_name',
        'shop_detail',
    ];
    public static function doSearch($region_id, $genre_id, $shop_name_detail) {

        // 検索クエリ準備
        $query = self::query();

        // 検索条件：地域
        if (!empty($region_id)) {
            $query->where('region_id', '=', $region_id);
        }

        // 検索条件：ジャンル
        if (!empty($genre_id)) {
            $query->where('genre_id', '=', $genre_id);
        }

        // 検索条件：検索ボックス(店舗名/店舗概要)
        if (!empty($shop_name_detail)) {
            $query->where('shop_name', 'like', '%' . $shop_name_detail . '%');
        }

        $shops = $query->get();
        return $shops;
    }
    public function favorites()
    {
        return $this->hasMany('App\Models\Favorite');
    }
    public function reserves()
    {
        return $this->hasMany('App\Models\Reserve');
    }
    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }
    public function region()
    {
        return $this->belongsTo('App\Models\Region');
    }
}
