@extends('template.main')

@section('title', 'Diagnostic Tests')

@section('content')

<div class="content-wrapper">

    <!-- Header -->
    <div class="content-header">
        <div class="container-fluid">
            <h1>Diagnostic Tests</h1>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="card">

                <div class="card-header text-right">
                    <a href="{{ route('tests.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Add Test
                    </a>
                </div>

                <div class="card-body">

                    <!-- RESPONSIVE WRAPPER -->
                    <div class="table-responsive">

                        <table id="example1"
                               class="table table-bordered table-striped table-hover text-center w-100">
                            <thead class="bg-light">
                                <tr>
                                    <th>#</th>
                                    <th>Order</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th class="d-none d-md-table-cell">Home</th>
                                    <th>Status</th>
                                    <th class="d-none d-md-table-cell">Coming Soon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($tests as $test)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <!-- SORT ORDER -->
                                        <td>
                                            @if($test->sort_order > 0)
                                                <span class="badge badge-dark">
                                                    {{ $test->sort_order }}
                                                </span>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>

                                        <!-- NAME -->
                                        <td class="text-left font-weight-bold">
                                            {{ $test->name }}
                                        </td>

                                        <!-- PRICE -->
                                        <td>
                                            @if($test->is_coming_soon)
                                                <span class="badge badge-warning">
                                                    Coming Soon
                                                </span>
                                            @else
                                                <span class="text-success font-weight-bold">
                                                    Rs. {{ number_format($test->price) }}
                                                </span>
                                            @endif
                                        </td>

                                        <!-- HOME -->
                                        <td class="d-none d-md-table-cell">
                                            {!! $test->show_on_home
                                                ? '<span class="badge badge-success">Yes</span>'
                                                : '<span class="text-muted">No</span>' !!}
                                        </td>

                                        <!-- STATUS -->
                                        <td>
                                            {!! $test->is_active
                                                ? '<span class="badge badge-primary">Active</span>'
                                                : '<span class="badge badge-secondary">Inactive</span>' !!}
                                        </td>

                                        <!-- COMING SOON -->
                                        <td class="d-none d-md-table-cell">
                                            {!! $test->is_coming_soon
                                                ? '<span class="badge badge-warning">Yes</span>'
                                                : '<span class="text-muted">—</span>' !!}
                                        </td>

                                        <!-- ACTION -->
                                        <td>
                                            <a href="{{ route('tests.edit', $test->id) }}"
                                               class="btn btn-sm btn-success mr-1"
                                               title="Edit">
                                                <i class="fa fa-pen"></i>
                                            </a>

                                            <form action="{{ route('tests.destroy', $test->id) }}"
                                                  method="POST"
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-sm btn-danger"
                                                        id="btn-delete"
                                                        title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div><!-- /.table-responsive -->

                </div>

            </div>

        </div>
    </div>

</div>

@endsection
