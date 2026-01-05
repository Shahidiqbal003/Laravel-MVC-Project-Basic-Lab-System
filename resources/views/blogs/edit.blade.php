@extends('template.main')

@section('title', 'Edit Blog')

@section('content')

<div class="content-wrapper">

    <!-- Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Blog</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('blogs.index') }}">Blogs</a>
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

                <!-- Header -->
                <div class="card-header text-right">
                    <a href="{{ route('blogs.index') }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>

                <!-- Form -->
                <form class="needs-validation"
                    novalidate
                    action="{{ route('blogs.update', $blog->id) }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">

                        <!-- Title + Date -->
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Blog Title *</label>
                                    <input type="text"
                                        name="title"
                                        class="form-control"
                                        value="{{ old('title', $blog->title) }}"
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
                                        value="{{ old('published_at', $blog->published_at->format('Y-m-d')) }}"
                                        required>
                                    <div class="invalid-feedback">
                                        Publish date is required
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Image Preview -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Current Thumbnail</label>
                                <div class="mb-2">
                                    <img src="{{ asset('storage/'.$blog->thumbnail) }}"
                                        class="img-fluid rounded"
                                        style="max-height:180px">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Current Cover Image</label>
                                <div class="mb-2">
                                    <img src="{{ asset('storage/'.$blog->cover_image) }}"
                                        class="img-fluid rounded"
                                        style="max-height:180px">
                                </div>
                            </div>
                        </div>

                        <!-- Replace Images -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Replace Thumbnail (optional)</label>
                                    <input type="file"
                                        name="thumbnail"
                                        class="form-control"
                                        accept="image/*">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Replace Cover Image (optional)</label>
                                    <input type="file"
                                        name="cover_image"
                                        class="form-control"
                                        accept="image/*">
                                </div>
                            </div>
                        </div>

                        <!-- Blog Content -->
                        <div class="form-group">
                            <label>Blog Detail *</label>
                            <textarea name="content"
                                id="editor"
                                class="form-control"
                                rows="6"
                                required>{{ old('content', $blog->content) }}</textarea>
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
                                        class="form-control bg-light"
                                        value="{{ $blog->slug }}"
                                        readonly
                                        required>
                                    <small class="text-muted">
                                        Slug cannot be changed after publishing
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tags *</label>
                                    <input type="text"
                                        name="tags"
                                        class="form-control"
                                        value="{{ old('tags', $blog->tags) }}"
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
                                    {{ $blog->status ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">
                                    Active
                                </label>
                            </div>
                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-success">
                            Update Blog
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

    document.addEventListener('DOMContentLoaded', function() {
        const titleInput = document.querySelector('input[name="title"]');
        const slugInput = document.getElementById('slug');

        titleInput.addEventListener('input', function() {
            slugInput.value = generateSlug(this.value);
        });
    });
</script>
@endpush