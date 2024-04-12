<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    public $timestamps = false;
    //use HasFactory;

    //Nazwa tabeli powiązanej z modelem
    protected $table = "pets";

    //Klucz główny
    protected $primaryKey = "id";

    //Pola, które mogą być wypełniane masowo
    protected $fillable = ['user_id', 'category_id', 'breed', 'name'];

    //dodatkowa metoda odczytująca załogantów
    //dla danego modelu
    public function photos(){
        return $this->hasMany(Photo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
