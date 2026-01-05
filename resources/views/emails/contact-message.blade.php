<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Contact Message</title>
</head>
<body style="font-family: Arial, sans-serif">

    <h2>New Contact Message Received</h2>

    <p><strong>Name:</strong> {{ $contact->name }}</p>
    <p><strong>Phone:</strong> {{ $contact->phone }}</p>

    @if($contact->email)
        <p><strong>Email:</strong> {{ $contact->email }}</p>
    @endif

    <p><strong>Message:</strong></p>
    <p>{{ $contact->message }}</p>

    <hr>

    <p style="font-size:12px;color:#777">
        IP Address: {{ $contact->ip_address }} <br>
        Sent at: {{ $contact->created_at->format('d M Y, h:i A') }}
    </p>

</body>
</html>
