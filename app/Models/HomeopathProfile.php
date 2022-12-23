<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HomeopathBadgesSetting;

class HomeopathProfile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function badgeSetting()
    {
    	return $this->hasMany(HomeopathBadgesSetting::class,'homeopath_id','id');
    }
    public function scopeGetByDistance($query, $lat, $lng, $radius)
    {
        if ($lat != null && $lng != null) {
            $results = DB::select(DB::raw('SELECT id, ( 6371 * acos( cos( radians(' . $lat . ') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $lng . ') ) + sin( radians(' . $lat . ') ) * sin( radians(latitude) ) ) ) AS distance FROM homeopath_profiles HAVING distance < ' . $radius . ' ORDER BY distance'));
            if (!empty($results))
            {
                $ids = [];
                //Extract the id's
                foreach ($results as $q)
                {
                    array_push($ids, $q->id);
                }
                return $query->whereIn('id', $ids);
            }
            return $query->whereIn('id', []);
        }
        else
            return $query->whereIn('id', []);
    }
}
