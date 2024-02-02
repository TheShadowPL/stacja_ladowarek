<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Plug&Go - Twoje Źródło Energii</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loading-page/loading.css') }}">
</head>

@if (session('notification'))
    <x-notify :type="session('notification')['type']" :message="session('notification')['message']" />
@endif

<body>

    <script>
        $(document).ready(function() {
            $('.kurtyna').css({
                'opacity': 0
            })
            setTimeout(() => {
                $('.test').css({
                    'height': '0%'
                })
                $('.progress-bar').css({
                    'height': '100%'
                })
            }, 3000)

            window.location.href = "{{ route('chargers') }}";
        });
    </script>
    <div class="kurtyna"></div>
    <div class="battery">
        <div class="head"></div>
        <div class="outer-border">
            <div class="inner-border">
                <svg width="28" height="52" viewBox="0 0 28 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.5 31.25H2.54655C1.13811 31.25 0.433894 31.25 0.138967 30.7885C-0.15596 30.3269 0.139898 29.6879 0.731616 28.4098L13.0463 1.81006C13.4205 1.00182 13.6076 0.597696 13.8038 0.640915C14 0.684134 14 1.12946 14 2.02013V20.25C14 20.4857 14 20.6036 14.0732 20.6768C14.1465 20.75 14.2643 20.75 14.5 20.75H25.4535C26.8619 20.75 27.5661 20.75 27.8611 21.2115C28.156 21.6731 27.8601 22.3121 27.2684 23.5902L14.9538 50.1899C14.5796 50.9982 14.3925 51.4023 14.1962 51.3591C14 51.3159 14 50.8705 14 49.9799V31.75C14 31.5143 14 31.3964 13.9268 31.3232C13.8536 31.25 13.7357 31.25 13.5 31.25Z" fill="white" />
                </svg>
                <div class="test"></div>
                <div class="progress-bar"></div>
            </div>
        </div>
    </div>
</body>

</html>
