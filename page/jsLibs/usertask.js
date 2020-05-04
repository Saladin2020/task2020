let v_user_task = new Vue({
    el: '#user_task',
    data: {
        user_list: [],
        user_date_list: [],
        cetagory_list: [],
        id: "",
        yearmonth: "",
        sel_yearmonth: moment().format('Y-MM'),
        cetag: {}
    },
    mounted() {
        this.load_users()
        this.load_cetagory()
        this.load_users_date()
    },
    methods: {
        date_select_func: function () {
            this.clear_all()
            this.load_users()
            this.load_cetagory()
            this.load_users_date()
        },
        clear_all: function () {
            this.user_list = []
            this.user_date_list = []
            this.cetagory_list = []
            this.id = ""
            this.yearmonth = ""
            this.cetag = {}
        },
        load_users: function () {
            axios.post('./store/user/user.json')
                .then(response => {
                    this.user_list = response.data
                })
                .catch(function (error) {
                    console.log(error)
                })
        },
        load_users_date: function () {
            let ym = this.sel_yearmonth.split('-')
            let str = ""
            if (ym.length > 0) {
                str = ym[0] + '_' + ym[1]
            }
            console.log(str)
            axios.get('./store/user/' + str + '_user.json')
                .then(response => {
                    this.user_date_list = response.data
                })
                .catch(function (error) {
                    console.log(error)
                })
        },
        load_cetagory: function () {
            axios.post('./store/cetagory/cetagory_task.json')
                .then(response => {
                    this.cetagory_list = response.data
                    for (let i = 0; i < this.cetagory_list.length; i++) {
                        this.cetag[this.cetagory_list[i].id] = 0
                    }
                    console.log(this.cetag)

                })
                .catch(function (error) {
                    console.log(error)
                })
        },
        save_task: function () {
            let index = -1
            for (let i = 0; i < this.user_list.length; i++) {
                if (this.user_list[i].id == this.id) {
                    index = i
                    break
                }
            }
            let post_data = {
                "id": this.id,
                "fullname": this.user_list[index].first_name + ' ' + this.user_list[index].last_name,
            }
            for (let i in this.cetag) {
                post_data[i] = this.cetag[i]
            }
            axios.post('./v1/create_task_user.php', post_data)
                .then(response => {
                    console.log(response.data)
                })
                .catch(function (error) {
                    console.log(error)
                })
        }
    },
})