<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipModules extends Model
{
    public $timestamps = false;
    //use HasFactory;

    //Nazwa tabeli powiązanej z modelem
    protected $table = "ship_modules";

    //Klucz główny
    protected $primaryKey = "id";

    //Pola, które mogą być wypełniane masowo
    protected $fillable = ['module_name', 'is_workable'];

    //dodatkowa metoda odczytująca załogantów
    //dla danego modelu
    public function moduleCrew(){
        return $this->hasMany(ModuleCrew::class);
    }

}
