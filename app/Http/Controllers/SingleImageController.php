<?php

namespace App\Http\Controllers;

use App\Models\SingleImage;
use Illuminate\Http\Request;

class SingleImageController extends Controller
{
    //index
    public function index()
    {
        $items = SingleImage::all();
        return view('welcome', compact('items'));
    }
    //store
    public function store(Request $request)
    {
        $image = $request->image;
        // Validate
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $image->move(public_path('assets/images/brand-images'), $imageName);
        SingleImage::create([
            'title' => $request->title,
            'image' => $imageName,
        ]);
        return redirect()->back()->with('success', 'image was successfully uploaded.');
    }
    //edit
    public function edit($id)
    {
        $edited_item_value = SingleImage::where('id', $id)->first();
        return view('edit', compact('edited_item_value'));
    }
    //update
    public function update(Request $request, $id)
    {
        if (isset($request->image)) {
            $old_img = $request->old_img;

            $updatedImage = $request->image;
            $updateImageName = time() . '.' . $request->image->getClientOriginalExtension();
            $updatedImage->move(public_path('assets/images/brand-images'), $updateImageName);

            unlink(public_path('assets/images/brand-images')."/".$old_img);

            SingleImage::where('id', $id)->update([
                'image' => $updateImageName,
            ]);
        }
        SingleImage::where('id', $id)->update([
            'title' => $request->title,
        ]);
        return redirect()->route('index')->with('success', 'updated');

    }
    //delete
    public function destroy($id)
    {
        SingleImage::destroy($id);
        return redirect()->back()->with('destroy', 'item deleted');
    }


}

