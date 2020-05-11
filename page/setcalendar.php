<div class="container-fluid">

    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#setCalendarModal">
        Set Calendar
    </button>
    <!-- The Modal -->
    <div id="set_calendar">
        <div class="modal fade" id="setCalendarModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Set Calendar</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form id="form_003" @submit.prevent="create">
                            <div class="form-group">
                                <label> วันที่ :</label>
                                <select v-model="day" required class="form-control">
                                    <option v-for="d in day_list" :value="d">{{d}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label> status :</label>
                                <input v-model="status" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label> task_name :</label>
                                <select v-model="task_name" required class="form-control">
                                    <option v-for="cet in cetagory_list" :value="cet.id">{{cet.name}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label> description :</label>
                                <input v-model="description" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label> max_number_position :</label>
                                <input v-model="max_number_position" class="form-control" type="number">
                            </div>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button form="form_003" class="btn btn-dark" type="submit"><i class="fas fa-save"></i>ยืนยัน</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <br>
        <input v-model="sel_task_yearmonth" @change="task_date_select_func" class="form-control" type="month">
        <br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>day</th>
                        <th>status</th>
                        <th>task</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(task, index) in task_date_list">
                        <td>{{Object.keys(task)[0]}}</td>
                        <td>{{task[Object.keys(task)[0]].status}}</td>
                        <td>
                            <ul v-for="(c, i) in task[Object.keys(task)[0]].task">
                                <li>{{i}} >> {{Object.keys(c)[0]}} : {{c[Object.keys(c)[0]]}} >> {{Object.keys(c)[1]}} : {{c[Object.keys(c)[1]]}}</li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</div>
<script src="./page/jsLibs/setcalendar.js"></script>