@extends('layouts.chat-master')

@section('navbar')
	@include('chat.nav')
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1" id="chat-room">
			@foreach ($room->admin_chat()->oldest()->get() as $message)
				<div class="talk-bubble tri-right {{ $message->indent() }}">
				  <div class="talktext">
				    <p>{{ $message->message }}</p>
				  </div>
				</div>
			@endforeach
		</div>
	</div>
@endsection

@section('chat-form')
		<form class="form" style="">
			<div class="input-group">
	      {{-- <input id="message" type="text" class="form-control" placeholder="Search for..."> --}}
	      <textarea id="message" class="form-control" rows="1" placeholder="Ketik pesan..."></textarea>
	      <span class="input-group-btn">
	        <button id="send" class="btn btn-success btn-round btn-just-icon" type="button"><i class="material-icons">send</i></button>
	      </span>
	    </div><!-- /input-group -->
		</form>
@endsection

@section('script')
	<script type="text/javascript">
		$(function() {
			$('#content-chat').scrollTop($('#content-chat')[0].scrollHeight);
		});
		$('#send').click(function() {
			var message = $('#message').val();
			var chat = '<div class="talk-bubble tri-right bg-admin right-top right-side"><div class="talktext"><p>'+message+'</p></div></div>'
			$('#chat-room').append(chat);
			$("#content-chat").animate({ scrollTop: $('#content-chat').prop("scrollHeight")}, 1000);
			$.ajax({
				type: 'POST',
				url: '/admin_chat',
				data: '_token={{ csrf_token() }}&message='+message+'&admin_room_id={{ $room->id }}',
				success: function(data) {
					$('#message').val('');
				},
				error: function(data) {

				},
			});
		});
			
	</script>
@endsection