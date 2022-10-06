@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div>
        <form action="{{route('admin.find_user')}}" method="GET">
            @csrf
            <input type="text" name="user_name" >
            <button type="submit" class="btn btn-danger">find</button>
        </form>
    </div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Prenom</th>
        <th scope="col">Email</th>
        <th scope="col">Matricule</th>
        <th scope="col">Class</th>
        <th scope="col">Adresse</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
        @php
            $i=1;
        @endphp
        @foreach ($users as $item)
        <tr>
            <th scope="row">{{$i++}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->profile->prenom}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->profile->matricule}}</td>
            <td>{{$item->profile->class}}</td>
            <td>{{$item->profile->adresse}}</td>
            <td>
                <form action="{{route('admin.delete_user')}}" method="GET">
                    @csrf
                    <button  type="submit" class="btn btn-labeled btn-danger">
                    <span class="btn-label"><i class="fa fa-trash"></i></span> Delete</button>
                    <input type="hidden" name="user_id" value="{{$item->id}}">

                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
    {!! $users->links('pagination::bootstrap-4') !!}
</div>
@endsection
