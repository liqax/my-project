@unless (request()->is('/'))
    <nav aria-label="breadcrumb" class="container mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าแรก</a></li>

            @php
                $segments = request()->segments();
            @endphp

            @foreach ($segments as $index => $segment)
                @php
                    $url = url(implode('/', array_slice($segments, 0, $index + 1)));
                    $name = ucwords(str_replace('-', ' ', $segment));
                @endphp

                @if ($loop->last)
                    <li class="breadcrumb-item active" aria-current="page">{{ $name }}</li>
                @else
                    <li class="breadcrumb-item"><a href="{{ $url }}">{{ $name }}</a></li>
                @endif
            @endforeach
        </ol>
    </nav>
@endunless