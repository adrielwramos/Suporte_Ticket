<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'body' => 'required|min:5',
        ]);

        $comment = Comment::create([
            'ticket_id' => request('ticket_id'),
            'user_id' => auth()->id(),
            'body' => request('body'),
        ]);

        if ($comment) {
                return redirect()
                                ->back()
                                ->with('Mensagemenviada', 'Deletado com sucesso!');
            } else {
                return redirect()
                                ->back()
                                ->with('errors', 'Ocorreu um erro!');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if (auth()->user()->isAdmin()) {
            $comment->delete();
            if ($comment) {
                return redirect()
                                ->back()
                                ->with('deletarSucesso', 'Deletado com sucesso!');
            } else {
                return redirect()
                                ->back()
                                ->with('errors', 'Ocorreu um erro ao deletar!');
            }
        }
    }
}
