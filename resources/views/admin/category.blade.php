@extends('home')

@section('dashboard')

<h4>Categories</h4>

<div>
    @if(Session('successAlert'))
        <div class="alert alert-warning">
            {{Session('successAlert')}}
        </div>
    @endif
</div>

<div class="float-end mb-2">
<a href="{{ url('Admin/addCategory') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Categories</a>
</div>
{{-- <form action="{{ url('Admin/rows') }}" method="POST" class="form-group"></form>
        <div class="mb-2 col-md-2" style="display: flex"> 
            <select class="form-select" aria-label="Default select example" name="rows" required >
                <option value="3" >3 Rows</option>
                <option value="5" >5 Rows</option>
                <option value="7" >7 Rows</option>
                <option value="10" >10 Rows</option>
            </select>
            
        </div>
        <button class="btn btn-info btn-sm" type="submit">Show</button>
    </form> --}}
<table class="table table-hover ">
    
    <thead>
        <tr>
            <td>Action</td>
            <td>No.</td>
            <td>Categories</td>
            <td>Photo</td>
            <td>Publish</td>
        </tr>
    </thead>

    {{-- <tbody></tbody>
    </table>   --}}
      <tbody>
        <?php $id=1?>
        @foreach ($categories as $category)
        <tr>
            <td>
                <div>
                    <a href="{{ 'editCategory/'.$category->id }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="{{'deleteCategory/'.$category->id }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </div>
            </td>
            <td>{{ $id }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <div class="image_form">
                    <img src="" alt="">
                    <img src="{{ url('storage/'.$category->image) }}" alt="">
                </div>
            </td>
            <td class="text-badge">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                    
                  </div>
            </td>
        </tr>
        <?php $id++?>
        @endforeach
        
    </tbody>
    
</table>

<div> Total entries = {{ $count }}  </div>
<div class="d-flex float-end">
    {{ $categories->links() }}
</div>
@endsection
