@extends('layouts.principal')

@section('titulo', 'Opções')

@section('conteudo')
  <div>
    <ul>
      <li><a class="warning {{request()->is('opcoes/1') ? 'selected' : ''}}" href="{{route('opcoes', 1)}}">warning</a></li>
      <li><a class="info {{request()->is('opcoes/2') ? 'selected' : ''}}"    href="{{route('opcoes', 2)}}">info</a></li>
      <li><a class="success {{request()->is('opcoes/3') ? 'selected' : ''}}" href="{{route('opcoes', 3)}}">success</a></li>
      <li><a class="error {{request()->is('opcoes/4') ? 'selected' : ''}}"   href="{{route('opcoes', 4)}}">error</a></li>
    </ul>
  </div>

  @if(isset($opcao))
    @switch($opcao)
      @case(1)
        @component('componentes.alerta', ['titulo'=>'Erro Fatal', 'color'=>'warning'])
          <p><strong>Warning</strong></p>
          <p>Ocorreu um erro inesperado</p>
        @endcomponent
        @break
      @case(2)
        @component('componentes.alerta', ['titulo'=>'Erro Fatal', 'color'=>'info'])
          <p><strong>Info</strong></p>
          <p>Ocorreu um erro inesperado</p>
        @endcomponent
        @break
      @case(3)
        @component('componentes.alerta', ['titulo'=>'Erro Fatal', 'color'=>'success'])
          <p><strong>Success</strong></p>
          <p>Ocorreu um erro inesperado</p>
        @endcomponent
        @break
      @case(4)
        @component('componentes.alerta', ['titulo'=>'Erro Fatal', 'color'=>'error'])
          <p><strong>Error</strong></p>
          <p>Ocorreu um erro inesperado</p>
        @endcomponent
        @break
    @endswitch
  @endif
@endsection