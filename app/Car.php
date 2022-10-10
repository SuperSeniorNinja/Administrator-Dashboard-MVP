<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Car extends Model
{
    protected $fillable = ['make', 'model', 'year', 'owner_id'];

    /**
     * Get owners associated with a car.
     *
     * @return HasOne
     */
    public function owners(): HasOne
    {
        return $this->hasOne(Owner::class, 'id');
    }

    /**
     * Get addresses associated with a car.
     *
     * @return HasOne
     */
    public function addresses(): HasOne
    {
        return $this->hasOne(Address::class, 'id');
    }

    public function getTypes(): array
    {
        return json_decode(file_get_contents(storage_path() . '/json/car-data.json'), true);
    }
}
