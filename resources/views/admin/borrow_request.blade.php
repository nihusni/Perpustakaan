<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
    
    
    .center{
        text-align: center;
        margin: auto;
        width: 90%;
        border: 1px solid white;
        margin-top: 60px;
    }

    th{
        background-color: skyblue;
        text-align: center;
        color: white;
        font-size: 15px;
        font-weight: bold;
        padding: 10px;
    }
    
    
    
    </style>



  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">


            <table class="center">

                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Isbn</th>
                    <th>Book Title</th>
                    <th>Quantity</th>
                    <th>Bookshelve</th>
                    <th>Borrow Status</th>
                    <th>Book Image</th>
                    <th>Change Status</th>
                </tr>


                @foreach ($data as $data)
                    
                <tr>
                    <td>{{$data->user->name}}</td>
                    <td>{{$data->user->email}}</td>
                    <td>{{$data->user->phone}}</td>

                    <td>{{$data->book->isbn}}</td>
                    <td>{{$data->book->title}}</td>
                    <td>{{$data->book->quantity}}</td>
                    <td>{{$data->book->bookshelve->name}}</td>

                    <td>

                        @if ($data->status == 'Approved')
                            
                        <span style="color: rgb(205, 214, 30);">{{$data->status}}</span>

                        @endif

                        @if ($data->status == 'Rejected')
                            
                        <span style="color: rgb(206, 14, 14);">{{$data->status}}</span>

                        @endif

                        @if ($data->status == 'Returned')
                            
                        <span style="color: skyblue;">{{$data->status}}</span>

                        @endif

                        @if ($data->status == 'Applied')
                            
                        <span style="color: rgb(248, 248, 248);">{{$data->status}}</span>

                        @endif

                    </td>

                    <td>

                    <img style="height: 130px; width:90px; " src="book/{{$data->book->book_img}}">

                    </td>

                    <td>

                        <a class="btn btn-warning" href="{{url('approve_book',$data->id)}}">Approved</a>

                        <a class="btn btn-info" href="{{url('return_book',$data->id)}}">Returned</a>

                    </td>

                </tr>

                @endforeach



            </table>




            </div>
        </div>
    </div>



       @include('admin.footer')
  </body>
</html>