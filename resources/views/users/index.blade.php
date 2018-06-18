@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12 col-sm-12">
             @if(Auth::user()->isAdmin())
            <div class="card">
                <div class="card-header">Meus Usuários</div>               
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Nível</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    @if($user->role == "admin")
                                    <td><span class="badge badge-warning">{{ $user->role }}</span></td>
                                    @elseif($user->role == "user")
                                    <td><span class="badge badge-primary">{{ $user->role }}</span></td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                @else
                <div class="alert alert-info"><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Opss!</strong>
                Seu usuário não tem acesso a essa área!
            </div>
                @endif
        </div>
    </div>
</div>
@endsection