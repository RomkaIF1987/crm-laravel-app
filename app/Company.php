<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed logo
 */
class Company extends Model
{
    protected $guarded = [];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
