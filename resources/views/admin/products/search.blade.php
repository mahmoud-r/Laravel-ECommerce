<div id="accordion">
    <div class="card card-primary">
        <div class="card-header">
            <h4 class="card-title w-100">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                    Enhanced Search
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="collapse " data-parent="#accordion">
            <div class="card-body">
                <section class="content">
                    <div class="container-fluid">
                        <form action="{{route('admin.product.search')}}" method="get">
                            <div class="row">
                                <div class="col-md-10 offset-md-1">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Category:</label>
                                                <select class="select2" name="Categorie_id" style="width: 100%;">
                                                    <option value="">All category</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id}}">{{ $category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Sub Category:</label>
                                                <select class="select2" name="sub_Categorie_id" style="width: 100%;">
                                                    <option value="">All Sub Category</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Brand:</label>
                                                <select class="select2" name="brand_id" style="width: 100%;">
                                                    <option value="">All Brands</option>
                                                    @foreach($brands as $brand)
                                                        <option value="{{ $brand->id}}">{{ $brand->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-lg">
                                            <input type="search" name="search" class="form-control form-control-lg" placeholder="Type your keywords here" >
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-lg btn-default">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>

            </div>
        </div>
    </div>
</div>

