<?php

namespace App\Http\Controllers;

use App\User;
use App\Ticket;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;

class TicketsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAdmin()){
            $ticket = Ticket::orderBy('status', 'Aberto')->paginate(20);
        }else{
            $ticket = Ticket::where('user_id','=', Auth::id())->orderBy('status', 'Aberto')->paginate(20);
        }
        return view('tickets.index', array('tickets' => $ticket));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('tickets.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'fullname' => 'required',
            'email' => 'required|email',
            'category' => 'required',
            'level' => 'required',
            'description' => 'required',
        ]);

        $ticket = Ticket::create([
            'user_id' => auth()->id(),
            'uuid' => Str::uuid(),
            'ref' => date('dmYHis') . "/" . rand(1, 100),
            'title' => request('title'),
            'fullname' => request('fullname'),
            'email' => request('email'),
            'category' => request('category'),
            'level' => request('level'),
            'status' => request('status'),
            'description' => request('description'),
        ]);

        return redirect()->route('tickets.show', $ticket);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
       if(auth()->user()->isAdmin())
        {
            return view('tickets.show', compact('ticket'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update($uuid)
    {
      $ticket = Ticket::find($id);
      $ticket->status = 0;
      $ticket->save();
       return view('tickets.show', compact('ticket'));
    }

    public function fechar(Ticket $ticket)
    {
       $ticket = Ticket::find($uuid);
      $ticket->status = 0;
      $ticket->save();
       return view('tickets.show', compact('ticket'));
    }

    public function abrir(Ticket $ticket)
    {
       if(auth()->user()->isAdmin())
        {            
            Ticket::where('uuid',$ticket->uuid)->update(['status' => 1]);
            return view('tickets.show', compact('ticket'));
        }else{
            return redirect()->back();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        

        // redirect
        Session::flash('message', 'Successfully deleted the nerd!');
        return Redirect::to('tickets');
    }
}
