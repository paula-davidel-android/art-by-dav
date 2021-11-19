<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Painting;

class PaintingController extends Controller
{
     // all paintings
    public function index()
    {
        $paintings = Painting::all()->toArray();
        return array_reverse($paintings);
    }

    // add painting
    public function add(Request $request)
    {
        $painting = new Painting([
            'title' => $request->title,
            'description' => $request->description
        ]);
        $painting->save();

        return response()->json('The painting successfully added');
    }

    // edit painting
    public function edit($id)
    {
        $painting = Painting::find($id);
        return response()->json($painting);
    }

    // update painting
    public function update($id, Request $request)
    {
        $painting = Painting::find($id);
        $painting->update($request->all());

        return response()->json('The painting successfully updated');
    }

    // delete painting
    public function delete($id)
    {
        $painting = Painting::find($id);
        $painting->delete();

        return response()->json('The painting successfully deleted');
    }
}
