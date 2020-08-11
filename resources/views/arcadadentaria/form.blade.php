<div class="row mB-40">
	<div class="col-sm-8">
		<div class="bgc-white p-20 bd">
			@if (!isset($user))
				{!! Form::select('id', $users, null, ['class' => 'form-control']) !!}
			@endif
			<br>
        	<img id="image" width="600" height="600" src="https://img2.gratispng.com/20180422/aoe/kisspng-dental-arch-dentistry-human-tooth-dental-midline-arches-5adcbb0623f582.0959879115244152381473.jpg" alt="">

			@for ($i = 0; $i < 31; $i++)
                <input type="text" name="dente[{{$i}}]" value="{{ $items[$i]->arcadadentarias_dente_id ?? '' }}">{{$i}}

                <input type="text" name="problema[{{$i}}]" value="{{ $items[$i]->arcadadentarias_tipo_id ?? '' }}">pro{{$i}}

                <input type="text" name="descricao[{{$i}}]" value="{{ $items[$i]->descricao ?? '' }}">desc{{$i}}

                <br>
            @endfor

		</div>
	</div>
	@if (isset($item) && $item->avatar)
		<div class="col-sm-4">
			<div class="bgc-white p-20 bd">
				<img src="{{ $item->avatar }}" alt="">
			</div>
		</div>
	@endif
</div>

<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script>
	$(function(){
		varcont = 0;
		$("#image").click(function(e){
			var offset = $(this).offset();

			var X = (e.pageX - offset.left);
			var Y = (e.pageY - offset.top);
			console.log('X: ' + X + ', Y: ' + Y);

			if (X >= 413 && X <= 461 && Y >= 121 && Y <= 150 )
				alert(X + ' - ' + Y)
		});
	});
</script>
