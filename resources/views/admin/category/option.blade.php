@forelse ($categories as $item)
<option value="{{$item->id}}"
    {{isset($category)&&$category->parent_id===$item->id ? 'selected' : ''}}>
    {{-- kiểm tra có category và điều kiện trên thì mới in ra  --}}
    @for ($i=0; $i < $level; $i++)
    --|
    @endfor
    {{$item->name }}
</option>
{{-- đệ quy --}}
@if($item->sub->count())
@include('admin.category.option',
['level'=> $level +1,'categories' => $item->sub ])
@endif
@empty
@endforelse
