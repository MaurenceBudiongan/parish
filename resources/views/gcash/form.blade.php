<form method="POST" action="{{ route('gcash.pay') }}">
 @csrf
 <label for="amount">Amount (PHP):</label>
 <input type="number" name="amount" required>
 <button type="submit">Pay with GCash</button>
</form>
