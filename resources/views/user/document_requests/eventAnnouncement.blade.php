<div class="container">
    <h1>Event Announcement Records</h1>

    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($events->isEmpty())
        <p class="no-schedule">No event announcements available.</p>
    @else
        <div class="schedule-grid">
            @foreach ($events as $event)
                <div class="schedule-card">
                    <div class="schedule-title">{{ $event->title }}</div>
                    <div class="schedule-meta">{{ $event->location }} | Audience: {{ $event->audience }}</div>

                    <div class="schedule-info">
                        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y') }}</p>
                        <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($event->start_time)->format('g:i A') }} -
                            {{ \Carbon\Carbon::parse($event->end_time)->format('g:i A') }}</p>
                        <p><strong>Status:</strong>
                            <span class="status {{ $event->status == 'Upcoming' ? 'status-active' : ($event->status == 'Ongoing' ? 'status-ongoing' : ($event->status == 'Completed' ? 'status-completed' : 'status-cancelled')) }}">
                                {{ $event->status }}
                            </span>
                        </p>
                    </div>

                    <div class="schedule-description">{{ $event->description }}</div>
                    <div class="schedule-notes"><strong>Announced By:</strong> {{ $event->announced_by }}</div>
                </div>
            @endforeach
        </div>
    @endif
</div>
<style>
    .container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
    }

    h1 {
        text-align: center;
        font-size: 36px;
        color: #2c3e50;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .alert-success {
        background-color: #d4edda;
        border-left: 5px solid #28a745;
        color: #155724;
        padding: 15px 20px;
        border-radius: 6px;
        margin-bottom: 30px;
        font-weight: 500;
    }

    .no-schedule {
        text-align: center;
        font-size: 18px;
        color: #6c757d;
        font-style: italic;
    }

    .schedule-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 4rem;
        padding: 40px;
        width: 70rem;
    }

    .schedule-card {
        background: #ffffff;
        border-radius: 15px;
        padding: 25px 20px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
        border-top: 4px solid #6c63ff;
    }

    .schedule-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    }

    .schedule-title {
        font-size: 24px;
        font-weight: 600;
        color: #6c63ff;
        margin-bottom: 5px;
    }

    .schedule-meta {
        font-size: 14px;
        color: #999;
        margin-bottom: 15px;
        font-style: italic;
    }

    .schedule-info p {
        margin: 6px 0;
        font-size: 15px;
    }

    .schedule-description {
        margin-top: 15px;
        font-size: 16px;
        color: #333;
    }

    .schedule-notes {
        margin-top: 15px;
        background: #f2f2f2;
        padding: 10px 15px;
        border-left: 4px solid #6c63ff;
        font-size: 14px;
        border-radius: 6px;
    }

    .status {
        font-weight: bold;
        padding: 3px 8px;
        border-radius: 12px;
        font-size: 13px;
    }

    .status-active {
        background-color: #e0f7e9;
        color: #28a745;
    }

    .status-ongoing {
        background-color: #fff3cd;
        color: #856404;
    }

    .status-completed {
        background-color: #d1ecf1;
        color: #0c5460;
    }

    .status-cancelled {
        background-color: #f8d7da;
        color: #721c24;
    }

    @media (max-width: 600px) {
        .schedule-grid {
            grid-template-columns: 1fr;
            padding: 20px;
            width: 100%;
        }

        h1 {
            font-size: 28px;
        }

        .schedule-card {
            padding: 20px 15px;
        }
    }
</style>
