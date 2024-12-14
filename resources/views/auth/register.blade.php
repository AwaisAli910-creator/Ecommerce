@extends('frontend.body.main')

@section('main-content')

    <!--------------- login-section--------------->
    <form method="POST" action="{{ route('register') }}">
        @csrf
    
        <section class="login account footer-padding">
            <div class="container">
                <div class="login-section account-section">
                    <div class="review-form">
                        <h5 class="comment-title">Create Account</h5>
                        <div class="account-inner-form">
                            <div class="review-form-name">
                                <label for="fname" class="form-label">First Name*</label>
                                <input type="text" value="{{ old('fname') }}" id="fname" name="fname" class="form-control" placeholder="First Name">
                                <span class="text-danger">{{ $errors->first('fname') }}</span>
                            </div>
                            <div class="review-form-name">
                                <label for="lname" class="form-label">Last Name*</label>
                                <input type="text" value="{{ old('lname') }}" id="lname" name="lname" class="form-control" placeholder="Last Name">
                                <span class="text-danger">{{ $errors->first('lname') }}</span>
                            </div>
                        </div>
                        <div class="account-inner-form">
                            <div class="review-form-name">
                                <label for="email" class="form-label">Email*</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="user@gmail.com">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="review-form-name">
                                <label for="phone" class="form-label">Phone*</label>
                                <input type="tel" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="03272828276">
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            </div>
                        </div>
                        
                        <div class="review-form-name address-form">
                            <label for="address" class="form-label">Address*</label>
                            <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}" placeholder="Enter your Address">
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        </div>
                        
     
                        <div class="review-form-name checkbox">
                            <div class="checkbox-item">
                                <input type="checkbox" name="terms" id="terms" required>
                                <label for="terms">I agree to all terms and conditions in <span class="inner-text">ShopUs.</span></label>
                            </div>
                            <span class="text-danger">{{ $errors->first('terms') }}</span>
                        </div>
                        <div class="login-btn text-center">
                            <button type="submit" class="shop-btn">Create an Account</button>
                            <span class="shop-account">Already have an account? <a href="login.html">Log In</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    
        <!--------------- login-section-end --------------->
    @endsection
    <!--------------- footer-section--------------->
    
{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}







{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
