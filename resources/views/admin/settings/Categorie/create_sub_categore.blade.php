<!-- Modal -->
@can('Categories-create')
<div class="modal fade" id="addcategorie" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{{__('admin.add_categorie')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('sub_categories.create',$categories->id)}}" method="post" >
                   @csrf



                    <div class="form-group mb-1">
                        <label for="exampleInputText">{{__('admin.name')}}</label>
                        <input type="text" name="name" class="form-control "autofocus placeholder="{{__('admin.name')}}">
                    </div>
                    @error('name')
                    <div class="text-danger mb-3 ">{{ $message }}</div>
                    @enderror

                    <div class="form-group mb-1">
                        <label for="exampleInputText">{{__('admin.name_ar')}}</label>
                        <input type="text" name="name_ar" class="form-control "autofocus placeholder="{{__('admin.name_ar')}}">
                    </div>
                    @error('name_ar')
                    <div class="text-danger mb-3 ">{{ $message }}</div>
                    @enderror




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
