  @extends('layouts.admin.layout')


  @section('content')
    

      <button class="btn btn-primary "><a class="link-light" href="{{ route('admin.categories.create') }}">Create
              category</a></button>

      <form action="{{ route('admin.categories.index') }}" class="my-4 d-flex" method="GET" class="d-flex">
          @csrf
          <input type="text" name='name' class="form-control me-3" placeholder="search by name">
          <select name="parent_id" class="form-control me-2">
              <option value="">All Categories</option>
              @foreach ($parents as $parent)
                  <option value="{{ $parent->id }}">{{ $parent->name }}</option>
              @endforeach
          </select>
          <button type="submit" class="btn btn-secondary">Filter</button>

      </form>
      <table class="table">
          <thead>
              <tr>
                  <th scope="col">ID</th>
                  <th>Name</th>
                  <th>Parent_ID</th>
                  <th>Created_at</th>
                  <th>status</th>
              </tr>

          </thead>
          <tbody>
              @foreach ($categories as $category)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td><a href="{{ route('admin.categories.edit', $category->id) }}">{{ $category->name }}</a></td>
                      <td>{{ $category->parent_name }}</td>
                      <td>{{ $category->created_at }}</td>
                      <td>{{ $category->status }}</td>
                      <td>
                          <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                              @csrf
                              @method('delete')
                              <button class="btn btn-danger btn-sm">Delete</button>
                          </form>
                      <td>
                  </tr>
              @endforeach
          </tbody>
      </table>
      </div>
  @endsection
