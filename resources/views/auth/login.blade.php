@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-start h-full mt-12">
    <div class="flex flex-col w-400p bg-white text-center mt-4 border-green-500 border-t-4 pt-4 rounded-lg shadow-md">
        <h1 class="text-green-500 text-xl uppercase mb-4">Login</h1>
        <form action="#" method="POST" @submit.prevent="login">
            @csrf
            <!--Email Field-->
            <div class="mb-4">
                <div class="flex w-4/5 justify-between accessible-input-container mx-auto py-1 mb-1">
                    <input v-model="email" class="w-full appearance-none bg-transparent border-none text-gray-900 p-1 accessible-input" autocomplete="username email" type="email" placeholder="janedoe@email.com" name="email" id="email" aria-label="Email">
                </div>
                <label class="block w-4/5 mx-auto text-gray-900 text-left text-sm font-bold" for="email">
                    @if ($errors->has('email'))
                    <span class="text-red-300 text-xs italic ml-2">{{ $errors->first('email') }}</span>
                    @else
                    <span v-else class="text-sm text-gray-900">{{ __('Email') }}</span>
                    @endif
                </label>
            </div>

            <!--Password Field-->
            <div class="mb-4">
                <div class="flex w-4/5 justify-between accessible-input-container mx-auto py-1 mb-1">
                    <input v-model="password" class="w-full appearance-none bg-transparent border-none text-gray-900 p-1 accessible-input" autocomplete="current-password" type="password" placeholder="**********************" name="password" id="password" aria-label="Password">
                    <span class="icon-lock-closed text-green-500"></span>
                </div>
                <label class="block w-4/5 mx-auto text-gray-900 text-left text-sm font-bold" for="password">
                    @if ($errors->has('password'))
                    <span class="text-red-300 text-xs italic ml-2">{{ $errors->first('password') }}</span>
                    @else
                    <span v-else class="text-sm text-gray-900">{{ __('Password') }}</span>
                    @endif
                </label>
            </div>

            <!--Remember Me-->
            <div class="w-4/5 mx-auto mb-4 text-left mt-4">
                <label class="block text-gray-500 font-bold">
                    <input class="mr-2 text-green-500" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="text-sm" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </label>
            </div>

            <!--Actions-->
            <div class="flex justify-between items-center mt-8 mb-8 w-4/5 mx-auto">
                <button class="flex-none rounded-full bg-green-500 text-white font-bold py-2 px-4 border-2 border-transparent hover:bg-white hover:text-green-500 hover:border-green-500 mr-8" type="submit">
                    Sign In
                </button>
                @if (Route::has('password.request'))
                <a class="text-sm text-gray-500 font-light no-underline" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </form>
        <p class="text-center text-gray-500 text-xs mb-4">
            {{ date('Y') }} MySite All rights reserved.
        </p>
    </div>
</div>
@endsection