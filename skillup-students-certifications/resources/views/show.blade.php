@extends('layouts.app')

@section('content')
<style>

</style>

<div class="container">
    <div class="card-product">

        <div class="img-product">
            <div class="slideshow-container">
                    <img src="..\..\images\certife_image.jpg" alt="nnn">
            </div>
            <br />
        </div>
        <div class="data-product">
             <h6>CERTIFICATE CODE #{{$certife->id}}</h6>
            <h1 class="fw-bold text-uppercase"> {{$certife->title}}</h1>

            <h3 class="badge bg-warning text-dark">{{$certife->levele}}</h3><br /><br />
            <h3>{{$certife->prix}} DT</h3>
            <div class="tab">
                <button class="tablinks" onclick="openData(event, 'description')" id="defaultOpen">DESCRIPTION</button>
                <button class="tablinks" onclick="openData(event, 'details')">DETAILS</button>

            </div>
            <div id="description" class="tabcontent">
                <p >{{$certife->description}}</p>
            </div>
            <div id="details" class="tabcontent">

            <p>#{{$certife->categorie}}</p>
            </div>
            <div class="cart">
                <div>
                @php
                    $like_count=0;
                    $dislike_count=0;
                    $like_status="btn-secondary";
                    $dislike_status="btn-secondary";
                @endphp
                @foreach ($certife->likes as $item)
                    @php

                        if($item->like ==1)
                        {
                            $like_count++;
                        }
                        if($item->like ==0)
                        {
                            $dislike_count++;
                        }
                        if ($item->like ==1 &&  $item->user_id == Auth::user()->id) {
                            $like_status="btn-success";
                        }
                        if ($item->like ==0 &&  $item->user_id == Auth::user()->id) {
                            $dislike_status="btn-danger";
                        }
                    @endphp

                @endforeach

                <a  data_like="{{$like_status}}"
                    data_certifcate_id="{{$certife->id}}_l"
                    class="btn  {{$like_status}} like">  <i class="fas fa-thumbs-up"></i>
                    <b><span class="like_count"> {{$like_count}} </span></b></a>
                <a  data_like="{{$like_status}}"
                    data_certifcate_id="{{$certife->id}}_d"
                    class="btn  {{$dislike_status}} dislike"> <i class="fas fa-thumbs-down"></i>
                    <b><span class="dislike_count"> {{$dislike_count}}</span></b></a>

    @if (Auth::user()->role == "admin")
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
       edite
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <form class="row g-3" method="POST" action="{{route('admin.update')}}">
                @csrf
                @method('PUT')
            <div class="mb-3">
                <label for="formGroupExampleInput">title</label>
                <input type="text" class="form-control" style="width: 150px" placeholder="title"  value="{{$certife->title}}" name="title">
              </div>
              <div class="mb-3">
                 <label for="inputState" class="form-label">categorie</label>
                     <select id="inputState" class="form-select" name="categorie" value="{{$certife->levele}}" >
                     <option>IA</option>
                     <option>WEB</option>
                     <option>CLOUDE</option>
                     <option>MOBILE</option>
                     </select>
              </div>
              <div class="mb-3">
                <label for="inputState" class="form-label">levele</label>
                    <select id="inputState" class="form-select" name="levele" value="{{$certife->levele}}">
                    <option value="beginner">beginner</option>
                    <option value="advanced">advanced</option>
                    <option>advanced</option>
                    </select>
             </div>
             <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">prix</label>
                <input type="number" class="form-control"  style="width: 100px" placeholder="prix" value="{{$certife->prix}}" name="prix">
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">description</label>
                <textarea type="text" class="form-control" name="description">{{$certife->description}}</textarea>
              </div>
              <div class="mb-3">
                  <input type="hidden" value="{{$certife->id}}" name="id">
                <button type="submit" class="btn btn-primary float-end">update</button>
              </div>
            </form>
        </div>
        </div>
    </div>
    @endif
            </div>
            </div>
            </div>

        </div>

        <!-- Contenedor Principal -->
	<div class="comments-container">
        <h1>Comentarios</h1>
        <ul class="comments-list reply-list">
            @foreach ($certife->comments as $item)
            <li>
                    <div class="comment-main-level">
                        <!-- Avatar -->
                        <div class="comment-avatar"><img src="..\..\{{$item->user->profile->image}}" alt=""></div>
                        <!-- Contenedor del Comentario -->
                        <div class="comment-box">
                            <div class="comment-head">
                                <h6 class="comment-name by-author">{{$item->user->name}}</h6>
                                @if (Auth::user()->id == $item->user_id )
                                <form action="{{route('comments.delete')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <button type="submit" style="background: none; color: inherit; border: none;"><i class="fas fa-trash-alt"></i></button>                                </form>
                                @endif

                            </div>
                            <div class="comment-content">
                                {{$item->description}}
                            </div>
                        </div>
                    </div>
                </li>
             @endforeach
        </ul>
                <form method="POST"action="{{route('comments.store')}}">
                    @csrf
                    <div class="form-group">
                        <textarea type="text" class="form-control" name="description"></textarea>
                        <input type="hidden" class="form-control" name="certificat_id" value="{{$certife->id}}">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 rounded-pill ">send</button>
                </form>
            </div>
        </div>

    </div>
<script>
</script>
@endsection
