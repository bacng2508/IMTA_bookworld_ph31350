@extends('client.layouts.client_master')

@push('styles')
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
                    <!-- Login Form s-->
                    <form action="#">
                        <div class="login-form">
                            <h4 class="login-title">New Customer</h4>
                            <p><span class="font-weight-bold">I am a new customer</span></p>
                            <div class="row">
                                <div class="col-md-12 col-12 mb--15">
                                    <label for="email">Full Name</label>
                                    <input class="mb-0 form-control" type="text" id="name"
                                        placeholder="Enter your full name">
                                </div>
                                <div class="col-12 mb--20">
                                    <label for="email">Email</label>
                                    <input class="mb-0 form-control" type="email" id="email"
                                        placeholder="Enter Your Email Address Here..">
                                </div>
                                <div class="col-lg-6 mb--20">
                                    <label for="password">Password</label>
                                    <input class="mb-0 form-control" type="password" id="password"
                                        placeholder="Enter your password">
                                </div>
                                <div class="col-lg-6 mb--20">
                                    <label for="password">Repeat Password</label>
                                    <input class="mb-0 form-control" type="password" id="repeat-password"
                                        placeholder="Repeat your password">
                                </div>
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-outlined">Register</a>
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
