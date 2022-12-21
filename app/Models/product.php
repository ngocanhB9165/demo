<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = ['name','price','sale_price','image','description','category_id'];
    public $timestamps = false;
    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
