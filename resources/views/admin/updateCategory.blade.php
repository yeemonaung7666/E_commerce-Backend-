@extends('home')

@section('dashboard')

<h6 class="mb-3">Categories List >> <span>Add Categories</span></h6>
<div class="container bg-light">
    <div class="row">
        <div class=" col-md-12 mb-3 title ">
            <h3>Add Categories</h3>
        </div>
    </div>
    <div class="row">
        <form action="{{ url('Admin/updateCategory/'.$category->id) }}" enctype="multipart/form-data" class="form-group" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="c_name" required>Category Name </label>
                        <input type="text" class="form-control" name="c_name" id="c_name" value="{{ $category->name }}">
                    </div>
    
                    <div class="mb-3">
                        <label for="" required>Category Photo</label>
                        <div><i class="small">Recommended Size 400 * 200</i></div>
                        <div class="form-group">
                            <div class="image_addForm">
                                <input type="file" class="form-control-file btn btn-light " id="image" name="image" value="{{ $category->image }}">
                            </div>
                            
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="publish"> Status</label>
                        <div class="form-check ">
                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="publish" checked required>
                            <label class="form-check-label" for="flexCheckChecked">
                            Publish
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary float-end mb-5 mx-4">Save</button>
                            <button  class="btn btn-secondary float-end mx-4">Cancel</button>
                            
                        </div>
                    </div>  
                </div>
            </div>
            
            
        </form>
        
    </div>
    
@endsection
