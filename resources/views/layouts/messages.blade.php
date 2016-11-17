@if(Session::has('flash_message'))

    <div class="container">

        @foreach(['success', 'info', 'warning', 'danger'] as $msg_type)

            @if(Session::has("flash_message_{$msg_type}"))
                <div class="alert alert-{{ $msg_type }}">{{Session::get("flash_message_{$msg_type}")}}</div>
            @endif

        @endforeach

    </div>

@endif