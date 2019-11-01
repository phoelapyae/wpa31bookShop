@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h3 class="header-edit">Update current book</h3>
        <div class="col-12">
            <form action="{{route('book.update',$book->id)}}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf 
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" placeholder="Book title" value="{{$book->title}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" name="price" id="price" placeholder="Book price in MMK" value="{{$book->price}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="page">Pages:</label>
                    <input type="number" name="page" id="page" placeholder="Enter book's page" value="{{$book->page}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category">Choose category:</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach($categories as $key=>$category){
                            <option value="{{$key}}">
                                {{$category}}
                            </option>
                        }
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="author">Choose author:</label>
                    <select name="author_id" id="author_id" class="form-control">
                        @foreach($authors as $key=>$author){
                            <option value="{{$key}}">
                                {{$author}}
                            </option>
                        }
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="publisher">Choose publisher:</label>
                    <select name="publisher_id" id="publisher_id" class="form-control">
                        @foreach($publishers as $key=>$publisher){
                            <option value="{{$key}}">
                                {{$publisher}}
                            </option>
                        }
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="review">Make a book review:</label>
                    <textarea name="review" id="summary-ckeditor" placeholder="Make a book review">{{$book->review}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
</div>
@endsection