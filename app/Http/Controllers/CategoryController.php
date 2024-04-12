<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myCategory = Category::all();
        return view('categories.list', ['category' => $myCategory]);
    }   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        if($validated){
            $mod_ship = new Category();
            $mod_ship->name = $request->name;
            $mod_ship->save();
            return redirect('/categories/list');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $myCategory = Category::find($id);
        if($myCategory == null){
            $error_message = "Category id=$id not found";
            return view('categories.message', ['message'=>$error_message, 'type_of_message'=>'Error']);
        }
        if($myCategory->count() > 0){
            return view('categories.show', ['category' => $myCategory]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $myCategory = Category::find($id);
        if($myCategory == null){
            $error_message = "Ship module id=".$id." not found";
            return view('categories.message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }
        if($myCategory->count() > 0){
            return view('categories.edit', ['category' => $myCategory]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        if($validated){
            $category = Category::find($id);
            if($category != null){
                $category->name = $request->name;

                $category->save();
                return redirect('/categories/list');
            }
            else{
                $error_message = "Category id=$id not found";
                return view('categories.message', ['message'=>$error_message, 'type_of_message'=>'Error']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if($category != null){
            $category->delete();
            return redirect('/categories/list');
        }
        else{
            $error_message = "Category id=$id not found";
            return view('categories.message', ['message'=>$error_message, 'type_of_message'=>'Error']);
        }
    }
}
