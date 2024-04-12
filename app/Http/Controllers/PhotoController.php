<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myPhoto = Photo::all();
        return view('photos.list', ['photo' => $myPhoto]);
    }   

    public function home()
    {
        $myPhoto = Photo::all();
        return view('photos.home', ['photo' => $myPhoto]);
    }   

    public function detailed(string $id)
    {
        $myPhoto = Photo::find($id);
        return view('photos.detailed', ['photo' => $myPhoto]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $pet = Pet::find($id);
        $myPets = Pet::where('user_id', auth()->user()->id)->get();
        return view('photos.add', ['pets'=> $myPets, 'pet' => $pet]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pet_id' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validated){
            $photo = new Photo();
            $photo->pet_id = $request->pet_id;
            $name = rand(1,999999).$request->file('image')->getClientOriginalName();
            $size = $request->file('image')->getSize();
            $request->file('image')->storeAs('public/', $name);
            $photo->name = $name;
            $photo->title = $request->title;
            $photo->desc = $request->desc;
            $photo->size = $size;
            $photo->like = 0;
            $photo->save();
            return redirect('/users/menu');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $myPhoto = Photo::find($id);
        if($myPhoto == null){
            $error_message = "Photo id=$id not found";
            return view('photos.message', ['message'=>$error_message, 'type_of_message'=>'Error']);
        }
        if($myPhoto->count() > 0){
            return view('photos.show', ['photo' => $myPhoto]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $myPhoto = Photo::find($id);
        if($myPhoto == null){
            $error_message = "Photo id=".$id." not found";
            return view('photos.message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }
        if($myPhoto->count() > 0){
            return view('photos.edit', ['photo' => $myPhoto]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'pet_id' => 'required',
            'title' => 'required',
            'desc' => 'required',
        ]);

        if($validated){
            $photo = Photo::find($id);
            if($photo != null){
                $photo->pet_id = $request->pet_id;
                $photo->title = $request->title;
                $photo->desc = $request->desc;

                $photo->save();
                return redirect('/users/menu');
            }
            else{
                $error_message = "Photo id=$id not found";
                return view('photos.message', ['message'=>$error_message, 'type_of_message'=>'Error']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $photo = Photo::find($id);
        if($photo != null){
            $photo->comments()->delete();
            $photo->delete();
            Storage::disk('public')->delete($photo->name);
            return redirect('/users/menu');
        }
        else{
            $error_message = "Photo id=$id not found";
            return view('photos.message', ['message'=>$error_message, 'type_of_message'=>'Error']);
        }
    }
}
