<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    //use HasFactory;

    //Nazwa tabeli powiązanej z modelem
    protected $table = "categories";
    
    //Klucz główny
    protected $primaryKey = "id";

    //Pola, które mogą być wypełniane masowo
    protected $fillable = ['name'];

    public function pets(){
        return $this->hasMany(Pet::class);
    }
}
