
v_menu = new Vue({
    el: '#mySidenav',
    data: {
        menu_me: ''
    },
    methods: {
        active_button_func: function (name) {
            v_content.content_func(name)
            this.menu_me = name
        },
        is_active_func: function (name) {
            return this.menu_me == name
        }
    },
})