@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h1 > <strong>Welcome to the SkillUp <br/> Platform </strong> </h1>
            <p class="mt-4" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, odit. Delectus consectetur nam, facere aut, voluptas culpa hic excepturi, consequuntur cupiditate praesentium optio quaerat architecto obcaecati aperiam eveniet rerum magnam..</p>
            <button type="button" class="btn btn-warning mt-4">Show More</button>
        </div>
        <div class="col">
          <img src="images\bienvenue.png" class="mx-auto d-block" style="width:300px;" alt="">
        </div>
      </div>
</div>{{-- end Bienvenue  --}}



<div class="container mt-5">
    <h1 class="text-center display-6 mt-5 mb-5" style="
        font-size: 2rem;
        margin: 0;
        letter-spacing: 1rem;"><b>CATEGORIES</b></h1>
      <div class="row">
        <div class="col">
            <div class="cards-liste">
                <div class="carde 1">
                  <div class="card_imagee"> <img src="images\cards\ia.jpg" /> </div>
                  <div class="card_titlee title-whitee">
                    <p>IA</p>
                  </div>
                </div>
                </div>
        </div>
        <div class="col">
            <div class="cards-liste">
                <div class="carde 1">
                  <div class="card_imagee"> <img src="images\cards\web.png" /> </div>
                  <div class="card_titlee title-whitee">
                    <p>WEB</p>
                  </div>
                </div>
                </div>
        </div>
        <div class="col">
            <div class="cards-liste">
                <div class="carde 1">
                  <div class="card_imagee"> <img src="images\cards\cloud.jpg" /> </div>
                  <div class="card_titlee title-whitee">
                    <p>CLOUD</p>
                  </div>
                </div>
                </div>
        </div>
        <div class="col">
            <div class="cards-liste">
                <div class="carde 1">
                  <div class="card_imagee"> <img src="images\cards\mobile.png" /> </div>
                  <div class="card_titlee title-whitee">
                    <p>MOBILE</p>
                  </div>
                </div>
                </div>
        </div>
      </div>
    </div>
</div>{{--  end Categorie --}}


<div class="container mt-5">
    <h1 class="text-center display-6 mt-5 mb-5" style="
    font-size: 2rem;
    margin: 0;
    letter-spacing: 1rem;"> <b> LAST CERTIFICATES</b></h1>

<div class="row">
    @foreach ($certife as $item)
    <div class="col mb-5">
<figure class="snip1418"><img src="images\certife_image.jpg" alt="sample85"/>
    <figcaption>
      <h3>{{$item->title}}</h3>
      <p  style="width: 20ch;
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;">{{$item->description}}</p>
      <div class="price row">
          <div class="col"><p>{{$item->prix}} DT</p> </div>
          <div class="col"><a href="{{route('certificates.show',$item->id)}}" class="btn btn-primary float-end">Show</a></div>
      </div>
    </figcaption>
  </figure></div>
  @endforeach
    </div>
    </div>
</div>{{-- end Last certife --}}


<div class="container mt-5">
    <h1 class="text-center display-6 mt-5 mb-5" style="
    font-size: 2rem;
    margin: 0;
    letter-spacing: 1rem;"><b>POPULAR CERTIFICATE</b></h1>
    <div class="row">
        @foreach ($certife as $item)
    <div class="col mb-5">
<figure class="snip1418"><img src="images\certife_image.jpg" alt="sample85"/>
    <figcaption>
      <h3>{{$item->title}}</h3>
      <p style="width: 20ch;
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;">{{$item->description}}</p>
      <div class="price row">
          <div class="col"><p>{{$item->prix}} DT</p> </div>
          <div class="col"><a href="{{route('certificates.show',$item->id)}}" class="btn btn-primary float-end">Show</a></div>
      </div>
    </figcaption>
  </figure></div>
  @endforeach
    </div>
</div>{{-- end POPULAR CERTIFICATE --}}
<div>
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-muted">© 2021 Company, Inc</p>

            <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
              <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <ul class="nav col-md-4 justify-content-end">
              <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
              <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Profile</a></li>
              <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Certicates</a></li>
              <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
              <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
            </ul>
          </footer>
      </div>
</div>{{-- end footer --}}
@endsection


