@extends('layouts.success')
@section('title', 'Checkout Success')


@section('content')
    <main>
        <div class="section-success d-flex align-items-center">
            <div class="col text-center">
                <img src="{{ url('frontend/icons/cancel.png') }}" alt="" class="icon-success">
                <h1>Oops! There is something wrong</h1>
                <p>
                    Your transaction is failed
                    <br>
                    Please contact our representative if this problem occurs
                </p>
                <a href="/" class="btn btn-home-page mt-3 px-5">
                    Home Page
                </a>
            </div>
        </div>
    </main>
@endsection