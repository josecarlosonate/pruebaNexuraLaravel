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
            <h1> Roles </h1>
        </div>
    <div class="card-body">

    <div>
        <a href="{{route('roles.create')}}">New</a>
    </div>
    <table class="table table-striped">
        @if(count($roles))
        <thead>
            <tr>
                <th>&nbsp;</th>
                                
                                                <td>Nombre</td>
                
                            </tr>

        </thead>
        @endif
        <tbody>
            @forelse($roles as $role)
            <tr>
                <td>
                    <a href="{{route('roles.show',['role'=>$role] )}}">Show</a>
                    <a href="{{route('roles.edit',['role'=>$role] )}}">Edit</a>
                    <a href="javascript:void(0)" onclick="event.preventDefault();
                    document.getElementById('delete-role-{{$role->id}}').submit();">
                        Delete
                    </a>
                    <form id="delete-role-{{$role->id}}" action="{{route('roles.destroy',['role'=>$role])}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
                                                                                <td>{{$role->nombre}}</td>
                                
            </tr>
            @empty
            <p>No Roles</p>
            @endforelse
        </tbody>
    </table>
    </div>
    </div>

</div>

@endsection