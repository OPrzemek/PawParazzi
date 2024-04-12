<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = true;
    //use HasFactory;

    //Nazwa tabeli powiązanej z modelem
    protected $table = "comments";

    //Klucz główny
    protected $primaryKey = "id";

    //Pola, które mogą być wypełniane masowo
    protected $fillable = ['photo_id', 'user_id', 'desc'];

    public function photo()
    {
        return $this->belongsTo(Photo::class, 'photo_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
