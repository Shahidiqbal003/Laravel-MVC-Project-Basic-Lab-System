@extends('template.main')

@section('title', 'Edit Barang')

@section('content')

<div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('barang.index') }}">Barang</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Barang</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <div class="card">

                        <!-- Card Header -->
                        <div class="card-header">
                            <div class="text-right">
                                <a href="{{ route('barang.index') }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-arrow-rotate-left"></i> Back
                                </a>
                            </div>
                        </div>

                        <!-- Form -->
                        <form class="needs-validation"
                              novalidate
                              action="{{ route('barang.update', $barang->id_barang) }}"
                              method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text"
                                                   name="name"
                                                   id="name"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   value="{{ old('name', $barang->name) }}"
                                                   placeholder="Name Barang"
                                                   required>
                                            @error('name')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <input type="text"
                                                   name="category"
                                                   id="category"
                                                   class="form-control @error('category') is-invalid @enderror"
                                                   value="{{ old('category', $barang->category) }}"
                                                   placeholder="Category"
                                                   required>
                                            @error('category')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="supplier">Supplier</label>
                                            <input type="text"
                                                   name="supplier"
                                                   id="supplier"
                                                   class="form-control @error('supplier') is-invalid @enderror"
                                                   value="{{ old('supplier', $barang->supplier) }}"
                                                   placeholder="Supplier"
                                                   required>
                                            @error('supplier')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="stock">Stock</label>
                                            <input type="number"
                                                   min="1"
                                                   name="stock"
                                                   id="stock"
                                                   class="form-control @error('stock') is-invalid @enderror"
                                                   value="{{ old('stock', $barang->stock) }}"
                                                   placeholder="Stock"
                                                   required>
                                            @error('stock')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="number"
                                                   name="price"
                                                   id="price"
                                                   class="form-control @error('price') is-invalid @enderror"
                                                   value="{{ old('price', $barang->price) }}"
                                                   placeholder="Price"
                                                   required>
                                            @error('price')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="note">Note</label>
                                            <textarea name="note"
                                                      id="note"
                                                      rows="5"
                                                      class="form-control @error('note') is-invalid @enderror"
                                                      placeholder="Note">{{ old('note', $barang->note) }}</textarea>
                                            @error('note')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Footer -->
                            <div class="card-footer text-right">
                                <button class="btn btn-dark mr-1" type="reset">
                                    <i class="fa-solid fa-arrows-rotate"></i> Reset
                                </button>
                                <button class="btn btn-success" type="submit">
                                    <i class="fa-solid fa-floppy-disk"></i> Save
                                </button>
                            </div>

                        </form>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
