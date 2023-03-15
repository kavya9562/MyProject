@extends('layout.master')
@section("title","POSTS")
<a class="btn btn-danger" href="{{route('logout')}}" role="button">LOGOUT</a>
</div>
@if(session() ->has('message'))
<p>{{session()->get('message')}}</p>
@endif
<table class="table .table-bordered">
  <thead>
    <tr>
      <th scope="col">Authors</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <td>{{$post->author}}</td>
      <td>{{$post->title}}</td>
      <td>{{$post->description}}</td>
      <td>{{$post->image}}</td>
      <td>@if ($post->trashed()) Trashed @else Active @endif</td>
      <td>@if($post->trashed())<a  class="btn btn-success" href="{{route('post.activate',encrypt($post->id))}}" role="button">ACTIVATE</a>@endif</td>
      <td><a class="btn btn-primary" href="{{route('post.edit',encrypt($post->id))}}" role="button">EDIT</a></td>
      <!---<td><a class="btn btn-primary" href="" role="button">DELETE</a></td>--->
      <td><a class="btn btn-danger" href="{{route('post.delete',encrypt($post->id))}}" type="button">DELETE</a></td>
      <td><a class="btn btn-info" href="{{route('post.force.delete',encrypt($post->id))}}" type="button">FORCE DELETE</a></td>
    </tr>
    </tr>
    @endforeach

  </tbody>
</table>

