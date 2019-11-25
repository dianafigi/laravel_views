@extends('layouts.principal')

@section('titulo', 'Clientes - Editar')

@section('conteudo')
  <h3>Cliente:   -  Editar</h3>
  <form action="{{ route('cliente.update', $cliente['id']) }}" method="post">
    {{ csrf_field() }}
    {{method_field('PUT')}}
    <!-- proprio do laravel, para em vez de ser post, mandar um put. Nao dá para mudar no form acima pq o html so aceita metodo get ou post -->
    <input type="text" name="nome" value="{{$cliente['nome']}}">
    <input type="submit" value="Guardar">
  </form>
@endsection