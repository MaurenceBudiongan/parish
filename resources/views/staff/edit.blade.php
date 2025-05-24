<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff - {{ $staff->first_name }} {{ $staff->last_name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
        }
        
        .page-title {
            font-weight: 600;
            color: #343a40;
            margin-bottom: 0.5rem;
        }
        
        .subtitle {
            color: #6c757d;
            margin-bottom: 2rem;
        }
        
        .form-card {
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.07);
            border: none;
        }
        
        .card-header {
            background-color: #28a745;
            color: white;
            border-radius: 12px 12px 0 0 !important;
            padding: 1.25rem 1.5rem;
            border-bottom: none;
        }
        
        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 0.5rem;
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 0.6rem 0.75rem;
            transition: all 0.2s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #28a745;
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.15);
        }
        
        .image-preview-container {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid #e9ecef;
            margin: 1rem auto;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .image-preview {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .placeholder-icon {
            font-size: 4rem;
            color: #ced4da;
        }
        
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            border-radius: 8px;
            padding: 0.6rem 1.5rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.2);
        }
        
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            border-radius: 8px;
            padding: 0.6rem 1.5rem;
            font-weight: 500;
        }
        
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #5a6268;
        }
        
        .form-section-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #28a745;
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid #e9ecef;
        }
        
        .required-field::after {
            content: '*';
            color: #dc3545;
            margin-left: 4px;
        }
        
        .success-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .success-message {
            background-color: white;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transform: translateY(20px);
            transition: all 0.3s ease;
        }
        
        .success-icon {
            font-size: 4rem;
            color: #28a745;
            margin-bottom: 1rem;
        }
        
        .show-success {
            opacity: 1;
            visibility: visible;
        }
        
        .show-success .success-message {
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('staff.index') }}">Staff</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit {{ $staff->first_name }} {{ $staff->last_name }}</li>
                    </ol>
                </nav>
                <h1 class="page-title">Edit Staff Member</h1>
                <p class="subtitle">Update the information for {{ $staff->first_name }} {{ $staff->last_name }}.</p>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card form-card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-user-edit me-2"></i>Update Staff Information</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('staff.update', $staff) }}" method="POST" enctype="multipart/form-data" id="staffForm">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <!-- Left Column with Photo Upload -->
                        <div class="col-md-3 mb-4 mb-md-0">
                            <div class="text-center">
                                <div class="image-preview-container" id="imagePreviewContainer">
                                    @if ($staff->photo)
                                        <img src="{{ asset('storage/' . $staff->photo) }}" alt="Profile Photo" class="image-preview" id="imagePreview">
                                    @else
                                        <i class="fas fa-user placeholder-icon" id="placeholderIcon"></i>
                                        <img src="#" alt="Profile Preview" class="image-preview" id="imagePreview" style="display: none;">
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="photo" class="form-label d-block">Profile Photo</label>
                                    <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
                                    <div class="form-text">Leave empty to keep current photo. Max 2MB</div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column with Form Fields -->
                        <div class="col-md-9">
                            <div class="form-section-title">Personal Information</div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name" class="form-label required-field">First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $staff->first_name) }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="last_name" class="form-label required-field">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $staff->last_name) }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label required-field">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $staff->email) }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label required-field">Phone Number</label>
                                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $staff->phone) }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="address" class="form-label required-field">Address</label>
                                    <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $staff->address) }}" required>
                                </div>
                            </div>

                            <div class="form-section-title mt-4">Employment Information</div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="position" class="form-label required-field">Position</label>
                                    <input type="text" name="position" id="position" class="form-control" value="{{ old('position', $staff->position) }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="department" class="form-label required-field">Department</label>
                                    <input type="text" name="department" id="department" class="form-control" value="{{ old('department', $staff->department) }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="status" class="form-label required-field">Status</label>
                                    <select name="status" id="status" class="form-select" required>
                                        <option value="">Select Status</option>
                                        <option value="Active" {{ old('status', $staff->status) == 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Inactive" {{ old('status', $staff->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="date_hired" class="form-label">Date Hired</label>
                                    <input type="date" name="date_hired" id="date_hired" class="form-control" value="{{ old('date_hired', $staff->date_hired) }}">
                                </div>
                            </div>

                            <!-- Hidden field to maintain staff_id -->
                            <input type="hidden" name="staff_id" value="{{ $staff->staff_id }}">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12 text-end">
                            <a href="{{ route('staff.index') }}" class="btn btn-secondary me-2">
                                <i class="fas fa-times me-1"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-success" id="submitBtn" onclick="return confirm('Update this staff record?')">
                                <i class="fas fa-save me-1"></i> Update Staff
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Success Message Overlay -->
    <div class="success-overlay" id="successOverlay" 
        @if(session('success')) data-has-success="true" @endif
        data-redirect-url="{{ route('staff.index') }}">
        <div class="success-message">
            <i class="fas fa-check-circle success-icon"></i>
            <h3>Staff Updated Successfully!</h3>
            <p>The staff profile has been updated successfully.</p>
            <div class="mt-4">
                <a href="{{ route('staff.index') }}" class="btn btn-success">
                    <i class="fas fa-list me-1"></i> View All Staff
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Profile Image Preview
        document.addEventListener('DOMContentLoaded', function () {
            const photoInput = document.getElementById('photo');
            const imagePreview = document.getElementById('imagePreview');
            const placeholderIcon = document.getElementById('placeholderIcon');
            const successOverlay = document.getElementById('successOverlay');
            
            // Image preview functionality
            photoInput.addEventListener('change', function(e) {
                if (e.target.files.length > 0) {
                    const file = e.target.files[0];
                    const url = URL.createObjectURL(file);
                    imagePreview.src = url;
                    imagePreview.style.display = 'block';
                    if (placeholderIcon) {
                        placeholderIcon.style.display = 'none';
                    }
                }
            });
            
            // Check for success message using data attribute
            if (successOverlay.getAttribute('data-has-success') === 'true') {
                setTimeout(function() {
                    successOverlay.classList.add('show-success');
                    
                    // Auto redirect after 3 seconds
                    setTimeout(function() {
                        window.location.href = successOverlay.getAttribute('data-redirect-url');
                    }, 3000);
                }, 500);
            }
        });
    </script>
</body>
</html> 