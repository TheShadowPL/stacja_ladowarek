<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Plug&Go - Twoje Źródło Energii</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>

@if ($notification['type'] == null)
@else
    <x-notify :type="$notification['type']" :message="$notification['message']" />
@endif

<script>
    $(document).ready(function() {
        setTimeout(function() {
            window.location.href = "{{ route('chargers') }}";
        }, 3000);
    });
</script>


</body>

</html>