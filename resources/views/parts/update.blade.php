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
                   {!! Form::model($style, ['route' => ['update-style', 'id' => $style->id], 'method' => "PUT"]) !!}
                        <div class="form-group">
                            {!! Form::label('Name *', 'Enter style name') !!}
                            {!! Form::text('style_name', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Name *', 'Enter style name') !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>
                        <div>
                            {!! Form::submit('update', ['class' => 'btn btn-primary']) !!}
                        </div>
                   {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
