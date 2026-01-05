@extends('template.main')

@section('title', 'Blogs')

@section('content')

<div class="content-wrapper">

    <!-- Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="mb-0">Blogs</h1>

                <a href="{{ route('blogs.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Blog
                </a>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="card">

                <div class="card-body table-responsive">
                    <table id="example1"
                           class="table table-bordered table-striped text-center align-middle">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="10%">Thumbnail</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <!-- Thumbnail -->
                                    <td>
                                        <img src="{{ asset('storage/'.$blog->thumbnail) }}"
                                             class="img-thumbnail"
                                             style="max-width:70px;">
                                    </td>

                                    <!-- Title -->
                                    <td class="text-left font-weight-bold">
                                        {{ $blog->title }}
                                    </td>

                                    <!-- Slug -->
                                    <td>
                                        <span class="badge badge-light">
                                            {{ $blog->slug }}
                                        </span>
                                    </td>

                                    <!-- Date -->
                                    <td>
                                        {{ \Carbon\Carbon::parse($blog->published_at)->format('d M Y') }}
                                    </td>

                                    <!-- Status -->
                                    <td>
                                        @if($blog->status)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-secondary">Inactive</span>
                                        @endif
                                    </td>

                                    <!-- Actions -->
                                    <td>
                                        <a href="{{ route('blogs.edit', $blog->id) }}"
                                           class="btn btn-sm btn-success mr-1">
                                            <i class="fa fa-pen"></i>
                                        </a>

                                        <form action="{{ route('blogs.destroy', $blog->id) }}"
                                              method="POST"
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    id="btn-delete"
                                                    class="btn btn-sm btn-danger">
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
