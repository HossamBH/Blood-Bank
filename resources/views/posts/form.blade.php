<div class="form-group">
    <label for="title">Title</label>
        {!! Form::text('title' , $model->title, [
           'class' => 'form-control'
        ]) !!}

    <label for="content">Content</label>
        {!! Form::textarea('content' , $model->content, [
           'class' => 'form-control'
        ]) !!}

    <label for="image">Image</label>
        {!! Form::file('image' , null, [
           'class' => 'form-control'
        ]) !!}

    <label for="category_id">Category Name</label>
        {!! Form::select('category_id', $category->pluck('name', 'id')->toArray() ,null, [
           'class' => 'form-control'
        ]) !!}
</div>

<div class="form-group">
    <button class="btn btn-primary">Submit</button>
</div>