@extends('layouts.app')

@section('title', 'Novo Ticket')


@section('content')

<div class="container" style="margin-top:20px;">

    <div class="card">
        <img class="card-img-top" src="holder.js/100x180/" alt="">
        <div class="card-body">
            <h4 class="card-title">Abrir Novo Ticket</h4>
            <p class="card-text">Retornaremos o ticket o mais rápido possível.</p>
        </div>
    </div>

<form method="POST" action="{{ route('tickets.store') }}">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Título</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Título do Ticket" required>
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Nome Completo</label>
        <input type="text" name="fullname" class="form-control" id="exampleFormControlInput1" value="{{ $user->name }}" required >
        </div>
        

        <div class="form-group">
            <label for="exampleFormControlInput1">E-mail</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="{{ $user->email }}" required >
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect2">Categoria</label>
            <select class="form-control" id="category" name="category" required>
            <option value="Geral">Geral</option>
            <option value="Suporte">Suporte</option>
            <option value="Comercial">Comercial</option>
            <option value="Financeiro">Financeiro</option>
            <option value="Software">Software</option>
            <option value="Feedback">Feedback</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="exampleFormControlSelect2">Prioridade</label>
            <select class="form-control" id="level" name="level" required>
            <option value="Baixa">Baixa</option>
            <option value="Normal">Normal</option>
            <option value="Alta">Alta</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Descrição do Ticket</label>
            <textarea class="form-control" name="description" id="description" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Abrir Ticket</button>
        <button type="submit" class="btn btn-default">Cancelar</button>

    </form>
</div>

@endsection