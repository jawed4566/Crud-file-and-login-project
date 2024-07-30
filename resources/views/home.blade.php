@extends('layouts.master')

@section('content')
<div class="card col-md-6 mx-auto">
    <form @if (isset($device)) action="{{ route('update', ['id' => $device->id]) }}" @else action="/save" @endif method="post">
        @csrf
        @if (isset($device))
            @method('PUT')
        @endif
        <div class="row p-4">
            <div class="col-md-10">
                <div class="form-group">
                    <label for="device"><h2>Device</h2></label>
                    <input type="text" @if (isset($device)) value="{{ $device->device }}" @endif name="device" placeholder="Enter your device" class="form-control">
                    @error('device')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-success mt-5">Save</button>
            </div>
        </div>
    </form>
    <div class="row m-5">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Device</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($devices as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->device }}</td>
                        <td>
                            <a href="{{route('delete' , ['id' => $item->id])}}">Delete</a> | 
                            <a href="{{ route('edit', ['id' => $item->id]) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
