@extends('layouts.app')

@section('content')
<div class="container">

    <div class="  justify-content-center d-flex flex-column">
        <div class="row justify-content-between mb-3">
          <div class="col-3 block border-left-primary shadow d-flex align-items-center">
              <span style="font-size: 100px; color: #6495ED;"><i class="text-gray-200  fas fa-user-shield  icon text-center"></i></span>
              <div class="h-100 w-100 p-3">
                <div class="block-title lg-text text-primary mb-2">Admins</div>
                <div class="d-flex align-items-baseline justify-content-between w-100">
                  <div class="xxl-text text-gray-800"> {{$nb_admin}}</div>
                </div>
              </div>
            </div>
          <div class="col-3 block border-left-primary shadow d-flex align-items-center">
            <span style="font-size: 100px; color: #FFBF00;"><i class="text-gray-200  fas fa-users  icon text-center"></i></span>
            <div class="h-100 w-100 p-3">
              <div class="block-title lg-text text-primary mb-2">Users</div>
              <div class="d-flex align-items-baseline justify-content-between w-100">
                <div class="xxl-text text-gray-800"> {{$nb_user}}</div>
              </div>
            </div>
          </div>
          <div class="col-3 block border-left-primary shadow d-flex align-items-center">
              <span style="font-size: 100px; color: #FF7F50;"><i class="fas fa-coins"></i></span>
              <div class="h-100 w-100 p-3">
                <div class="block-title lg-text text-primary mb-2">Certificates</div>
                <div class="d-flex align-items-baseline justify-content-between w-100">
                  <div class="xxl-text text-gray-800">{{$nb_certife}}</div>

                </div>
              </div>
            </div>
        </div>


        <div class="row justify-content-between mb-3">
          <div class="col-3 block border-left-primary shadow d-flex align-items-center">
              <span style="font-size: 100px; color: #DE3163; "><i class="text-gray-200  fas fa-thumbs-up  icon text-center"></i></span>
              <div class="h-100 w-100 p-3">
                <div class="block-title lg-text text-primary mb-2">Likes</div>
                <div class="d-flex align-items-baseline justify-content-between w-100">
                  <div class="xxl-text text-gray-800">{{$nb_like}}</div>
                </div>
              </div>
            </div>
          <div class="col-3 block border-left-primary shadow d-flex align-items-center">
              <span style="font-size: 100px; color: #9FE2BF;"><i class="text-gray-200  fas fa-thumbs-down  icon text-center"></i></span>
            <div class="h-100 w-100 p-3">
              <div class="block-title lg-text text-primary mb-2">Dislikes</div>
              <div class="d-flex align-items-baseline justify-content-between w-100">
                <div class="xxl-text text-gray-800">{{$nb_dislike}}</div>

              </div>
            </div>
          </div>
          <div class="col-3 block border-left-primary shadow d-flex align-items-center">
              <span style="font-size: 100px; color: #DAF7A6; "><i class="text-gray-200  fas fa-comment  icon text-center"></i></span>
              <div class="h-100 w-100 p-3">
                <div class="block-title lg-text text-primary mb-2">Comment</div>
                <div class="d-flex align-items-baseline justify-content-between w-100">
                  <div class="xxl-text text-gray-800">{{$nb_comment}}</div>
                </div>
              </div>
            </div>
        </div>
      </div>




 <div class="mt-4">
    <div>
            <div>
                <a href="{{route('admin.dashboarde')}}" class="find-btn mt-4 " ><i class="fas fa-arrow-left"></i></a>
            </div>
    </div>
<table class="table mt-4">
    <thead class="table-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Prenom</th>
        <th scope="col">Email</th>
        <th scope="col">Matricule</th>
        <th scope="col">Class</th>
        <th scope="col">Adresse</th>
        <th scope="col">role</th>
        <th scope="col">Delete</th>
        <th scope="col">edite</th>
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
            <td>{{$item->role}}</td>
            <td>
                <form action="{{route('admin.delete_user')}}" method="GET">
                    @csrf
                    <button  type="submit" class="btn btn-labeled btn-danger">
                    <i class="fa fa-trash"></i> Delete</button>
                    <input type="hidden" name="user_id" value="{{$item->id}}">

                </form>
            </td>
            <td>

                    @if ($item->role == "admin")
                    <form action="{{route('admin.down')}}" method="POST">
                        @csrf
                    <button type="submit" class="btn  btn-warning " data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-arrow-down"></i> down
                     </button>
                    <input type="hidden" name="user_id" value="{{$item->id}}">
                    </form>
                    @endif

                    @if ($item->role == "user")
                    <form action="{{route('admin.up')}}" method="POST">
                        @csrf
                    <button  type="submit" class="btn btn-warning">
                        <i class="fas fa-arrow-up"></i> up</button>
                    <input type="hidden" name="user_id" value="{{$item->id}}">
                    </form>
                    @endif
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {!! $users->links('pagination::bootstrap-4') !!}
</div>
 </div>
</div>
@endsection
