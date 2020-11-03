<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Mail\EventoMail;
use App\Mail\ConviteMail;
use App\Http\Requests\EventoRequest;
use App\Models\Convite;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Auth;


class EventosController extends Controller
{
    public function index()
    {
        $eventos_criados = Evento::where('user_id', '=', Auth::user()->id)->get();
        return view('eventos.index', ['eventos' => $eventos_criados]);
    }

    public function convidado()
    {
        $eventos_convidado = User::find(Auth::user()->id)->eventos;
        return view('eventos.convidado', ['convites' => $eventos_convidado]);
    }

    public function create()
    {
        return view('eventos.create');
    }

    public function store(EventoRequest $request)
    {
        $data = [
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'data_evento' => $request->data_evento,
            'criador' => Auth::user()->name,
        ];

        Mail::send(new EventoMail($data));

        $eventSlug = $this->setNome($request->nome);

        $evento = new Evento;
        $evento->nome = $request->nome;
        $evento->slug = $eventSlug;
        $evento->descricao = $request->descricao;
        $evento->data_evento = $request->data_evento;
        $evento->user_id = Auth::user()->id;
        $evento->save();

        return redirect()->route('eventos.index');
    }

    public function show($id)
    {
        $evento = Evento::findOrFail($id);
        $participantes = User::all();

        return view('eventos.show', ['evento' => $evento, 'participantes' => $participantes]);
    }

    public function convite(Request $request)
    {
        $convidado = User::find($request->user_id);
        $evento = Evento::find($request->evento_id);

        $data = [
            'nome' => $evento->nome,
            'descricao' => $evento->descricao,
            'data_evento' => $evento->data_evento,
            'convidado' => $convidado->name,
            'email' => $convidado->email
        ];

        return new ConviteMail($data);

        //Mail::send(new EventoMail($data));

        $evento = Evento::findOrFail($request->evento_id);
        $evento->convites()->attach([$request->user_id]);

        return redirect()->route('eventos.show', $evento);
    }

    public function edit(Evento $evento)
    {
        return view('eventos.edit')->with(compact('evento'));
    }

    public function update(EventoRequest $request, Evento $evento)
    {
        $eventSlug = $this->setNome($request->nome);

        $evento = Evento::find($evento->id);
        $evento->nome = $request->nome;
        $evento->slug = $eventSlug;
        $evento->descricao = $request->descricao;
        $evento->data_evento = $request->data_evento;
        $evento->user_id = Auth::user()->id;
        $evento->save();

        return redirect()->route('eventos.index');
    }

    public function destroy(Evento $evento)
    {
        $data = [
            'nome' => $evento->nome,
            'descricao' => $evento->descricao,
            'data_evento' => $evento->data_evento,
            'convidado' => $convidado->name,
            'email' => $convidado->email
        ];

        Evento::destroy($evento->id);
        return redirect()->route('eventos.index');
    }

    public function lixeira()
    {
        $data = [
            'nome' => $evento->nome,
            'descricao' => $evento->descricao,
            'data_evento' => $evento->data_evento,
            'convidado' => $convidado->name,
            'email' => $convidado->email
        ];

        return new ConviteMail($data);

        //Mail::send(new EventoMail($data));

        $eventos = Evento::where('user_id', '=', Auth::user()->id)->onlyTrashed()->get();
        return view('eventos.lixeira', ['eventos' => $eventos]);
    }

    public function restaurar($evento)
    {
        $data = [
            'nome' => $evento->nome,
            'descricao' => $evento->descricao,
            'data_evento' => $evento->data_evento,
            'convidado' => $convidado->name,
            'email' => $convidado->email
        ];

        return new ConviteMail($data);

        //Mail::send(new EventoMail($data));
        $eventos = Evento::onlyTrashed()->where(['id' => $evento])->first();
        if($eventos->trashed()){
            $eventos->restore();
        }
        return redirect()->route('eventos.lixeira');
    }


    private function setNome($nome){
        $eventSlug = Str::slug($nome);
        $eventos = Evento::all();
        $t = 0;
        foreach($eventos as $evento){
            if(Str::slug($evento->nome) === $eventSlug){
                $t++;
            }
        }
        if($t > 0){
            $eventSlug = $eventSlug.'-'.$t;
        }
        return $eventSlug;
    }
}
