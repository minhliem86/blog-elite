<?php
    $mobile_detect = new Mobile_Detect;
?>
<div class="sidebar_wrapper left_sidebar hidden-xs">
    <div class="sidebar">
        <div class="content">
            @if(!$type_sidebar->isEmpty())
            <ul class="sidebar_widget">
                @if(!$mobile_detect->isMobile())
                <li class="widget widget_PET">
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
                </li>
                @endif
                @foreach($type_sidebar as $item_type)
                @if(!$item_type->students()->get()->isEmpty())
                <li class="widget widget_PET">

                    <h2 class="widgettitle">{!!$item_type->name!!}</h2>
                    @if(!$item_type->students()->get()->isEmpty())
                    <ul class="nav_side">
                        @foreach($item_type->students()->where('status',1)->OrderBy('id', 'ASC')->take(10)->get() as $item_st)
                        <li><a href="{!!route('f.detail', $item_st->slug)!!}">{!!$item_st->student_name!!}</a></li>
                        @endforeach
                    </ul>
                    @endif
                    <p class="seemore" data-type="{{$item_type->id}}">{{trans('content.readmore')}}</p>
                </li>
                @endif
                @endforeach

            </ul>
            @endif

        </div>

    </div>
    <br class="clear"/>

    <div class="sidebar_bottom"></div>
</div> <!-- end sidebar wrapper -->
