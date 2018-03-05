{{csrf_field()}}
<label for="title">Title</label>
<label for="title1">Title</label>
<input id="title "type="text" name="title" value="{{$category->title or ""}}" required>
<input type="submit" value="Submit">