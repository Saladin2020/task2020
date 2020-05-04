let v_cetagory_manager = new Vue({
    el: '#cetagory_manager',
    data: {
        cetagory_list: [],
        id: "",
        name: "",
        max_number_position: 0,
        description: ""
    },
    mounted() {
        this.load_cetagory()
    },
    methods: {
        load_cetagory: function () {
            axios.get('./store/cetagory/cetagory_task.json')
                .then(response => {
                    this.cetagory_list = response.data
                })
                .catch(function (error) {
                    console.log(error)
                })
        },
        create: function () {
            let post_data = {
                "id": this.id,
                "name": this.name,
                "max_number_position": this.max_number_position,
                "description": this.description
            }
            axios.post('./v1/create_cetagory.php', post_data)
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
                            this.cetagory_list = []
                            this.load_cetagory()
                        }
                    })
                })
                .catch(function (error) {
                    console.log(error)
                })
        }
    },
})