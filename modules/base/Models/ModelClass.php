<?php


namespace Modules\base\Models;

use Illuminate\Database\Eloquent\Model;

class ModelClass extends Model
{
    protected $table = 'blog';
    protected $guarded = ['id'];

    public function comments()
    {
        return $this->morphMany(Modules\comment\Models\ModelClass::class, 'commentable')->where('status','=','1')->orderBy('id','desc');
    }
}

