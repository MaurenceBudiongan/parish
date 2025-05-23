<h2 class="h2">Marriage Record</h2>
<div class="Create">
    <form action="{{ route('marriage.store') }}" method="POST">
        @csrf
        <div>
            <label>Bride Full Name:</label>
            <input type="text" name="bride" required>
        </div>
        <div>
            <label>Groom Full Name:</label>
            <input type="text" name="groom" required>
        </div>
        <div>
            <label>Officiant (Priest):</label>
            <input type="text" name="officiant" required>
        </div>
        <div>
         <label>Date of Marriage:</label>
         <input type="date" name="marriage_date" required>
     </div>
        <button type="submit" onclick="return confirm('Save this Marriage record?')">Save Confirmation</button>
    </form>
</div>
<style>
    .Create {
        padding: 15px;
        background-color: var(--c-gray-600);
        border-radius: 10px;
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

    form button {
        width: 100%;
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

    form button:disabled {
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

    form button:hover {
        background: #3ee0ac;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Form submission loading
        const form = document.querySelector('form');
        const submitButton = document.querySelector('button[type="submit"]');
        
        if (form && submitButton) {
            form.addEventListener('submit', function(e) {
                // Only proceed if user confirmed
                if (confirm('Save this Marriage record?')) {
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
