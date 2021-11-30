<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable=['name','surname','email'];

    public function getFullNameAttribute()
    {
        return $this->name.' '.$this->surname;
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
