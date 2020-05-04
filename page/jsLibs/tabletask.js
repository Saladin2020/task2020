let v_table_task = new Vue({
    el: '#table_task',
    data: {
        yearmonth: "",
        head: [],
        dat: [],
        task: [],
        week: {},
        sel_yearmonth_gen: moment().format('Y-MM'),
    },
    mounted() {
        this.load_cetagory()
        this.load_data()
    },
    methods: {
        gen_date_select_func: function () {
            this.clear_fun()
            this.load_cetagory()
            this.load_data()
        },
        clear_fun: function () {
            this.yearmonth = ""
            this.head = []
            this.dat = []
            this.task = []
            this.week = {}
        },

        load_cetagory: function () {
            axios.get('./store/cetagory/cetagory_task.json')
                .then(response => {
                    this.task = response.data
                })
                .catch(function (error) {
                    console.log(error)
                })
        },
        load_data: function () {
            console.log(this.sel_yearmonth_gen)
            let ym = this.sel_yearmonth_gen.split('-')
            let post_data = {}
            if (ym.length > 0) {
                post_data = {
                    "year": ym[0],
                    "month": ym[1]
                }
            }
            axios.post('./v1/load.php', post_data)
                .then(response => {
                    this.dat = response.data.body
                    if (this.dat != undefined) {
                        this.head_func()
                        this.generate_calendar()
                    }
                })
                .catch(function (error) {
                    console.log(error)
                })
        },
        head_func: function () {
            for (let i = 0; i < 7; i++) {
                this.head.push(this.dat[i])
                if (i == 0) {
                    this.yearmonth = this.head[i].DATE.slice(0, 7)
                }
            }
        },
        generate_calendar: function () {
            let day = 0;
            for (let index = 1; index <= this.dat.length; index++) {
                if (this.week[day] == undefined) {
                    this.week[day] = []
                }
                if (index % 8 != 0) {
                    this.week[day].push(this.dat[index - 1])
                } else {
                    day++
                }
                /* if (day == 7) {
                     day = 0
                 }*/
            }

        },



        generate: function () {
            this.clear_fun()
            this.load_cetagory()
            this.load_data()
        }
    },
})