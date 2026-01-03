<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RoomFormRequest;
use App\Models\Room;

class RoomController extends Controller
{
    public function store(RoomFormRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('roomimage')) {
            $imageName = time() . '.' . $request->roomimage->extension();
            $request->roomimage->storeAs('rooms', $imageName, 'public');
            $data['roomimage'] = $imageName;
        }

        Room::create($data);

        return redirect('/managehotel')->with('success', 'Room added Successfully');
    }
}
