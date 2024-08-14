<?php

namespace App\Models;

use App\Models\product as ModelsProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable=['name'];
    

    public function products() {
        return $this->hasMany(ModelsProduct::class);
    }
}
