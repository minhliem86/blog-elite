@if(!$type->students()->where('status',1)->get()->isEmpty())
@foreach($type->students()->where('status',1)->get() as $item_st)
<li><a href="{!!route('f.detail', $item_st->slug)!!}">{!!$item_st->student_name!!}</a></li>
@endforeach
@endif
