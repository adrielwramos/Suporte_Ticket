@extends('layouts.app')

@section('title', 'Novo Ticket')


@section('content')

<div class="container" style="margin-top:20px;">  

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
        <fieldset disabled>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="1" selected="">Aberto</option>
                    <option value="0" disabled>Fechado</option>
                </select>
            </div>
        </fieldset>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Descrição do Ticket</label>
            <textarea class="form-control" name="description" id="description" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Abrir Ticket</button>
        <a href="{{route('tickets.index')}}"> <button type="button" class="btn btn-default">Cancelar</button> </a>

    </form>
</div>

@endsection