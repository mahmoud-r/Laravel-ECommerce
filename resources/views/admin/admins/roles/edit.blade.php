@extends('admin.layouts.master')

@section('tittle')
    {{(__('admin.Edit'))}}
@endsection

@section('page')
    {{(__('admin.Edit'))}}
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right mb-3">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> {{(__('admin.Back'))}}</a>
            </div>
        </div>
    </div>




    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{__('admin.name')}}:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{__('admin.Permission')}}</strong>
                <br/>
                @foreach($permission as $value)
                    <label class="mt-2">{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                        {{ $value->name }}</label>
                    <br/>
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">{{__('admin.edit')}}</button>
        </div>
    </div>
    {!! Form::close() !!}

@endsection
