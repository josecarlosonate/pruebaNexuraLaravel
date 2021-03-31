@extends('layouts.app')
@section('content')
<div class="container">

    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h1> Employees </h1>
        </div>
    <div class="card-body">

    <div>
        <a href="{{route('employees.create')}}">New</a>
    </div>
    <table class="table table-striped">
        @if(count($employees))
        <thead>
            <tr>
                <th>&nbsp;</th>
                                
                                
                                                <td>Nombre</td>
                
                                                <td>Email</td>
                
                                                <td>Sexo</td>
                
                                                <td>Boletin</td>
                
                                                <td>Descripcion</td>
                
                            </tr>

        </thead>
        @endif
        <tbody>
            @forelse($employees as $employee)
            <tr>
                <td>
                    <a href="{{route('employees.show',['employee'=>$employee] )}}">Show</a>
                    <a href="{{route('employees.edit',['employee'=>$employee] )}}">Edit</a>
                    <a href="javascript:void(0)" onclick="event.preventDefault();
                    document.getElementById('delete-employee-{{$employee->id}}').submit();">
                        Delete
                    </a>
                    <form id="delete-employee-{{$employee->id}}" action="{{route('employees.destroy',['employee'=>$employee])}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
                                                                                                                <td>{{$employee->nombre}}</td>
                                                                <td>{{$employee->email}}</td>
                                                                <td>{{$employee->sexo}}</td>
                                                                <td>{{$employee->boletin}}</td>
                                                                <td>{{$employee->descripcion}}</td>
                                
            </tr>
            @empty
            <p>No Employees</p>
            @endforelse
        </tbody>
    </table>
    </div>
    </div>

</div>

@endsection