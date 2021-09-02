@extends('admin.layouts.master')
@section('title'){{'Edit Posts'}}@endsection
@section('content')
    {{--wrapper--}}
    <div class="wrapper">
    @include('admin.layouts.sideNav')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Sửa bài đăng</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Sửa bài đăng</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-warning">
                    {{ session()->get('error') }}
                </div>
        @endif
        <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card card-primary">
                            <div class="card-header">

                                <h3 class="card-title">General</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <form action="{{route('post.update', $posts->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputTitle">Tên bài đăng</label>
                                        <input type="text" id="inputTitle" class="form-control" name="inputTitle"
                                        value="{{$posts->title}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Tên người đăng</label>
                                        <input type="text" id="inputName" class="form-control" name="inputName"
                                        value="{{$posts->name}}">
                                    </div>
                                    <div class="form-group position-relative text-center">
                                        <img class="imagesForm" width="100" height="100" src="
                                            {{asset('/uploads/').'/'.$posts->image}}"
                                        />
                                        <label class="formLabel" for="file"><i class="fas fa-pen"></i><input
                                                style="display: none" type="file" id="file" class="imagesAvatar"
                                                name="inputAvatar"></label>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputContent">Nội dung</label>
                                        <input type="text" id="inputContent" class="form-control" name="inputContent"
                                               value="{{$posts->content}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSummary">Tóm tắt</label>
                                        <input type="text" id="inputSummary" class="form-control" name="inputSummary"
                                               value="{{$posts->summary}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputCategories">Danh mục sản phẩm</label>
                                        <select name="inputCategories" id="inputCategories" class="form-control">
                                            {!! $html !!}
                                            <option value="{{$posts->category->name}}"></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <button class="btn btn-success float-right mb-2  mx-auto">Sửa</button>
                                </div>

                                <!-- /.card-body -->
                            </form>

                        </div>
                        <!-- /.card -->
                    </div>

                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    {{--/wrapper--}}
@endsection
@section('footer_script')
    <script>
        function read(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.imagesForm').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".imagesAvatar").change(function() {
            read(this);
        });
    </script>
@endsection
