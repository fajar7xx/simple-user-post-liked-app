@extends('layouts.app')

@section('title', 'Register Account')

@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            <h3 class="mb-4 flex justify-center">Register Your Account</h3>
            <form action="{{route('register')}}" method="post" autocomplete="off">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" placeholder="Your Name" value="{{old('name')}}">
                    @error('name')
                        <div class="text-red-500 text-sm mt-2">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror" placeholder="Username" value="{{old('username')}}">
                    @error('username')
                    <div class="text-red-500 text-sm mt-2">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" placeholder="Email" value="{{old('email')}}">
                    @error('email')
                    <div class="text-red-500 text-sm mt-2">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" placeholder="Choose a password" value="">
                    @error('password')
                    <div class="text-red-500 text-sm mt-2">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Password again</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-100 border-2 w-full p-4 rounded-lg" placeholder="Password Again" value="">
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection
