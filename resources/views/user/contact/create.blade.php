@extends('layout.main')

@section('title', 'Contacts')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Contacts</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- @dump($categories) --}}
                            @include('partials.alerts')
                            <form action="{{ route('user.contact.create') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <lable class="form-label" for="first_name">First Name</lable>
                                            <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="First name" value="{{ old('first_name') }}">
                                            @error('first_name')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <lable class="form-label" for="last_name">Last Name</lable>
                                            <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last name" value="{{ old('last_name') }}">
                                            @error('last_name')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <lable class="form-label" for="category_id">Category</lable>
                                            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <lable class="form-label" for="email">Email</lable>
                                            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"  value="{{ old('email') }}">
                                            @error('email')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <lable class="form-label" for="mobile">Mobile</lable>
                                            <input type="text" name="mobile" id="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="Phone number" value="{{ old('mobile') }}">
                                            @error('mobile')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <lable class="form-label" for="dob">DoB</lable>
                                            <input type="date" name="dob" id="dob" class="form-control @error('dob') is-invalid @enderror">
                                            @error('dob')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <lable class="form-label" for="facebook">Facebook</lable>
                                            <input type="text" name="facebook" id="facebook" class="form-control @error('facebook') is-invalid @enderror" placeholder="Facebook url"  value="{{ old('facebook') }}">
                                            @error('facebook')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <lable class="form-label" for="instagram">Instagram</lable>
                                            <input type="text" name="instagram" id="instagram" class="form-control  @error('instagram') is-invalid @enderror" placeholder="Instagram url" value="{{ old('first_name') }}" value="{{ old('instagram') }}">
                                            @error('instagram')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <lable class="form-label" for="youtube">Youtube</lable>
                                            <input type="text" name="youtube" id="youtube" class="form-control @error('youtube') is-invalid @enderror" placeholder="Youtube url" value="{{ old('youtube') }}">
                                            @error('youtube')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="picture" class="form-label">Picture</label>
                                    <input type="file" name="picture" id="picture" class="form-control @error('picture') is-invalid @enderror">
                                    @error('picture')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" cols="30" placeholder="Your Address">{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mt-3">
                                    <input type="submit" class="btn btn-dark">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
