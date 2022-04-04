<?php


namespace Modules\login\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admins';
    protected $guarded = ['id'];
}
