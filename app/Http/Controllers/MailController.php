<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    private $to = 'esnider@vertice.pe';
    private $cc = 'rrojas@vertice.pe';

    public function send(Request $request)
    {
        $data = $request->all();
        $usuario = User::find($request->id);

        Mail::send(
            'emails.support',
            $data,
            function ($message) use ($usuario) {
                $message->from($usuario->email, $usuario->name);
                $message->to($this->to)->cc($this->cc);
                $message->subject('Helpdesk desde Convocatoria 2016 Festival de Cine de Lima');
            }
        );

        return response()->json([ 'status' => 'success', 'code' => '200' ]);
    }
}
