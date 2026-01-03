<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function store() {
        $data = request()->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'aof' => 'required',
            'aofdesc' => 'required'
        ]);

        Feature::create($data);

        return redirect('/managehotel')->with('success', 'Feature or Amenity added successfully.');
    }
}
