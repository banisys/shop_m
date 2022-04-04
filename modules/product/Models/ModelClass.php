<?php


namespace Modules\product\Models;

use Illuminate\Database\Eloquent\Model;

class ModelClass extends Model
{
    protected $table = 'products';
    protected $guarded = ['id'];

    public function category()
    {
        return $this->hasOne(  \Modules\category\Models\ModelClass::class, 'id', 'category_id');
    }

    public function brand()
    {
        return $this->hasOne(  \Modules\brand\Models\ModelClass::class, 'id', 'brand_id');
    }
}

