@extends('layouts.app') 
@section('content')
    <h1>{{ __('Exam Create') }}</h1>

    @can('建立測驗')
        {{ bs()->openForm('post', '/exam') }}

            {{ bs()->formGroup()
                ->label('測驗標題',false,'text-sm-right')
                ->control(bs()->text('title')->placeholder('請填入測驗標題'))
                ->showAsRow()
                }}

            {{ bs()->formGroup()
                ->label('是否啟用？',false,'text-sm-right')
                ->control(bs()->radioGroup('enable', [1 => '啟用', 0 => '關閉'])->selectedOption(1)->inline())
                ->showAsRow()
                }}
            {{ bs()->hidden('user_id', Auth::id()) }}
            {{ bs()->submit('儲存') }}
        {{ bs()->closeForm() }}

        {{-- 另一種錯誤訊息 --}}
        {{-- @if (count($errors) > 0)
            @component('bs::alert', ['type' => 'danger'])
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endcomponent
        @endif --}}

    @else
        @component('bs::alert', ['type' => 'danger'])
            @slot('heading')
                沒有建立測驗的權限
            @endslot

            <p>請先登入，或確定身份。</p>
        @endcomponent
    @endcan
@stop