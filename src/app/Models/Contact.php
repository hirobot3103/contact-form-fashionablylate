<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail',
    ];

    public function Category()
    {
        return $this->belongsTo('App\Models\Category');        
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('last_name', 'like', '%' . $keyword . '%');
            $query->orwhere('first_name', 'like', '%' . $keyword . '%');
            $query->orwhere('email', 'like', '%' . $keyword . '%');
            $query->orwhere('tel', 'like', '%' . $keyword . '%');
            $query->orwhere('detail', 'like', '%' . $keyword . '%');
        }
    }

    public function scopeGenderSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('gender', $keyword);
        }
    }

    public function scopeContactSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('category_id', $keyword);
        }
    }

    public function scopeDateSearch($query, $keyword)
    {
        $dt = Carbon::today()->parse( $keyword );
        $param = $dt->format( 'Y-m-d' );
        if (!empty($keyword)) {
            $query->whereDate( 'updated_at', $param );
        }
    }
}
