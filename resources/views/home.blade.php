@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <a href="{{ route('add') }}" class="btn btn-primary btn-sm">Add image</a>
            <hr>

            @if(count($images) > 0)
                @foreach($images as $image)
                    <img class="card-img-top mb-1" src=" {{ url('repo/'.$image->image ) }} " >
                     <input type="checkbox" name="image_id" value="[]" class="form-check-input ml-2">
                     
                    <div class="form-group">
                        <form action="{{ route('delete',$image->id) }}" method="POST">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>

                @endforeach
            @else
              <p>You currently have no uploads</p>    
            @endif

        </div>
    </div>
</div>

@endsection
