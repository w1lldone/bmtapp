    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('d59be1a5d96a9cca36e7', {
      cluster: 'ap1',
      encrypted: true
    });
    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('status-liked');
    var order = pusher.subscribe('order-notification');
    var layanan = pusher.subscribe('layanan-notification');
    var chat = pusher.subscribe('admin-chat');
    var $badgeOrder = $('#count-trans');
    var $badgeLayanan = $('#countLayan');

    // Bind a function to a Event (the full Laravel class)
    channel.bind('App\\Events\\StatusLiked', function(data) {
      $.notify(data.message);
      count = Number($badgeOrder.text());
      $badgeOrder.text(count + 1);
    });

    // Bind a function to a Event (the full Laravel class)
    chat.bind('App\\Events\\AdminChatSent', function(data) {
        var messages = '<div class="talk-bubble tri-right left-top left-side"><div class="talktext"><p>'+data.chat.message+'</p></div></div>'
        $('#chat-room-'+data.chat.admin_room_id).append(messages);
    });

    // Bind to Layanan notification channel
    layanan.bind('App\\Events\\LayananNotification', function(data) {

      $.notify({
          icon: "account_balance_wallet",
          title: data.message,
          url: '/layanan/'+data.layanan.kode,
          target: '_self',
          message: data.layanan.created_at,
        },{
          type: type[1],
          timer: 4000,
          placement: {
            from: "bottom",
            align: "right"
          },
        });

      var countLayan = Number($badgeLayanan.text());
      $badgeLayanan.text(countLayan+1);
      $('#countLayan').addClass('new');
      var wrapper = `<a class="collection-item avatar" href="/layanan/`+data.layanan.kode+`">
                    <i class="material-icons circle">account_balance_wallet</i>
                    <span class="title">Layanan # `+data.layanan.kode+` <span class="label label-warning">new</span></span>
                    <p> <b>`+data.nasabah.name+`</b> <span class="label label-info">`+data.layanan.status+`</span></p>
                    <p class="text-muted">Baru saja</p>
                </a>`
      $('#layanan-list').prepend(wrapper);
      $('#layan-empty').hide();  

    });

    // bind to transaksi notificaiton channel
    order.bind('App\\Events\\OrderNotification', function(data) {

        $.notify({
          icon: "shopping_cart",
          title: data.message,
          url: '/transaksi/'+data.order.kode,
          target: '_self',
          message: data.order.created_at,
        },{
          type: type[2],
          timer: 4000,
          placement: {
            from: "bottom",
            align: "right"
          },
        });

        var count = Number($badgeOrder.text());
        $badgeOrder.text(count+1);
        $('#count-trans').addClass('new');
        var wrapper = `<a class="collection-item avatar" href="/transaksi/`+data.order.kode+`">
                      <i class="material-icons circle">shopping_cart</i>
                      <span class="title">Transaksi # `+data.order.kode+` <span class="label label-warning">new</span></span>
                      <p> <b>`+data.nasabah.name+`</b> <span class="label label-success">`+data.order.status+`</span></p>
                      <p class="text-muted">Baru saja</p>
                  </a>`
        $('#transaksi-list').prepend(wrapper);
        $('#trans-empty').hide();
    });