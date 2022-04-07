@extends('layouts.admin.layout')

@section('content')
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="my-4">
        @csrf
        @method('PUT')
        @include('admin.categories._form',
        [
            'button_label' => 'Update'
        ])
    </form>
@endsection
