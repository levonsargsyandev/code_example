<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['link', 'name'];

    public function linkGeos()
    {
        return $this->belongsToMany('App\Models\Geo', 'link_geos', 'link_id', 'geo_id');
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($link) {
             $link->linkGeos()->each(function($linkGeos) {
                $linkGeos->pivot->delete();
             });
        });
    }

}
