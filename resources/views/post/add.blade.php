
<div class="container">
<form action="{{ route('post.save') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label>Title</label>
    <input type="text" name="title"placeholder="Add Title">
  </div>
  <div class="form-group">
    <label>Description</label>
    <input type="text" name="description" placeholder="Add Description">
  </div>
  <div class="form-group">
    <label>Author</label>
    <input type="text" name="author" placeholder="Add Author">
  </div>
  <div class="form-group">
                <label class="form-label" for="inputImage">Image:</label>
                <input type="file" name="images">
  </div>           
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>