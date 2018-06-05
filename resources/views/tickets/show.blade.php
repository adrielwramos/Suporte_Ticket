@extends('layouts.app')

@section('custom_css')
<!-- Comment Styles -->
<link href="{{ asset('css/comment.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

@endsection

@section('content')
<div class="container">
    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('tickets.index') }}">Tickets</a></li>
            <li class="breadcrumb-item active">Detalhes #{{ $ticket->id }}</li>
        </ol>

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
                                    @if($ticket->level == "Alta")
                                        <td class="badge badge-danger">{{ $ticket->level }}</td>
                                        @elseif($ticket->level == "Normal")
                                        <td class="badge badge-default">{{ $ticket->level }}</td>
                                        @elseif($ticket->level == "Baixa")
                                        <td class="badge badge-primary">{{ $ticket->level }}</td>
                                        @endif
                                </tr>   
                                <tr>
                                    <th>Status</th>
                                    @if($ticket->status == 0)
                                        <td><span class="badge badge-danger">Fechado</span></td>
                                        @else
                                        <td><span class="badge badge-success">Aberto</span></td>
                                        @endif
                                </tr>   
                                <tr>
                                    <th>Descrição</th>
                                    <td> {{ $ticket->description }}</td>
                                </tr>   
                            </tbody>
                        </table>
                        @if($ticket->status == 1)
                        <a href="{{ route('tickets.fechar', $ticket->uuid) }}"><button class="btn btn-success"><span class="fa fa-lock">Fechar Ticket</span></button></a>
                        @else
                        <a href="{{ route('tickets.abrir', $ticket->uuid) }}"><button class="btn btn-success"><span class="fa fa-lock-open">Reabrir Ticket</span></button></a>
                        @endif
                        @if(Auth::user()->isAdmin())
                        <form action="{{ route('tickets.destroy', $ticket->uuid) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger" onclick="return confirm('Deseja mesmo excluir?')">
                                        <span class="fa fa-trash">
                                        Excluir
                                        </span>
                                    </button>
                                </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row justify-content-center" style="margin-top: 20px;">
    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-header">Mensagens Enviadas</div>

            <div class="card-body">
                @foreach($ticket->comments as $comment)
                <div class="panel panel-white post panel-shadow">
                    <div class="post-heading">
                        <div class="pull-left image">
                            @if(Auth::user()->isAdmin())
                            <img src="{{ asset('img/user_admin.jpg') }}" class="img-circle avatar" alt="user profile image">
                            @endif
                            @if(Auth::user()->isUser())
                            <img src="{{ asset('img/user_user.jpg') }}" class="img-circle avatar" alt="user profile image">
                            @endif
                        </div>
                        <div class="pull-left meta">
                            <div class="title h5">
                                <a href="#"><b>{{ $comment->user->name }}</b></a>
                            </div>
                            <h6 class="text-muted time">{{ $comment->created_at->diffForHumans() }}</h6>
                        </div>
                    </div> 
                    <div class="post-description"> 
                        <p>{{ $comment->body }}</p>
                         @if(Auth::user()->isAdmin())
                        <div class="stats">
                            <a href="#" class="btn btn-danger stat-item">
                                <i class="fa fa-trash"> Excluir Mensagem</i>
                            </a>
                        </div>
                         @endif
                    </div>
                    <hr>
                </div>
            </div>
            @endforeach
            @if($ticket->status == 1)
            <div class="card" style="margin-top: 20px;">
                <div class="card-body">
                    <form action="{{ route('comments.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="ticket_id" id="ticket_id" value="{{ $ticket->id }}">
                        <div class="form-group">
                            <textarea class="form-control" name="body" id="body" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endif


@endsection
