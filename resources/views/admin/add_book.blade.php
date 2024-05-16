<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
    
    .div_center{
        text-align: center;
        margin: auto;
    }
    
    .title_deg{
        color: white;
        padding: 35px;
        font-size: 40px;
        font-weight: bold;
    }

    label{

        display: inline-block;
        width: 200px;
    }
    
    .div_pad{
        padding: 15px;
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

                <h1 class="title_deg">Add Books</h1>

                <form action="{{url('store_book')}}" method="Post" enctype="multipart/form-data">

                    @csrf

                    <div class="div_pad">
                        <label>ISBN</label>
                        <input type="text" name="isbn">
                    </div>

                    <div class="div_pad">
                        <label>Book Title</label>
                        <input type="text" name="book_name">
                    </div>

                    <div class="div_pad">
                        <label>Auther name</label>
                        <input type="text" name="auther_name">
                    </div>

                    <div class="div_pad">
                        <label>Page</label>
                        <input type="text" name="price">
                    </div>

                    <div class="div_pad">
                        <label>Quantity</label>
                        <input type="number" name="quantity">
                    </div>

                    <div class="div_pad">
                        <label>Description</label>
                     <textarea name="description"></textarea>
                    </div>

                    <div class="div_pad">
                        <label>Category</label>
                     
                        <select name="category" required>

                            <option>Select a Category</option>
                            @foreach ($categories as $category)
                                
                            <option value="{{ $category['id'] }}">{{ $category['cat_title'] }}</option>

                            @endforeach
                        </select>

                        <div class="div_pad">
                            <label>Bookshelve</label>
                         
                            <select name="bookshelve" required>
    
                                <option>Select a bookshelve</option>
                                @foreach ($bookshelves as $bookshelve)
                                
                            <option value="{{ $bookshelve['id'] }}">{{ $bookshelve['name'] }}</option>

                            @endforeach
                            </select>
    


                    </div>

                    <div class="div_pad">
                        <label>Book Image</label>
                        <input type="file" name="book_img">
                    </div>

                    <div class="div_pad">
                        <label>Auther image</label>
                        <input type="file" name="auther_img">
                    </div>
                    
                    <div class="div_pad">

                        <input type="submit" name="Add Book" class="btn btn-warning">
                    </div>



                </form>

            </div>


            </div>

        </div>
        
    </div>





       @include('admin.footer')
  </body>
</html>