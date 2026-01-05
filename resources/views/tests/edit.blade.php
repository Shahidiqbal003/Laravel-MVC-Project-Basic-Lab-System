@extends('template.main')

@section('title', 'Edit Diagnostic Test')

@section('content')

<div class="content-wrapper">

    <!-- Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Diagnostic Test</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('tests.index') }}">Services</a>
                        </li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="card">

                <div class="card-header text-right">
                    <a href="{{ route('tests.index') }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>

                <form class="needs-validation"
                      novalidate
                      action="{{ route('tests.update', $test->id) }}"
                      method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">

                        <!-- Name -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Test Name *</label>
                                    <input type="text"
                                           name="name"
                                           class="form-control"
                                           value="{{ old('name', $test->name) }}"
                                           required>
                                    <div class="invalid-feedback">
                                        Test name is required
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Price / Sample / Report Time -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number"
                                           name="price"
                                           class="form-control"
                                           value="{{ old('price', $test->price) }}"
                                           {{ $test->is_coming_soon ? 'disabled' : '' }}>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sample Type</label>
                                    <input type="text"
                                           name="sample_type"
                                           class="form-control"
                                           value="{{ old('sample_type', $test->sample_type) }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Report Time</label>
                                    <select name="report_time" class="form-control">
                                        @php
                                            $times = [
                                                'Same Day',
                                                '24 Hours',
                                                '48 Hours',
                                                '3 Days',
                                                '1 Week',
                                                '15 Days',
                                                '1 Month'
                                            ];
                                        @endphp

                                        <option value="">Select Report Time</option>
                                        @foreach($times as $time)
                                            <option value="{{ $time }}"
                                                {{ old('report_time', $test->report_time) == $time ? 'selected' : '' }}>
                                                {{ $time }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Short Description -->
                        <div class="form-group">
                            <label>Short Description</label>
                            <textarea name="short_description"
                                      class="form-control"
                                      rows="2">{{ old('short_description', $test->short_description) }}</textarea>
                        </div>

                        <!-- Sort Order -->
                        <div class="form-group col-md-3 p-0">
                            <label>Sort Order <small class="text-muted">(Unique)</small></label>
                            <input type="number"
                                   name="sort_order"
                                   class="form-control"
                                    value="{{ old('sort_order', $test->sort_order) }}"
                                   min="1"
                                   required>
                            <small class="text-muted">
                                Lower number = show first
                            </small>
                        </div>

                        <!-- Checkboxes -->
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox"
                                           name="show_on_home"
                                           class="form-check-input"
                                           {{ $test->show_on_home ? 'checked' : '' }}>
                                    <label class="form-check-label">
                                        Show on Home Page
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox"
                                           name="is_coming_soon"
                                           class="form-check-input"
                                           {{ $test->is_coming_soon ? 'checked' : '' }}>
                                    <label class="form-check-label">
                                        Coming Soon
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox"
                                           name="is_active"
                                           class="form-check-input"
                                           {{ $test->is_active ? 'checked' : '' }}>
                                    <label class="form-check-label">
                                        Active
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="card-footer text-right">
                        <button type="reset" class="btn btn-secondary">
                            Reset
                        </button>
                        <button type="submit" class="btn btn-success">
                            Update Test
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>

</div>

@endsection
