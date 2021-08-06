<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormularioController extends Controller
{
    public function getForm(Request $request)
    {
        $rules  = [
            "doc" => "required|mimes:application/pdf, application/x-pdf,application/acrobat, applications/vnd.pdf, text/pdf, text/x-pdf|max:10000"
        ];
        $validator = Validator::make(
            $request->all(),
            [
            'name' => ['required', 'string', 'max:255', 'min:10'],
            'email' => ['string', 'email', 'max:255'],
            'radio' => ['required', 'string'],
            'cpf' => ['required', 'min:11', 'max:25'],
            'placa' => ['required', 'min:7', 'max:8'],
            'auto.*' => ['required'],
            'fato' => ['required', 'string', 'max:255'],
            'doc.*' => ['mimes:pdf'],
            'image.*' => 'mimes:jpeg,bmp,png,jpg'
            ]
        );
        if ($validator->fails()) {
            return redirect('/formulario')
                        ->withErrors($validator)
                        ->withInput();
        }

        dd($request);
    }
}
