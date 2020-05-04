let v_set_calendar = new Vue({
    el: '#set_calendar',
    data: {
        sel_task_yearmonth: moment().format('Y-MM'),
        task_date_list: [],
        cetagory_list: [],
        day_list: [],
        calendar_list: [],
        day: "",
        status: "",
        task_name: "",
        description: "",
        max_number_position: "",
    },
    mounted() {
        this.load_day()
        this.load_cetagory()
        this.load_task_date()
    },
    methods: {
        task_date_select_func: function () {
            this.clear_all()
            this.load_day()
            this.load_cetagory()
            this.load_task_date()
        },
        clear_all: function () {
            this.task_date_list = []
            this.cetagory_list = []
            this.day_list = []
            this.calendar_list = []
            this.day = ""
            this.status = ""
            this.task_name = ""
            this.description = ""
            this.max_number_position = ""
        },
        load_day: function () {
            for (let i = 1; i <= moment().daysInMonth(); i++) {
                this.day_list.push(i)
            }

        },
        load_task_date: function () {
            let ym = this.sel_task_yearmonth.split('-')
            let str = ""
            if (ym.length > 0) {
                str = ym[0] + '_' + ym[1]
            }
            axios.get('./store/task/' + str + '_task.json')
                .then(response => {
                    this.task_date_list = response.data
                })
                .catch(function (error) {
                    console.log(error)
                })
        },
        load_cetagory: function () {
            axios.post('./store/cetagory/cetagory_task.json')
                .then(response => {
                    this.cetagory_list = response.data
                })
                .catch(function (error) {
                    console.log(error)
                })
        },
        create: function () {
            let post_data = {
                "day": this.day,
                "status": this.status,
                "task_name": this.task_name,
                "description": this.description,
                "max_number_position": this.max_number_position,
            }
            axios.post('./v1/create_task.php', post_data)
                .then(response => {
                    console.log(response.data)
                })
                .catch(function (error) {
                    console.log(error)
                })
        }
    },
})