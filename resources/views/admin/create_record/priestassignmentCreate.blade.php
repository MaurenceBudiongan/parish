<h2 class="h2">Priest Assignment</h2>

<div class="Create">
    <form action="{{ route('priests_assignments.store') }}" method="POST">
        @csrf

        <div>
            <label>Priest:</label>
            <select name="priest_id" required>
                <option value="">-- Select Priest --</option>
                @foreach ($priests as $priest)
                    <option value="{{ $priest->priest_id }}">{{ $priest->first_name }} {{ $priest->last_name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Assignment Type:</label>
            <input type="text" name="assignment_type" required>
        </div>

        <div>
            <label>Assignment Title:</label>
            <input type="text" name="assignment_title" required>
        </div>

        <div>
            <label>Location:</label>
            <input type="text" name="location" required>
        </div>

        <div>
            <label>Start Date:</label>
            <input type="date" name="start_date" id="start_date" min="1900-01-01" required>
        </div>

        <div>
            <label>End Date (optional):</label>
            <input type="date" name="end_date" id="end_date" min="1900-01-01">
        </div>

        <div>
            <label>Status:</label>
            <select name="status" required>
                <option value="Active">Active</option>
                <option value="Completed">Completed</option>
                <option value="Cancelled">Cancelled</option>
            </select>
        </div>

        <div>
            <label>Assigned By:</label>
            <input type="text" name="assigned_by" required>
        </div>

        <div>
            <label>Remarks:</label>
            <input type="text" name="remarks">
        </div>

        <button type="submit" onclick="return confirm('Save this priest assignment?')">Save Assignment</button>
    </form>
</div>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;600&display=swap");

    .Create {
        padding: 15px;
        background-color: var(--c-gray-600);
        border-radius: 10px;
        border-bottom: 10px;
        font-family: 'Be Vietnam Pro', sans-serif;
        height: 30rem;
        overflow-y: auto;
    }

    .h2 {
        margin-bottom: 20px;
    }

    form {
        position: relative;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .form-title {
        text-align: center;
        font-size: 28px;
        margin-bottom: 20px;
        color: #333;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: 600;
        color: var(--c-gray-200);
        font-size: 12px;
    }

    input[type="text"],
    input[type="number"],
    input[type="time"],
    textarea,
    select,
    input[type="date"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 6px;
        transition: 0.3s;
        font-size: 12px;
    }

    input[type="text"]:focus,
    input[type="date"]:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .Create form button {
        padding: 12px;
        background: #45FFBC;
        color: black;
        font-weight: bold;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 12px;
        transition: all 0.3s ease;
    }

    .Create form button:disabled {
        cursor: not-allowed !important;
    }

    .submit-loading-spinner {
        display: inline-block;
        width: 12px;
        height: 12px;
        border: 2px solid transparent;
        border-top: 2px solid #000;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin-right: 8px;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .submit-btn:hover {
        background: #0056b3;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Date validation for start and end dates
        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');
        
        // Update end date minimum when start date changes
        if (startDateInput && endDateInput) {
            startDateInput.addEventListener('change', function() {
                endDateInput.min = this.value;
            });
        }
        
        // Limit year to 4 digits for date inputs
        function limitYearInput(input) {
            input.addEventListener('input', function(e) {
                let value = e.target.value;
                // If value has more than 10 characters (YYYY-MM-DD), truncate it
                if (value.length > 10) {
                    e.target.value = value.substring(0, 10);
                }
                
                // Check if year part is more than 4 digits
                const parts = value.split('-');
                if (parts[0] && parts[0].length > 4) {
                    parts[0] = parts[0].substring(0, 4);
                    e.target.value = parts.join('-');
                }
            });
            
            input.addEventListener('keypress', function(e) {
                const value = e.target.value;
                const parts = value.split('-');
                
                // If we're in the year part and it's already 4 digits, prevent more input
                if (parts[0] && parts[0].length >= 4 && value.indexOf('-') === -1) {
                    if (e.key !== 'Backspace' && e.key !== 'Delete' && e.key !== 'Tab' && e.key !== 'ArrowLeft' && e.key !== 'ArrowRight') {
                        e.preventDefault();
                    }
                }
            });
        }
        
        // Apply year limitation to all date inputs
        if (startDateInput) limitYearInput(startDateInput);
        if (endDateInput) limitYearInput(endDateInput);
        
        // Date validation function
        function validateDates() {
            const startDate = new Date(startDateInput.value);
            const endDate = endDateInput.value ? new Date(endDateInput.value) : null;
            
            if (endDate && endDate < startDate) {
                alert('End date cannot be earlier than start date.');
                return false;
            }
            
            return true;
        }
        
        // Form submission loading
        const form = document.querySelector('form');
        const submitButton = document.querySelector('button[type="submit"]');
        
        if (form && submitButton) {
            form.addEventListener('submit', function(e) {
                // Validate dates first
                if (!validateDates()) {
                    e.preventDefault();
                    return;
                }
                
                // Only proceed if user confirmed
                if (confirm('Save this priest assignment?')) {
                    e.preventDefault(); // Prevent default to handle manually
                    
                    // Show loading state
                    submitButton.innerHTML = '<span class="submit-loading-spinner"></span>Saving...';
                    submitButton.disabled = true;
                    submitButton.style.opacity = '0.7';
                    submitButton.style.cursor = 'not-allowed';
                    
                    // Submit the form
                    setTimeout(() => {
                        form.submit();
                    }, 100);
                } else {
                    e.preventDefault(); // Cancel if user didn't confirm
                }
            });
            
            // Remove onclick from button since we're handling it in the event listener
            submitButton.removeAttribute('onclick');
        }
    });
</script>
