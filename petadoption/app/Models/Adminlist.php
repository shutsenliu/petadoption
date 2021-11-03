<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminlist extends Model
{
    use HasFactory;
    protected $table ="adminlist";
    protected $primaryKey = "pk";
    public $timestamps = false;
}
