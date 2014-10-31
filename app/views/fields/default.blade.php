<section>
    {{ Form::label($name, $label, ['class' => 'label', 'for' => $name]) }}
	<label class="input">
		{{ $control }}
		<b class="tooltip tooltip-top-right">
			<i class="fa fa-user txt-color-teal"></i> 
			Please enter {{ $label }}
		</b>
	</label>
    @if ($error)
        <em for="{{ $name }}" class="invalid">{{ $error }}</em>
    @endif
</section>