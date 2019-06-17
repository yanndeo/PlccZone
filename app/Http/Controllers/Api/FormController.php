<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\DevisFormRequest;
use App\Mail\DevisMailable;
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
            Mail::to('yan2sambou@gmail.com')
                 ->cc('abdelmoula.nami@gmail.com')
                 ->send(new DevisMailable( $request->all() ));

            return response()->json(['success'=>true ], 200);

        }


    }
}
