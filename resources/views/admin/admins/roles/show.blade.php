@extends('admin.layouts.master')

@section('tittle')

    {{ $role->name }}
@endsection

@section('page')
    {{ $role->name }}
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right mb-3">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> {{__('admin.Back')}}</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{__('admin.name')}}</strong>
                {{ $role->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong class="mb-3">{{__('admin.Permission')}}</strong> <br>
                @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                        <label class="label label-success">{{ $v->name }}</label> <br>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
