@extends('template.main')

@section('title', 'Add Diagnostic Test')

@section('content')

<div class="content-wrapper">

    <!-- Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Diagnostic Test</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('tests.index') }}">Services</a>
                        </li>
                        <li class="breadcrumb-item active">Add</li>
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

                <form class="needs-validation" novalidate
                      action="{{ route('tests.store') }}"
                      method="POST">
                    @csrf

                    <div class="card-body">

                        <!-- Test Name -->
                        <div class="form-group">
                            <label>Test Name <span class="text-danger">*</span></label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="e.g. FNAC Test"
                                   required>
                            <div class="invalid-feedback">
                                Test name is required
                            </div>
                        </div>

                        <!-- Price + Sample -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Price (Rs.)</label>
                                    <input type="number"
                                           name="price"
                                           class="form-control"
                                           placeholder="Leave empty if coming soon">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sample Type</label>
                                    <input type="text"
                                           name="sample_type"
                                           class="form-control"
                                           placeholder="Blood / Urine / Tissue">
                                </div>
                            </div>
                        </div>

                        <!-- Report Time (SELECT) -->
                        <div class="form-group">
                            <label>Report Time</label>
                            <select name="report_time" class="form-control">
                                <option value="">-- Select Report Time --</option>
                                <option value="Same Day">Same Day</option>
                                <option value="24 Hours">24 Hours</option>
                                <option value="48 Hours">2 Days</option>
                                <option value="3 Days">3 Days</option>
                                <option value="1 Week">1 Week</option>
                                <option value="15 Days">15 Days</option>
                                <option value="1 Month">1 Month</option>
                            </select>
                        </div>

                        <!-- Short Description -->
                        <div class="form-group">
                            <label>Short Description</label>
                            <textarea name="short_description"
                                      class="form-control"
                                      rows="2"
                                      placeholder="Short explanation shown on cards"></textarea>
                        </div>

                        <!-- 🔒 HIDDEN FOR NOW -->
                        {{-- 
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" name="category" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Full Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                        --}}

                        <!-- Sort Order -->
                        <div class="form-group col-md-3 p-0">
                            <label>Sort Order <small class="text-muted">(Unique)</small></label>
                            <input type="number"
                                   name="sort_order"
                                   class="form-control"
                                   placeholder="1, 2, 3..."
                                   min="1"
                                   required>
                            <small class="text-muted">
                                Lower number = show first
                            </small>
                        </div>

                        <!-- Flags -->
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox"
                                           name="show_on_home"
                                           class="form-check-input"
                                           id="show_on_home">
                                    <label class="form-check-label" for="show_on_home">
                                        Show on Home Page
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox"
                                           name="is_coming_soon"
                                           class="form-check-input"
                                           id="coming_soon">
                                    <label class="form-check-label" for="coming_soon">
                                        Coming Soon
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox"
                                           name="is_active"
                                           class="form-check-input"
                                           id="is_active"
                                           checked>
                                    <label class="form-check-label" for="is_active">
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
                            Save Test
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>

</div>

@endsection
