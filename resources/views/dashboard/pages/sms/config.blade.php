@extends('dashboard.layouts.app')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="" class="disabled">SMS</a></li>
    <li class="breadcrumb-item active"><a href="javascript:void(0)">SMS Configuration</a></li>
</ol>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="card-header">
                        <h4 class="card-title">SMS Configuration</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('sms.config.store') }}" method="POST">
                        @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="col-sm-6 col-form-label">SMS Host URL</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" placeholder="http://bulksmsbd.net/api/smsapi">
                                        @error('url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-sm-6 col-form-label">SMS Api Key</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control @error('api_key') is-invalid @enderror" placeholder="example: ZjvNGWfYlrvk6wUKhQQb" name="api_key">
                                        @error('api_key')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="col-sm-6 col-form-label">SMS Sender ID</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control @error('sender_id') is-invalid @enderror" placeholder="example: 8809617614289" name="sender_id">
                                        @error('sender_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
