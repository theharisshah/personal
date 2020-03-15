@extends('blog.master')
@section('title')
    Home
@endsection
@section('content')

<div class="article-list">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Latest Articles</h2>
            <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh
                erat, pellentesque ut laoreet vitae. </p>
        </div>
        <div class="row articles">
            <div class="col-sm-6 col-md-4 item"><a href="#"><img class="img-fluid" src="assets/img/desk.jpg"></a>
                <h3 class="name">Article Title</h3>
                <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent
                    aliquam in tellus eu gravida. Aliquam varius finibus est, interdum justo suscipit id.</p><a
                    class="action" href="#"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
            <div class="col-sm-6 col-md-4 item"><a href="#"><img class="img-fluid"
                        src="assets/img/building.jpg"></a>
                <h3 class="name">Article Title</h3>
                <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent
                    aliquam in tellus eu gravida. Aliquam varius finibus est, interdum justo suscipit id.</p><a
                    class="action" href="#"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
            <div class="col-sm-6 col-md-4 item"><a href="#"><img class="img-fluid" src="assets/img/loft.jpg"></a>
                <h3 class="name">Article Title</h3>
                <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent
                    aliquam in tellus eu gravida. Aliquam varius finibus est, interdum justo suscipit id.</p><a
                    class="action" href="#"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
    
@endsection