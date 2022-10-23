<!-- Modal -->
<div class="modal fade" id="slider" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{{__('admin.New Slider Image')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                   @csrf

                    <div class="form-group mb-1">
                        <label for="exampleInputText">{{__('admin.link')}}</label>
                        <input type="text" name="link" class="form-control " placeholder="{{__('admin.link')}}">
                    </div>
                    @error('link')
                    <div class="text-danger mb-3 ">{{ $message }}</div>
                    @enderror


                    <div class="form-group mb-1">
                        <label for="exampleInputPassword">{{__('admin.image')}}</label>
                        <input type="file" name="image" class="form-control " placeholder="{{__('admin.image')}}">

                    </div>
                    @error('image')
                    <div class="text-danger mb-3">{{ $message }}</div>
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
