@extends('dashboard.layouts.app')
@section('content')
{{-- <div class="container-fluid"> --}}
    <div class="row">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="disabled" class="disabled">Contact</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">View</a></li>
        </ol>
        <div class="col-lg-12">
            <div class="card">
                @if(session('danger'))
                    <div class="alert alert-danger">{{ session('danger') }}</div>
                @endif

                <div class="card-header">
                    <h4 class="card-title">
                        Contact List
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th><strong>Sl. No</strong></th>
                                    <th><strong>Category</strong></th>
                                    <th><strong>Name</strong></th>
                                    <th><strong>Email</strong></th>
                                    <th><strong>Number</strong></th>
                                    <th><strong>Address</strong></th>
                                    <th><strong>Avatar</strong></th>
                                    <th><strong>Note</strong></th>
                                    <th><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $sl => $contact)

                                @endforeach
                                    <tr>
                                        <td><strong>{{ $sl+1 }}</strong></td>

                                        <td><span class="w-space-no">{{  $contact->category->name }}</span></td>

                                        <td><span class="w-space-no">{{ $contact->name }}</span></td>

                                        <td><span class="w-space-no">{{ $contact->email }}</span></td>

                                        <td><span class="w-space-no">{{ $contact->number }}</span></td>

                                        <td><span class="w-space-no">{{ $contact->address }}</span></td>

                                        <td></td>

                                        <td><span class="w-space-no">{{ $contact->note }}</span></td>

                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>

                                                <a href="" class="btn btn-danger shadow btn-xs sharp me-1"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>

                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}
@endsection
