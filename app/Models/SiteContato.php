<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    use HasFactory;
    // garante o preenchimento de apenas estes campos
    protected $fillable=['nome', 'email', 'mensagem'];
}
