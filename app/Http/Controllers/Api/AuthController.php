<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;

class AuthController extends Controller
{
    //


     /**
    * Create user
    *
    * @param  [string] name
    * @param  [string] email
    * @param  [string] password
    * @param  [string] password_confirmation
    * @return [string] message
    */
    public function register(Request $request)
    {
        try {

            $rules = [
                'name' => 'required|string',
                'email'=>'required|string|unique:users',
                'password'=>'required|string',
                'c_password' => 'required|same:password',
                'phone'    => 'required'
            ];

            $messege = [
                'c_password.same'=>'Confirm Password Does Not Match with Password',
            ];

            $validator = Validator::make($request->all(),$rules,$messege);

            if ($validator->fails())
            {
                return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first(),
                'data' => '',
                ],400);
            }

            $randomString = Str::random(8);
            
            $user = new User([
                'name'  => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'text_pass' => $request->password,
                'address' => $request->address,
                'role' => $request->user_type,
            ]);

            if($user->save()){
                $tokenResult = $user->createToken('Personal Access Token');
                $token = $tokenResult->plainTextToken;
                return response()->json([
                    'status' => true,
                    'msg' => 'Successfully created user!',
                    'data' => '',
                    'accessToken'=> $token,
                ],200);
            }else{
                return response()->json([
                    'status' => false,
                    'msg' => 'Provide proper details',
                    'data' => '',
                ],400);
            }

        } catch (ValidationException $exception) {
            return response()->json([
                'status' => false,
                'msg'    => $exception->errors()->first(),
            ], 400);
        }
    }




    /**
     * Login user and create token
    *
    * @param  [string] email
    * @param  [string] password
    * @param  [boolean] remember_me
    */

    public function login(Request $request)
    {

        $rules = [
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails())
        {
            return response()->json([
            'status' => false,
            'msg' => $validator->errors()->first(),
            'data' => '',
            ],400);
        }

        $credentials = request(['email','password']);
        if(!Auth::attempt($credentials))
        {
            return response()->json([
                'status' => false,
                'msg' =>'Unauthorized',
                'data' => '',
            ],400);
        }

        $user = $request->user();
        // dd($user);
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->plainTextToken;

        return response()->json([            
            'status' => true,
            'msg' =>'Authorized! User logged in successfully',
            'data' => '',
            'accessToken' =>$token,
            'token_type' => 'Bearer',
        ],200);
    }

    /**
     * Get the authenticated User
    *
    * @return [json] user object
    */
    public function user(Request $request)
    {
        return response()->json([
            'status' => true,
            'msg' =>'User details fetched succesfully',
            'data' => $request->user(),
        ],200);
    }

    /**
     * Logout user (Revoke the token)
    *
    * @return [string] message
    */
    public function profileUpdate(Request $request){        

        $user = Auth::user();
        if(empty($user)){
            return response()->json([
                'status' => true,
                'msg' =>'User Does not exist!',
                'data' => '',
            ],400);
        }
        if($request['email'] != $user->email){
            return response()->json([
                'status' => true,
                'msg' =>'Enter Correct Email!',
                'data' => '',
            ],400);
        }
                
        $rules = [
            'img' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails())
        {
            return response()->json([
            'status' => false,
            'msg' => $validator->errors()->first(),
            'data' => '',
            ],400);
        }
        
        $fileuserphoto  = $request->file('img');

        if($fileuserphoto!=''){
            $destination = 'uploads/User/';
            $nameuserphoto = $destination.rand(1,10000).time().'.'.$fileuserphoto->getClientOriginalExtension();
            $fileuserphoto->move($destination,$nameuserphoto);
            $user->user_image               = $nameuserphoto;
        }
        
        $user->name                = $request['name'];
        $user->email               = $request['email'];
        $user->phone              = $request['phone'];
        $user->address             = $request['address'];
        $user->save();

        return response()->json([
            'status' => true,
            'msg' =>'User Profile Updated Successfully!',
            'data' => '',
        ],200);

    }

    public function forgetPassword(Request $request){

        $user = Auth::user();
        if(empty($user)){
            return response()->json([
                'status' => true,
                'msg' =>'User Does not exist!',
                'data' => '',
            ],400);
        }
                
        dd(p('New'));

        if($request->email == $user->email){

                // $onetimepass = rand(10000000,100000000);
                $onetimepass = '12345678';
            
                $user->password = Hash::make($onetimepass);
                $user->text_pass      = $onetimepass;
                $user->save();
            
            /* start email*/
            $tagfindreplacearray = array(
                'email'   => $user->email,
                'msg'     => $onetimepass,
                'name'    => $user->name,
                'username'    => $user->name,
            );

            $EmailSettingArray = array(
                'subject' => 'Password-Recovery',
                'to'      => $user->email,
            );

            sendemail('forgot-password',$tagfindreplacearray,$EmailSettingArray);
            /* end email*/
    
            return response()->json([
                'status' => true,
                'msg' =>'One Time Password Is Send To Your Email ID Please Check And try To Login In!',
                'data' => '',
            ],200);

        }else{

            return response()->json([
                'status' => true,
                'msg' =>'Your Email Does Not Match With Our Record Please Enter Correct One!',
                'data' => '',
            ],400);

        }

    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'status' => true,
            'msg' =>'Successfully logged out',
            'data' => '',
        ],200);
    }

}
