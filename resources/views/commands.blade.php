@extends('app')

@section('board')

<div class="container">
    <div class="row">
        
        <div class="col-md-6">
            <p>
                Rover Direction: <span>{{ $planet->getRobot()->getDirection() }}</span>
            </p>
            <p>
                Rover Position: <span class="coordinate-x">{{ $planet->getRobot()->getCoordinateX() }} X</span>
                <span class="coordinate-y">{{ $planet->getRobot()->getCoordinateY() }} Y</span>
            </p>
            <p>
                Number of obstacles in planet: <span>{{ count($planet->getObstacles()) }}</span>
            </p>         
            
            <div class="input-group mt-5">
                <a href="{{ route('recoverSetUpRover') }}" class="btn btn-primary">Send a new command</a>
                <a href="{{ route('home') }}" class="btn btn-warning">Restart mission</a>
            </div>
        </div>
        <div class="col-md-6">
            @php
                $commandsValues = str_split(strtoupper($commands))
            @endphp

            @for ($i = 0; $i < count($commandsValues); $i++)
                <p>{{ __($commandsValues[$i]) }} --> {{ $movements[$i] }}</p>
            @endfor
        </div>
    </div>
</div>
@endsection