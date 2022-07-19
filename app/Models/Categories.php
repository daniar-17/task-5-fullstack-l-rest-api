<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Categories extends Model
{
    use HasFactory;

    protected $table = "categories";
    protected $fillable = ['name','user_id'];
    // protected $guarded = ['id'];

    public function articles()
    {
        return $this->belongsTo(Articles::class);
    }
}
