@props(['type', 'message'])

<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        border: none;
        font-family: "Poppins", sans-serif;
        font-size: 14px;
    }

    body {
        background-color: #f9f9f9;
    }

    .wrapper {
        width: 380px;
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
    }

    .toast {
        width: 100%;
        height: 80px;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 7px;
        display: grid;
        grid-template-columns: 1.3fr 6fr 0.5fr;
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
    }

    .success {
        border-left: 8px solid #47D764;
    }

    .error {
        border-left: 8px solid #ff355b;
    }

    .info {
        border-left: 8px solid #2F86EB;
    }

    .warning {
        border-left: 8px solid #FFC021;
    }

    .error i {
        color: #ff355b;
    }

    .info i {
        color: #2F86EB;
    }

    .warning i {
        color: #FFC021;
    }

    .toast:not(:last-child) {
        margin-bottom: 50px;
    }

    .container-1,
    .container-2 {
        align-self: center;
    }

    .container-1 i {
        font-size: 35px;
    }

    .success i {
        color: #47D764;
    }

    .container-2 p:first-child {
        color: #101020;
        font-weight: 600;
        font-size: 16px;
    }

    .container-2 p:last-child {
        font-size: 12px;
        font-weight: 400;
        color: #656565;
    }

    .toast button {
        align-self: flex-start;
        background-color: transparent;
        font-size: 25px;
        color: #656565;
        line-height: 0;
        cursor: pointer;
    }
</style>

@if ($type != null && $message != null)
    <div class="wrapper">
        <div class="toast {{ $type }}" id="toast">
            <div class="container-1">
                <h1> {{$type, $message}}</h1>
                @if ($type == 'success')
                    <i class="fas fa-check-circle"></i>
                @elseif ($type == 'error')
                    <i class="fas fa-times-circle"></i>
                @elseif ($type == 'info')
                    <i class="fas fa-info-circle"></i>
                @elseif ($type == 'warning')
                    <i class="fas fa-exclamation-circle"></i>
                @endif
            </div>
            <div class="container-2">
                <p>{{ ucfirst($type) }}</p>
                <p>{{ $message }}</p>
            </div>
            <button id="closeButton">&times;</button>
        </div>
    </div>

    <script>
        document.getElementById('closeButton').addEventListener('click', function() {
            document.getElementById('toast').style.display = 'none';
        });
    </script>
@endif
