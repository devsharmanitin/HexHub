@extends('layouts.app')
@section('content')


    <form method="post" action="{{ route('createblogdb') }}" class="mx-4 mt-4" enctype="multipart/form-data">
        @csrf
           <input type="text" name="post_title" id="" placeholder="Title Here ">
           <input type="text" name="post_content" id="" placeholder="Content Here ">
           <input type="text" name="post_desc" id="" placeholder="Desc Here ">
           <input type="file" name="url" id="" placeholder="Image Here "  accept="image/*">
           <input type="text" name="desc" id="" placeholder="Descc Here ">

        <div class="row">

            <button type="submit" class="btn btn-primary btn-block mb-4 w-25">Create Blog</button>
        </div>
            <!-- Submit button -->
    </form>






@endsection