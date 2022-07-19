<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Articles extends Model
{
    use HasFactory;

    protected $table = "articles";
    protected $fillable = ['title','content','image','user_id','category_id'];
    // protected $guarded = ['id'];

    public function categories()
    {
        return $this->hasMany(Categories::class);
    }
}
