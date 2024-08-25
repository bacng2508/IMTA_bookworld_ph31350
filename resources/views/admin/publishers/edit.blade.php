@extends('admin.layouts.admin_master')

@section('title', 'Sửa nhà xuất bản')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if (session()->has('msg'))
                                <p class="alert alert-success text-center py-2">Cập nhật nhà xuất bản thành công</p>
                            @endif

                            @if ($errors->any())
                                <p class="alert alert-danger text-center">Đã có lỗi xảy ra, vui lòng kiểm tra lại dữ liệu nhập vào</p>
                            @endif

                            <form method="POST" action="{{ route('admin.publishers.update', $publisher) }}">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="name">Tên nhà xuất bản</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $publisher->name }}" placeholder="Nhập tên nhà xuất bản">
                                    @error('name')
                                        <div class="form-text text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" name="slug" id="slug" value="{{ $publisher->slug }}" placeholder="Slug">
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </section>
@endsection

@push('jsHandle')
    <script>
        const title = document.querySelector('#name');
        const slug = document.querySelector('#slug')
        title.addEventListener('keyup', (e) => {
            const titleValue = e.target.value;
            slug.value = getSlug(titleValue);
        })

        slug.addEventListener('change', () => {
            if (slug.value === "") {
                const title = document.querySelector("#name");
                const titleValue = title.value;
                slug.value = getSlug(titleValue);
            }
        });
    </script>
@endpush
