@extends('layouts.app')

@section('title')Edit @endsection

@section('content')
<form method="POST" action="{{ route('posts.update') }}">
    @csrf
    <input type="hidden" name="id" value={{ $post['id'] }} class="form-control" id="exampleFormControlInput1">
    <div class="mb-3">
        <label  class="form-label">Title</label>
        <input type="text" name="title" value={{ $post['title'] }} class="form-control" id="exampleFormControlInput1">
    </div>
    <div class="mb-3">
        <label  class="form-label">Description</label>
        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $post['description'] }}</textarea>
    </div>
    <div class="mb-3">
        <label  class="form-label">Post Creator</label>
        <select name="creator" value={{ $post['post_creator'] }} class="form-control">
            <option value="{{ $post['post_creator'] }}" selected hidden>{{ $post['post_creator'] }}</option>
            <option value="Ahmed">Ahmed</option>
            <option value="Ashraf">Ashraf</option>
            <option value="Ibrahim">Ibrahim</option>
        </select>
    <!-- <input type="text" class="form-control" name="creator">  -->
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection