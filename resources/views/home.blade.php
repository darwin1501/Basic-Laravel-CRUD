@extends('layout.app')

@section('content')
    <div class="flex justify-center">
            @include('forms.user_form')
    </div>
    <div class="flex justify-center mt-4">
        @include('tables.order_table')
    </div>
@endsection

