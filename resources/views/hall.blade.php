@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header h5">{{ __('Bem vindo ao Hall of Fama!') }}</div>

                <div class="card-body pt-0">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($users_equip as $user)

                    <div class="row pl-4">
                        <div class="col-md-3 justify-content-center align-items-center d-flex">
                            <div class="row">
                                <div class="col-md-12 pt-4 pb-1 pl-0 text-center"> <img src="{{URL::asset('/images/avatar1.png')}}" width="180" /> </div>
                                <div class="col-6 text-right p-0">Treinador:&nbsp;</div>
                                <div class="col-6 p-0">{{ $user->name }}</div>
                                <div class="col-6 text-right p-0">Tier:&nbsp;</div>
                                <div class="col-6 p-0">{{ Config::get('constants.tier')[$user->tier] }}</div>
                            </div>
                        </div>
                        <div class="col-md-9 text-center">
                            <div class="row">
                                <div class="col-md-4 col-6 pl-0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="https://img.pokemondb.net/sprites/home/normal/{{strtolower($user->pokemon_1)}}.png" width="128">
                                        </div>
                                        <div class="col-md-12 pl-5">{{ucfirst($user->pokemon_1)}}</div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6 pl-0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="https://img.pokemondb.net/sprites/home/normal/{{strtolower($user->pokemon_2)}}.png" width="128">
                                        </div>
                                        <div class="col-md-12 pl-5">{{ucfirst($user->pokemon_2)}}</div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6 pl-0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="https://img.pokemondb.net/sprites/home/normal/{{strtolower($user->pokemon_3)}}.png" width="128">
                                        </div>
                                        <div class="col-md-12 pl-5">{{ucfirst($user->pokemon_3)}}</div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-6 pl-0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="https://img.pokemondb.net/sprites/home/normal/{{strtolower($user->pokemon_4)}}.png" width="128">
                                        </div>
                                        <div class="col-md-12 pl-5">{{ucfirst($user->pokemon_4)}}</div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6 pl-0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="https://img.pokemondb.net/sprites/home/normal/{{strtolower($user->pokemon_5)}}.png" width="128">
                                        </div>
                                        <div class="col-md-12 pl-5">{{ucfirst($user->pokemon_5)}}</div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6 pl-0">                      
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="https://img.pokemondb.net/sprites/home/normal/{{strtolower($user->pokemon_6)}}.png" width="128">
                                        </div>
                                        <div class="col-md-12 pl-5">{{ucfirst($user->pokemon_6)}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-0">
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
