<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
     integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" 
     crossorigin="anonymous" referrerpolicy="no-referrer"></script>    

    <style type="text/css">

   .div_center{
    text-align: center;
    margin: auto;
   }

   .book_label{
    font-size: 30px;
    font-weight: bold;
    padding: 30px;
    color: white;
   }

   .center{
    margin: auto;
    width: 50%;
    text-align: center;
    margin-top: 50px;
    border: 1px solid white;
   }

   th{
    background-color: skyblue;
    padding: 10px;
   }

   tr{
    border: 1px solid white;
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

                <div class="div_center">


                    <div>

                        @if (session()->has('message'))
                            
                        <div class="alert alert-success">

                            {{session()->get('message')}}

                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                        </div>
                        
                            
                        @endif

                    </div>


                    <h1 class="book_label">Add Bookshelve</h1>


                    <form action="{{url('add_bookshelve')}}" method="post">

                        @csrf

                        <span style="padding-right: 15px;">
                        <label>Bookshelve Name</label>
                        <input type="text" name="bookshelve" required>
                        </span>

                        <input class="btn btn-primary" type="submit" value="Add Bookshelve">


                    </form>

                    <div>

                        <table class="center">

                            <tr>
                                <th>Bookshelve Name</th>
                                <th>Action</th>
                            </tr>

                            @foreach ($bookshelves as $bookshelve)
                                
                            <tr>
                                <td>{{$bookshelve->name}}</td>
                                <td>

                                    <a onclick="confirmation(event)" class="btn btn-danger" href="{{url('shelve_delete',$bookshelve->id)}}">Delete</a>

                                </td>
                            </tr>

                            @endforeach
                          

                        </table>

                    </div>

                </div>


            </div>
        </div>
    </div>





    @include('admin.footer')

        <script type="text/javascript">
        
        function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);

  swal({
            title: "Are you sure to Delete this",
            text: "You will not be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })  

        .then((willCancel) => {
            if (willCancel) {

                window.location.href = urlToRedirect;


            }

        });


    }       
        
    </script>

   

  </body>
</html>