<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use DB;
/**
 * @group Donation management
 *
 * APIs for managing Donation History
 */
class DonationController extends Controller
{
    /**
     * Admin or User see the all donation history
     * @authenticated
     *
     * @response {
     *  "name" : "ahad", 
     *  "email" : "ahad@gmail.com", 
     *  "donation_date" : "2021-01-20 14:00:11", 
     * }
     */
    public function donationHistory()
    {
    	$userCheck = auth()->user();
    	$userId = auth()->user()->id;

    	if($userCheck->type == 'admin'){
    		$donorHistroy = DB::table('users')
	    		->join('Donations', 'users.id', '=', 'Donations.donor_id')
                ->select('users.name', 'users.email', 'Donations.donation_date')
	    		->get();

    		return response()->json([
    			"data"  => $donorHistroy
    		]);
    		
    	}else if($userCheck->type == 'user'){

    		$donorHistroy = DB::table('Donations')
	    		->join('users', 'Donations.donor_id', '=', 'users.id')
                ->where('Donations.donor_id', $userId)
	    		->select('users.name', 'users.email', 'Donations.donation_date')
	    		->get();

	    	if(count($donorHistroy) > 0){
	    		return response()->json([
    				"data"  => $donorHistroy
    			]);
	    	}else{
	    		return response()->json([
    				"message"  => 'You have no donation! please donate your blood'
    			]);
	    	}
    	}
    }
    /**
     * Admin or User see the Specific donation history
     * @authenticated
     *
     * @response {
     *  "name" : "ahad", 
     *  "email" : "ahad@gmail.com", 
     *  "donation_date" : "2021-01-20 14:00:11", 
     * }
     */

    public function show($id)
    {
        $userCheck = auth()->user();

        if($userCheck->type == 'admin'){
            $donorHistroy = DB::table('Donations')
                ->join('users', 'Donations.donor_id', '=', 'users.id')
                ->where('Donations.id', $id)
                ->select('users.name', 'users.email', 'Donations.donation_date')
                ->first();
            return response()->json([
                "data"  => $donorHistroy
            ]);
            
        }else if($userCheck->type == 'user'){

            $donorHistroy = DB::table('Donations')
                ->join('users', 'Donations.donor_id', '=', 'users.id')
                ->where('Donations.id', $id)
                ->select('users.name', 'users.email', 'Donations.donation_date')
                ->first();

            if(count($donorHistroy) > 0){
                return response()->json([
                    "data"  => $donorHistroy
                ]);
            }else{
                return response()->json([
                    "message"  => 'You have no donation! please donate your blood'
                ]);
            }
        }
    }
}
