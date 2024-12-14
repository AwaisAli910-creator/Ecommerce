@extends('frontend.body.main')

@section('main-content')

<!--------------- login-section --------------->

<form method="POST" action="{{ route('login') }}">
    @csrf
    <section class="login footer-padding">
        <div class="container">
            <div class="login-section">
                <div class="review-form">
                    <h5 class="comment-title">Log In</h5>
                    <div class="review-inner-form">
                        <div class="review-form-name">
                            <label for="email" class="form-label">Email </label>
                            <input type="email" value="{{ old('email') }}" id="email" name="email" class="form-control" placeholder="Email">
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="review-form-name">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        </div>
                        <div class="review-form-name checkbox">
                            <div class="checkbox-item">
                                <input type="checkbox" id="remember">
                                <label for="remember" class="address">Remember Me</label>
                            </div>
                            <div class="forget-pass">
                                <p><a href="{{ route('password.request') }}">Forgot password?</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="login-btn text-center">
                        <button type="submit" class="shop-btn">Log In</button>
                        <span class="shop-account">Don't have an account? <a href="create-account.html">Sign Up Free</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

<!--------------- login-section-end --------------->
@endsection
