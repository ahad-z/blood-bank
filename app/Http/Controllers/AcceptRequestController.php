<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AcceptRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Donation;
use App\Models\UserDetails;
use DB;
/**
 * @group Blood Request management
 *
 * APIs for managing Blood request accept
 * APIs  for add donor 
 */
class AcceptRequestController extends Controller
{
    /**
     * Admin can see the accept user who accept the request
     * @authenticated
     *
     *
     * @response {
     *  "name" : "ahad",
     *  "email" : "ahad@gmail.com",
     *  "accept_user_id" : "1",
     *  "request_id" : "2",
     *  "request_user_id" : "3",
     * }
     */
    public function showAcceptUser()
    {
    	$checkUser = auth()->user();

	    if($checkUser->type == 'admin'){
	    	$acceptUser = DB::table('users')
	    		->join('accept_requests', 'users.id', '=', 'accept_requests.accept_user_id')
	    		->select('users.name', 'users.email', 'accept_requests.accept_user_id', 'accept_requests.request_id', 'accept_requests.request_user_id')
	    		->get();

		    return response()->json([
		    	'acceptUser' => $acceptUser 
		    ]);

    	}else{
    		return response()->json([
		    	'message' => 'You have no permission to see accept user list' 
		    ], 401);
    	}
    	
    }
    /**
     * Admin can set the donor against the request for blood
     * @authenticated
     *
     * @bodyParam donor_id integer required Example: "1"
     * @bodyParam receiver_id integer required Example: "1"
     * @bodyParam request_id integer required Example: "5"
     * @bodyParam donation_date dateTime required Example: "2021-01-20 14:00:11"
     * @response {
     *  "message" : "Donor assigned successfully"
     * }
     */
    public function addDonor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'accept_user_id'  => 'required',
            'request_user_id' => 'required',
            'request_id'      => 'required',
            'donation_date'   => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->getMessageBag(),
            ], 400);
        }

    	$donation = Donation::create([
			'donor_id'      => $request->accept_user_id,
            'receiver_id'   => $request->request_user_id,
			'request_id'    => $request->request_id,
			'donation_date' => $request->donation_date,
    	]);
    	
    	$userLastDonateDate = UserDetails::where('user_id', $request->accept_user_id)->first();
    	$userLastDonateDate->last_donation_date = $request->donation_date;
    	$userLastDonateDate->update();

    	return response()->json([
    		'message' => 'Donor assigned successfully'
    	]);
    }
}
