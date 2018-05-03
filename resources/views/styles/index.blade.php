@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List of Styles</div>

                <div class="card-body">
                   <div class="row justify-content-center">
                      <div class="col-md-8">
                        @include('flash::message')
                      </div>
                   </div>
                   <div class="row">
                     <div class="col-md-12 float-right">
                        <a href="{{ url('/styles/create') }}" class="btn btn-primary btn-md">Add Style</a>
                     </div>
                   </div>
                   <br/>
                   @if (count($styles) > 0)
                    <div> 
                      <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Parts</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($styles as $style)
                            <tr>
                              <th scope="row"><a href="{{ url('/styles', $style->id) }}">{{ $style->id }}</a></th>
                              <td>{{ $style->style_name }}</td>
                              <td colspan="1">{{ $style->description }}</td>
                              <td></td>
                              <td>
                                <a href="{{ route('style-update-form', ['id' => $style->id]) }}" class="btn btn-primary btn-sm">Update</a>
                                {!! Form::open(['route' => ['delete-style', $style->id], 'method' => "DELETE", 'onsubmit' => "return confirm('Are you sure')" ]) !!}
                                  {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                   @else
                    <p>No available style</p>
                   @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
