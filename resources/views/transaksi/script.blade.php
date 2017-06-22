<script type="text/javascript">
	function loading() {
		$('.spinner').show();
		$('#content, .pagination').hide();
	}
	$(function(){
		$("#urutkan select").val("{{ $request->urutkan }}");
		$("#filter select").val("{{ $request->filter }}");
		$("#keyword").val("{{ $request->keyword }}");
	});
</script>