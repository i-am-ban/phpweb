<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Locations;
use App\Http\Controllers\Controller;

class LocationsController extends Controller
{

    public function loadLocations(Request $request)
    {
        if ($request->ajax())
        {
            $id   = $request->id;
            $type = $request->type;

            $level = 1;
            $column  = '';

            if ($type)
            {
                if ($type == 'district')
                {
                    $level = 2;
                    $column = 'loc_city_id';
                } else {
                    $level = 3;
                    $column = 'loc_district_id';
                }

                $locations = Locations::where('loc_level', $level)
                    ->where($column,$id)
                    ->select('loc_name','id')->get();


                $loca = Locations::findOrFail($id);

                return response([
                    'locations'  => $locations,
                    'id'        => $id,
                    'loca'      => $loca
                ]);
            }
        }
    }
    
}