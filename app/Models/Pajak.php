<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pajak extends Model
{
    use HasFactory;

    // Define table name
    protected $table = 'pajak';

    // Disable timestamps cause the table doesn't have created_at and updated_at
    public $timestamps = false;

    // Define relationship to App\Models\Item;
    public function item()
    {
        return $this->belongsToMany(Item::class);
    }
}
