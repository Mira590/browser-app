@include('partial.link')

<body class="">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-cover">
            <div class="">


                <div class="row g-0">
                    <div
                        class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">
                        <div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0">
                            <div class="card-body">
                                <img src="{{ asset('assets/images/login-images/login-cover.svg') }}"
                                    class="img-fluid auth-img-cover-login" width="650" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
                        <div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
                            <div class="card-body p-sm-5">
                                <div class="">
                                    <div class="mb-3 text-center">
                                        <img src="assets/images/logo-icon.png" width="60" alt="">
                                    </div>
                                    <div class="text-center mb-4">
                                        <h5 class="">Browser Portal</h5>
                                        <p class="mb-0">Please log in to your account</p>
                                    </div>
                                    <div class="form-body">

                                        @if (session('success'))
                                            <div class="alert alert-success alert-dismissible fade show mb-3"
                                                role="alert">
                                                {{ session('success') }}
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="alert"></button>
                                            </div>
                                        @endif
                                        <form class="row g-3" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="inputEmailAddress"
                                                    required name="username" :value="{{ old('username') }}"
                                                    placeholder="Type a user name">
                                                <x-input-error :messages="$errors->get('username')" class="mt-2 text-danger" />
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password"
                                                        class="form-control border-end-0"name="password" required
                                                        id="inputChoosePassword" placeholder="Enter Password"> <a
                                                        href="javascript:;" class="input-group-text bg-transparent"><i
                                                            class="bx bx-hide"></i></a>
                                                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked">
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckChecked">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-end"> 
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                                </div>
                                            </div>
                                            <div class="col-12">

                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    @include('partial.js');
</body>

</html>
