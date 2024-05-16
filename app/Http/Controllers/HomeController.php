<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;

use App\Models\Borrow;

use App\Models\Category;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {

        $books = Book::all();

        return view('home.index',compact('books'));
    }


    public function borrow_books($id)
    {

        $books = Book::find($id);

        $book_id = $id;

        $quantity = $books->quantity;

       if($quantity >= '1')
       
       {

        if (Auth::id()) 
        
        {
          
            $user_id = Auth::user()->id;

            $borrow = new borrow;

            $borrow->book_id = $book_id;

            $borrow->user_id = $user_id;

            $borrow->status = 'Applied';


            $borrow->save();

            return redirect()->back()->with('message',
            'Request to send  admin to borrow this book');

        }


        else
        {
            return redirect('/login');
        }




        }

       else
       {

        return redirect()->back()->with('message','Not Book Avaliable');

       }



    }

    public function book_history()
    {

        if(Auth::id())
        {

            $userid = Auth::user()->id;

            $data = Borrow::where('user_id','=',$userid)->get();


            return view('home.book_history',compact('data'));

        }


    }

    public function cancel_req($id)
    {

        $data = Borrow::find($id);

        $data->delete();

        return redirect()->back()->with('message','Book Borrow Request Cancel Successfully');

    }

    public function explore()
    {

        $categories = Category::all();

        $books = Book::all();

        return view('home.explore',compact('books','categories'));


    }

    public function search(Request $request)
    {

        $categories = Category::all();

        $search = $request->search;

        $books = Book::where('title','LIKE','%'.$search.'%')->orWhere('auther_name','LIKE','%'.$search.'%')->get();

        return view('home.explore',compact('books','categories'));
    
    }

    public function cat_search($id)
    {

        $categories = Category::all();

        $books = Book::where('category_id',$id)->get();

        
        return view('home.explore',compact('books','categories'));

    }

}
