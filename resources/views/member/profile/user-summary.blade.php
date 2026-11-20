@extends('member.layouts.main')
@section('title', 'Member Profile Summary')
@section('container')

    <style>
        .profile-hero-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 24px -2px rgba(17, 28, 67, 0.06);
            transition: all 0.25s ease;
        }

        .profile-cover-banner {
            background: linear-gradient(135deg, #111c43 0%, #1e3a8a 60%, #23b7e5 100%);
            height: 110px;
            position: relative;
        }

        .profile-cover-banner::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: radial-gradient(rgba(255, 255, 255, 0.12) 1.2px, transparent 1.2px);
            background-size: 14px 14px;
            pointer-events: none;
        }

        .profile-avatar-wrapper {
            margin-top: -50px;
            position: relative;
            display: inline-block;
        }

        .profile-avatar-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 4px solid #ffffff;
            object-fit: cover;
            box-shadow: 0 8px 20px rgba(17, 28, 67, 0.15);
            background: #ffffff;
        }

        .profile-avatar-initials {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 4px solid #ffffff;
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: #ffffff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            font-weight: 700;
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.25);
        }

        .online-indicator {
            position: absolute;
            bottom: 6px;
            right: 6px;
            width: 18px;
            height: 18px;
            background: #10b981;
            border: 3px solid #ffffff;
            border-radius: 50%;
        }

        .profile-info-pill {
            background: #f8fafc;
            border: 1px solid #eef2f7;
            border-radius: 10px;
            padding: 10px 14px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 8px;
            transition: all 0.2s ease;
        }

        .profile-info-pill:hover {
            background: #f1f5f9;
            border-color: #e2e8f0;
        }

        .profile-form-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 4px 24px -2px rgba(17, 28, 67, 0.06);
            overflow: hidden;
        }

        .form-control-custom,
        .form-select-custom {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 11px 14px;
            font-size: 14px;
            color: #1e293b;
            transition: all 0.2s ease;
        }

        .form-control-custom:focus,
        .form-select-custom:focus {
            background: #ffffff;
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
            outline: none;
        }

        .custom-field-label {
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
        }

        .upload-dropzone {
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            padding: 18px;
            background: #f8fafc;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .upload-dropzone:hover {
            border-color: #6366f1;
            background: #f5f3ff;
        }
    </style>

    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- Page Header Breadcrumb -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <div>
                    <h1 class="page-title fw-bold fs-20 mb-1" style="color: #111c43;">Member Profile Summary</h1>
                    <p class="text-muted fs-13 mb-0">View and update your personal account details</p>
                </div>
                <div class="ms-md-1 ms-0 mt-md-0 mt-2">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('member/dashboard') }}" class="text-primary"><i
                                        class="ti ti-home-2 me-1"></i>Dashboard</a></li>
                            <li class="breadcrumb-item text-muted">Profile</li>
                            <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">Member Summary</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Flash Messages -->
            @if (session()->has('successMsg'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center mb-4" role="alert"
                    style="border-radius: 12px; background: rgba(16, 185, 129, 0.15); border: 1px solid rgba(16, 185, 129, 0.35); color: #065f46;">
                    <i class="bi bi-check-circle-fill fs-18 me-2 text-success"></i>
                    <div class="flex-grow-1">
                        <strong>Success!</strong> {{ session('successMsg') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('failedMsg'))
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center mb-4" role="alert"
                    style="border-radius: 12px; background: rgba(239, 68, 68, 0.12); border: 1px solid rgba(239, 68, 68, 0.35); color: #991b1b;">
                    <i class="bi bi-exclamation-triangle-fill fs-18 me-2 text-danger"></i>
                    <div class="flex-grow-1">
                        <strong>Attention!</strong> {{ session('failedMsg') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row g-4 mb-4">
                <!-- Left Column: User Identity Card -->
                <div class="col-xxl-4 col-xl-4 col-lg-5 col-12">
                    <div class="profile-hero-card">
                        <!-- Cover Banner -->
                        <div class="profile-cover-banner">
                            <span class="badge position-absolute top-0 end-0 m-3 px-3 py-2 fw-semibold"
                                style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(8px); color: #ffffff; border: 1px solid rgba(255, 255, 255, 0.35); border-radius: 20px; font-size: 11px;">
                                <i class="ti ti-id me-1"></i> {{ $data['memberid'] }}
                            </span>
                        </div>

                        <!-- Profile Header Details -->
                        <div class="p-4 pt-0 text-center">
                            <div class="profile-avatar-wrapper mb-3">
                                @if (!empty($data['profile_image']))
                                    <img src="{{ asset('uploads') }}/{{ $data['profile_image'] }}"
                                        class="profile-avatar-img" alt="{{ $data['name'] }}">
                                @else
                                    <div class="profile-avatar-initials">
                                        {{ strtoupper(substr($data['name'] ?? 'U', 0, 1)) }}
                                    </div>
                                @endif
                                <span class="online-indicator" title="Active"></span>
                            </div>

                            <h4 class="fw-bold mb-1" style="color: #111c43; letter-spacing: -0.2px;">{{ $data['name'] }}
                            </h4>
                            <p class="text-muted fs-13 mb-2">{{ $data['email'] }}</p>

                            <div class="d-flex align-items-center justify-content-center gap-2 mb-4">
                                <span class="badge"
                                    style="background: rgba(16, 185, 129, 0.15); color: #047857; border: 1px solid rgba(16, 185, 129, 0.35); font-size: 12px; padding: 5px 14px; border-radius: 20px; font-weight: 600;">
                                    <i class="bi bi-patch-check-fill me-1"></i> {{ $data['status'] }} Account
                                </span>
                            </div>

                            <hr class="my-3 opacity-25">

                            <!-- Information Summary List -->
                            <div class="text-start">
                                <div class="profile-info-pill">
                                    <span class="text-muted fs-12"><i
                                            class="ti ti-phone text-warning me-2 fs-15"></i>Mobile</span>
                                    <span class="fw-semibold text-dark fs-13">{{ $data['mobile'] ?? 'Not set' }}</span>
                                </div>

                                <div class="profile-info-pill">
                                    <span class="text-muted fs-12"><i
                                            class="ti ti-users text-primary me-2 fs-15"></i>Sponsor ID</span>
                                    <span class="fw-semibold text-dark fs-13">{{ $data['sponsorid'] ?? 'Not set' }}</span>
                                </div>

                                <div class="profile-info-pill">
                                    <span class="text-muted fs-12"><i
                                            class="ti ti-world text-info me-2 fs-15"></i>Country</span>
                                    <span class="fw-semibold text-dark fs-13">{{ $data['country'] ?? 'Not set' }}</span>
                                </div>

                                @if (!empty($data['created_at']))
                                    <div class="profile-info-pill">
                                        <span class="text-muted fs-12"><i
                                                class="ti ti-calendar text-success me-2 fs-15"></i>Joined Date</span>
                                        <span
                                            class="fw-semibold text-dark fs-13">{{ date('d M Y', strtotime($data['created_at'])) }}</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Quick Action Buttons -->
                            <div class="d-grid gap-2 mt-4">
                                <a href="{{ url('member/profile/security') }}" class="btn btn-outline-primary btn-sm py-2"
                                    style="border-radius: 10px; font-weight: 600;">
                                    <i class="ti ti-lock me-1"></i> Change Password
                                </a>
                                <a href="{{ url('member/profile/wallet-address') }}"
                                    class="btn btn-light border btn-sm py-2"
                                    style="border-radius: 10px; font-weight: 600; color: #475569;">
                                    <i class="ti ti-wallet me-1 text-secondary"></i> Wallet Address
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Profile Edit Form -->
                <div class="col-xxl-8 col-xl-8 col-lg-7 col-12">
                    <div class="profile-form-card">
                        <!-- Card Header -->
                        <div class="p-4 border-bottom d-flex align-items-center justify-content-between flex-wrap gap-2"
                            style="background: #ffffff;">
                            <div class="d-flex align-items-center gap-3">
                                <span class="avatar avatar-md avatar-rounded"
                                    style="background: linear-gradient(135deg, #111c43 0%, #1e3a8a 100%); color: #ffffff; box-shadow: 0 4px 10px rgba(17, 28, 67, 0.2);">
                                    <i class="ti ti-user-edit fs-20"></i>
                                </span>
                                <div>
                                    <h5 class="fw-bold mb-0" style="color: #111c43;">Personal Information</h5>
                                    <p class="text-muted fs-12 mb-0">Update your account information and contact preferences
                                    </p>
                                </div>
                            </div>
                            <span class="badge"
                                style="background: rgba(99, 102, 241, 0.12); color: #6366f1; border: 1px solid rgba(99, 102, 241, 0.25); font-size: 12px; padding: 6px 12px; border-radius: 20px;">
                                <i class="ti ti-shield-check me-1"></i> Profile ID: {{ $data['memberid'] }}
                            </span>
                        </div>

                        <!-- Card Body Form -->
                        <div class="p-4">
                            @if ($data['status'] == 'Active')
                                <div class="alert alert-info py-2 px-3 fs-13 mb-4 d-flex align-items-center"
                                    style="border-radius: 10px; background: rgba(35, 183, 229, 0.12); border: 1px solid rgba(35, 183, 229, 0.3); color: #0284c7;">
                                    <i class="ti ti-info-circle fs-18 me-2"></i>
                                    <div>
                                        <strong>Active Account Notice:</strong> Profile information is locked for verified
                                        active accounts. To modify your details, please submit a ticket in the Support
                                        section.
                                    </div>
                                </div>
                            @endif

                            <form class="profile-form" action="{{ route('insertProfile') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data['id'] }}">
                                <input type="hidden" id="ustatus" name="status" value="{{ $data['status'] }}">

                                <div class="row g-3">
                                    <!-- Full Name -->
                                    <div class="col-md-6 col-12">
                                        <label class="custom-field-label">
                                            <i class="ti ti-user text-primary me-2 fs-15"></i> Full Name
                                        </label>
                                        <input class="form-control form-control-custom" type="text" name="name"
                                            value="{{ $data['name'] }}" placeholder="Enter your full name" required>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6 col-12">
                                        <label class="custom-field-label">
                                            <i class="ti ti-mail text-info me-2 fs-15"></i> Email Address
                                        </label>
                                        <input class="form-control form-control-custom" type="email" name="email"
                                            value="{{ $data['email'] }}" placeholder="Enter your email" required>
                                    </div>

                                    <!-- Mobile Number -->
                                    <div class="col-md-6 col-12">
                                        <label class="custom-field-label">
                                            <i class="ti ti-phone text-warning me-2 fs-15"></i> Mobile Number
                                        </label>
                                        <input class="form-control form-control-custom" type="text" name="mobile"
                                            value="{{ $data['mobile'] }}" minlength="10" maxlength="15"
                                            placeholder="Enter mobile number" required>
                                    </div>

                                    <!-- Gender -->
                                    <div class="col-md-6 col-12">
                                        <label class="custom-field-label">
                                            <i class="ti ti-gender-bigender text-secondary me-2 fs-15"></i> Gender
                                        </label>
                                        <select class="form-select form-select-custom" name="gender">
                                            <option value="" disabled
                                                {{ empty($data['gender']) ? 'selected' : '' }}>Select Gender</option>
                                            <option value="Male"
                                                {{ strcasecmp($data['gender'] ?? '', 'Male') == 0 ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="Female"
                                                {{ strcasecmp($data['gender'] ?? '', 'Female') == 0 ? 'selected' : '' }}>
                                                Female</option>
                                            <option value="Other"
                                                {{ strcasecmp($data['gender'] ?? '', 'Other') == 0 ? 'selected' : '' }}>
                                                Other</option>
                                        </select>
                                    </div>

                                    <!-- Date of Birth -->
                                    <div class="col-md-6 col-12">
                                        <label class="custom-field-label">
                                            <i class="ti ti-calendar text-danger me-2 fs-15"></i> Date of Birth
                                        </label>
                                        <input class="form-control form-control-custom" type="date" name="dob"
                                            value="{{ $data['dob'] }}">
                                    </div>

                                    <!-- Country -->
                                    <div class="col-md-6 col-12">
                                        <label class="custom-field-label">
                                            <i class="ti ti-world text-success me-2 fs-15"></i> Country
                                        </label>
                                        <input class="form-control form-control-custom" type="text" name="country"
                                            value="{{ $data['country'] }}" placeholder="Enter country name">
                                    </div>

                                    <!-- Profile Photo Upload -->
                                    <div class="col-12 mt-3">
                                        <label class="custom-field-label">
                                            <i class="ti ti-photo text-purple me-2 fs-15"></i> Profile Picture
                                        </label>
                                        <div class="upload-dropzone">
                                            <div class="d-flex align-items-center justify-content-center flex-column">
                                                <i class="ti ti-cloud-upload fs-32 text-muted mb-2"></i>
                                                <p class="fs-13 fw-semibold text-dark mb-1">Click or drag & drop to choose
                                                    a profile image</p>
                                                <small class="text-muted mb-2">Allowed formats: JPG, JPEG, PNG (Max
                                                    2MB)</small>
                                                <input type="file" class="form-control form-control-sm"
                                                    name="profile_image" style="max-width: 320px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Form Actions -->
                                <div
                                    class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-4 pt-3 border-top">
                                    <a href="{{ url('member/dashboard') }}"
                                        class="btn btn-light border px-4 py-2 fw-semibold" style="border-radius: 10px;">
                                        <i class="ti ti-arrow-left me-1"></i> Back to Dashboard
                                    </a>

                                    <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm"
                                        id="profile_button" style="border-radius: 10px;">
                                        <i class="ti ti-device-floppy me-1"></i> Update Profile
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
