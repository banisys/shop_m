<?php


namespace Modules\category\Models;

use Illuminate\Database\Eloquent\Model;

class ModelClass extends Model
{
    protected $table = 'categories';
    protected $guarded = ['id'];

    public function parent()
    {
        return $this->belongsTo(ModelClass::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(ModelClass::class, 'parent_id');
    }

    // recursive, loads all descendants
    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    public function spec()
    {
        return $this->belongsTo(\Modules\spec\Models\ModelClass::class, 'category_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(\Modules\product\Models\ModelClass::class, 'category_id', 'id');
    }

/*$categories = Category::with('childrenRecursive')->whereNull('parent_id')->get();*/


}

