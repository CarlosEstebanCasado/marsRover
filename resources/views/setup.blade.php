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
            <form method="POST" action="{{ route('commands') }}">
                @csrf
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Commands sequence</span>
                      </div>
                    <input id="commands" type="text" name="commands" value="{{ old('commands') }}" class="form-control @error('commands') is-invalid @enderror"></input>
                    @error('commands')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Send commands</button>
                    </div>
                </div>
            </form>
            
            <div class="input-group mt-5">
                <a href="{{ route('home') }}" class="btn btn-warning">Restart mission</a>
            </div>
        </div>
    </div>
</div>
@endsection