<?php

namespace App\Http\Controllers;

use App\Address;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use DB;

class AddressController extends Controller
{
    /**
     * Return a list of all addresses.
     *
     * @return array
     */
    public function index(): array
    {
        $addresses = Address::with(['owners'=>function ($q){
            $q->select([DB::raw("CONCAT(owners.first_name,' ',owners.last_name)  AS fullname"), 'id']);
        }])->withCount(['cars'])->orderBy('id', 'ASC')->get()->toArray();
        return $addresses;
    }

    public function address_statistics(): array
    {        
        $statistics = [];
        //get total number
        $total_number_of_addresses = DB::table('addresses')->count();
        $total_number_of_cars = DB::table('cars')->count();

        //get the average number of addresses and cars, respectively, per user 
        $statistics["avarage_cars_count"] = round($total_number_of_cars / $total_number_of_addresses);

        return $statistics;
    }

    /**
     * Return a single address.
     *
     * @param Address $address
     * @return Address
     */
    public function show(Address $address): Address
    {
        //format the full address & owner's full name
        $address->full_address = $address->address . '<br>' . $address->city . '<br>' . $address->country . '<br>' . $address->postal_code;
        $address->owner = $address->owners->first_name." ".$address->owners->last_name;
        $address->cars_count = count($address->cars);
        return $address;
    }

    /**
     * Store an address.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $address = Address::create($request->all());

        return response()->json($address, 201);
    }

    /**
     * Update an address.
     *
     * @param Request $request
     * @param Address $address
     * @return JsonResponse
     */
    public function update(Request $request, Address $address): JsonResponse
    {
        $address->update($request->all());

        return response()->json($address, 200);
    }

    /**
     * Delete an address.
     *
     * @param Address $address
     * @return JsonResponse
     * @throws Exception
     */
    public function delete(Address $address): JsonResponse
    {
        $address->delete();

        return response()->json(null, 204);
    }
}
