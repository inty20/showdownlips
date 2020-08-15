@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="nav-item">
                            <a href="#home" aria-controls="home" class="nav-link active" role="tab" data-toggle="tab">Atualizar Perfil</a>
                        </li>
                        <li role="presentation" class="nav-item">
                            <a href="#profile" aria-controls="profile" class="nav-link" role="tab" data-toggle="tab">Desafiar a Elite dos 4</a>
                        </li>
                        <li role="presentation" class="nav-item">
                            <a href="#messages" aria-controls="messages" class="nav-link" role="tab" data-toggle="tab">Enviar Resultados do desafio</a>
                        </li>
                    </ul>
                </div>
            
                <div class="card-body">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="/perfil" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-5 form-group text-right">
                                        <label for="name">Nome</label>
                                    </div>  
                                    <div class="col-md-3 form-group">
                                        <input name="name" value="{{$user->name}}" class="form-control" />
                                    </div>  
                                    
                                    <div class="col-md-5 form-group text-right">
                                        <label for="email">Email</label>
                                    </div>  
                                    <div class="col-md-3 form-group">
                                        <input name="email" value="{{$user->email}}" class="form-control" />
                                    </div>  
                                    
                                    <div class="col-md-5 form-group text-right">
                                        <label for="password">Senha</label>
                                    </div>  
                                    <div class="col-md-3 form-group">
                                        <input type="password" name="password" class="form-control" />
                                    </div>  
                                    
                                    <div class="col-md-5 form-group text-right">
                                        <label for="photo">Foto de Perfil</label>
                                    </div>  
                                    <div class="col-md-6 form-group">
                                        <input type="file" name="photo" />
                                    </div>  
            
                                    <div class="col-md-12 form-group text-center"> 
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </div>
                                </div>  
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="/desafiar">
                                @csrf
                                <div class="row">
                                    <div class="col-md-5 form-group text-right">
                                        <label for="nome_time">Nome do time</label>
                                    </div>  
                                    <div class="col-md-3 form-group">
                                        <input name="nome_time" class="form-control" />
                                    </div>  
            
                                    <div class="col-md-5 form-group text-right">
                                        <label for="tier">Selecione a Tier</label>
                                    </div>  
                                    <div class="col-md-6 form-group">
                                        <select class="form-control" name="tier" style="width:auto">
                                            @foreach(Config::get('constants.tier') as $key => $value)            
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>  

                                    <div class="col-md-5 form-group text-right">
                                        <label for="pokemon_1">1º Pokemon</label>
                                    </div>  
                                    <div class="col-md-3 form-group">
                                        <input name="pokemon_1" onfocusout="verificarPokemon(this)" class="form-control" />
                                    </div> 
                                    <div class="col-md-5 form-group text-right">
                                        <label for="pokemon_2">2º Pokemon</label>
                                    </div>  
                                    <div class="col-md-3 form-group">
                                        <input name="pokemon_2" onfocusout="verificarPokemon(this)" class="form-control" />
                                    </div> 
                                    <div class="col-md-5 form-group text-right">
                                        <label for="pokemon_3">3º Pokemon</label>
                                    </div>  
                                    <div class="col-md-3 form-group">
                                        <input name="pokemon_3" onfocusout="verificarPokemon(this)" class="form-control" />
                                    </div> 
                                    <div class="col-md-5 form-group text-right">
                                        <label for="pokemon_4">4º Pokemon</label>
                                    </div>  
                                    <div class="col-md-3 form-group">
                                        <input name="pokemon_4" onfocusout="verificarPokemon(this)" class="form-control" />
                                    </div> 
                                    <div class="col-md-5 form-group text-right">
                                        <label for="pokemon_5">5º Pokemon</label>
                                    </div>  
                                    <div class="col-md-3 form-group">
                                        <input name="pokemon_5" onfocusout="verificarPokemon(this)" class="form-control" />
                                    </div> 
                                    <div class="col-md-5 form-group text-right">
                                        <label for="pokemon_6">6º Pokemon</label>
                                    </div>  
                                    <div class="col-md-3 form-group">
                                        <input name="pokemon_6" onfocusout="verificarPokemon(this)" class="form-control" />
                                    </div> 
            
                                    <div class="col-md-12 form-group text-center"> 
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </div>
                                </div>  
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="messages">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="/resultados" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-5 form-group text-right">
                                        <label for="time">Time</label>
                                    </div>  
                                    <div class="col-md-6 form-group">
                                        <select class="form-control" name="time" style="width:auto">
                                            @foreach($times as $time)            
                                                <option value="{{$time->id}}">{{$time->nome_time}}</option>
                                            @endforeach
                                        </select>
                                    </div>  
                                    
                                    <div class="col-md-5 form-group text-right">
                                        <label for="elite1">1º Elite</label>
                                    </div>  
                                    <div class="col-md-6 form-group">
                                        <input type="file" id="elite1" name="elite1"><br/>
                                    </div>
                                    <div class="col-md-5 form-group text-right">
                                        <label for="elite2">2º Elite</label>
                                    </div>  
                                    <div class="col-md-6 form-group">
                                        <input type="file" id="elite2" name="elite2"><br/>
                                    </div>
                                    <div class="col-md-5 form-group text-right">
                                        <label for="elite3">3º Elite</label>
                                    </div>  
                                    <div class="col-md-6 form-group">
                                        <input type="file" id="elite3" name="elite3"><br/>
                                    </div>
                                    <div class="col-md-5 form-group text-right">
                                        <label for="elite4">4º Elite</label>
                                    </div>  
                                    <div class="col-md-6 form-group">
                                        <input type="file" id="elite4" name="elite4"><br/>
                                    </div>
                                    <div class="col-md-5 form-group text-right">
                                        <label for="elite5">5º Elite</label>
                                    </div>  
                                    <div class="col-md-6 form-group">
                                        <input type="file" id="elite5" name="elite5"><br/>
                                    </div>
            
                                    <div class="col-md-12 form-group text-center"> 
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </div>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function verificarPokemon(input){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.status != 200){
                input.className = "form-control is-invalid";
            } else {
                input.className = "form-control";
            }
        };
        xhttp.open("GET", "https://cors-anywhere.herokuapp.com/https://pokemondb.net/pokedex/"+input.value, true);
        xhttp.send();
    }
</script>
@endsection