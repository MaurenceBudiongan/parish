<h2 class="h2">Donation Record</h2>
<div class="Create">
    <form action="{{ route('donation.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="member_id">Member</label>
            <select name="member_id" id="member_id" required>
                <option value="">-- Select Member --</option>
                @foreach ($members as $member)
                    <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                        {{ $member->fullname }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="amount">Amount (₱) (if cash)</label>
            <input type="text" name="amount" step="0.01" id="amount" value="{{ old('amount') }}">
        </div>

        <div class="form-group">
            <label for="good">Goods  (if non-cash)</label>
            <input type="text" name="good" id="good" value="{{ old('good') }}" required>
        </div>

        <div class="form-group">
            <label for="donation_type">Donation Type</label>
            <input type="text" name="donation_type" id="donation_type" value="{{ old('donation_type') }}" required>
        </div>

        <div class="form-group">
            <label for="donation_date">Donation Date</label>
            <input type="date" name="donation_date" id="donation_date" min="1900-01-01" max="" value="{{ old('donation_date') }}" required>
        </div>

        <div class="form-group">
            <label for="payment_method">Payment Method</label>
            <input type="text" name="payment_method" id="payment_method" value="{{ old('payment_method') }}">
        </div>

        <div class="form-group">
            <label for="reference_no">Reference No</label>
            <input type="text" name="reference_no" id="reference_no" value="{{ old('reference_no') }}">
        </div>

        <div class="form-group">
            <label for="remarks">Remarks</label>
            <textarea name="remarks" id="remarks">{{ old('remarks') }}</textarea>
        </div>

        <button type="submit" class="submit-btn" onclick="return confirm('Save this donation record?')">Save
            Record</button>
    </form>
</div>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;600&display=swap");

    .Create {
        padding: 15px;
        background-color: var(--c-gray-600, #f0f0f0);
        border-radius: 10px;
        height: 30rem;
        overflow-y: auto;
        font-family: 'Be Vietnam Pro', sans-serif;
    }

    .h2 {
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    label {
        font-weight: 600;
        font-size: 12px;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="date"],
    input[type="number"],
    select,
    textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 12px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    textarea {
        resize: none;
        min-height: 80px;
    }

    input:focus,
    select:focus,
    textarea:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .submit-btn {
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

    .submit-btn:disabled {
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
        background: #3ee0ac;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Set max date to today
        const today = new Date().toISOString().split('T')[0];
        const donationDateInput = document.getElementById('donation_date');
        
        if (donationDateInput) {
            donationDateInput.max = today;
        }
        
        // Limit year to 4 digits for date input
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
        
        // Apply year limitation to date input
        if (donationDateInput) limitYearInput(donationDateInput);
        
        // Form submission loading
        const form = document.querySelector('form');
        const submitButton = document.querySelector('button[type="submit"]');
        
        if (form && submitButton) {
            form.addEventListener('submit', function(e) {
                // Only proceed if user confirmed
                if (confirm('Save this donation record?')) {
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
