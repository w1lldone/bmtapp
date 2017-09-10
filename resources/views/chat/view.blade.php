@extends('layouts.chat-master')

@section('content')
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1" id="chat-room">
			<div class="talk-bubble tri-right left-top left-side">
			  <div class="talktext">
			    <p>This one adds a right triangle on the left, flush at the top by using .tri-right and .left-top to specify the location.</p>
			  </div>
			</div>
			<div class="talk-bubble tri-right right-top right-side">
			  <div class="talktext">
			    <p>And finally on the right flush at the top. Uses .round .border and .right-top</p>
			  </div>
			</div>
			<div class="talk-bubble tri-right right-top right-side">
			  <div class="talktext">
			    <p>And finally on the right flush at the top. Uses .round .border and .right-top</p>
			  </div>
			</div>
			<div class="talk-bubble tri-right left-top left-side">
			  <div class="talktext">
			    <p>This one adds a right triangle on the left, flush at the top by using .tri-right and .left-top to specify the location.</p>
			  </div>
			</div>
			<div class="talk-bubble tri-right left-top right-side">
			  <div class="talktext">
			    <p>This one adds a right triangle on the left, flush at the top by using .tri-right and .left-top to specify the location.</p>
			  </div>
			</div>
		</div>
	</div>
@endsection

@section('chat-form')
		<form class="form" style="">
			<div class="input-group">
	      <input id="message" type="text" class="form-control" placeholder="Search for...">
	      <span class="input-group-btn">
	        <button id="send" class="btn btn-default" type="button">Go!</button>
	      </span>
	    </div><!-- /input-group -->
		</form>
@endsection

@section('script')
	<script type="text/javascript">
		$('#send').click(function() {
			var message = $('#message').val();
			var chat = '<div class="talk-bubble tri-right right-top right-side"><div class="talktext"><p>'+message+'</p></div></div>'
			$('#chat-room').append(chat);
			$("#content-chat").animate({ scrollTop: $('#content-chat').prop("scrollHeight")}, 1000);
		});
			
	</script>
@endsection