<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    public function features()
    {
        return $this->hasMany(Feature::class);
    }

    // mutator para formatar o price
    public function getPriceBrAtribute()
    {
        return number_format($this->price, 2, ',', '.');
    }
}
