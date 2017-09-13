@extends('Frontend::layouts.default')
@section('content')
    <div id="page_content_wrapper" class="notransparent">
        <div class="inner">
            <!-- Begin main content -->
            <div class="inner_wrapper">
                <div class="full_width nopadding">
                    <a href="#animatedModal" class="test" id="demo2" >
                        Modal
                      </a>
                    <div id="animatedModal">
                        <!--THIS IS IMPORTANT! to close the modal, the class name has to match the name given on the ID  class="close-animatedModal" -->
                        <div class="close-animatedModal close-modal-btn"  >
                            CLOSE MODAL
                        </div>

                        <div class="modal-content">
                                  <!--Your modal content goes here-->
                                  test
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#demo2').animatedModal({
            })
        })
    </script>
@endsection
