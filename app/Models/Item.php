<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'item';

    // Disable timestamps cause the table doesn't have created_at and updated_at
    public $timestamps = false;

    // Define relationship to App\Models\Item;
    public function pajak()
    {
        return $this->belongsToMany(Pajak::class);
    }
}
