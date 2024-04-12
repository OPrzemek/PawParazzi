<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public $timestamps = true;
    //use HasFactory;

    //Nazwa tabeli powiązanej z modelem
    protected $table = "photos";
    
    //Klucz główny
    protected $primaryKey = "id";

    //Pola, które mogą być wypełniane masowo
    protected $fillable = ['pet_id', 'name', 'title', 'desc', 'size', 'like'];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'pet_id');
    }
}
