<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{

    use HasFactory;
    protected $table = 'media';

    public function listingmediacount()
    {
        return $this->hasMany(ListingMedia::class, 'media_id', 'id');
    }

}
