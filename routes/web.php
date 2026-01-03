<?php

use App\Http\Controllers\FeatureController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SessionController;
use App\Models\Hotel;
use Illuminate\Support\Facades\Route;

Route::get('/', [SessionController::class, 'index'])->middleware('guest')->name('login');
Route::post('/', [SessionController::class, 'store'])->middleware('guest');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HotelController::class, 'dashboard']);

    Route::delete('/logout', [SessionController::class, 'destroy']);

    Route::get('/managehotel', [HotelController::class, 'index']);
    Route::post('/managehotel', [HotelController::class, 'store'])->name('hotels.store');
    Route::post('/managehotel/{id}/edit', [HotelController::class, 'edit'])->name('hotels.edit');
    Route::patch('/managehotel/{id}', [HotelController::class, 'update'])->name('hotels.update');
    Route::get('/hotels/trashed', [HotelController::class, 'trashed'])->name('hotels.trashed');
    Route::post('/hotels/{id}/restore', [HotelController::class, 'restore'])->name('hotels.restore');
    Route::post('/hotels{id}/delete', [HotelController::class, 'destroy'])->name('hotels.destroy');
    Route::delete('/hotels/{id}/force-delete', [HotelController::class, 'forceDelete'])->name('hotels.force-delete');

    Route::post('/room', [RoomController::class, 'store']);

    Route::post('/amenities', [FeatureController::class, 'store']);
});

Route::middleware('guest')->group(function () {

    Route::get('/about', function() {
        return view('about');
    });

    Route::get('/hotel', function() {
        $hotels = Hotel::orderBy('updated_at', 'desc')->paginate(5);

        return view('hotel', compact('hotels'));
    });

    Route::get('/hotel/{id}', function($id) {
        $hotel = Hotel::findOrFail($id);

        return view('hotelshow', compact('hotel'));
    })->name('hotel.show');

    Route::get('/attractions', function() {
        return view('attractions');
    });

    Route::get('/news', function() {
        return view('news');
    });

    Route::get('/contact', function() {
        return view('contact');
    });

});
