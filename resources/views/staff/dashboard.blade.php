<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Profile</title>
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
        <h1 class="page-title mb-4">Staff Profile</h1>

        @if (!$staff)
            <p>No staff data available.</p>
        @else
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card staff-card">
                        <div class="card-header text-center pt-4 pb-3">
                            <div class="profile-img-container mb-3">
                                @if ($staff->photo)
                                    <img src="{{ asset('storage/' . $staff->photo) }}" alt="Staff Photo"
                                        class="profile-img">
                                @else
                                    <img src="{{ asset('storage/default-profile.jpg') }}" alt="No Photo"
                                        class="profile-img">
                                @endif
                            </div>
                            <h5 class="staff-name">{{ $staff->first_name }} {{ $staff->last_name }}</h5>
                            <span class="position-badge">{{ $staff->position }}</span>
                            <span class="status-badge {{ $staff->status == 'Active' ? 'active' : 'inactive' }}">
                                {{ $staff->status }}
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="staff-details">
                                <div class="detail-row">
                                    <span class="detail-label"><i class="fas fa-id-card"></i> Staff ID:</span>
                                    <span class="detail-value">{{ $staff->staff_id }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label"><i class="fas fa-phone"></i> Phone:</span>
                                    <span class="detail-value">{{ $staff->phone }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label"><i class="fas fa-building"></i> Department:</span>
                                    <span class="detail-value">{{ $staff->department }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label"><i class="fas fa-home"></i> Address:</span>
                                    <span class="detail-value">{{ $staff->address }}</span>
                                </div>
                                @if($staff->date_hired)
                                <div class="detail-row">
                                    <span class="detail-label"><i class="fas fa-calendar-alt"></i> Date Hired:</span>
                                    <span class="detail-value">{{ \Carbon\Carbon::parse($staff->date_hired)->format('M d, Y') }}</span>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer bg-transparent text-end">
                            <div class="d-flex justify-content-between flex-wrap gap-2">
                                <div class="d-flex flex-wrap gap-2">
                                    @if(session('staff_logged_in') && session('staff_id') == $staff->id)
                                    <a href="{{ route('staff.edit', $staff) }}" class="btn btn-success btn-sm"
                                        onclick="return confirm('Are you sure you want to edit your profile?')">
                                        <i class="fas fa-edit me-1"></i> Edit Profile
                                    </a>
                                    @endif
                                    <a href="{{ route('mass.UserIndex') }}" class="btn btn-warning btn-sm"
                                        onclick="return confirm('Are you sure you want to View Mass/Service Schedule?')">
                                        <i class="fas fa-calendar-alt me-1"></i> View Mass/Service Schedule
                                    </a>
                                    <a href="{{ route('showEvent.showEvent') }}" class="btn btn-warning btn-sm"
                                        onclick="return confirm('Are you sure you want to View Event Announcement?')">
                                        <i class="fas fa-calendar-alt me-1"></i> View Event
                                    </a>
                                </div>

                                <form action="{{ route('staff.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to Sign Out?')">
                                        <i class="fas fa-sign-out-alt me-1"></i>Sign Out
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
