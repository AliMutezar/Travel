@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Gallery</h1>
        </div>


        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('gallery.update', $galleries->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    
                    <div class="form-group">
                        <label for="travel_packages_id">Paket Travel</label>
                        <select name="travel_packages_id" class="form-control @error ('travel_packages_id') is-invalid @enderror">
                            @foreach ($travel_packages as $travel_package)

                                @if (old('travel_packages_id', $galleries->travel_packages_id) == $travel_package->id)
                                    <option value="{{ $travel_package->id }}" selected> {{ $travel_package->title }} </option>
                                @else
                                    <option value="{{ $travel_package->id }}"> {{ $travel_package->title }} </option>
                                @endif
                            @endforeach
                        </select>

                        @error('travel_packages_id')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image" class="form-label">Image</label>
                        <input type="hidden" name="oldImage" value="{{ $galleries->image }}">

                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">

                        @if ($galleries->image)
                            <img src="{{ asset('storage/' . $galleries->image) }}" style="max-height: 100px;" class="img-preview mt-2" />
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-4">
                        @endif
                        
                     
                        @error('image')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-primary btn-block" type="submit">
                        Ubah Data
                    </button>
                </form>
            </div>
        </div>



    </div>
    <!-- /.container-fluid -->
@endsection