
<div class="container">
<form action="{{ route('post.update') }}" method="post" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="id" value="{{encrypt($post->id)}}">
  <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" value="{{$post->title}}" placeholder="Add Title">
  </div>
  <div class="form-group">
    <label>Description</label>
    <input type="text" name="description"value="{{$post->description}}" placeholder="Add Description">
  </div>
  <div class="form-group">
    <label>Author</label>
    <input type="text" name="author"value="{{$post->author}}" placeholder="Add Author">
  </div>
  <div class="form-group">
                <label class="form-label" for="inputImage">Image:</label>
                <input type="file" value="{{$post->images}}"name="images">
  </div>           
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>