@extends('layouts.principal')

@section('titulo', 'Departamentos')

@section('conteudo')
  <h3>Departamentos</h3>
  <ul>
    <li>Computadores</li>
    <li>Electronicos</li>
    <li>Acessorios</li>
    <li>Roupas</li>
  </ul>

  @component('componentes.alerta', ['titulo'=>'Erro Fatal', 'color'=>'warning'])
  <!-- Array associativo; Para passar mais parametros é igual separado por virgulas -->
    <p><strong>Erro Inesperado</strong></p>
    <p>Ocorreu um erro inesperado</p>
  @endcomponent

  <!-- Em vez de usar @ component/@ endcomponent como em cima, uso @ alerta([o resto])/@ endalerta pq registei este componente em: app>Providers>AppServiceProvider -->
  <!-- deixo comentado aqui e no registo porque algo nas versoes(?) n está correcto e nao me deixa utitizar @ alerta -->
  @component('componentes.alerta', ['titulo'=>'Erro Fatal', 'color'=>'info'])
    <p><strong>Erro Inesperado</strong></p>
    <p>Ocorreu um erro inesperado</p>
  @endcomponent
@endsection