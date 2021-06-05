<?php

namespace App\Http\Controllers\Api\Marchand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marchand;
use App\Traits\GeneralTrait;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;
use Auth;

class AuthController extends Controller
{
    

    use GeneralTrait;

    public function login(Request $request)
    {

        try {
            $rules = [
                "login" => "required|exists:marchands,login",
                "password" => "required"

            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }

            //login

            $credentials = $request->only(['login', 'password']);

            $token = Auth::guard('marchand-api')->attempt($credentials);

            if (!$token)
                return $this->returnError('E001', 'بيانات الدخول غير صحيحة');

            $marchand = Auth::guard('marchand-api')->user();
            $marchand->api_token = $token;
            //return token
            return $this->returnData('marchans', $marchand);

        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }


    }
    
}