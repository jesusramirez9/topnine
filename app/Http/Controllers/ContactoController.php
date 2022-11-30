<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{

    public function index(){

        return view('web.contactanos');
    }
    
    public function store(Request $request){

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => '6Lefu0QjAAAAAIAuUi8hu1Ia1fqvJuTJohjexmYz',
            'response' => $request->input('g-recaptcha-response')
        ])->object();

        if ($response->success && $response->score >=0.7) {
            $request->validate([
                'name' => 'required',
                'correo' =>'required|email',
                'celular' =>'required|numeric',
                'mensaje' =>'required'
            ]);
    
            $correo = new ContactoMailable($request->all());
            Mail::to('jesus.ramirez9@unmsm.edu.pe')->send($correo);
    
            return redirect()->route('contacto')->with('info','Mensaje enviado');
        } else {
            return redirect()->route('contacto')->with('info','No se envio el mensaje');
        }

        // $request->validate([
        //     'name' => 'required',
        //     'correo' =>'required|email',
        //     'celular' =>'required|numeric',
        //     'mensaje' =>'required',
        //     'g-recaptcha-response' => ['required', new \App\Rules\Recaptcha]
        // ]);

        // $correo = new ContactoMailable($request->all());
        // Mail::to('jesus.ramirez9@unmsm.edu.pe')->send($correo);

        // return redirect()->route('contacto')->with('info','Mensaje enviado');
    }
}
