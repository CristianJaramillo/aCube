<section>
	{{ Form::label($name, $label, ['class' => 'label', 'for' => $name]) }}
	<label class="input">
		<i class="icon-append fa fa-lock"></i>
		{{ $control }}
		<b class="tooltip tooltip-top-right">
			<i class="fa fa-user txt-color-teal"></i> 
			Please enter {{ $label }}
		</b>
	</label>
	@if ($error)
        <em for="{{ $name }}" class="invalid">{{ $error }}</em>
    @endif
	<div class="note">
		<a href="{{ route('forgotpassword') }}">Olvidaste tu {{ $label }}?</a>
	</div>
</section>