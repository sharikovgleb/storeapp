@foreach ($categories as $category_list)
    <option value="{{@$category_list->id or ""}}"
            @isset($item->id)
            @if ($item->category_id == $category_list->id)
            selected=""
            @endif
            @endisset
    >
        {{@$category_list->title}}
    </option>

@endforeach