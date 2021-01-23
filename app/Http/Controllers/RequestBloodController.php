<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RequestBlood;
use App\Models\UserDetails;
use App\Models\AcceptRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Jobs\EmailSendRequest;
use App\Models\Feedback;
use Session;
use DB;
use Carbon\Carbon;
/**
 * @group Blood Request management
 *
 * APIs for managing Blood request
 */
class RequestBloodController extends Controller
{
     /**
     * User can request for a blood
     * @authenticated
     * 
     * @bodyParam location string required Example: "Shamim Sharani"
     * @bodyParam relation string required Example: "Wife"
     * @bodyParam alternate_mobile string required Example: "01845392010"
     * @bodyParam blood_group string required Example: "A-"
     * @bodyParam request_datetime dateTime required Example: "2021-01-20 14:00:11"
     * 
     * @response {
     *  "meassge" : "Your Request Send towards Donor!",
     * }
     */
    public function bloodRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'location'         => 'required',
            'relation'         => 'required',
            'alternate_mobile' => 'required',
            'blood_group'      => 'required',
            'request_datetime' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->getMessageBag(),
            ], 400);
        }

        $name  = auth()->user()->name;
        $id    = auth()->user()->id;

        $requestBlood = RequestBlood::create([
            'request_user_name' => $name,
            'request_user_id'   => $id,
            'blood_group'       => $request->blood_group,
            'location'          => $request->location,
            'alternate_mobile'  => $request->alternate_mobile,
            'relation'          => $request->relation,
            'request_datetime'  => $request->request_datetime,
        ]);

        $matchingDonor = UserDetails::with('user')->where('blood_group', $request->blood_group)
            ->where('district', $request->location)
            ->get();

        foreach ($matchingDonor as $donor) {
            $length = $donor->last_donation_date->diffInDays(now()); 

            if($length >= 90 ){
                $url = \URL::temporarySignedRoute(
                    'acceptRequest', now()->addMinutes(5), ['request_user_id' => $id, 'accept_user_id' => $donor->user->id, 'request_id' => $requestBlood->id  ]
                );
                EmailSendRequest::dispatch($url, $donor->user->email);
            }
        }

        return response()->json([
            'message'  =>  'Your Request Send towards Donor!'
        ]);
    }

    /**
     * user can accept the request if he/she want to become a donor
     *
     * This router filter based on same location and blood group
     *
     * This router not allowed to donor give blood within 3 month from last donation date
     *
     * All params are come from ther url
     * 
     * @queryParam accept_user_id integer required Example: "1"
     * @queryParam request_user_id integer required Example: "5"
     * @queryaram request_id integer required Example: "2"
     * 
     * @response {
     *  "meassge" : "Thank you For sincerity or Thank you For sincerity But Request Already accept",
     * }
     */
    public function requestAccept(Request $request)
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }
        $totalRow = DB::table('accept_requests')
                    ->where('request_id', $request->request_id)
                    ->count();
        if($totalRow < 3 ){
            $acceptUserID   = $request->accept_user_id;
            $requestUser_id = $request->request_user_id;
            $acceptRequest  = AcceptRequest::create([
                'request_user_id' => $requestUser_id,
                'accept_user_id'  => $acceptUserID,
                'request_id'      => $request->request_id
            ]);
             return response()->json([
                'message' => 'Thank you For sincerity'
            ]);
        }else{
            return response()->json([
                'message' => 'Thank you For sincerity But Request Already accept'
            ]);
        }
    }
    /**
     * admin and user can see the request history 
     * @authenticated
     * 
     * @response {
     *  "request_user_name" : "ahad",
     *  "request_user_id" : "1",
     *  "blood_group" : "B+",
     *  "location" : "Mugdha",
     *  "alternate_mobile" : "01845392010",
     *  "relation" : "wife",
     *  "request_datetime" : "2021-01-21 13:21:24",
     * }
     */
    public function requestHistory()
    {   

        $id       = auth()->user()->id;
        $userType = auth()->user()->type;
        if($userType == 'admin'){
            $requestHistory = RequestBlood::all();
        }else if($userType == 'user'){
            $requestHistory = RequestBlood::where('request_user_id', $id)->get();
        }
        return response()->json([
            'historyRequest' => $requestHistory
        ]);
    }
}
