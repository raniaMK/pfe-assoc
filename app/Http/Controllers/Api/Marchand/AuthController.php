<?php

namespace App\Http\Controllers\Api\Marchand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marchand;
use App\Models\Reclamation;
use App\Models\Cheque;
use App\Models\Achat;
use App\Models\Personne;
use App\Traits\GeneralTrait;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;
use App\Http\Middleware;
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
            return $this->returnData('marchands', $marchand);

        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }


    }
    public function logout(Request $request)
    {
         $token = $request -> header('auth-token');
        if($token){
            try {

                JWTAuth::setToken($token)->invalidate(); //logout
            }catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
                return  $this -> returnError('','some thing went wrongs');
            }
            return $this->returnSuccessMessage('Logged out successfully');
        }else{
            $this -> returnError('','some thing went wrongs');
        }

    }
    public function getPersonneByCin(Request $request)
    {

      // $personne = Personne::selection()->find($request->id);
    
       $personne = Personne::where('CIN',$request -> CIN) ->first();
       $cheque= Cheque::where ('id',$personne -> id)->first();
      // dd( $cheque);
        if (!$personne)
           
        return $this->returnError('001', 'not found');

     return $this->returnData('personne', $personne, $cheque );


    }  public function getPersonneByCheque($createdAt)
    {
       $cheque= Cheque::where ('created_at', $createdAt)->first();
       $personne = Personne::where('id',$cheque -> personne_id) ->first();      
     
        if (!$cheque)
           
        return $this->returnError('001', 'not found');

     return $this->returnData('PersonneByCheque',$personne , $cheque );


    }

    public function profile()
    {
       

       $marchand = Auth::guard('marchand-api')->user();
 
        return  $this->returnData('marchand', $marchand );

    }
    public function getSoldeMarchand()
    {

       $marchand = Auth::guard('marchand-api')->user()->achats->sum('montant');
        return  $this->returnData('marchand', $marchand );
    }

 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function AddAchat($chequeId, $marchandId, Request $request)
    {

        $marchand = Auth::guard('marchand-api')->user();

        //checking whether the cheque required exist or not
        try {
            $cheque= Cheque::findOrFail($chequeId);
        } catch (ModelNotFoundException $e) {
            throw new NotFoundHttpException();
        }

        //checking whether the Marchand required exist or not
        try {
            $marchand = Marchand::findOrFail($marchandId);
        } catch (ModelNotFoundException $e) {
            throw new NotFoundHttpException();
        }        
            //if condition verifier le montant par rapport solde cheque 
            if ($cheque->montant > $request->montant)  {
                $achat = new Achat();
                $achat->marchand_id = $marchand->id;
                $achat->cheque_id = $cheque->id;
                $achat->montant = $request->montant;
                $achat->save();
                $montantInitial= $cheque->montant;
               
                $cheque::where('id',$chequeId) -> update(['montant' =>  $cheque->montant= $montantInitial - $request->montant ]);
                $cheque->save(); 

            }
            else {
                return response()->json(
                    [
                        'status'  => false,
                        'message' => 'montant insuffisant',
                    ]
                );
            }  
            
               
            if ( $achat->save()) {
                return response()->json(
                    [
                        'status' => true,
                        'achat'   => $achat,                    ]
                );
            } else {
                return response()->json(
                    [
                        'status'  => false,
                        'message' => 'Oops, smth wrong .',
                    ]
                );
            }   
         }

         public function reclamation(Request $request)
         {

            $marchand = Auth::guard('marchand-api')->user();
            $reclamation = new Reclamation();
                $reclamation->sujet =$request->sujet;
                $reclamation->message = $request->message;
                $reclamation->marchand_id = $marchand->id;
                $reclamation->save();
                if ( $reclamation->save()) {
                    return response()->json(
                        [
                            'status' => true,
                            'achat'   => $reclamation,                    ]
                    );
                } else {
                    return response()->json(
                        [
                            'status'  => false,
                            'message' => 'Oops, smth wrong .',
                        ]
                    );
                }   

         }
      


    
}