@extends('layouts.app')

@section('content')
<div class="container">
<form class="row g-3" method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row p-0 mt-5">
        <div class="col">
            <img src="{{$user->profile->image}}" class="img-thumbnail rounded float-start" style="width:200px;" alt="...">
        </div>
        <div class="col-10 p-0">
            <div >
            <label for="inputEmail4" class="form-label">Nom</label>
            <input type="text" class="form-control" id="inputEmail4" name="name" value="{{$user->name}}">
          </div>
          <div>
            <label for="inputPassword4" class="form-label">Prenom</label>
            <input type="text" class="form-control"  id="inputPassword4" name="prenom" value="{{$user->profile->prenom}}">
          </div>
        </div>
    </div>


      <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Email</label>
        <input type="email" class="form-control"  id="inputPassword4" name="email" value="{{$user->email}}">
      </div>
      <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Matricule</label>
        <input type="text" class="form-control"  id="inputPassword4" name="matricule" value="{{$user->profile->matricule}}">
      </div>
      <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Class</label>
        <input type="text" class="form-control"  id="inputPassword4" name="class" value="{{$user->profile->class}}">
      </div>
      <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Cdresse</label>
        <input type="text" class="form-control"  id="inputPassword4" name="adresse" value="{{$user->profile->adresse}}">
      </div>
      <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Phone</label>
        <input type="text" class="form-control"  id="inputPassword4" name="phone" value="{{$user->profile->phone}}">
      </div>
      <div class="col-md-6">
            <label for="formFile" class="form-label">Image</label>
            <input class="form-control" type="file" id="formFile" name="image">
      </div>


    <div class="col-12">
      <button type="submit" class="btn btn-primary float-end">update</button>
    </div>
  </form>
</div>{{--  end container --}}
  @endsection
