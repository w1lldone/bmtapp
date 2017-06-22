<script type="text/javascript">
  var notificationsWrapper   = $('.dropdown-notifications');
  var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
  var notificationsCountElem = notificationsToggle.find('i[data-count]');
  var notificationsCount     = parseInt(notificationsCountElem.data('count'));
  var notifications          = notificationsWrapper.find('ul.dropdown-menu');

  // if (notificationsCount <= 0) {
  //   notificationsWrapper.hide();
  // }

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('d59be1a5d96a9cca36e7', {
      cluster: 'ap1',
      encrypted: true
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('status-liked');

    // Bind a function to a Event (the full Laravel class)
    channel.bind('App\\Events\\StatusLiked', function(data) {
      $.notify(data.message);
      var existingNotifications = notifications.html();
      var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
      var newNotificationHtml = `
      <li><a href="#">`+data.message+`</a></li>
      `;
      var countHtml = "<span class='notification'>"+notificationsCount+"</span>"
      
      notifications.html(newNotificationHtml + existingNotifications);

      // notificationsCount += 1;
      // notificationsCountElem.attr('data-count', notificationsCount);
      // notificationsWrapper.find('.notif-count').text(notificationsCount);

    });
  </script>