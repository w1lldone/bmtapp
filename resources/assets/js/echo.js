window.axios = require('axios');

window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};

import Echo from 'laravel-echo'

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'd59be1a5d96a9cca36e7',
    cluster: 'ap1',
});

Echo.channel('status-liked')
    .listen('App\\Events\\StatusLiked', (e) => {
        console.log(e.order.name);
});

Echo.private('App.User.' + 1)
    .notification((notification) => {
        console.log(notification.type);
});