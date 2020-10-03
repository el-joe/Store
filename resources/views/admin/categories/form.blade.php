@if(count($errors->all()) > 0)
<ul>
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
</ul>
<hr>
@endif


@csrf
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{isset($category) ? $category->name : ''}}" class="form-control" id="name" placeholder="Enter Name">
</div>
@isset($category)
    <img src="{{$category->avatar}}" alt="-" height="120" width="120">
@endisset
<div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control" id="image">
</div>

<button type="submit" class="btn btn-primary">Save</button>