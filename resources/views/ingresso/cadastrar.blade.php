@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('content_header')
@stop
@section('content')
    @if(Session::has('flash_message'))
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-offset-1">
                    <div align="center" class="alert {{ Session::get('flash_message')['class'] }}">
                        {{ Session::get('flash_message')['msg'] }}
                    </div>
                </div>
            </div>
        </div>
    @endif
    <h1>Cadastro de Veiculos </h1>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{route('ingresso.salvar')}}" method="post">
                            {{ csrf_field() }}

                           <div class="form-group">
                            <label for="hora">Hora</label>
                            <input type="time" name="hora" class="form-control" placeholder="hora do ingresso">
                            @if($errors->has('data'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('hora') }}</strong>
                                </span>
                            @endif
                           </div>

                           <div class="form-group">
                            <label for="data">Data</label>
                            <input type="date" name="data" class="form-control" placeholder="Data do ingresso">
                            @if($errors->has('data'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('data') }}</strong>
                                </span>
                            @endif
                           </div>

                           <div class="form-group">
                            <label for="mercadoria">Mercadoria</label>
                            <input type="text" name="mercadoria" class="form-control" placeholder="Mercadoria">
                            @if($errors->has('mercadoria'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mercadoria') }}</strong>
                                </span>
                            @endif
                           </div>

                           <div class="form-group">
                            <label for="peso">Peso</label>
                            <input type="text" name="peso" class="form-control" placeholder="Peso">
                            @if($errors->has('peso'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('peso') }}</strong>
                                </span>
                            @endif
                           </div>

                           <div class="form-group">
                            <label for="quantidade">Quantidade</label>
                            <input type="text" name="quantidade" class="form-control" placeholder="Quantidade">
                            @if($errors->has('quantidade'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('quantidade') }}</strong>
                                </span>
                            @endif
                           </div>
                          
                          <div class="form-group">
                            <label for="nota_fiscal">Nota Fiscal</label>
                            <input type="text" name="nota_fiscal" class="form-control" placeholder="Nota Fiscal">
                            @if($errors->has('nota_fiscal'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nota_fiscal') }}</strong>
                                </span>
                            @endif
                           </div>

                            <div class="form-group">
                            <label for="conhecimento">Conhecimento</label>
                            <input type="text" name="conhecimento" class="form-control" placeholder="Conhecimento">
                            @if($errors->has('conhecimento'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('conhecimento') }}</strong>
                                </span>
                            @endif
                           </div>

                           <div class="form-group" {{ $errors->has('veiculo') ? 'has-error':'' }}>
                                <label for="veiculo_id">Veiculo</label>
                                <select name="veiculo_id" id="veiculo_id" class="form-control">
                                @foreach($veiculo as $c)
                                 <option value="{{$c->id}}">{{$c->placa}}</option>
                                @endforeach
                               </select>
                            </div>


                             <div class="form-group" {{ $errors->has('unidade') ? 'has-error':'' }}>
                                <label for="unidade_id">Unidade</label>
                                <select name="unidade_id" id="unidade_id" class="form-control">
                                    @foreach($unidade as $c)
                                        <option value="{{$c->id}}">{{$c->descricao}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-info">Adicionar</button>
                            <a class="btn btn-info" href="{{route('home')}}">Voltar ao Menu</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection