@extends('template.main')

@section('title', 'Add Blog')

@section('content')

<div class="content-wrapper">

    <!-- Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Blog</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('blogs.index') }}">Blogs</a>
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

                <!-- Header -->
                <div class="card-header text-right">
                    <a href="{{ route('blogs.index') }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>

                <!-- Form -->
                <form class="needs-validation"
                    novalidate
                    action="{{ route('blogs.store') }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">

                        <!-- Title + Date -->
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Blog Title *</label>
                                    <input type="text"
                                        name="title"
                                        class="form-control"
                                        required>
                                    <div class="invalid-feedback">
                                        Blog title is required
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Publish Date *</label>
                                    <input type="date"
                                        name="published_at"
                                        class="form-control"
                                        required>
                                    <div class="invalid-feedback">
                                        Publish date is required
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Images -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Blog Thumbnail (380 × 425) *</label>
                                    <input type="file"
                                        name="thumbnail"
                                        class="form-control"
                                        accept="image/*"
                                        required>
                                    <div class="invalid-feedback">
                                        Thumbnail image is required
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Blog Cover Image (1920 × 800) *</label>
                                    <input type="file"
                                        name="cover_image"
                                        class="form-control"
                                        accept="image/*"
                                        required>
                                    <div class="invalid-feedback">
                                        Cover image is required
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Blog Detail -->
                        <div class="form-group">
                            <label>Blog Detail *</label>
                            <textarea name="content"
                                id="editor"
                                class="form-control"
                                rows="6"
                                required></textarea>
                            <div class="invalid-feedback">
                                Blog content is required
                            </div>
                        </div>

                        <!-- Slug + Tags -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Slug *</label>
                                    <input type="text"
                                        name="slug"
                                        id="slug"
                                        class="form-control bg-light"
                                        readonly
                                        required>
                                    <small class="text-muted">
                                        Auto-generated from title
                                    </small>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tags *</label>
                                    <input type="text"
                                        name="tags"
                                        class="form-control"
                                        placeholder="health, lab, fnac"
                                        required>
                                    <small class="text-muted">
                                        Separate tags with commas (,)
                                    </small>
                                </div>

                            </div>
                        </div>

                        <!-- Status -->
                        <div class="form-group mt-3">
                            <div class="form-check">
                                <input type="checkbox"
                                    name="status"
                                    class="form-check-input"
                                    id="status"
                                    checked>
                                <label class="form-check-label" for="status">
                                    Active
                                </label>
                            </div>
                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="card-footer text-right">
                        <button type="reset" class="btn btn-secondary">
                            Reset
                        </button>
                        <button type="submit" class="btn btn-success">
                            Save Blog
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>

</div>

@endsection


@push('scripts')
<script>
    function generateSlug(text) {
        return text
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
    }

    document.addEventListener('DOMContentLoaded', function () {
        const titleInput = document.querySelector('input[name="title"]');
        const slugInput  = document.getElementById('slug');

        titleInput.addEventListener('input', function () {
            slugInput.value = generateSlug(this.value);
        });
    });
</script>
@endpush
