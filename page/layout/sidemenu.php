<style>
    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: black;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    #main {
        transition: margin-left .5s;
        padding: 16px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }
</style>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a v-on:click="active_button_func('home')" href="#"><img v-if="is_active_func('home')" src="assets/images/tools-and-utensils.svg" width="32">&nbsp;home</a>
    <a v-on:click="active_button_func('task')" href="#"><img v-if="is_active_func('task')" src="assets/images/tools-and-utensils.svg" width="32">&nbsp;task</a>
    <a v-on:click="active_button_func('user')" href="#"><img v-if="is_active_func('user')" src="assets/images/tools-and-utensils.svg" width="32">&nbsp;user</a>
    <a v-on:click="active_button_func('usertask')" href="#"><img v-if="is_active_func('usertask')" src="assets/images/tools-and-utensils.svg" width="32">&nbsp;usertask</a>
    <a v-on:click="active_button_func('setcalendar')" href="#"><img v-if="is_active_func('setcalendar')" src="assets/images/tools-and-utensils.svg" width="32">&nbsp;setcalendar</a>
    <a v-on:click="active_button_func('generate')" href="#"><img v-if="is_active_func('generate')" src="assets/images/tools-and-utensils.svg" width="32">&nbsp;generate</a>
</div>

<script src="./page/jsLibs/menu.js"></script>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>


<script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>