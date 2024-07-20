@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Inicio')

@section('content')

    
    <div class="container-mt-5">
        <div class="row justify-content-center">
                <div class="col-md-8" style="margin-left: 30px; padding-top: 100px;">
                    @role('admin')
                    <div class="card mb-4">
                        <div class="card-header">
                            <h1 class="text-center">Bienvenido Administrador a tu panel</h1>
                        </div>
                        <div class="card-body">
                            <form method="GET" action="{{ route('pages-home') }}">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" class="form-control" placeholder="Buscar usuarios..." aria-label="Buscar usuarios">
                                    <button class="btn btn-primary" type="submit">Buscar</button>
                                </div>
                            </form>
                            @if(isset($users))
                            <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Contraseña</th>
                                            <th>Rol</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->password }}</td>
                                    <td>{{ $user->roles->pluck('name')->join(', ') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                @endrole

                @role('user')
                <div class="card mb-4">
                    <div class="card-header">
                      <h1 class="text-center">Bienvenido a tu panel de gestión, Usuario</h1>
                    </div>
                    <div class="card-body">
                      <p>Esta es tu perfil de usuario. Estamos encantados de que puedas ver nuestro trabajo. <br>Aquí puedes ver la información de tu cuenta. Si necesitas cambiarla, puedes ir a configuraciones y modificar tus datos.</p>
                      <p><strong>Nombre:</strong> {{ Auth::user()->name }}</p>
                      <p><strong>Correo:</strong> {{ Auth::user()->email }}</p>
                      <p><strong>Rol:</strong> {{ Auth::user()->roles->pluck('name')->join(', ') }}</p>
                    </div>
                  </div>
                @endrole
