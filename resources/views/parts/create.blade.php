@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new Style</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            @include('flash::message')
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul style="list-style: none">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                   {!! Form::open(['route' => 'create-part', 'method' => 'POST', 'files' => 'TRUE']) !!}
                        <div class="form-group">
                            {!! Form::label('Styles*') !!}
                            {!! Form::select('style_id', $styles, null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Name*') !!}
                            {!! Form::text('part_name', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Image*') !!}
                            {!! Form::file('image') !!}
                        </div>
                        <div>
                            {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                        </div>
                   {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
