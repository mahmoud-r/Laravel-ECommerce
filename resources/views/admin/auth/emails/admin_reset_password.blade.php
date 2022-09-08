@component('mail::message')
# Introduction
welcome {{$data['data']->name}}


@component('mail::button', ['url' => URL('admin/reset/password/'.$data['token'])])
Reset Password
@endcomponent
or <br>
copy this link
<a href="{{URL('admin/reset/password/'.$data['token'])}}">{{URL('admin/reset/password/'.$data['token'])}}</a> <br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
