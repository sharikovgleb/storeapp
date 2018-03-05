@csrf
<label for="name">Name</label>
<input id="name" class="form-control" type="text" name="name" value="{{$user->name or ""}}" required>
<label for="name">Email</label>
<input id="email" class="form-control" type="text" name="email" value="{{$user->email or ""}}" required>
<label for="is_active">Is Active</label>
<select id="is_active" class="form-control" type="text" name="is_active" required>
    <option value="1">Active</option>
    <option value="0" @if($user->is_active == 0) selected="" @endif>Not active</option>
<select/>


{{--<label for="name">Name</label>--}}
{{--<input id="name "type="text" name="name" value="{{$user->name or ""}}">--}}
{{--<input type="submit" value="Submit">--}}