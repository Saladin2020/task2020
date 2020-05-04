<div class="container-fluid">
    <div id="table_task">
        <h1>Task</h1>
        <div class="d-flex justify-content-between">
            <h3>{{yearmonth}}</h3>
            <button class="btn btn-primary" v-on:click="generate">Generate</button>
        </div>
        <br>
        <input v-model="sel_yearmonth_gen" @change="gen_date_select_func" class="form-control" type="month">
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>task</th>
                    <th v-for="item in head">
                        {{item['DAY_NAME']}}
                    </th>
                </tr>
            </thead>
            <tbody>
                <template v-for="w in week">
                    <tr>
                        <td>day</td>
                        <td v-for="d in w">
                            {{d.DAY}}
                        </td>
                    </tr>
                    <tr v-for="t in task">
                        <td>{{t.id}}</td>
                        <td v-for="d in w">
                            <ul v-for="usr in dat[d.DAY - 1][t.id]['users']">
                                <li>{{usr.fullname}}</li>
                            </ul>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</div>
<script src="./page/jsLibs/tabletask.js"></script>