<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Directory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .page-title {
            color: #343a40;
            font-weight: 600;
            font-size: 1.8rem;
            margin-bottom: 0;
        }

        .alert {
            border-radius: 8px;
            border-left: 4px solid #28a745;
        }

        .staff-card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
        }

        .staff-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .profile-img-container {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto;
            border: 5px solid #fff;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            background-color: #f8f9fa;
        }

        .profile-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .profile-img-container:hover .profile-img {
            transform: scale(1.05);
        }

        .staff-name {
            font-weight: 600;
            color: #343a40;
            margin-bottom: 0.5rem;
        }

        .position-badge {
            display: inline-block;
            background-color: #4361ee;
            color: white;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.3rem 0.75rem;
            border-radius: 20px;
            margin-right: 0.5rem;
        }

        .status-badge {
            display: inline-block;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.3rem 0.75rem;
            border-radius: 20px;
        }

        .status-badge.active {
            background-color: #d4edda;
            color: #155724;
        }

        .status-badge.inactive {
            background-color: #f8d7da;
            color: #721c24;
        }

        .staff-details {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px dashed #e9ecef;
            padding-bottom: 0.5rem;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            color: #6c757d;
            font-weight: 500;
            font-size: 0.85rem;
        }

        .detail-label i {
            width: 18px;
            margin-right: 4px;
            color: #4361ee;
        }

        .detail-value {
            font-weight: 500;
            color: #343a40;
        }

        .card-footer {
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1rem;
        }

        .btn-primary {
            background-color: #4361ee;
            border-color: #4361ee;
        }

        .btn-primary:hover {
            background-color: #3a56d5;
            border-color: #3a56d5;
        }

        .btn-sm {
            border-radius: 6px;
            padding: 0.4rem 0.8rem;
            font-size: 0.85rem;
        }

        .empty-state {
            padding: 2rem;
            background-color: #f8f9fa;
            border-radius: 10px;
            display: inline-block;
        }

        .empty-state i {
            color: #dee2e6;
        }
    </style>
</head>

<body>
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="page-title">Staff Directory</h1>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            @forelse($staff as $person)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card staff-card h-100">
                        <div class="card-header text-center pt-4 pb-3">
                            <div class="profile-img-container mb-3">
                                @if ($person->photo)
                                    <img src="{{ asset('storage/' . $person->photo) }}" alt="Staff Photo" class="profile-img">
                                @else
                                    <img src="{{ asset('storage/default-profile.jpg') }}" alt="Default Profile" class="profile-img">
                                @endif
                            </div>
                            <h5 class="staff-name">{{ $person->first_name }} {{ $person->last_name }}</h5>
                            <span class="position-badge">{{ $person->position }}</span>
                            <span class="status-badge {{ $person->status == 'Active' ? 'active' : 'inactive' }}">
                                {{ $person->status }}
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="staff-details">
                                <div class="detail-row">
                                    <span class="detail-label"><i class="fas fa-id-card"></i> Staff ID:</span>
                                    <span class="detail-value">{{ $person->staff_id }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label"><i class="fas fa-phone"></i> Phone:</span>
                                    <span class="detail-value">{{ $person->phone }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label"><i class="fas fa-building"></i> Department:</span>
                                    <span class="detail-value">{{ $person->department }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label"><i class="fas fa-home"></i> Address:</span>
                                    <span class="detail-value">{{ $person->address }}</span>
                                </div>
                                @if($person->date_hired)
                                <div class="detail-row">
                                    <span class="detail-label"><i class="fas fa-calendar-alt"></i> Date Hired:</span>
                                    <span class="detail-value">{{ \Carbon\Carbon::parse($person->date_hired)->format('M d, Y') }}</span>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer bg-transparent">
                            <div class="d-flex justify-content-between">
                                @if(session('admin_logged_in') || (session('staff_logged_in') && session('staff_id') == $person->id))
                                <a href="{{ route('staff.edit', $person) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit me-1"></i> Edit
                                </a>
                                @else
                                <div></div> <!-- Empty div to maintain layout -->
                                @endif
                                
                                @if(session('admin_logged_in'))
                                <form action="{{ route('staff.destroy', $person) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this staff member?')">
                                        <i class="fas fa-trash me-1"></i> Delete
                                    </button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="empty-state">
                        <i class="fas fa-users fa-4x mb-3 text-muted"></i>
                        <h4>No Staff Profiles Found</h4>
                        <p class="text-muted">Click "Add New Staff" to create your first staff profile.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>