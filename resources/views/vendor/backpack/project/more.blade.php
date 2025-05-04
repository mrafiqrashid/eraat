@extends(backpack_view('blank'))

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="text-center">
        <h1>{{ $title ?? 'Go to' }}</h1>

        {{-- @can('perform-action-1') --}}
        <a href="{{ backpack_url('action-1') }}" class="btn btn-success btn-lg m-2">
            Assessee
        </a>
        {{-- @endcan --}}

        {{-- @can('perform-action-2') --}}
        <a href="{{ backpack_url('action-2') }}" class="btn btn-success btn-lg m-2">
            Task
        </a>
        {{-- @endcan --}}
        <a href="{{ backpack_url('action-2') }}" class="btn btn-primary btn-lg m-2">
            Assessment
        </a>
    </div>
</div>
@endsection