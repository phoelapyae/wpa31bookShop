@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h3 class="header-create">Add new book</h3>
        <div class="col-12">
            <form action="{{route('book.store')}}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" placeholder="Book title" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" name="price" id="price" placeholder="Book price in MMK" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pages">Page:</label>
                    <input type="number" name="page" id="page" placeholder="Enter book pages" class="form-control">
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
                    <label for="upload">Upload an image:</label>
                    <input type="file" name="picture_url" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="review">Make a book review:</label>
                    <textarea name="review" id="summary-ckeditor" placeholder="Make a book review"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save book</button>
            </form>
        </div>
    </div>
</div>
@endsection