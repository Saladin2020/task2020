<div class="container-fluid">
    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#createTaskModal">
        Create Task
    </button>

    <!-- The Modal -->
    <div id="cetagory_manager">
        <div class="modal fade" id="createTaskModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Create Task</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form id="form_000" @submit.prevent="create">
                            <div class="form-group">
                                <label> รหัส :</label>
                                <input required v-model="id" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label> ชื่อเวร :</label>
                                <input required v-model="name" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label> max_number_position :</label>
                                <input required v-model="max_number_position" class="form-control" type="text">
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
                        <button form="form_000" class="btn btn-dark" type="submit"><i class="fas fa-save"></i>สร้าง</button>
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
                    <th>name</th>
                    <th>max_number_position</th>
                    <th>description</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="cet in cetagory_list">
                    <td>{{cet.id}}</td>
                    <td>{{cet.name}}</td>
                    <td>{{cet.max_number_position}}</td>
                    <td>{{cet.description}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script src="./page/jsLibs/cetagorymanager.js"></script>