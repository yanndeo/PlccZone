<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\DevisFormRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class FormController extends Controller
{
    public function devisProduct(DevisFormRequest $request)
    {
        //$validated = $request->validated();


        $validator=  Validator::make($request->all(), DevisFormRequest);

          if(!$validator->fails()) {

            //SEND MAIL TO ADMIN
                    
            return response()->json(['success'=>true ], 200);
              
          }else{
               Response::json(array(
                  'success' => false,
                  'errors' => $validator->getMessageBag()->toArray(),
                
              ), 422); 

        


          }

    }
}
