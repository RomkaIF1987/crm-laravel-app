<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed logo
 */
class Company extends Model
{
    protected $guarded = [];
    protected $table = 'companies';

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
