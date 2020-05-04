<div class="container-fluid">
    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#userTaskModal">
        Set Task Number to User
    </button>
    <!-- The Modal -->
    <div id="user_task">
        <div class="modal fade" id="userTaskModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">User Task</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                   
                            
                    <div class="modal-body">
                        <form id="form_002" @submit.prevent="save_task">
                            <div class="form-group">
                                <label> เลือก :</label>
                                <select v-model="id" required class="form-control">
                                    <option v-for="usr in user_list" :value="usr.id">{{usr.first_name + ' ' + usr.last_name}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label> year_month :</label>
                                <input v-model="yearmonth" class="form-control" type="month">
                            </div>
                            <div class="form-group" v-for="cet in cetagory_list">
                                <label> {{cet.name}} :</label>
                                <input v-model="cetag[cet.id]" class="form-control" type="text">
                            </div>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button form="form_002" class="btn btn-dark" type="submit"><i class="fas fa-save"></i>ยืนยัน</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <br>
        <input v-model="sel_yearmonth" @change="date_select_func" class="form-control" type="month">
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>first_name</th>
                    <th>last_name</th>
                    <th>description</th>
                    <th v-for="(cet, index) in cetagory_list" :key="index">
                        {{cet.name}}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(usr, index) in user_list" :key="index">
                    <td>{{usr.id}}</td>
                    <td>{{usr.first_name}}</td>
                    <td>{{usr.last_name}}</td>
                    <td>{{usr.description}}</td>
                    <template v-for="usrd in user_date_list" v-if="usrd.id == usr.id">
                        <td v-for="cet in cetagory_list">
                            {{usrd[cet.id]}}
                        </td>
                    </template>

                </tr>
            </tbody>
        </table>
    </div>

</div>
<script src="./page/jsLibs/usertask.js"></script>