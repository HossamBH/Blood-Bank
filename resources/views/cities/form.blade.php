<div class="form-group">
    <label for="name">Name</label>
        {!! Form::text('name' , $model->name, [
           'class' => 'form-control'
        ]) !!}
    <label for="governorate_id">Governorate Name</label>
        {!! Form::select('governorate_id', $governorate->pluck('name', 'id')->toArray() ,null, [
           'class' => 'form-control'
        ]) !!}
</div>

<div class="form-group">
    <button class="btn btn-primary">Submit</button>
</div>