@extends('layouts.app')

@section('content')

<div >
    <div class="container bg-warning  rounded d-flex ">
        <div class="p-2 flex-fill bd-highlight">
            <div class="d-flex flex-column bd-highlight mb-3">
                <div class="p-2 bd-highlight">
                    <h1 class="card-title">Why PolyCertife!</h1>
                    <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
                <div class="p-2 bd-highlight">
                    <button type="button" class="btn btn-dark">Learn more </button>
                </div>
              </div>
        </div>
        <div class="p-2 flex-fill bd-highlight">
            <img src="images\poly_logo.png" class="img-fluid" alt="Responsive image">
        </div>
    </div>
</div>{{-- end top card --}}


{{-- create  --}}
<div class="container ">
    @if (Auth::user()->role == "admin")
    <button type="button" class="create-btn mt-4 " data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #DE3163 ">
        Create new certificate
     </button>
     <!-- Modal -->
     <div class="modal fade" id="exampleModal"   tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" >
         <div class="modal-content " style="height: 450px">
             <form class="row g-3 container" method="POST"  action="{{route('admin.store_certife')}}">
                 @csrf
                 @method('PUT')
             <div >

                 <input type="text" class="form-control mt-5" id="formGroupExampleInput" placeholder="Title" name="title">
               </div>
               <div >

                      <select id="inputState" class="form-select" name="categorie">
                      <option selected>IA</option>
                      <option>WEB</option>
                      <option>CLOUD</option>
                      <option>MOBILE</option>
                      </select>
               </div>
               <div >

                     <select id="inputState" class="form-select" name="levele">
                     <option selected>beginner</option>
                     <option>medium</option>
                     <option>advanced</option>
                     </select>
              </div>
              <div >

                 <input type="number" class="form-control " id="formGroupExampleInput2" placeholder="Prix" name="prix">
               </div>
               <div >

                 <textarea type="text" class="form-control" name="description" placeholder="Description"></textarea>
               </div>
               <div >
                 <button type="submit" class="btn btn-primary float-end">create</button>
               </div>
             </form>
         </div>
         </div>
     </div>
 </form>
@endif</div>
{{-- end create --}}


<div class="container mt-5">
    <h3 class="text-center display-6 mt-5 mb-5" style="color: #7A7A7A;">WEB</h3>
    <div class="row">
        @foreach ($certife as $item)
        @if ($item->categorie =="WEB")
<div class="col ">
<figure class="snip1418"><img src="images\certife_image.jpg" alt="sample85"/>
<div>
  </div>
<figcaption>
    <div class="row">
        <div class="col"><h3>{{$item->title}}</h3></div>
        <div class="col">
        @if (Auth::user()->role == "admin")
        <form action="{{route('certificates.delete',$item->id)}}" method="POST">
            @csrf
            <div class="float-end">
                <button type="submit" style="background: none; color: inherit; border: none;"><span style="color: #F26175; font-size: 30px; "><i class="fas fa-minus-circle"></i></span></button>
            </div>
        </form>
        @endif</div>
    </div>

  <p style="width: 20ch;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;" >{{$item->description}}</p>
  <div class="price row">
    @if (Auth::user()->role == "admin")
      <div class="col"><p>{{$item->prix}} DT</p> </div>
      <form action="{{route('certificates.delete',$item->id)}}" method="POST">
        @csrf
      <div class="col"><a href="{{route('certificates.show',$item->id)}}" class="btn btn-primary float-end">Show</a></div>
    </form>
    @endif
  </div>
</figcaption>
</figure></div>
@endif
@endforeach
    </div>
</div>{{-- end mobile --}}

<div class="container mt-5">
    <h3 class="text-center display-6 mt-5 mb-5" style="color: #7A7A7A;">IA</h3>
    <div class="row">
        @foreach ($certife as $item)
        @if ($item->categorie =="IA")
<div class="col ">
<figure class="snip1418"><img src="images\certife_image.jpg" alt="sample85"/>
<div>
  </div>
<figcaption>
    <div class="row">
        <div class="col"><h3>{{$item->title}}</h3></div>
        <div class="col">
        @if (Auth::user()->role == "admin")
        <form action="{{route('certificates.delete',$item->id)}}" method="POST">
            @csrf
            <div class="float-end">
                <button type="submit" style="background: none; color: inherit; border: none;"><span style="color: #F26175; font-size: 30px; "><i class="fas fa-minus-circle"></i></span></button>
            </div>
        </form>
        @endif</div>
    </div>

  <p style="width: 20ch;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;" >{{$item->description}}</p>
  <div class="price row">
    @if (Auth::user()->role == "admin")
      <div class="col"><p>{{$item->prix}} DT</p> </div>
      <form action="{{route('certificates.delete',$item->id)}}" method="POST">
        @csrf
      <div class="col"><a href="{{route('certificates.show',$item->id)}}" class="btn btn-primary float-end">Show</a></div>
    </form>
    @endif
  </div>
</figcaption>
</figure></div>
@endif
@endforeach
    </div>
</div>{{-- end IA --}}

<div class="container mt-5">
    <h3 class="text-center display-6 mt-5 mb-5" style="color: #7A7A7A;">CLOUD</h3>
    <div class="row">
        @foreach ($certife as $item)
        @if ($item->categorie =="CLOUD")
<div class="col ">
<figure class="snip1418"><img src="images\certife_image.jpg" alt="sample85"/>
<div>
  </div>
<figcaption>
    <div class="row">
        <div class="col"><h3>{{$item->title}}</h3></div>
        <div class="col">
        @if (Auth::user()->role == "admin")
        <form action="{{route('certificates.delete',$item->id)}}" method="POST">
            @csrf
            <div class="float-end">
                <button type="submit" style="background: none; color: inherit; border: none;"><span style="color: #F26175; font-size: 30px; "><i class="fas fa-minus-circle"></i></span></button>
            </div>
        </form>
        @endif</div>
    </div>

  <p style="width: 20ch;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;" >{{$item->description}}</p>
  <div class="price row">
    @if (Auth::user()->role == "admin")
      <div class="col"><p>{{$item->prix}} DT</p> </div>
      <form action="{{route('certificates.delete',$item->id)}}" method="POST">
        @csrf
      <div class="col"><a href="{{route('certificates.show',$item->id)}}" class="btn btn-primary float-end">Show</a></div>
    </form>
    @endif
  </div>
</figcaption>
</figure></div>
@endif
@endforeach
    </div>
</div>{{-- end CLOUD --}}



<div class="container mt-5">
    <h3 class="text-center display-6 mt-5 mb-5" style="color: #7A7A7A;">MOBILE</h3>
    <div class="row">
        @foreach ($certife as $item)
        @if ($item->categorie =="MOBILE")
<div class="col ">
<figure class="snip1418"><img src="images\certife_image.jpg" alt="sample85"/>
<div>
  </div>
<figcaption>
    <div class="row">
        <div class="col"><h3>{{$item->title}}</h3></div>
        <div class="col">
        @if (Auth::user()->role == "admin")
        <form action="{{route('certificates.delete',$item->id)}}" method="POST">
            @csrf
            <div class="float-end">
                <button type="submit" style="background: none; color: inherit; border: none;"><span style="color: #F26175; font-size: 30px; "><i class="fas fa-minus-circle"></i></span></button>
            </div>
        </form>
        @endif</div>
    </div>

  <p style="width: 20ch;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;" >{{$item->description}}</p>
  <div class="price row">
    @if (Auth::user()->role == "admin")
      <div class="col"><p>{{$item->prix}} DT</p> </div>
      <form action="{{route('certificates.delete',$item->id)}}" method="POST">
        @csrf
      <div class="col"><a href="{{route('certificates.show',$item->id)}}" class="btn btn-primary float-end">Show</a></div>
    </form>
    @endif
  </div>
</figcaption>
</figure></div>
@endif
@endforeach
    </div>
</div>{{-- end MOBILE --}}
@endsection
