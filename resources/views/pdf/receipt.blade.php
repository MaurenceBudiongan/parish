<!DOCTYPE html>
<html>

<head>
 <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            padding: 30px;
        }

        h2 {
            color: #2c3e50;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 10px;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <h2>{{ $title }}</h2>
    <p><strong>Reference:</strong>
        @if (isset($request->childName))
            {{ $request->baptismrequest_id }}
        @elseif(isset($request->confirmedName))
            {{ $request->confirmationrequest_id }}
        @elseif(isset($request->fullName))
            {{ $request->deathrequest_id }}
        @else
            {{ $request->marriagerequest_id }}
        @endif
    </p>
    <p><strong>Requester:</strong>
        @if (isset($request->childName))
            {{ $request->requester }}
        @elseif(isset($request->confirmedName))
            {{ $request->requester }}
        @elseif(isset($request->fullName))
            {{ $request->requester }}
        @else
            {{ $request->requester }}
        @endif
    </p>
    <p><strong>Name:</strong>
        @if (isset($request->childName))
            {{ $request->childName }}
        @elseif(isset($request->confirmedName))
            {{ $request->confirmedName }}
        @elseif(isset($request->fullName))
            {{ $request->fullName }}
        @else
            {{ $request->spouse1 }} & {{ $request->spouse2 }}
        @endif
    </p>
    <p><strong>Requested At:</strong> {{ $request->created_at->format('F j, Y, g:i a') }}</p>
    <p><strong>Status:</strong> {{ $request->status }}</p>

    <h3>Total Amount to Pay: ₱{{ $amount }}</h3>
    <p>Thank you for requesting your document. Please keep this receipt for reference.</p>
</body>

</html>
