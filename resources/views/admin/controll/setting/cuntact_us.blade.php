<div class="tile">
    <form action="{{route('setting.update')}}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">General Settings</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="site_name">Phone</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter site name"
                    id="phone"
                    name="phone"
                    value="{{ Setting::get('phone') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="site_title">Address</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter site title"
                    id="address"
                    name="address"
                    value="{{ Setting::get('address') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="default_email_address">Default Email Address</label>
                <input
                    class="form-control"
                    type="email"
                    placeholder="Enter store default email address"
                    id="default_email_address"
                    name="default_email_address"
                    value="{{Setting::get('default_email_address')}}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="currency_code">Contact us desc</label>
                <textarea
                    class="form-control"
                    type="text"
                    placeholder="Enter contact us desc"
                    id="contact_us_desc"
                    name="contact_us_desc"
                >
                    {{Setting::get('contact_us_desc')}}
                </textarea>
            </div>
        </div>
        <div class="tile-footer">
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Settings</button>
                </div>
            </div>
        </div>
    </form>
</div>






