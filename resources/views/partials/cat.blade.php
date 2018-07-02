<div id="list-cat">
	@foreach ($cats as $cat)
	<div class="cat">
		<a href="{{ route('cat.show',$cat->id) }}">
			<strong>{{ $cat->name }}</strong> - {{ $cat->breed->name ?? 'Khong thuoc giog meo nao ca' }}
		</a>
	</div>
	@endforeach
	<script type="application/javascript">
		$(function(){
			$('a.page-link').click(function(e){
				e.preventDefault();
				var url = $(this).attr('href');
				$.get(url, function(response){
					$('#list-cat').replaceWith(response);
					//console.log(response);
				});
				
			});
		});
	</script>
</div>