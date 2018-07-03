@extends('layouts.app') 
@section('content')
    <h1>建立測驗</h1>
@endsection
{{ bs()->openForm('post', '/exam') }}

    {{ bs()->text('username')->placeholder('請填入姓名') }}
    {{ bs()->select('enable', ['1' => '開啟', '0' => '關閉'], '1') }}
{{ bs()->closeForm() }}
