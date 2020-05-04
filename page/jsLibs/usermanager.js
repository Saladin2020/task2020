class User {
    constructor(id, first_name, last_name, description) {
        this.id = id
        this.first_name = first_name
        this.last_name = last_name
        this.description = description
    }
}
let v_user_manager = new Vue({
    el: '#user_manager',
    data: {
        user_list: [],
        id: "",
        first_name: "",
        last_name: "",
        line_token:"",
        description: ""
    },
    mounted() {
        this.load_users()
    },
    methods: {
        load_users: function(){
            axios.get('./store/user/user.json')
            .then(response => {
                this.user_list = response.data
            })
            .catch(function (error) {
                console.log(error)
            })
        },
        create: function () {
            let post_data = {
                "id": this.id,
                "first_name": this.first_name,
                "last_name": this.last_name,
                "line_token": this.line_token,
                "description": this.description
            }
            axios.post('./v1/create_user.php', post_data)
                .then(response => {
                    console.log(response.data)
                    Swal.fire({
                        width:250,
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.value) {
                            this.user_list = []
                            this.load_users()
                        }
                    })
                })
                .catch(function (error) {
                    console.log(error)
                })
        }
    },
})