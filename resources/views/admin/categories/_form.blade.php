<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" class="form-control mb-3" value="{{$category->name}}">
</div>

<div class="form-group">
    <label for="parent_id">Name:</label>
    <select name="parent_id" class="form-control mb-3">
        <option value="">No Parent</option>
        @foreach ($parents as $parent)
            <option value="{{$parent->id}}" @if ($parent->id==$category->parent_id)
                selected
            @endif>{{$parent->name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="description">Description:</label>
    <textarea name="description"  class="form-control mb-3" cols="30" rows="10" placeholder="Add something here...">{{$category->description}}</textarea>
</div>

<div class="form-group">
    <label for="">Stetus:</label>
    <div>
        <label>
            <input type="radio" class="form-check-input mb-3" name="status" value="active" @if ($category->status == 'active')
            checked
            @endif>
            Active
        </label>
        <label>
            <input type="radio" value="Inactive" class="form-check-input mb-3" name="status" value="inactive" @if ($category->status == 'inactive')
            checked
            @endif>
            Inactive
        </label>
    </div>
</div>
<button type="submit" class="btn btn-primary">{{$button_label}}</button>
