<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormularioController extends Controller
{
    public function getForm(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
            'name' => ['required', 'string', 'max:255', 'min:10'],
            'email' => ['string', 'email', 'max:255'],
            'radio' => ['required', 'string'],
            'cpf' => ['required', 'min:11', 'max:25'],
            'placa' => ['required', 'min:7', 'max:8', ':attribute não pode ser em branco!'],
            'auto.*' => ['required'],
            'fato' => ['required', 'string', 'max:255'],
            'doc' => ['mimes:pdf', 'max:2500']
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