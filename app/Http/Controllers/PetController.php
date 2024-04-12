<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pet;
use App\Models\User;
use App\Models\Category;


class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myPet = Pet::all();
        return view('pets.list', ['pet' => $myPet]);
    }   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $categories = Category::all();
        return view('pets.add', compact('user','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'breed' => 'required',
            'name' => 'required',
        ]);

        if($validated){
            $pet = new Pet();
            $pet->user_id = $request->user_id;
            $pet->category_id = $request->category_id;
            $pet->breed = $request->breed;
            $pet->name = $request->name;
            $pet->save();
            return redirect('/users/menu');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $myPet = Pet::find($id);
        if($myPet == null){
            $error_message = "Pet id=$id not found";
            return view('pets.message', ['message'=>$error_message, 'type_of_message'=>'Error']);
        }
        if($myPet->count() > 0){
            return view('pets.show', ['pet' => $myPet]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $myPet = Pet::find($id);
        if($myPet == null){
            $error_message = "Pet id=".$id." not found";
            return view('pets.message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }
        if($myPet->count() > 0){
            return view('pets.edit', ['pet' => $myPet]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'breed' => 'required',
            'name' => 'required',
        ]);
        if($validated){
            $pet = Pet::find($id);
            if($pet != null){
                $pet->user_id = $request->user_id;
                $pet->category_id = $request->category_id;
                $pet->breed = $request->breed;
                $pet->name = $request->name;

                $pet->save();
                return redirect('/users/menu');
            }
            else{
                $error_message = "Pet id=$id not found";
                return view('pets.message', ['message'=>$error_message, 'type_of_message'=>'Error']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pet = Pet::find($id);
        if($pet != null){
            foreach($pet->photos as $photo){
                $photo->comments()->delete();
            }
            $pet->photos()->delete();
            $pet->delete();
            return redirect('/users/menu');
        }
        else{
            $error_message = "Pet id=$id not found";
            return view('pets.message', ['message'=>$error_message, 'type_of_message'=>'Error']);
        }
    }
}
