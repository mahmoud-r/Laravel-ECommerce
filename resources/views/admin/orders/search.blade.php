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
                        <form action="{{route('admin.order.search')}}" method="get">
                            <div class="row">
                                <div class="col-md-10 offset-md-1">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>status:</label>
                                                <select class="select2" name="status" style="width: 100%;">
                                                    <option value="">All status</option>
                                                    @foreach($status as $statue)
                                                        <option value="{{ $statue->id}}">{{ $statue->status}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">

                                                  <label for="#reservation">Date:</label>
                                                <input type="text" class="form-control float-right" name="date" disabled id="reservation">
                                                <input type="checkbox"   id="all_time" name="all_time" >

                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>user phone:</label>
                                                <input type="search" name="phone" class="form-control form-control-md" placeholder="Type phone here" >

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-lg">
                                            <input type="search" name="order_number" class="form-control form-control-lg" placeholder="Type Order Number here" >
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

