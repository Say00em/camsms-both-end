@extends('dashboard.layouts.app')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="" class="disabled">SMS</a></li>
    <li class="breadcrumb-item active"><a href="javascript:void(0)">Send</a></li>
</ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Send SMS</h4>
                        <button class="btn btn-sm btn-primary"><i class="fa-solid fa-eye"></i> Maskable Message</button>
                        <button class="btn btn-sm btn-secondary"><i class="fa-solid fa-eye-slash"></i> Non-Maskable Message</button>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('sms.send.store') }}" method="POST">
                        @csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Send To</label>
                                <input type="text" class="form-control @error('number') is-invalid @enderror" name="number" id="">
                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Showing Name/Number</label>
                                <input type="text" class="form-control @error('mask') is-invalid @enderror" name="mask" id="" placeholder="Here you can add name or number which will be shown in your message">
                                @error('mask')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="col-sm-3 col-form-label">Category</label>
                                        <select name="category_id" class="form-control">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                            <option value="" disabled>If category is not in the list, than firstly add the category's information</option>
                                        </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-sm-3 col-form-label">Type</label>
                                    <input type="text" class="form-control" name="type" id="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Message</label>
                                <textarea class="from-control custom-code  @error('message') is-invalid @enderror" rows="5" name="message" value=""></textarea>

                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
