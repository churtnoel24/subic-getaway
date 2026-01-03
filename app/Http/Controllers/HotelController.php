<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Requests\HotelFormRequest;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::paginate(10);

        return view('managehotel.index', compact('hotels'));
    }

    public function store(HotelFormRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('hotels', $imageName, 'public');
            $data['image'] = $imageName;
        }

        Hotel::create($data);

        return redirect('/managehotel')->with('success', 'Hotel created Successfully');
    }

    // Show hotel (will not show if deleted)
    public function edit($id)
    {
        $hotel = Hotel::find($id); // Will return null if soft deleted

        if (!$hotel) {
            abort(404, 'Hotel not found');
        }

        return view('managehotel.edit', compact('hotel'));
    }

    public function update($id, HotelFormRequest $request)
    {
        $hotel = Hotel::find($id);
        $data = $request->validated();

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete('hotels/' . $hotel->image);
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('hotels', $imageName, 'public');
            $data['image'] = $imageName;
        }

        $hotel->update($data);

        return redirect('/managehotel')->with('success', 'Hotel updated Successfully');
    }

    // Soft delete a hotel
    public function destroy($id)
    {
        $hotel = Hotel::find($id);

        if ($hotel) {
            $hotel->softDelete(); // Sets is_deleted = true

            return back()
                ->with('success', 'Hotel trashed successfully.');
        }

        return redirect('/managehotel')
            ->with('error', 'Hotel not found.');
    }

    // Show trashed/soft deleted hotels
    public function trashed()
    {

        // OR using custom boolean
        $hotels = Hotel::onlyDeleted()->get();

        return view('managehotel.trashed', compact('hotels'));
    }

    // Restore soft deleted hotel
    public function restore($id)
    {

        // OR using custom boolean
        $hotel = Hotel::withDeleted()->find($id);
        $hotel->restore();

        return redirect()->route('hotels.trashed')
            ->with('success', 'Hotel restored successfully.');
    }

    // Permanent delete
    public function forceDelete($id)
    {
        // OR using custom boolean
        $hotel = Hotel::withDeleted()->find($id);
        if ($hotel->image) {
        // Delete from storage
        Storage::disk('public')->delete('hotels/' . $hotel->image);
    }
        $hotel->delete(); // Permanent delete

        return redirect()->route('hotels.trashed')
            ->with('success', 'Hotel permanently deleted.');
    }

    public function dashboard()
    {
        $hoteltotal = Hotel::withDeleted()->count();
        $trashedcount = Hotel::onlyDeleted()->count();
        $hotels = Hotel::all()->count();

        return view('dashboard', compact('trashedcount', 'hoteltotal', 'hotels'));
    }
}
