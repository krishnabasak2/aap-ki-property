<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['email_id', 'address', 'youtube', 'twitter', 'instagram', 'facebook', 'contact_no', 'maps'];
}
