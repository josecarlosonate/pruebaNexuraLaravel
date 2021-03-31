@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="card mb-4">

            <div class="card-header">
                <h1> Employee Show </h1>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label class="col-form-label" for="value">Nombre</label>
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value="{{ $employee->nombre }}">
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="value">Email</label>
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value="{{ $employee->email }}">
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="value">Sexo</label>
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value="{{ $employee->sexo }}">
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="value">Boletin</label>
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value="{{ $employee->boletin }}">
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="value">Descripcion</label>
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value="{{ $employee->descripcion }}">
                </div>
            </div>

        </div>

        <div class="card mb-4">

            <div class="card-header">
                <h2>Roles</h2>
            </div>
            <div class="card-body">
                <div>
                    <a href="{{ route('roles.create') }}">New</a>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th> Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employee->roles as $role)
                            <tr>
                                <td>
                                    <a href="{{ route('roles.show', ['role' => $role]) }}">Show</a>
                                    <a href="{{ route('roles.edit', ['role' => $role]) }}">Edit</a>
                                    <a href="javascript:void(0)" onclick="event.preventDefault();
                            document.getElementById('delete-role-{{ $role->id }}').submit();">
                                        Delete
                                    </a>
                                    <form id="delete-role-{{ $role->id }}"
                                        action="{{ route('roles.destroy', ['role' => $role]) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                                <td> {{ $role->nombre }}</td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>



        <a href="{{ url()->previous() }}">Back</a>
    </div>
@endsection
