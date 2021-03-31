@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">

        <div class="card-header">
            <h1> Employee Create </h1>
        </div>
        <div class="card-body">

        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul> @endif <form action="{{route('employees.store')}}" method="POST" novalidate>
        @csrf
                        <div class="form-group">
            <label for="area_id">Area</label>
            <select class="form-control" name="area_id" id="area_id">
                @foreach((\App\Models\Area::all() ?? [] ) as $area)
                <option value="{{$area->id}}">
                    {{$area->nombre}}</option>
                @endforeach
            </select>
        </div>
                                
                                                        <div class="form-group">
            <label for="nombre">Nombre</label>
                        <input class="form-control String"  type="text"  name="nombre" id="nombre" value="{{old('nombre')}}"             maxlength="255"
                                    required="required"
                        >
                        @if($errors->has('nombre'))
            <p class="text-danger">{{$errors->first('nombre')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="email">Email</label>
                        <input class="form-control String"  type="text"  name="email" id="email" value="{{old('email')}}"             maxlength="255"
                                    required="required"
                        >
                        @if($errors->has('email'))
            <p class="text-danger">{{$errors->first('email')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="sexo">Sexo</label>
                        <input class="form-control String"  type="text"  name="sexo" id="sexo" value="{{old('sexo')}}"             maxlength="1"
                                    required="required"
                        >
                        @if($errors->has('sexo'))
            <p class="text-danger">{{$errors->first('sexo')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="boletin">Boletin</label>
                        <input class="form-control Integer"  type="number"  name="boletin" id="boletin" value="{{old('boletin')}}"                         required="required"
                        >
                        @if($errors->has('boletin'))
            <p class="text-danger">{{$errors->first('boletin')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10">{{old('descripcion')}}</textarea>
                        @if($errors->has('descripcion'))
            <p class="text-danger">{{$errors->first('descripcion')}}</p>
            @endif
        </div>
                        <div>
            <button class="btn btn-primary" type="submit">Create</button>
            <a href="{{ url()->previous() }}">Back</a>
        </div>
        </form>
        </div>
    </div>
</div>
@endsection
