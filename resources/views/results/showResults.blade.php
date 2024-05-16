@extends('layouts.result')

@section('content')
    <div class="row">
        <div class="col-12 px-3 py-3">
            <h2 class="text-center">{{ $data['name'] }} Latest Results</h2>
            <h4 class="text-center">Draw Date: {{ date('Y-m-d', strtotime($data['results']['draw_date'])) }}</h4>
            <div class="container text-center">
                <p>
                    @foreach($data['results']['result']['regular_balls'] as $regular)
                        <span class="pr-2 result-ball">{{ $regular }}</span>
                    @endforeach
                    @foreach($data['results']['result']['bonus_balls'] as $bonus)
                        <span class="pr-2 result-ball bonus text-black">{{ $bonus }}</span>
                    @endforeach
                </p>
            </div>
        </div>
    </div>
@endsection
