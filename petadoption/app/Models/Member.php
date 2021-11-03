<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table ="member";
    protected $primaryKey = "pk";
    public $timestamps = false;

    function fosterlist() {
        return $this -> hasMany(Fosterlist::class, 'member_fk');
    }

    function adoptlist() {
        return $this -> hasMany(Adoptlist::class, 'member_fk');
    }
}
