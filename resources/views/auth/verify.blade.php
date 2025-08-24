@extends('layouts.app')
@section('title','Verify Email')
@section('content')

<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-body">
            <h3 class="mb-3">Verify Your Email</h3>
            <form action="{{ route('verify.code') }}" method="POST">
                @csrf
                <input type="hidden" name="email" value="{{ session('email') }}">

                <div class="mb-3">
                    <label class="form-label">Verification Code</label>
                    <input type="text" name="code" class="form-control" required maxlength="6">
                </div>

                <button type="submit" class="btn btn-primary w-100">Verify</button>
            </form>
        </div>
    </div>
</div>

@endsection
