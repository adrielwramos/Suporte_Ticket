@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <h3 class="text-muted"><i class="fas fa-ticket-alt"></i>  Tickets</h3>
            <hr class="text-muted">
            <p>
            <a class="btn btn-info" href="{{route('tickets.create')}}"> <i class="fas fa-plus-square"> Abrir Ticket</i></a>
            <a class="btn btn-info" href="{{ URL::to('tickets/create') }}"> <i class="fas fa-plus-square"> Abrir Ticket3</i></a>
        </p>
            <div class="card">
                @if(Auth::user()->isAdmin())
                <div class="card-header">Todos os Tickets</div>
                @endif
                @if(Auth::user()->isUser())
                <div class="card-header">Meus Tickets</div>
                @endif               

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover text-center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Ref.</th>
                                <th>Título</th>
                                <th>Nome</th>
                                <th>Categoria</th>
                                <th>Prioridade</th>
                                <th>Status</th>
                                <th width="30%">Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($tickets as $ticket)
                                    <tr>
                                        <td>{{ $ticket->id }}</td>
                                        <td>{{ $ticket->ref }}</td>
                                        <td>{{ $ticket->title }}</td>
                                        <td>{{ $ticket->fullname }}</td>
                                        <td>{{ $ticket->category }}</td>
                                        @if($ticket->level == "Alta")
                                        <td class="alert alert-danger">{{ $ticket->level }}</td>
                                        @elseif($ticket->level == "Normal")
                                        <td class="alert alert-primary">{{ $ticket->level }}</td>
                                        @elseif($ticket->level == "Baixa")
                                        <td class="alert alert-secondary">{{ $ticket->level }}</td>
                                        @endif
                                        @if($ticket->status == 0)
                                        <td><span class="badge badge-danger">Fechado</span></td>
                                        @else
                                        <td><span class="badge badge-success">Aberto</span></td>
                                        @endif
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('tickets.show', $ticket->uuid) }}"><span class="fa fa-eye"> Ver</span></a>
                                            @if($ticket->status == 1)
                        <a href="{{ URL::to('tickets/' . $ticket->uuid . '/update') }}"><button class="btn btn-success"><span class="fa fa-lock"> Fechar Ticket</span></button></a>
                        @else
                        <a href="{{ route('tickets.update', $ticket->id) }}"><button class="btn btn-success"><span class="fa fa-lock-open"> Reabrir Ticket</span></button></a>
                        @endif
                        <form class="form-horizontal" role="form" method="PUT" action="{{ route('tickets.update', $ticket->uuid) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="status" value="0">
                                    <button class="btn btn-danger">
                                        <span class="fa fa-trash">
                                        Fechar
                                        </span>
                                    </button>
                                </form>
                        @if(Auth::user()->isAdmin())
                        <form action="{{ URL::to('tickets/' . $ticket->uuid) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger" onclick="return confirm('Deseja mesmo excluir?')">
                                        <span class="fa fa-trash">
                                        Excluir
                                        </span>
                                    </button>
                                </form>
                        @endif
                                        </td>
                                        </tr>
                                             
                                    @endforeach
                            </tbody>
                        </table>
                        <div align="center">
                {!! $tickets->links() !!}
            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection





