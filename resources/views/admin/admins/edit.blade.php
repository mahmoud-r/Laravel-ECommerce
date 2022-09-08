@extends('admin.layouts.master')

@section('tittle')
    {{__('admin.edit')}} {{$admin->name}}
@endsection

@section('page')
    admin
@endsection


@section('content')
    <form action="{{route('admin.update',$admin->id)}}" method="post">
        @csrf
        {{ method_field('PUT') }}
        <div class="form-group mb-1">
            <label for="exampleInputText">name</label>
            <input type="text" name="name" value="{{$admin->name}}" class="form-control " id="exampleInputText" placeholder="name">
        </div>
        @error('name')
        <div class="text-danger mb-3 ">{{ $message }}</div>
        @enderror
        <div class="form-group mb-1">
            <label for="exampleInputEmail">Email</label>
            <input type="email" name="email" value="{{$admin->email}}" id="exampleInputEmail" class="form-control" placeholder="Email">
        </div>
        @error('email')
        <div class="text-danger mb-3">{{ $message }}</div>
        @enderror

        <div class="form-group mb-1">
            <label for="exampleInputEmail">Role</label>
            {!! Form::select('roles[]', $roles,$adminRole, array('class' => 'form-control','multiple')) !!}
        </div>
        @error('Role')
        <div class="text-danger mb-3">{{ $message }}</div>
        @enderror


            <button type="submit" class="btn btn-primary mt-3 mb-3">{{__('admin.edit')}}</button>

    </form>
@endsection
