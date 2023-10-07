<?php

namespace App\Http\Controllers;

use App\Models\AddProfile;
use Illuminate\Http\Request;
use Log;
class AddProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = AddProfile::all();
        return view('add_profile', compact('products'));
    }

    public function homes()
    {
        $products = AddProfile::all();
        return view('home', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $new_name,
        ];

        AddProfile::create($form_data);

        return redirect('home')->with('success', 'Profile is successfully updated');
    }

    /**
     * Display the specified resource.
     */
    public function show(AddProfile $addProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $edit_profile = AddProfile::find($id);
        return view('edit_profile', compact('edit_profile', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AddProfile $addProfile)
    {
        $profile = AddProfile::find($request->id);

        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
    
            // delete old image
            if ($profile->image) {
                $old_image = public_path('images') . '/' . $profile->image;
                if (file_exists($old_image)) {
                    unlink($old_image);
                }
            }
    
            $profile->image = $new_name;
        }
    
        $profile->save();
    
        return redirect('home')->with('success', 'Profile is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AddProfile $addProfile)
    {
        //
    }
}
