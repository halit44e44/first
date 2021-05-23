<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;


class Quiz extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable=['title','description','finished_at','slug'];

    //diffForHumans çalışması için modele ekledik.
    protected $dates = ['finished_at'];
    public function getFinishedAtAttribute($date){
        return $date ? Carbon::parse($date) : null ;
    }

    /**
     * Question Tablosunu Quiz tablosuyla ilişkilendirdik.
     */
    public function questions() {
        return $this->hasMany('App\Models\Question');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ]
        ];
    }
}
