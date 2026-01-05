@extends('template.main')
@section('title', 'Dashboard')

@section('content')
<div class="content-wrapper">

    <!-- HEADER -->
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">Dashboard</h1>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="content">
        <div class="container-fluid">

            <!-- STATS -->
            <div class="row">

                <!-- SERVICES -->
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $services }}</h3>
                            <p>Services</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-flask"></i>
                        </div>
                        <a href="{{ route('tests.index') }}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- BLOGS -->
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $blogs }}</h3>
                            <p>Blogs</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-blog"></i>
                        </div>
                        <a href="{{ route('blogs.index') }}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- CONTACTS -->
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $contacts }}</h3>
                            <p>Contacts</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <a href="{{ route('contacts.index') }}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- BARANG -->
                <!-- <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $barang }}</h3>
                            <p>Barang</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <a href="{{ route('barang.index') }}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div> -->

            </div>

            <!-- NEW CONTACTS -->
            <div class="row mt-4">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-bell mr-2"></i>
                                New Contact Messages
                            </h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($newContacts as $contact)
                                        <tr>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->phone }}</td>
                                            <td>{{ Str::limit($contact->message, 40) }}</td>
                                            <td>{{ $contact->created_at->format('d M Y') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">
                                                No new messages
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer text-right">
                            <a href="{{ route('contacts.index') }}" class="btn btn-sm btn-primary">
                                View All Messages
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
