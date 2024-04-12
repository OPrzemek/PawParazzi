<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PhotoController;
use App\Models\User;
use App\Models\Category;
use App\Models\Photo;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [PhotoController::class,'home']);


/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/loguj', [HomeController::class,'zmienStanUwierzytelnienia']);
Route::get('/wyloguj',[HomeController::class,'zmienStanUwierzytelnienia']);

Route::get('/upload', [PhotoController::class,'create']);
Route::post('/upload', [PhotoController::class,'store']);

Route::get('/categories/list', [CategoryController::class,'index'])->middleware('can:admin_area');
Route::get('/categories/add', [CategoryController::class,'create'])->middleware('auth');
Route::post('/categories/save', [CategoryController::class,'store'])->middleware('auth');
Route::get('/categories/edit/{id}', [CategoryController::class,'edit'])->middleware('auth');
Route::post('/categories/update/{id}', [CategoryController::class,'update'])->middleware('auth');
Route::get('/categories/show/{id}', [CategoryController::class,'show'])->middleware('auth');
Route::post('/categories/delete/{id}', [CategoryController::class,'destroy'])->middleware('auth');

Route::get('/pets/list', [PetController::class,'index'])->middleware('can:admin_area');
Route::get('/pets/add', [PetController::class,'create'])->middleware('auth');
Route::post('/pets/save', [PetController::class,'store'])->middleware('auth');
Route::get('/pets/edit/{id}', [PetController::class,'edit'])->middleware('auth');
Route::post('/pets/update/{id}', [PetController::class,'update'])->middleware('auth');
Route::get('/pets/show/{id}', [PetController::class,'show'])->middleware('auth');
Route::post('/pets/delete/{id}', [PetController::class,'destroy'])->middleware('auth');

Route::get('/photos/list', [PhotoController::class,'index'])->middleware('can:admin_area');
Route::get('/photos/add/{id}', [PhotoController::class,'create'])->middleware('auth')->middleware('can:has_pets');
Route::post('/photos/save', [PhotoController::class,'store'])->middleware('auth');
Route::get('/photos/edit/{id}', [PhotoController::class,'edit'])->middleware('auth');
Route::post('/photos/update/{id}', [PhotoController::class,'update'])->middleware('auth');
Route::get('/photos/show/{id}', [PhotoController::class,'show'])->middleware('auth');
Route::post('/photos/delete/{id}', [PhotoController::class,'destroy'])->middleware('auth');

Route::get('/photos/detailed/{id}', [PhotoController::class,'detailed'])->middleware('auth');

Route::get('/comments/list', [CommentController::class,'index'])->middleware('can:admin_area');
Route::get('/comments/add/{id}', [CommentController::class,'create'])->middleware('auth');
Route::post('/comments/save', [CommentController::class,'store'])->middleware('auth');
Route::get('/comments/edit/{id}', [CommentController::class,'edit'])->middleware('auth');
Route::post('/comments/update/{id}', [CommentController::class,'update'])->middleware('auth');
Route::get('/comments/show/{id}', [CommentController::class,'show'])->middleware('auth');
Route::post('/comments/delete/{id}', [CommentController::class,'destroy'])->middleware('auth');

Route::get('/users/list', [UserController::class,'index'])->middleware('can:admin_area');
Route::get('/users/show/{id}', [UserController::class,'show'])->middleware('auth');
Route::post('/users/delete/{id}', [UserController::class,'destroy'])->middleware('auth');
Route::get('/users/menu', [UserController::class,'menu'])->middleware('auth');
Route::get('/users/photos/{id}', [UserController::class,'photos'])->middleware('auth');

Route::get('/search', [HomeController::class,'search']);

Route::any('/search', function (Request $request) {
    $query = $request->q;
    
    // Sprawdź, czy query zaczyna się od "@" i wyszukaj w tablicy user->name
    if (Str::startsWith($query, '@')) {
        $username = Str::substr($query, 1);
        $user = User::where('name', 'LIKE', '%'.$username.'%')->get();
        if (count($user) > 0)
            return view( 'search' )->withDetails($user)->withQuery ($username);
        else
            return view( 'search' )->withMessage('No Details found for users. Try to search again !');
    }

    // Sprawdź, czy query zaczyna się od "#" i wyszukaj zdjęcia w kategorii
    if (Str::startsWith($query, '#')) {
        $categoryname = Str::substr($query, 1);
        $category = Category::where('name', 'LIKE', '%'.$categoryname.'%')->get();
        if (count($category) > 0)
            return view( 'search' )->withDetails($category)->withQuery ($categoryname);
        else
            return view( 'search' )->withMessage('No Details found for categories. Try to search again !');
    }

    // Dla braku znaku wyszukaj zdjęcia po nazwie photo->title
    $photo = Photo::where('title', 'LIKE', '%'.$request->q.'%')->get();
    if (count($photo) > 0)
        return view( 'search' )->withDetails($photo)->withQuery ($request->q);
    else
        return view( 'search' )->withMessage('No Details found. Try to search again !');
});
