<?php


namespace Modules\spec\Models;

use Illuminate\Database\Eloquent\Model;

class ModelClass extends Model
{
    protected $table = 'specs';
    protected $guarded = ['id'];

    public function category()
    {
        return $this->hasOne(  \Modules\category\Models\ModelClass::class, 'id', 'category_id');
    }
}

