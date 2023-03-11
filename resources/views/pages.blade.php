@extends('layouts.main')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">{{$title}}</h6>
                </div>
            </div>
        </div>
        <div class="card-body px-4 pt-0 pb-2">
            <p>{{$content}}</p>
        </div>
    </div>
@endsection

{{--@push("pages-scripts")--}}
{{--    <script src="{{ url("js/pages.js") }}"></script>--}}
{{--@endpush--}}
