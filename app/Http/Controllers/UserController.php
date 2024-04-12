<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pet;
use App\Models\Photo;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myUser = User::all();
        return view('users.list', ['user' => $myUser]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $myUser = User::find($id);
        if($myUser == null){
            $error_message = "User id=$id not found";
            return view('users.message', ['message'=>$error_message, 'type_of_message'=>'Error']);
        }
        if($myUser->count() > 0){
            return view('users.show', ['user' => $myUser]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if($user != null){
            $user->delete();
            return redirect('/users/list');
        }
        else{
            $error_message = "User id=$id not found";
            return view('users.message', ['message'=>$error_message, 'type_of_message'=>'Error']);
        }
    }

    public function menu(){
        $myPets = Pet::where('user_id', auth()->user()->id)->get();
        return view('users.menu', ['pets' => $myPets]);
    }

    public function photos(string $id)
    {
        $myPhoto = Photo::where('pet_id', $id)->get();
        return view('users.photos', ['photo' => $myPhoto]);
    }  
}
