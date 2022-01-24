@extends('app')

@section('home')

<div class="mt-8 bg-white overflow-hidden shadow sm:rounded-lg">
    <form method="POST" action="{{ route('setUpRover') }}">
        @csrf
        <div class="container">
            <div class="row">                
                <div class="col-6 p-4">
                    <div class="flex items-center">
                        <div class="ml-4 text-lg leading-7 font-semibold">Rover direction</div>
                    </div>

                    <div class="mt-4 ml-4">
                        <div class="form-row">
                            <div class="col-8 ml-3">
                                <label for="direction">Direction</label>
                                <select id="direction" class="form-control" name="direction">
                                    @foreach ($directions as $direction )
                                        <option value="{{ $direction }}">{{ $direction }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 p-4">
                    <div class="flex items-center">
                        <div class="ml-4 text-lg leading-7 font-semibold">Initial position</div>
                    </div>

                    <div class="ml-4">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="coordinatex">Coordinate X</label>
                                <input id="coordinatex" type="number" name="coordinatex" value="{{ old('coordinatex') }}" class="form-control @error('coordinatex') is-invalid @enderror"></input>
                                @error('coordinatex')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="coordinatey">Coordinate Y</label>
                                <input id="coordinatey" type="number" name="coordinatey" value="{{ old('coordinatey') }}" class="form-control  @error('coordinatey') is-invalid @enderror"></input>
                                @error('coordinatey')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 ml-12">
                    <p>The planet has a size of 200x200, so the coordinates can be setted only from 0 to 200</p>
                </div>
                <div class="col-12 p-4">
                    <div class="ml-12">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                            <button type="submit" class="btn btn-primary">Set Up Rover</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection