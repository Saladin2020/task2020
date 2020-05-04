<div class="container-fluid">

    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#createUserModal">
        Create User
    </button>



    <br>

    <!-- The Modal -->
    <div id="user_manager">
        <div class="modal fade" id="createUserModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form id="form_001" @submit.prevent="create">
                            <div class="form-group">
                                <label> รหัส :</label>
                                <input v-model="id" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label> ชื่อ :</label>
                                <input v-model="first_name" class="form-control" type="text">
                            </div>

                            <div class="form-group">
                                <label> นามสกุล :</label>
                                <input v-model="last_name" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label> line token :</label>
                                <input v-model="line_token" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label> รายละเอียดอื่นๆ :</label>
                                <textarea v-model="description" class="form-control" rows="4" cols="50">
                                </textarea>
                            </div>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button form="form_001" class="btn btn-dark" type="submit"><i class="fas fa-save"></i>ยืนยัน</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>first_name</th>
                    <th>last_name</th>
                    <th>line token</th>
                    <th>description</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in user_list">
                    <td>{{user.id}}</td>
                    <td>{{user.first_name}}</td>
                    <td>{{user.last_name}}</td>
                    <td>{{user.line_token}}</td>
                    <td>{{user.description}}</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
<script src="./page/jsLibs/usermanager.js"></script>