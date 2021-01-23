<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Feedback;
use App\Models\Donation;
use Illuminate\Support\Facades\Validator;
use DB;
/**
 * @group Feedback management
 *
 * APIs for managing Feedback
 */
class FeedbackController extends Controller
{
	/**
     * Donor or Receiver give feedback vice versa 
     * @authenticated
     * 
     * @bodyParam donation_id integer required Example: "1"
     * @bodyParam feedback string required Example: "Good persion"
     * 
     * @response {
     *  "message" : "Thank for your feedback" 
     * }
     */
   public function feedbackStore(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'donation_id' => 'required',
            'feedback'    => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->getMessageBag(),
            ], 400);
        }

        $id = auth()->user()->id;
        $checkUserDonor = Donation::where('id', $request->donation_id)->first();

        if($checkUserDonor->donor_id == $id){
        	$type = 'donor';
        }else if($checkUserDonor->receiver_id == $id){
        	$type = 'receiver';
        }

        $feedback = Feedback::create([
            'donation_id'  => $request->donation_id,
            'user_id'      => $id,
            'type'		   => $type,
            'feedback'     => $request->feedback,
        ]);

        return response()->json([
            'message' => 'Thank for your feedback'
        ]);
    }
    /**
     * admin or user can see the given feedback
     * @authenticated
     * 
     * @response {
     *  "name" : "ahad",
     *  "email" : "ahad@email.com",
     *  "feedback" : "good persion",
     *  "donation_id" : "2",
     *  "type" : "donor",
     * }
     */
    public function feedbacks()
    {
		$id   = auth()->user()->id;
		$user = auth()->user();
        if($user->type == 'admin'){
        	$feedbacks = DB::table('feedback')
	    		->join('users', 'feedback.user_id', '=', 'users.id')
	    		->select('users.name', 'users.email','feedback.feedback', 'feedback.donation_id', 'feedback.type')
	    		->get();

	    	if(count($feedbacks) > 0){
		    	return response()->json([
		    		'data'  => $feedbacks
		    	]);
	    	}else{
	    		return response()->json([
    				"message"  => 'No feedback available'
    			]);
	    	}

        }else if($user->type == 'user'){

        	$feedbacks = DB::table('feedback')
	    		->join('users', 'feedback.user_id', '=', 'users.id')
	    		->where('feedback.user_id', $id)
	    		->select('users.name', 'users.email', 'feedback.feedback', 'feedback.donation_id', 'feedback.type')
	    		->get();

	    	if(count($feedbacks) > 0){
		    	return response()->json([
	    			'data'  => $feedbacks
	    		]);
	    	}else{
	    		return response()->json([
    				"message"  => 'You have no feedback!'
    			]);
	    	}
	    	
        }
    }

     /**
     * admin or user can see the specific feedback against donation
     * @authenticated
     * 
     * @response {
     *  "name" : "ahad",
     *  "email" : "ahad@email.com",
     *  "feedback" : "good persion",
     *  "donation_id" : "2",
     *  "type" : "donor",
     * }
     */

    public function show($id){
		$user   = auth()->user();
		$userId = auth::id();
		if($user->type == 'admin'){
            
			$feedbacks = DB::table('feedback')
	    		->join('users', 'feedback.user_id', '=', 'users.id')
	    		->where('feedback.donation_id', $id)
	    		->select('users.name', 'users.email', 'feedback.feedback', 'feedback.donation_id', 'feedback.type')
	    		->get();

		    return response()->json([
		    	'data'  => $feedbacks
		    ]);
		}else if($user->type == 'user'){
			$feedbacks = DB::table('feedback')
	    		->join('users', 'feedback.user_id', '=', 'users.id')
	    		->where('feedback.donation_id', $id)
	    		->where('feedback.user_id', $userId)
	    		->select('users.name', 'users.email', 'feedback.feedback', 'feedback.donation_id', 'feedback.type')
	    		->get();
		    return response()->json([
		    	'data'  => $feedbacks
		    ]);
		}
    }
}
