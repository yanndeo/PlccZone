<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Mail\MailTo;
use App\Http\Requests\DevisFormRequest;
use App\Http\Requests\ContactRequest;
use App\Mail\DevisMailable;
use App\Mail\ContactMailable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class FormController extends Controller
{
    /**
     * @param DevisFormRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @desc send mail without saved it
     */
    public function devisProduct(DevisFormRequest $request)
    {

        $validated = $request->validated();

        if($validated){
            //SEND MAIL TO ADMIN
            MailTo::sendMailToAdmin( new DevisMailable($request->all()));

            return response()->json(['success'=>true ], 200);

        }


    }


    /**
     * @param ContactRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @des send email from contact form
     * @des using helpers function
     */

    public function contactPost( ContactRequest $request){

        $validated = $request->validated();

        if($validated){

            $messageData = new ContactMailable(
                            $request->name,
                            $request->email,
                            $request->message,
                            $request->object
            );

            MailTo::sendMailToAdmin($messageData);

            MailTo::ReplyAutoToUser($request->email, now()->addMinutes(10));

            return response()->json('success', 200);    

        }    
        
    }










    
}
