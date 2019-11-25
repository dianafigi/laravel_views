@extends('layouts.principal')

@section('titulo', 'Clientes')

@section('conteudo')
  <h3>{{$titulo}}</h3>
  <a href="{{ route('cliente.create') }}">Novo Cliente</a>
  @if(count($clientes)>0)
    <ul style="list-style: none;">
      @foreach ($clientes as $c)
        <li style="margin-bottom: 10px;">
          {{$c['id']}}  |  {{ $c['nome'] }} |
          <a href="{{ route('cliente.edit', $c['id']) }}">Editar</a> |
          <a href="{{ route('cliente.show', $c['id']) }}">Info</a> |
          <form action="{{ route('cliente.destroy', $c['id']) }}" method="post" style="display: inline;">
            {{ csrf_field() }}
            {{method_field('DELETE')}}
            <!-- proprio do laravel, para em vez de ser post, mandar um delete. Nao dá para mudar no form acima pq o html so aceita metodo get ou post -->
            <input type="submit" value="Apagar">
          </form>
        </li>
      @endforeach
    </ul>
  @else
    <h4>Nao existem clientes</h4>
  @endif

<!-- Qd fazemos um foreach, o laravel cria uma variável que é o $loop e q me deixa obtern diferentes informaçoes: -->
  @foreach($clientes as $c)
    <p>
      {{$c['nome']}}  |
      @if($loop->first)
        (primeiro)  |
      @endif
      @if($loop->last)
        (ultimo)  |
      @endif
      ({{$loop->index}}) - {{$loop->iteration}} / {{$loop->count}}
    </p>
  @endforeach
@endsection
