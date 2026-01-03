<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Hotel extends Model
{
    protected $fillable = [
        'hotelname',
        'description',
        'image',
        'is_deleted'
    ];

    protected $casts = [
        'is_deleted' => 'boolean'
    ];

    public function getImageUrlAttribute()
    {
        if($this->image) {
            return Storage::url('hotels/' . $this->image);
        }

        return asset('images/default-hotel.png');
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('notDeleted', function ($builder) {
            $builder->where('is_deleted', false);
        });
    }

    // Soft delete method
    public function softDelete()
    {
        $this->is_deleted = true;
        $this->save();
    }

    // Restore method
    public function restore()
    {
        $this->is_deleted = false;
        $this->save();
    }

    // Query scope to include deleted items
    public function scopeWithDeleted($query)
    {
        return $query->withoutGlobalScope('notDeleted');
    }

    // Query scope for only deleted items
    public function scopeOnlyDeleted($query)
    {
        return $query->withoutGlobalScope('notDeleted')
                    ->where('is_deleted', true);
    }

    public function rooms() {
        return $this->hasMany(Room::class);
    }

    public function amenities() {
        return $this->hasMany(Feature::class);
    }
}
