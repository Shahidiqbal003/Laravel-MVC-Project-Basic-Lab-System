@extends('template.main')

@section('title', 'View Contact Message')

@section('content')

<div class="content-wrapper">

    <!-- Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Contact Message</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('contacts.index') }}">Contacts</a>
                        </li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="card">

                <div class="card-header d-flex justify-content-between">
                    <a href="{{ route('contacts.index') }}"
                       class="btn btn-warning btn-sm">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>

                    <span>
                        @if($message->status === 'new')
                            <span class="badge badge-danger">New</span>
                        @elseif($message->status === 'read')
                            <span class="badge badge-primary">Read</span>
                        @else
                            <span class="badge badge-success">Replied</span>
                        @endif
                    </span>
                </div>

                <div class="card-body">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Name:</strong>
                            <p>{{ $message->name }}</p>
                        </div>

                        <div class="col-md-6">
                            <strong>Email:</strong>
                            <p>
                                <a href="mailto:{{ $message->email }}">
                                    {{ $message->email }}
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>IP Address:</strong>
                            <p>{{ $message->ip_address ?? '-' }}</p>
                        </div>

                        <div class="col-md-6">
                            <strong>Received At:</strong>
                            <p>{{ $message->created_at->format('d M Y, h:i A') }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <strong>Message:</strong>
                        <div class="p-3 bg-light rounded">
                            {{ $message->message }}
                        </div>
                    </div>

                </div>

                <!-- Footer -->
                <div class="card-footer text-right">
                    <form action="{{ route('contacts.destroy', $message->id) }}"
                          method="POST"
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="btn btn-danger"
                                id="btn-delete">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
