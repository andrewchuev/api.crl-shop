<?php

namespace App\Modules\Products\Models;


use App\Modules\Products\database\factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected static function newFactory()
    {
        return CategoryFactory::new();
    }
}
