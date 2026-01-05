@extends('template.main')

@section('title', 'Website Settings')

@section('content')

<div class="content-wrapper">

    <!-- Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Website Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="card">

                <!-- Card Header -->
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fa fa-cogs mr-1"></i>
                        General Website Settings
                    </h3>
                </div>

                <!-- Form -->
                <form method="POST" action="{{ route('settings.update') }}" class="needs-validation" novalidate>
                    @csrf

                    <div class="card-body">

                        <!-- Website Name + Tagline -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Website Name <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="site_name"
                                           class="form-control"
                                           value="{{ old('site_name', $setting->site_name ?? '') }}"
                                           required>
                                    <div class="invalid-feedback">
                                        Website name is required
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tagline</label>
                                    <input type="text"
                                           name="tagline"
                                           class="form-control"
                                           value="{{ old('tagline', $setting->tagline ?? '') }}"
                                           placeholder="Short slogan or tagline">
                                </div>
                            </div>
                        </div>

                        <!-- Primary Email -->
                        <div class="form-group">
                            <label>Primary Email <span class="text-danger">*</span></label>
                            <input type="email"
                                   name="primary_email"
                                   class="form-control"
                                   value="{{ old('primary_email', $setting->primary_email ?? '') }}"
                                   required>
                            <div class="invalid-feedback">
                                Primary email is required
                            </div>
                        </div>

                        <!-- Notification Emails -->
                        <!-- <div class="form-group">
                            <label>Contact Notification Emails <span class="text-danger">*</span></label>
                            <input type="text"
                                   name="notification_emails"
                                   class="form-control"
                                   value="{{ old(
                                       'notification_emails',
                                       isset($setting) && $setting->notification_emails
                                           ? implode(',', $setting->notification_emails)
                                           : ''
                                   ) }}"
                                   placeholder="info@site.com, admin@site.com"
                                   required>

                            <small class="text-muted">
                                Comma separated emails — contact form notifications will be sent here
                            </small>

                            <div class="invalid-feedback">
                                At least one email is required
                            </div>
                        </div> -->

                        <!-- Phone + WhatsApp -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="text"
                                           name="primary_phone"
                                           class="form-control"
                                           value="{{ old('primary_phone', $setting->primary_phone ?? '') }}"
                                           placeholder="03XXXXXXXXX">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>WhatsApp Number</label>
                                    <input type="text"
                                           name="whatsapp_number"
                                           class="form-control"
                                           value="{{ old('whatsapp_number', $setting->whatsapp_number ?? '') }}"
                                           placeholder="03XXXXXXXXX">
                                </div>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address"
                                      rows="3"
                                      class="form-control"
                                      placeholder="Full business address">{{ old('address', $setting->address ?? '') }}</textarea>
                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="card-footer text-right">
                        <button type="reset" class="btn btn-secondary mr-2">
                            Reset
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save mr-1"></i>
                            Save Settings
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>

</div>

@endsection
