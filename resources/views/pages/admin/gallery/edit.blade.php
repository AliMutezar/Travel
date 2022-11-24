@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Paket Travel {{ $item->title }}</h1>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('gallery.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @error ('title') is-invalid @enderror" name="title" placeholder="Title" value="{{ $item->title }}">

                        @error('title')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control @error ('location') is-invalid @enderror" name="location" placeholder="location" value="{{ $item->location }}">

                        @error('location')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea class="form-control @error ('about') is-invalid @enderror" name="about" rows="3">{{ $item->about }}</textarea>

                        @error('about')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="featured_event">Featured Event</label>
                        <input type="text" class="form-control @error ('featured_event') is-invalid @enderror" name="featured_event" placeholder="Featured Event" value="{{ $item->featured_event }}">

                        @error('featured_event')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="language">Language</label>
                        <input type="text" class="form-control @error ('language') is-invalid @enderror" name="language" placeholder="Language" value="{{ $item->language }}">

                        @error('language')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="foods">Foods</label>
                        <input type="text" class="form-control @error ('foods') is-invalid @enderror" name="foods" placeholder="Foods" value="{{ $item->foods }}">

                        @error('foods')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="departure_date">Depature Date</label>
                        <input type="date" class="form-control @error ('departure_date') is-invalid @enderror" name="departure_date" placeholder="Departure Date" value="{{ $item->departure_date }}">

                        @error('departure_date')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="duration">Duration</label>
                        <input type="text" class="form-control @error ('duration') is-invalid @enderror" name="duration" placeholder="Duration" value="{{ $item->duration }}">

                        @error('duration')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" class="form-control @error ('type') is-invalid @enderror" name="type" placeholder="Type" value="{{ $item->type }}">

                        @error('type')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control @error ('price') is-invalid @enderror" name="price" placeholder="Price" value="{{ $item->price }}">

                        @error('price')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-primary btn-block" type="submit">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>



    </div>
    <!-- /.container-fluid -->
@endsection