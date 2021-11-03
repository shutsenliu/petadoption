<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoptlist extends Model
{
    use HasFactory;

    protected $table ="adoptlist";
    protected $primaryKey = "pk";
    public $timestamps = false;

    function member() {
        return $this -> belongsTo(Member::class, 'member_fk');
    }

    function fosterlist() {
        return $this -> belongsTo(Fosterlist::class, 'fosterlist_fk');
    }
}
