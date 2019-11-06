<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Yajra\Datatables\Datatables;
use App\Book;
use App\Author;
use App\Category;
use App\Publisher;
use Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('backend.books.index');
    }

    public function anyData()
    {
        $model = Book::query();
        return \DataTables::eloquent($model)
        ->addColumn('author', function (Book $book) {
            $data = Author::select('authorname')->where('id', $book->author_id)->first();
            return $data['authorname'];
        }) 
        ->addColumn('category', function (Book $book) {
            $data = Category::select('categoryname')->where('id', $book->category_id)->first();
            return $data['categoryname'];
        })
        ->addColumn('publisher', function (Book $book) {
            $data = Publisher::select('publishername')->where('id', $book->publisher_id)->first();
            return $data['publishername'];
        })
        ->addColumn('option', function(Book $book) {
           return view("backend.books.option", compact("book"));
        })
        ->rawColumns(['option'])
        ->toJson();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(Auth::user()->hasPermission('create-product')){
            $authors = Author::pluck('authorname','id');
            $categories = Category::pluck('categoryname','id');
            $publishers = Publisher::pluck('publishername','id');
            return view('backend.books.create',compact('authors','categories','publishers'));
        }else{
            $request->session()->flash('alert-danger','Sorry, you dont have permission to create new item.');
            return redirect()->route('book.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'price' => 'required|min:3',
            'review' => 'required|min:10',
            'author_id' => 'required',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'price' => 'required',
            'page' => 'required|min:3'
        ]);

        $photo = $request->file('picture_url');
        $extension = $photo->getClientOriginalExtension();
        Storage::disk('public')->put($photo->getFilename().'.'.$extension, File::get($photo));

        $book = new Book();
        $book->title = $request->title;
        $book->price = $request->price;
        $book->review =$request->review;
        $book->author_id = $request->author_id;
        $book->category_id = $request->category_id;
        $book->publisher_id = $request->publisher_id;
        $book->page = $request->page;

        $book->mime = $photo->getClientMimeType();
        $book->original_filename = $photo->getClientOriginalName();
        $book->filename = $photo->getFilename().'.'.$extension;
 
        $book->save();
        $request->session()->flash('alert-success','New book called '.$book->title.' was created successfully.');
        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if(Auth::user()->hasPermission('update-product')){
            $book = Book::findOrFail($id);
            $authors = Author::pluck('authorname','id');
            $categories = Category::pluck('categoryname','id');
            $publishers = Publisher::pluck('publishername','id');
            return view('backend.books.edit',compact('book','authors','categories','publishers'));
        }else{
            $request->session()->flash('alert-danger','Sorry, you dont have permission to edit this item.');
            return redirect()->route('book.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'price' => 'required|min:3',
            'review' => 'required|min:10',
            'author_id' => 'required',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'page' => 'required'
        ]);
        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->price = $request->price;
        $book->review =$request->review;
        $book->author_id = $request->author_id;
        $book->category_id = $request->category_id;
        $book->publisher_id = $request->publisher_id;
        $book->page = $request->page;
        $book->save();
        $request->session()->flash('alert-info','Current book was updated successfully.');
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(Auth::user()->hasPermission('delete-product')){
            Book::findOrFail($id)->delete();
            $request->session()->flash('alert-danger','Book was deleted sucessfully.');
        }else{
            $request->session()->flash('alert-danger','Sorry you dont have permission to delete this item.');
        }
        return redirect()->route('book.index');
    }
}
