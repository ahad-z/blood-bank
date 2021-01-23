<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UserDetails;
/**
 * @group User management
 *
 * APIs for managing users
 */
class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @bodyParam name string required Example: ahad
     * @bodyParam email string required Example: ahadcseiuits@gmail.com
     * @bodyParam mobile string required Example: 01981732712
     * @bodyParam alternate_mobile string required Example: 01845392010
     * @bodyParam blood_group string required Example: B+
     * @bodyParam religion string required Example: Islam
     * @bodyParam weight string required Example: 60kg
     * @bodyParam birth_date string required Example: 1997-08-03
     * @bodyParam district string required Example: Chandpur
     * @bodyParam police_station string required Example: Chandpur
     * @bodyParam post_office string required Example: Darussalam
     * @bodyParam union string required Example: "Bagadi"
     * @response {
     *  "name" : "Thank you for your registration"
     * }
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'             => 'required',
            'email'            => 'required|email|unique:users',
            'password'         => 'required|min:4|max:8',
            'mobile'           => 'required',
            'alternate_mobile' => 'required',
            'blood_group'      => 'required',
            'religion'         => 'required',
            'weight'           => 'required',
            'birth_date'       => 'required',
            'district'         => 'required',
            'police_station'   => 'required',
            'post_office'      => 'required',
            'union'            => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->getMessageBag(),
            ], 400);
        }

        try{

            $user =  User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => bcrypt($request->password)
            ]);

            $user_details = UserDetails::create([
                'user_id'          => $user->id,
                "mobile"           => $request->mobile,
                "alternate_mobile" => $request->alternate_mobile,
                "blood_group"      => $request->blood_group,
                "religion"         => $request->religion,
                "weight"           => $request->weight,
                "birth_date"       => $request->birth_date,
                "district"         => $request->district,
                "police_station"   => $request->police_station,
                "post_office"      => $request->post_office,
                "union"            => $request->union,
            ]);

            return response()->json([
                'message' => 'Thank you for your registration'
            ]);

        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
