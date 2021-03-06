@extends('Frontend::layouts.default')

@section('content')

    <div id="page_content_wrapper" class="notransparent">
        <div class="inner">
            <!-- Begin main content -->
            <div class="inner_wrapper">
                <div class="full_width nopadding">
                    @include('Frontend::layouts.sidebar_content')
                    <div class="sidebar_content left_sidebar">
                        @include('Frontend::layouts.navi_type')
                        @if(!$student->isEmpty())
                            @foreach($student as $item_student)
                        <!-- Begin each blog post -->
                        <div class="post type-post status-publish">
                            <div class="post_wrapper">

                                <div class="post_content_wrapper">
                                    <div class="post_img static fadeIn animated">
                                        <div class="left-img">
                                            <a href="{!!route('f.detail', $item_student->slug)!!}">
                                                <img src="{!!asset('public/uploads'.$item_student->student_img)!!}" alt="{{$item_student->student_name}}" class="img-responsive">
                                              </a>
                                        </div>
                                        <div class="right-img">
                                            <a data-remodal-target="modal" href="#" data-id={{$item_student->id}} class="trigger-btn" >
                                                <img src="{!!asset('public/uploads'.$item_student->img_cover)!!}" alt="{{$item_student->student_name}}" class="img-responsive">
                                              </a>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="post_header">
                                        <h5><a href="{!!route('f.detail', $item_student->slug)!!}" title="{{$item_student->student_name}}">{{$item_student->student_name}}</a></h5>

                                        <div class="post_detail">
                                            {{LaravelLocalization::getCurrentLocale() === 'vi' ? $item_student->center_vi : $item_student->center_en }} - {{$item_student->types->name}}
                                        </div>

                                        <div class="post_content">
                                            <p>{!!Str::words(LaravelLocalization::getCurrentLocale() === 'vi' ? $item_student->student_content_vi : $item_student->student_content_en, 40)!!}</p>
                                        </div>
                                        <div class="wrap-read">
                                            <a href="{!!route('f.detail', $item_student->slug)!!}" class="readmore">{{trans('content.readmore')}}</a>
                                        </div>

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
                    </div>
                    </div> <!-- end sidebar content -->
                    <div class="clear"></div>

                </div> <!-- end  sidebar_content -->

            </div>
            <!-- End main content -->
        </div>
</div> <!-- end page_content_wrapper-->
<div class="remodal" data-remodal-id="modal" data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
    <button data-remodal-action="close" class="remodal-close"></button>
    <div class="modal-content">

    </div>
</div>
@stop

@section('script')
    <script>
        $(document).ready(function(){
            $('.trigger-btn').click(function(){
                var id = $(this).data('id');
                $(document).on('opening', '.remodal', function(){
                    $.ajax({
                        url: '{{route("f.loadMagazine")}}',
                        type: 'POST',
                        data: { id: id,  _token: $('meta[name="csrf-token"]').attr('content')},
                        success: function(data){
                            $('.modal-content').html(data.rs);
                                $('#magazine-container').turn({
                                    // display:"single"
                                 })
                        }
                    })
                })
                $(document).on('closed', '.remodal', function(){
                    $('#magazine-container').turn("destroy")

                })
            })
        })

    </script>

@stop
