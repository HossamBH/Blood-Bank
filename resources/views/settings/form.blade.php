<div class="form-group">
	<label for="phone">Phone</label>
		{!! Form::text('phone' , $model->phone, [
		'class' => 'form-control'
		]) !!}

	<label for="email">Email</label>
		{!! Form::text('email' , $model->email, [
		'class' => 'form-control'
		]) !!}
		
	<label for="fb_link">Facebook</label>
		{!! Form::text('fb_link' , $model->fb_link, [
		'class' => 'form-control'
		]) !!}

	<label for="twitter_link">Twitter</label>
		{!! Form::text('twitter_link' , $model->twitter_link, [
		'class' => 'form-control'
		]) !!}

	<label for="youtube_link">Youtube</label>
		{!! Form::text('youtube_link' , $model->youtube_link, [
		'class' => 'form-control'
		]) !!}

	<label for="wapp_link">Whatsapp</label>
		{!! Form::text('wapp_link' , $model->wapp_link, [
		'class' => 'form-control'
		]) !!}

	<label for="insta_link">Instegram</label>
		{!! Form::text('insta_link' , $model->insta_link, [
		'class' => 'form-control'
		]) !!}

	<label for="gmail_link">Gmail</label>
		{!! Form::text('gmail_link' , $model->gmail_link, [
		'class' => 'form-control'
		]) !!}	
</div>
<div class="form-group">
	<button class="btn btn-primary">Submit</button>
</div>