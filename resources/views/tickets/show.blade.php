@extends('layouts.app')

@section('custom_css')
<!-- Comment Styles -->
<link href="{{ asset('css/comment.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="card">
            <div class="card-header">Ticket #{{ $ticket->ref }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <tbody>
                                <tr>
                                    <th>Ref.</th>
                                    <td> {{ $ticket->ref }}</td>
                                </tr>   
                                <tr>
                                    <th>Título</th>
                                    <td> {{ $ticket->title }}</td>
                                </tr>   
                                <tr>
                                    <th>Nome</th>
                                    <td> {{ $ticket->fullname }}</td>
                                </tr>   
                                <tr>
                                    <th>E-mail</th>
                                    <td> {{ $ticket->email }}</td>
                                </tr>   
                                <tr>
                                    <th>Categoria</th>
                                    <td> {{ $ticket->category }}</td>
                                </tr>   
                                <tr>
                                    <th>Prioridade</th>
                                    @if($ticket->level === "Alta")
                                        <td>{{ $ticket->level }}</td>
                                    @else
                                        <td> {{ $ticket->level }}</td>
                                    @endif
                                </tr>   
                                <tr>
                                    <th>Status</th>
                                    <td> {{ $ticket->status }}</td>
                                </tr>   
                                <tr>
                                    <th>Descrição</th>
                                    <td> {{ $ticket->description }}</td>
                                </tr>   
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-warning">Salvar Ticket</button>
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

   

</div>
@endsection
