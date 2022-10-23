<!-- Modal -->
@can('admin-create')
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{{__('admin.add_admin')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.store')}}" method="post">
                   @csrf
                    <div class="form-group mb-1">
                        <label for="exampleInputText">{{__('admin.name')}}</label>
                        <input type="text" name="name" class="form-control " placeholder="{{__('admin.name')}}">
                    </div>
                    @error('name')
                    <div class="text-danger mb-3 ">{{ $message }}</div>
                    @enderror
                    <div class="form-group mb-1">
                        <label for="exampleInputEmail">{{__('admin.email')}}</label>
                        <input type="email" name="email" class="form-control" placeholder="{{__('admin.email')}}">
                    </div>
                    @error('email')
                    <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="form-group mb-1">
                        <label for="exampleInputPassword">{{__('admin.password')}}</label>
                        <input type="password" name="password" class="form-control" placeholder="{{__('admin.password')}}">
                    </div>
                    @error('password')
                    <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <strong>Role:</strong>
                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('admin.Close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('admin.add')}}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endcan
