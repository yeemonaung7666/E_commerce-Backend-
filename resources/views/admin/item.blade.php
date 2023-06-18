@extends('home')

@section('dashboard')

<h4>Item List</h4>

<div>
    @if(Session('successAlert'))
        <div class="alert alert-warning">
            {{Session('successAlert')}}
        </div>
    @endif
</div>

<div class="float-end mb-2">
    <a href="{{ url('Admin/addItem') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Items</a>
</div>




<table class="table table-hover ">
    <thead>
        <tr>
            
        </tr>
        <tr>
            <td>Action</td>
            <td>No.</td>
            <td>Item</td>
            <td>Category</td>
            <td>Description</td>
            <td>Price</td>
            <td>Owner</td>
            <td>Publish</td>
        </tr>
    </thead>
    <tbody>
        <?php $id=1;?>
        @foreach ($items as $item)
        <tr>
            <td>
                <div>
                    <a href="{{'/Admin/editItem/'.$item->id }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="{{'/Admin/deleteItem/'.$item->id }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </div>
            </td>
            <td>{{ $id }}</td>
            
            <td>{{ $item->item_name }}</td>
            <td>
                @foreach ($item->categories as $category)
                    {{ $category->name }}
                @endforeach
            </td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->price }}MMK</td>
            <td>{{ $item->owner_name }}</td>
            @if($item->publish == '1')
                <td class="text-badge">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                    </div>
                </td>
            @else
                <td class="text-badge">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                    </div>
                </td>
            @endif
        </tr>
        
        <?php $id++;?>
        @endforeach
        
        
        
        
    </tbody>
    
</table>

<div> Total entries = {{ $count }}  </div>
<div class="d-flex float-end">
    {{ $items->links() }}
</div>

{{-- <div>
   {{ $category_name }}
</div> --}}

@endsection
