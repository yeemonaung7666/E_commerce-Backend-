@extends('home')

@section('dashboard')

<h6 class="mb-3">Item List >> <span>Add Items</span></h6>
<div class="container">
    <div class="row">
        <div class=" col-md-12 mb-3 title ">
            <h3>Add Items</h3>
        </div>
    </div>
    <div class="row">
        <form action="{{ url('Admin/item/addItem') }}"  class="form-group" method="POST">
            @csrf
            <div class="row">
                {{-- Item Information --}}
                <div class="col-md-6 ">
                    <h4>Item Information</h4>
                    <div class="mb-3">
                        <label for="item_name" required>Item Name <span class="text-danger">*</span></label>
                        <input type="text" name="item_name" class="form-control" id="item_name" required>
                        @error('item_name')
                         <div class="invalid-feedback">{{ $message }}</div>
                         @enderror                        
                    </div>
    
                    <div class="mb-3">
                        <label for="" >Category <span class="text-danger">*</span></label>
                        <select class="form-select" aria-label="Default select example" name="categories" required>
                            <option selected>Select Category</option>
                            @foreach ( $categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="mb-3">
                        <label for="price" required>Price <span class="text-danger">*</span> </label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
    
                    <div class="mb-3">
                        <label for="description" required>Description <span class="text-danger">*</span></label>
                        <textarea id="description" name="description" cols="20" rows="5" class="form-control" required></textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="" id="condition" required>Select Item Condition </label>
                        <select class="form-select" aria-label="Default select example" name="condition" id="condition" >
                            <option selected>Select Item Condition</option>
                            <option value="New">New</option>
                            <option value="Good Second Hand">Good Second Hand</option>
                            {{-- @foreach ($categories->items as $i_name)
                                <option value="1">{{ $i_name->item_name }}</option>
                            @endforeach --}}
                        </select>
                    </div>
    
                    <div class="mb-3">
                        <label for="type"  required>Select Item Type</label>
                        <select class="form-select" aria-label="Default select example" name="type" id="type" >
                            <option selected>Select Item Type</option>
                            <option value="For Sell">For Sell</option>
                            <option value="For Buy">For Buy</option>
                            <option value="For Exchange">For Exchange</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="image" required>Item Photo</label>
                        <div><i class="small">Recommended Size 400 * 200</i></div>
                        <div class="form-group">
                            <div class="image_addForm">
                                <input type="file" class="form-control-file btn btn-light " id="image" name="image">
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="publish"> Status</label>
                        <div class="form-check ">
                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked public" name="publish" id="publish"  checked>
                            <label class="form-check-label" for="flexCheckChecked" >
                            Publish
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Owner Information --}}
                <div class="col-md-6">
                    <h4>Owner Information</h4>
                    <div class="mb-3">
                        <label for="owner_name" required>Owner Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="owner_name" id="owner_name" required>
                    </div>
        
                    <div class="mb-3">
                        <label for="phone_number">Contact Number</label>
                        <div class="input-group mb-3">
                            <select class="form-select px-4" name="country_code" >
                                <option selected>+95  <span>(Myanmar)</span></option>
                                <option value="+65">+65 (Japan)</option>
                                <option value="+88">+88 (India)</option>
                                <option value="+93">+93 (Thailand)</option>
                            </select>
                            <input type="number" class="form-control" aria-label="Text input with dropdown button" name="phone_number" required>
                          </div>
                    </div>
    
                    <div class="mb-3">
                        <label for="address" required>Address </label>
                        <textarea name="address" id="address" cols="20" rows="5" class="form-control" required></textarea>
                    </div>
    
                </div>
            </div>
            <button type="submit" class="btn btn-primary float-end mb-5 mx-4">Save</button>
            <button  class="btn btn-secondary float-end mx-4">Cancel</button>         
        </form>
        
    </div>
    
@endsection