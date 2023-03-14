@extends('layout.master')
@section("title","POSTS")
<div class="col-md-12 bg-light text-right">
<td><a class="btn btn-warning" href="{{route('user.user_profile')}}" role="button">MY PROFILE</a></td>
<td><a class="btn btn-success" href="{{route('post.my_posts')}}" role="button">MY POSTS</a></td>
<td><a class="btn btn-secondary" href="{{route('Emails.send_mail')}}" role="button">SEND MAIL</a></td>
<a class="btn btn-primary" href="{{route('post.add')}}" role="button">CREATE POSTS</a>
<a class="btn btn-danger" href="{{route('logout')}}" role="button">LOGOUT</a>
</div>
@if(session() ->has('message'))
<p>{{session()->get('message')}}</p>
@endif
<h2>Welcome {{auth()->user()->name}}</h2>
<table class="table .table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Author</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
      <th scope="col">#</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <!--<th scope="row">{{$loop->iteration}}</th>-->
      <th scope="row">{{$posts->firstItem() +$loop->index}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->description}}</td>
      <td>{{$post->author}}</td>
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
{{$posts->links()}}
