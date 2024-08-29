@extends('admin.layouts.admin_master')

@section('title', 'Sửa sách')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <p class="alert alert-danger text-center">Đã có lỗi xảy ra, vui lòng kiểm tra lại dữ liệu
                                    nhập vào</p>
                            @endif

                            @if (session('msg'))
                                <div class="alert alert-{{ session('msg_type') }} text-center ">{{ session('msg') }}</div>
                            @endif

                            <form class="" method="POST" action="{{ route('admin.books.update', $book) }}" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <div class="form-group">
                                    <label for="name">Tên sách</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$book->name}}"
                                        placeholder="Nhập tên sách">
                                    @error('name')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" name="slug" id="slug" value="{{$book->slug}}"
                                        placeholder="Slug">
                                    @error('slug')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cover_image">Ảnh bìa</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="cover_image" name="cover_image">
                                            <label class="custom-file-label" for="cover_image">Chọn ảnh</label>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <img src="{{ Storage::url($book->cover_image) }}" alt="" width="100px">
                                    </div>
                                    @error('cover_image')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Mô tả</label>
                                    <textarea name="description" class="form-control" id="description" cols="30" rows="5">{{ $book->description }}</textarea>
                                    @error('description')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">Giá</label>
                                    <input type="text" class="form-control" name="price" id="price" value="{{$book->price}}"
                                        placeholder="Nhập giá">
                                    @error('price')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price_sale">Giá khuyến mãi</label>
                                    <input type="text" class="form-control" name="price_sale" id="price_sale" value="{{$book->price_sale}}"
                                        placeholder="Nhập giá khuyến mãi">
                                    @error('price_sale')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="author_id">Tác giả</label>
                                    <select class="form-control" name="author_id" id="author_id">
                                        <option value="">Chọn tác giả</option>
                                        @foreach ($authors as $author)
                                            <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : false }}>{{ $author->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('author_id')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="publisher_id">Nhà xuất bản</label>
                                    <select class="form-control" name="publisher_id" id="publisher_id">
                                        <option value="">Chọn nhà xuất bản</option>
                                        @foreach ($publishers as $publisher)
                                            <option value="{{ $publisher->id }}" {{ $book->publisher_id == $publisher->id ? 'selected' : false }}>{{ $publisher->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('publisher_id')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Danh mục</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="">Chọn danh mục</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : false }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="stock">Số lượng</label>
                                    <input type="text" class="form-control" name="stock" id="stock" value="{{$book->stock}}"
                                        placeholder="Nhập số lượng">
                                    @error('stock')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-warning">Cập nhật</button>
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
