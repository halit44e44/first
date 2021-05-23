<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable=['title','description','finished_at'];

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
}
