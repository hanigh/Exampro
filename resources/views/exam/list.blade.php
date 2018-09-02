@extends('layout')

@section('content')

    <div class="section ">
        <div class="row">
                 @foreach($exams as $exam)
                     <div class="col s2 l2">
                        <div class="card ExamItemUser ">
                        <div class="card-image waves-effect waves-block waves-light">


                            <a href="{{route('user.exam.open',$exam->id)}}"><img src="{{url('theme')}}/images/img2.jpg" alt="product-img">
                            </a>
                        </div>

                        <div class="card-content">

                            <div class="row">
                                <div class="col s12">
                                    <p class="card-title title_exam  grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">Apple MacBook"</a>
                                    </p>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <a href="{{route('user.exam.open',$exam->id)}}"  class="openExam">Start</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><i class="mdi-navigation-close right"></i> Apple MacBook Pro A1278 13"</span>
                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
                        </div>
                    </div>
                     </div>
                 @endforeach
        </div>

    </div>




@endsection

@section('script')

    <script>


        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name=_token]').attr('content')
                }
            });

            /*
            * Masonry container for eCommerce page
            */
            var $containerProducts = $("#products");
            $containerProducts.imagesLoaded(function() {
                $containerProducts.masonry({
                    itemSelector: ".product",
                    columnWidth: ".product-sizer",
                });
            });


        })


    </script>

@endsection
