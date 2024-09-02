@extends('client.layouts.client_master')

@push('styles')
<style>
    .bg__main-color {
        background-color: #62ab00;
    }
</style>
@endpush

@section('page-content')
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Login</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!--=============================================
    =            Login Register page content         =
    =============================================-->
    <main class="page-section inner-page-sec-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-6 mx-auto">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title text-center">Đăng ký</h4>
                            @if (session('msg'))
                                <div class="alert alert-danger rounded-0 text-center py-2" role="alert">
                                    {{ session('msg') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12 col-12 mb--15">
                                    <label for="email" class="fw-bold">Tên</label>
                                    <input class="mb-0 form-control" type="text" name="name" id="name" value="{{ old('name') }}"
                                        placeholder="Nhập name">
                                    @error('name')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-12 mb--15">
                                    <label for="email" class="fw-bold">Email</label>
                                    <input class="mb-0 form-control" type="text" name="email" id="email" value="{{ old('email') }}"
                                        placeholder="Nhập email">
                                    @error('email')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb--20">
                                    <label for="password" class="fw-bold">Mật khẩu</label>
                                    <input class="mb-0 form-control" type="password" name="password" id="password"
                                        placeholder="Nhập mật khẩu">
                                    @error('password')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb--20">
                                    <label for="password_confirmation" class="fw-bold">Nhập lại mật khẩu</label>
                                    <input class="mb-0 form-control" type="password" name="password_confirmation" id="password_confirmation"
                                        placeholder="Nhập lại mật khẩu">
                                    @error('password_confirmation')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-outlined w-100 bg__main-color text-white">Đăng ký</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
@endpush
