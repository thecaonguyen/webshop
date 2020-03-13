@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Thêm mới danh mục <a href="{{route('admin.category.index')}}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin danh mục</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label>Danh mục cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">-- chọn --</option>
                                    @foreach($data as $item)
                                        <option value="{{ $item -> id }}">{{ $item -> name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File</label>
                                <input type="file" id="image" name="image">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="1" name="is_active"> Trạng thái
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Vị trí</label>
                                <input type="text" class="form-control" id="position" name="position" placeholder="Nhập tên vị trí" value="0">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Tạo</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection