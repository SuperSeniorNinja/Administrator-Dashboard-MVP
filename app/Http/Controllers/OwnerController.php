<?php

namespace App\Http\Controllers;

use App\Owner;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use DB;

class OwnerController extends Controller
{
    /**
     * Return a list of all owners.
     *
     * @return array
     */
    public function index(): array
    {
        $owners = Owner::withCount(['addresses', 'cars'])->orderBy('id', 'ASC')->get()->toArray();
        return $owners;
    }
    
    public function owner_statistics(): array
    {        
        $statistics = [];
        //get total number
        $total_number_of_addresses = DB::table('addresses')->count();
        $total_number_of_users = DB::table('owners')->count();
        $total_number_of_cars = DB::table('cars')->count();

        //get the average number of addresses and cars, respectively, per user 
        $statistics["avarage_address_count"] = round($total_number_of_addresses / $total_number_of_users);
        $statistics["avarage_cars_count"] = round($total_number_of_cars / $total_number_of_users);
        
        return $statistics;
    }
    /**
     * Return a single owner.
     *
     * @param Owner $owner
     * @return Owner
     */
    public function show(Owner $owner): Owner
    {
        $owner->addresses_count = count($owner->addresses);
        $owner->cars_count = count($owner->cars);
        return $owner;
    }

    /**
     * Store an owner.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $owner = Owner::create($request->all());

        return response()->json($owner, 201);
    }

    /**
     * Update an owner.
     *
     * @param Request $request
     * @param Owner $owner
     * @return JsonResponse
     */
    public function update(Request $request, Owner $owner): JsonResponse
    {
        $owner->update($request->all());

        return response()->json($owner, 200);
    }

    /**
     * Delete an owner.
     *
     * @param Owner $owner
     * @return JsonResponse
     * @throws Exception
     */
    public function delete(Owner $owner): JsonResponse
    {
        $owner->delete();

        return response()->json(null, 204);
    }
}
