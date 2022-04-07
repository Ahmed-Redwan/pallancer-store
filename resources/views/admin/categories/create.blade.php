    @extends('layouts.admin.layout')

    @section('content')
    <form action="{{route('admin.categories.store')}}" method="POST" class="my-4">
            @csrf
            @include('admin.categories._form', [
            'button_label' => 'Add Category'
            ])
                   </form>
    @endsection

