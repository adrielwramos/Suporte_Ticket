@extends('layouts.app')

@section('custom_css')
<!-- Comment Styles -->
<link href="{{ asset('css/comment.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

@endsection

@section('content')
<div class="container">
    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuários</a></li>
            <li class="breadcrumb-item active">Detalhes #{{ $user->id }}</li>
        </ol>
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="card">
            <div class="card-header">Usuário #{{ $user->id }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <tbody>
                                <tr>
                                    <th>Id.</th>
                                    <td> {{ $user->ref }}</td>
                                </tr>   
                                <tr>
                                    <th>Título</th>
                                    <td> {{ $user->title }}</td>
                                </tr>   
                                <tr>
                                    <th>Nome</th>
                                    <td> {{ $user->fullname }}</td>
                                </tr>   
                                <tr>
                                    <th>E-mail</th>
                                    <td> {{ $user->email }}</td>
                                </tr>   
                                <tr>
                                    <th>Categoria</th>
                                    <td> {{ $user->category }}</td>
                                </tr>   
                                <tr>
                                    <th>Status</th>
                                    <td> {{ $user->status }}</td>
                                </tr>   
                                <tr>
                                    <th>Descrição</th>
                                    <td> {{ $user->description }}</td>
                                </tr>   
                            </tbody>
                        </table>
                        <a href=""><button type="submit" class="btn btn-success">Resolvido</button></a>
                         <a href="{{ route('users.destroy', $user->uuid) }}"><button type="submit" class="btn btn-danger">Excluir</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
