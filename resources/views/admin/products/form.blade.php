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
    <input type="text" name="name" value="{{isset($product) ? $product->name : ''}}" class="form-control" id="name" placeholder="Enter Name">
</div>
<div class="form-group">
    <label for="price">Price</label>
    <input type="number" name="price" value="{{isset($product) ? $product->price : ''}}" class="form-control" id="price" placeholder="Enter Price">
</div>
<div class="form-group">
    <label for="Description">Description</label>
    <textarea name="description" class="form-control" id="Description" cols="30" rows="10">{{isset($product) ? $product->description : ''}}</textarea>
</div>

@isset($product)
    <img src="{{$product->avatar}}" alt="-" height="120" width="120">
@endisset
<div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control" id="image">
</div>

<div class="form-group">
    <label for="category">Category</label>
    <select name="category_id" id="category" class="form-control">
        @foreach ($categories as $category)
            <option value="{{$category->id}}" {{isset($product) && $category->id == $product->category_id ? 'selected' : ''}}>{{$category->name}}</option>
        @endforeach
    </select>
</div>

<button type="submit" class="btn btn-primary">Save</button>