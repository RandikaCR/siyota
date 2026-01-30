<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'products';

    public function product_category()
    {
        return $this->hasOne(ProductCategories::class, 'id', 'product_category_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImages::class, 'product_id', 'id');
    }

    public function primary_image()
    {
        return $this->hasOne(ProductImages::class, 'product_id', 'id');
    }

    public function status(){

        $status = 'Inactive';
        $statusClass = 'bg-warning';

        if ($this->status == 1){
            $status = 'Active';
            $statusClass = 'bg-success';
        }

        return (Object)[
            'text' => $status,
            'class' => $statusClass,
        ];
    }
}
