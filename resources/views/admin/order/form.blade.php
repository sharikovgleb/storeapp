<div class="form-group">
    {{csrf_field()}}
    <label for="title">Title</label>
    <input required id="title"type="text" class="form-control" name="title" value="{{$item->title or ""}}">
    <label for="description">Description</label>
    <input required id="description" type="text" class="form-control" name="description" value="{{$item->description or ""}}">
    <label for="price">Price</label>
    <input required id="price" type="text" class="form-control" name="price" value="{{$item->price or ""}}">
    <label for="category">Category</label>

    <select id="category"  class="form-control" name="category_id">
        <option value="null">Без категории</option>
        @include('admin.partials.category_select',['categories' => $categories])
    </select>
</div>
<input type="submit" value="Submit" class="btn btn-primary">