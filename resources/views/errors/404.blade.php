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
                        <!-- Begin each blog post -->
                        <div class="post type-post status-publish">
                            <div class="post_wrapper">
                                <div class="post_content_wrapper">
                                    <div class="post_img static fadeIn">
                                        <h5>Chúng tôi rất tiếc nhưng trang bạn đang tìm kiếm hiện không có thông tin.</h5>
                                    </div>
                                </div> <!-- end post content -->
                            </div>	<!--end post wrapper -->
                        </div>
                        <br class="clear"/>
                        <!-- End each blog post -->
                    </div> <!-- end sidebar content -->
                    <div class="clear"></div>

                </div> <!-- end  sidebar_content -->

            </div>
            <!-- End main content -->
        </div>
    </div> <!-- end page_content_wrapper-->
@stop
