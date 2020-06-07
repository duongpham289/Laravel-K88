<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $fillabel = [
    //     'name',
    //     'sku',
    //     'category_id',
    //     'price',
    //     'quantity'
    // ];
    protected $guarded = ['id'];

    protected $perPage = 5;

    protected $table = 'product';
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
