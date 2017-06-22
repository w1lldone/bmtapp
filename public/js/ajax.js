$(document).ready(function(){
	var url = "/ajax";
		// display unread notifications
		$.getJSON(url+'/order', function(result){
			$('.notification-badge').text(result.count);
			$.each(result.order, function(index, element){
				console.log(element);
				var wrapper = `<a class="content" href="#">
		              <div class="notification-item">
		                <h4 class="item-title">Transaksi Pembayaran Order · day ago</h4>
		                <p class="item-info">`+element.nasabah.name+`</p>
		              </div>`
				$('.notifications-wrapper').append(wrapper);
				// $('.notifications-wrapper').append('<li><a href="#">'+element.data.message+'</a></li>')
			});

		});

});