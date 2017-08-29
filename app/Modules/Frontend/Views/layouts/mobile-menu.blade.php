<!-- Begin mobile menu -->
<div class="mobile_menu_wrapper">
    <a id="close_mobile_menu" href="#"><i class="fa fa-times-circle"></i></a>
    @if(!$type_sidebar->isEmpty())
    <div class="menu-main-menu-container">
        <ul id="mobile_main_menu" class="mobile_main_nav">
            @foreach($type_sidebar as $item_type)
            <li class="menu-item"><a href="#">{{$item_type->name}}</a>
                @if(!$item_type->students()->get()->isEmpty())
                <ul class="sub-menu">
                    @foreach($item_type->students()->get(['student_name','id']) as $item_student)
                    <li  class="menu-item "><a href="">{{$item_student->student_name}}</a></li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
<!-- End mobile menu -->
