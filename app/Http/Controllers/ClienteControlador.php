<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteControlador extends Controller
{

  private $clientes = [
    ['id'=>1, 'nome'=>'diana'],
    ['id'=>2, 'nome'=>'joao'],
    ['id'=>3, 'nome'=>'luis'],
    ['id'=>4, 'nome'=>'ana']
  ];

  public function __construct() {   //como n tenho db, o index ia smp buscar o array $clientes acima e na funçao store tinha de usar o q ta comentado
    //desta forma ele guarda smp os clientes actualizados na sessao
    $clientes = session('clientes');
    if(!isset($clientes))
      session(['clientes'=>$this->clientes]);

      //O uso da SESSION deixa de ser necessario qd ha DB
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return "Lista de todos os clientes";

        //ou se quiser mostrar os guardados no array:
          // echo '<ol>';
          //   foreach($this->clientes as $c) {
          //     echo '<li>' .$c['nome']. '</li>';
          //   }
          // echo '</ol>';

        //ou se quiser mostrar os guardados no array atraves de view:
          //$clientes = $this->clientes; -> sem DB ou SESSION
          //return view('clientes.index', compact(['clientes', 'titulo']));     //o compact é funcao do php q passa tudo o q ta dentro do clientes para uma unica array
          //ou igual à de cima: return view('clientes.index', ['clientes'=>$clientes, 'titulo'=>$titulo]);
          $clientes = session('clientes');
          $titulo = "Todos os clientes";
          return view('clientes.index')
            ->with('clientes', $clientes) //serve para passar uma variavel para a view; 1ºparam: nome da variavel; 2ºparam: valor q a variavel vai guardar
            ->with('titulo', $titulo); //os dois parametros nao têm de ser iguais como clientes-clientes
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return "Formulario de registo";
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $clientes = session('clientes');
      $id = end($clientes)['id'] + 1;  //vai ao ultimo elemento dos 'clientes' e encontra o id desse, depois soma um  ficando este o id do elemento novo
      $nome = $request->nome; //do input 'name' do form
      $dados = ['id'=>$id, 'nome'=>$nome];
      $clientes[] = $dados;
      //dd($this->clientes);para ver o array. É tipo var_dump
      session(['clientes'=>$clientes]);  //está a guardar o novo array, o actualizado na session

      return redirect()->route('cliente.index');

      //SEM DB e sem SESSION, ele retorna ao index e mostra o array original q está definido no inicio do controlador, ent tenho de usar o seguinte:
      // $id = count($this->clientes) + 1;
      // $nome = $request->nome;
      // $dados = ['id'=>$id, 'nome'=>$nome];
      // $this->clientes[] = $dados;
      // $clientes = $this->clientes;
      // return view('clientes.index', compact(['clientes']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $clientes = session('clientes');
      $index = $this->getIndex($id, $clientes);
      $cliente = $clientes[$index];
      return view('clientes.info', compact(['cliente']));  //este 'cliente' vem de $cliente
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $cliente = $clientes[$index];
        return view('clientes.edit', compact(['cliente']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $clientes = session('clientes');
      $index = $this->getIndex($id, $clientes);
      $clientes[$index]['nome'] = $request->nome;
      session(['clientes'=>$clientes]);
      return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $clientes = session('clientes');
      $index = $this->getIndex($id, $clientes);
      array_splice($clientes, $index, 1); //funçao do php; Ir ao array dos clientes, apagar o que está na posiçao index, o 1º q aparece nessa posiçao
      session(['clientes'=>$clientes]);
      return redirect()->route('cliente.index');
    }

    private function getIndex($id, $clientes) {
      //O uso deste tipo de funçao deixa de ser necessario qd ha DB e Models
      $ids = array_column($clientes, 'id'); //funçao do php; 1ºparam: nome do array, 2ºparam: nome da coluna do array
      $index = array_search($id, $ids); //funçao do php; 1ºparam: o que quero procurar(neste caso é o q recebo da funçao inicial), 2ºparam: dentro da array dos ids
      //O $index nao devolve o valor do id mas sim do index. Logo se a funcao inicial receber index 2, esta ultima vai devolver o valor 1 pois é um array e começa no zero
      return $index;
    }
}
