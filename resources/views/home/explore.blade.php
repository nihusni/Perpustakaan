<!DOCTYPE html>
<html lang="en">

  <head>

    <base href="/public">

    @include('home.css')

  </head>

<body>

  @include('home.header')

  
  <div class="currently-market">
    <div class="container">
      <div class="row">
  
        
        @if(session()->has('message'))
  
        <div class="alert alert-success">
  
  
        {{session()->get('message')}}
  
        <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">x</button>
  
        </div>
  
        @endif
  
  
       
        <div class="col-lg-6-6" style="margin-top: 100px;">
          <div class="filters">
            <ul>
              <li data-filter="*"  class="active">All Books</li>
              
              @foreach ($categories as $category)
                  
                <li>
                    
                   <a href="{{url('cat_search',$category->id)}}">  {{$category->cat_title}}</a>
                
                </li>

              @endforeach
              
            </ul>
          </div>
        </div>


        <form action="{{url('search')}}" method="get">

            @csrf

        <div class="row" style="margin: 40px">


                <div class="col-md-8">
                    
                    <input class="form-control" type="search" name="search" placeholder="Search for book title , auther name">

                </div>

                <div class="col-md-4">

                    <input class="btn btn-primary" type="submit" value="Search">

                </div>

          

        </div>

        </form>
        



       
        @foreach ($books as $book)
                  
  
        <div class="col-lg-6 currently-market-item all msc">
          <div class="item">
            <div class="left-image">
              <img src="book/{{$book->book_img}}" alt="" style="border-radius: 20px; min-width: 195px;">
            </div>
            
            <div class="right-content">
              <h3>{{$book->title}}</h3>
              <br>
  
              <span class="author">
                <img src="auther/{{$book->auther_img}}" alt="" style="max-width: 50px; border-radius: 50%;">
                
                <h6>{{$book->auther_name}}</h6>
              </span>
  
              <div class="line-dec"></div>
              <span class="bid">
                ISBN:<br><strong>{{$book->isbn}}</strong><br> 
              </span>
  
              <div class="line-dec"></div>
              <span class="bid">
                Bookshelve:<br><strong>{{$book->bookshelve->name}}</strong><br> 
              </span>
  
              <div class="line-dec"></div>
              <span class="bid">
                Page:<br><strong>{{$book->price}}</strong><br> 
              </span>
  
              <div class="line-dec"></div>
              <span class="bid">
                Quantity:<br><strong>{{$book->quantity}}</strong><br> 
              </span>
  
              <div class="text-button">
               <h4>Descripsion:
                <br>
                <br>
                {{ $book->description}} </h4>
              </div>
  
                <br>
              <div class="">
                <a class="btn btn-primary" href="{{url ('borrow_books', $book->id)}}">Apply to Borrow</a>
              </div>
            </div>
          </div>
        </div>
        
        @endforeach
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 



  @include('home.footer')

  </body>
</html>