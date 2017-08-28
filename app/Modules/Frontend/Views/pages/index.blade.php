@extends('Frontend::layouts.default')

@section('content')
    <div id="page_content_wrapper" class="notransparent">
        <div class="inner">
            <!-- Begin main content -->
            <div class="inner_wrapper">
                <div class="full_width nopadding">
                    <div class="sidebar_wrapper left_sidebar hidden-xs">
                        <div class="sidebar">
                            <div class="content">
                                @if(!$type->isEmpty())
                                <ul class="sidebar_widget">

                                    @foreach($type as $item_type)
                                    @if(!$item_type->students()->get()->isEmpty())
                                    <li class="widget widget_PET">

                                        <h2 class="widgettitle">{!!$item_type->name!!}</h2>
                                        @if(!$item_type->students()->get()->isEmpty())
                                        <ul>
                                            @foreach($item_type->students()->get() as $item_st)
                                            <li><a href="#">{!!$item_st->student_name!!}</a></li>
                                            @endforeach
                                        </ul>
                                        @endif
                                        <!-- <p class="seemore">Xem thêm</p> -->
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
                    <div class="sidebar_content left_sidebar">
                        @if(!$student->isEmpty())
                            @foreach($student as $item_student)
                        <!-- Begin each blog post -->
                        <div class="post type-post status-publish">
                            <div class="post_wrapper">

                                <div class="post_content_wrapper">
                                    <div class="post_img static fadeIn">
                                <a href="#">
                                    <img src="{!!asset('public/uploads'.$item_student->student_img)!!}" alt="{{$item_student->student_name}}" class="img-responsive">
                              </a>
                            </div>
                                    <div class="post_header">
                                        <h5><a href="#" title="{{$item_student->student_name}}">{{$item_student->student_name}}</a></h5>

                                        <div class="post_detail">
                                            {{$item_student->center}} - {{$item_student->types->name}}
                                        </div>

                                        <p>{!!$item_student->student_content!!}</p>
                                    </div>	<!-- end post header -->

                                </div> <!-- end post content -->

                            </div>	<!--end post wrapper -->
                        </div>
                        <br class="clear"/>
                        <!-- End each blog post -->
                            @endforeach
                        @endif
                    <div class="wrap-pagination">
                        @include ('Frontend::custom-pagination.paginate',['paginator' =>$student])
                        {{-- <div class="pagination custom clearfix">
                        	<a href="#">First</a>
                        	<a href="#">1</a>
                        	<a href="#">2</a>
                        	<a href="#">3</a>
                        	<a href="#">Last</a>
                        </div> --}}

                    </div>
                    </div> <!-- end sidebar content -->
                    <div class="clear"></div>

                </div> <!-- end  sidebar_content -->

            </div>
            <!-- End main content -->
        </div>
    </div> <!-- end page_content_wrapper-->
@stop
