<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;
/**
 * @group Auth management
 *
 * APIs for Authenticate users and generate APIs token
 */
class AuthController extends Controller
{
	/**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
     /**
     * Authenticate the user By verifying Email and password
     *
     * @bodyParam email string required Example: ahadcseuits@gmail.com
     * @bodyParam password string required Example: 12345
     *
     *
     * @response {
     *  "token": eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYxMTIzMTE5NSwiZXhwIjoxNjExMjM0Nzk1LCJuYmYiOjE2MTEyMzExOTUsImp0aSI6ImtVNE5pTXJqNUlNbnVkME8iLCJzdWIiOjExLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.yjYutXVWVnDkxUjDATOghsfuFEstHSyOz2Fdgf5F9JM,
     *  "message": "You logged in as admin or you logged in as user",
     * 
     * }
     */
	public function login(Request $request)
	{
		 $validator = Validator::make($request->all(), [
            'email'            => 'required|email',
            'password'         => 'required|min:4|max:8',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->getMessageBag(),
            ], 400);
        }

		$authenticateUser  = User::whereEmail($request->email)->first();
		$credentials = $request->only('email', 'password');
		if($authenticateUser){
			if($authenticateUser->type == 'admin'){
				if ($token = auth('api')->attempt($credentials)){
					return response()->json([
						'token'  => $token,
						'message' => 'You logged in as admin'
					]);

				}else{
					return response()->json(['error' => 'Unauthorized'], 401);
				}
			}else if($authenticateUser->type == 'user'){
				if($token = auth('api')->attempt($credentials)){
					return response()->json([
						'token'  => $token,
						'message' => 'you logged in as User'
					]);

				}else{
					return response()->json(['error' => 'Unauthorized'], 401);
				}
			}
		}else{
			return response()->json(['message' => 'Invalid Credentials']);
		}
		
	}
     /**
     * Logout the user
     *
     * 
     *
     *
     * @response {
     *  "messgae": "Logout successfully!"
     * }
     */
	public function logOut()
	{
        Auth::logout();
        return response()->json([
            'message' => 'Logout successfully!'
        ]);

	}
}
