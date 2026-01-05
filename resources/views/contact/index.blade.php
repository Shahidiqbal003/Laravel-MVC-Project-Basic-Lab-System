@extends('template.main')

@section('title', 'Contact Messages')

@section('content')

<div class="content-wrapper">

    <!-- Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Contact Messages</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Contacts</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="card">

                <div class="card-body table-responsive">
                    <table id="example1"
                           class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Received</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($messages as $msg)
                                <tr class="{{ $msg->status === 'new' ? 'table-warning' : '' }}">
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $msg->name }}</td>

                                    <td>
                                        <a href="mailto:{{ $msg->email }}">
                                            {{ $msg->phone }}
                                        </a>
                                    </td>

                                    <td>
                                        {{ Str::limit($msg->message, 40) }}
                                    </td>

                                    <td>
                                        @if($msg->status === 'new')
                                            <span class="badge badge-danger">New</span>
                                        @elseif($msg->status === 'read')
                                            <span class="badge badge-primary">Read</span>
                                        @else
                                            <span class="badge badge-success">Replied</span>
                                        @endif
                                    </td>

                                    <td>
                                        {{ $msg->created_at->format('d M Y') }}
                                    </td>

                                    <td>
                                        <!-- VIEW -->
                                        <a href="{{ route('contacts.show', $msg->id) }}"
                                           class="btn btn-sm btn-info mr-1">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        <!-- DELETE -->
                                        <form action="{{ route('contacts.destroy', $msg->id) }}"
                                              method="POST"
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    id="btn-delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

</div>

@endsection
