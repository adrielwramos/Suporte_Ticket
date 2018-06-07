@extends('layouts.app')

@section('title', 'Dashboard')

@section('custom_css')


@endsection

@section('content')


<main role="main" class="col-md-12">
    <div class="justify-content-center" align="center">
        <h1 class="h2">Dashboard</h1>
    </div>
    <div align="center" class="card-body">
        <div class="alert alert-info">
            Olá, <b>{{ Auth::user()->name }}</b> você esta logado no Sistema!<br>
            Navegue através dos menus acima!
        </div>
</main>

@endsection

@section('custom_js')



@endsection