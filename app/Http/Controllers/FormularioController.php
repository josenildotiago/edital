<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Requerimento;

class FormularioController extends Controller
{
    public function getForm(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
            'name' => ['required', 'string', 'max:255', 'min:10'],
            'email' => ['string', 'email', 'max:255'],
            'tipo' => ['required', 'string'],
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

        $auto = implode('/', $request->input('auto'));

        $requerimento = new Requerimento();
        $requerimento->name = $request->input('name');
        $requerimento->tipo = $request->input('tipo');
        $requerimento->cpf = $request->input('cpf');
        $requerimento->email = $request->input('email');
        $requerimento->cep = $request->input('cep');
        $requerimento->rua = $request->input('rua');
        $requerimento->bairro = $request->input('bairro');
        $requerimento->cidade = $request->input('cidade');
        $requerimento->numero = $request->input('numero');
        $requerimento->uf = $request->input('uf');
        $requerimento->tel = $request->input('tel');
        $requerimento->placa = $request->input('placa');
        $requerimento->ufveiculo = $request->input('ufveiculo');
        $requerimento->auto = $auto;
        $requerimento->fato = $request->input('fato');
        $requerimento->ip = $request->ip();

        if ($requerimento->save()) {
            return redirect()->route('formulario')->with([
                "color" => "success",
                "message" => "Salvo com sucesso"]);
            // return redirect()->route('formulario')->withInput()->with([
            //     'color' => 'orange',
            //     'message' => 'Todas as imagens devem ser do tipo jpg, jpeg ou png.',
            // ]);
        } else {
            return redirect()->route('formulario')->with("danger", "Erro ao salvar");
        }
        // dd($request);
    }
}
