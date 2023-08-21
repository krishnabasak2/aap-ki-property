<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['status', 'owner_name', 'owner_email', 'owner_mobile', 'property_name', 'property_desc', 'property_location', 'listing_for', 'property_price', 'type', 'size'];

    public function getEnquiry(): HasMany
    {
        return $this->hasMany(Enquiry::class, 'property_id', 'id');
    }
}
