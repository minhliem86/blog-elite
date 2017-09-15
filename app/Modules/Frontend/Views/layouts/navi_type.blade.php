<?php
    $mobile_detect = new Mobile_Detect;
?>
@if($mobile_detect->isMobile())
    <div class="search-section">
        <h6 class="widgettitle search">Thông tin học viên</h6>
        {!!Form::open(['route' => 'f.search', 'class' => 'form-search', 'method' => 'GET'])!!}
            <input type="text" name="keyword" class="input-search" placeholder="Nhập tên học viên...." />
            <button class="btn-search" type="submit">Tìm thông tin</button>
        {!!Form::close()!!}
    </div> <!-- end search section -->
    @if(Session::has('message'))
    <p class="mes-search">{{Session::get('message')}}</p>
    @endif
@endif
@if($mobile_detect->isMobile() && !$type_sidebar->isEmpty())

<div class="wrap-navi-type">
    <ul class="navi-type">
        @foreach($type_sidebar as $item_type)
        <li><a href="#">{{$item_type->name}}</a>
            @if(!$item_type->students()->get()->isEmpty())
            <ul class="sub-navi-type">
                @foreach($item_type->students()->get() as $item_student)
                <li><a href="{!!route('f.detail', $item_student->slug)!!}">{{$item_student->student_name}}</a></li>
                @endforeach
            </ul>
            @endif
        </li>
        @endforeach
    </ul>
</div>
@endif
