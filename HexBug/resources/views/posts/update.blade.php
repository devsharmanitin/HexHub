@extends('layouts.app')
@section('content')

    <form method="post" action="{{route('updateBlogdb', ['id' => $post->id])}}" enctype="multipart/form-data">
        @csrf
        @method('put')



           
                <input type="text"  name="post_title" class="card-title form-control"value="{{$post->post_title}}">

                <input type="text" name="post_content" class="card-text form-control" value="{{$post->post_content}}">

                <input type="text"  name="post_desc" class="card-text form-control" value="{{$post->post_desc}}">
     
              
         
<br>
                @foreach ($post->images as $image)
                
                    
                      
                       

                        <input type="hidden" name="imageid{{ $loop->iteration }}" value="{{ $image->id }}">
                        <input type="file" name="image{{ $loop->iteration }}" id="" class="form-control" value="{{ $image->url }}">
                        <input type="text" name="image_desc{{ $loop->iteration }}" class="card-text form-control" value="{{ $image->desc }}">
<br>
                @endforeach
    


            <button type="submit">Submit</button>
    </form>




@endsection