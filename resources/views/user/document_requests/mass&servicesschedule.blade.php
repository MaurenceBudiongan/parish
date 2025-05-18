<div class="container">
    <h1>Mass & Service Schedule</h1>

    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($schedules->isEmpty())
        <p class="no-schedule">No schedules found.</p>
    @else
        <div class="schedule-grid">
            @foreach ($schedules as $schedule)
                <div class="schedule-card">
                    <div class="schedule-title">{{ $schedule->title }}</div>
                    <div class="schedule-meta">{{ $schedule->service_type }} | {{ $schedule->location }}</div>

                    <div class="schedule-info">
                        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($schedule->date)->format('F j, Y') }}</p>
                        <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($schedule->start_time)->format('g:i A') }} -
                            {{ \Carbon\Carbon::parse($schedule->end_time)->format('g:i A') }}</p>
                        <p><strong>Status:</strong>
                            <span
                                class="status {{ $schedule->status == 'Active' ? 'status-active' : 'status-inactive' }}">
                                {{ $schedule->status }}
                            </span>
                        </p>
                    </div>

                    <div class="schedule-description">{{ $schedule->description }}</div>

                    @if ($schedule->notes)
                        <div class="schedule-notes"><strong>Notes:</strong> {{ $schedule->notes }}</div>
                    @endif
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

    .container h1 {
        text-align: center;
        font-size: 36px;
        color: #2c3e50;
        margin-bottom: 40px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .container .alert-success {
        background-color: #d4edda;
        border-left: 5px solid #28a745;
        color: #155724;
        padding: 15px 20px;
        border-radius: 6px;
        margin-bottom: 30px;
        font-weight: 500;
    }

    .container .no-schedule {
        text-align: center;
        font-size: 18px;
        color: #6c757d;
        font-style: italic;
    }

    .container .schedule-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 4rem;
        padding: 40px;
        width: 70rem;
    }

    .container .schedule-card {
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

    .container .schedule-title {
        font-size: 24px;
        font-weight: 600;
        color: #6c63ff;
        margin-bottom: 5px;
    }

    .container .schedule-meta {
        font-size: 14px;
        color: #999;
        margin-bottom: 15px;
        font-style: italic;
    }

    .container .schedule-info p {
        margin: 6px 0;
        font-size: 15px;
    }

    .container .schedule-info strong {
        color: #2c3e50;
    }

    .container .schedule-description {
        margin-top: 15px;
        font-size: 16px;
        color: #333;
    }

    .container .schedule-notes {
        margin-top: 15px;
        background: #f2f2f2;
        padding: 10px 15px;
        border-left: 4px solid #6c63ff;
        font-size: 14px;
        border-radius: 6px;
    }

    .container .status {
        font-weight: bold;
        padding: 3px 8px;
        border-radius: 12px;
        font-size: 13px;
    }

    .container .status-active {
        background-color: #e0f7e9;
        color: #28a745;
    }

    .container .status-inactive {
        background-color: #fde2e2;
        color: #dc3545;
    }

    @media (max-width: 600px) {
        h1 {
            font-size: 28px;
        }

        .container .schedule-card {
            padding: 20px 15px;
        }
    }
</style>
