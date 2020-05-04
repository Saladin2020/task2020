v_content = new Vue({
    el: '#app_content',
    data: {
        content: '',
        hello:'hello'
    },
    mounted() {
        axios.get('callback.php?page=home')
            .then(response => {
                this.content = response.data
            })
    },
    methods: {
        content_func: function (page) {
            axios.get('callback.php?page=' + page)
                .then(response => {
                    this.content = response.data
                })
        }
    },
})