<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fosterlist extends Model
{
    use HasFactory;

    protected $table ="fosterlist";
    protected $primaryKey = "pk";
    public $timestamps = false;

    function member() {
        return $this -> belongsTo(Member::class, 'member_fk');
    }

    function adoptlist() {
        return $this -> hasMany(Adoptlist::class, 'fosterlist_fk');
    }
}
