@extends('layouts.master')
@section('content')
    <div class="container bg-slate-50 space-y-7 p-5 rounded-md shadow-md">
        <h2 class="font-semi-bold text-gray-800">Hello!</h2>
        <p class="text-gray-600 leading-4">Please click the link to verify your account</p>
        <div class="flex flex-row justify-center">
            <a href="{{ route('user.verify', $token) }}" class="bg-gray text-white font-bold px-5 py-2 rounded-md">
                Verify Account
            </a>
        </div>
        <p class="text-sm text-gray-600">
            If you did not create an account, no further action is required.
        </p>
    </div>
@endsection