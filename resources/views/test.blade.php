<!--<button id="test">Click Me</button>
<span id="t">This is test span</span>
-->

<div id="loader">Loading...</div>
<div id="main" style="display: none">
<div style="display: inline-block; float: left">
    <input type="text" id="search1">


    <table class="table" border="1">
        <thead><th>Id</th><th>Name</th><th>Email</th></thead>
        <tbody id="usersTable1"></tbody>
    </table>
</div>

<div style="display: inline-block"><input type="text" id="search2">


    <table class="table" border="1">
        <thead><th>Id</th><th>Name</th><th>Email</th></thead>
        <tbody id="usersTable2"></tbody>
    </table></div>
<br>
</div>


<script>

getUsers("");

interval = null;


    function getUsers(searchString)
    {

        let url = '/users';

        if (searchString !== '') {
            url += '?q=' + searchString;
        }


        let xhr = new XMLHttpRequest();
        xhr.open("GET", url, true);

        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                document.getElementById("loader").style.display = 'none';
                document.getElementById("main").style.display = 'block';
                users = JSON.parse(xhr.response);
                buildTable(users, 1);
                buildTable(users, 2);
            }
        };

        xhr.send();
    }


    document.getElementById('search1').addEventListener('keyup', function () {
        let filteredUsers = filterUsers(document.getElementById('search1').value);
        buildTable(filteredUsers, 1)
    });

    document.getElementById('search2').addEventListener('keyup', function () {

        let url = '/users';

        if (document.getElementById('search2').value !== '') {
            url += '?q=' + document.getElementById('search2').value;
        }


        let xhr = new XMLHttpRequest();
        xhr.open("GET", url, true);

        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                buildTable(JSON.parse(xhr.response), 2);
            }
        };

        xhr.send();
    });

    function filterUsers(str)
    {
        if (str === '') {
            return users;
        }

        let newArray = [];

        let length = users.length;

        for(let i = 0; i < length; i++) {
            if (users[i].email.indexOf(str) > -1) {
                newArray.push(users[i]);
            }
        }

        return newArray;
    }

    function buildTable(data, tableNum) {
        let html = '';

        let length = data.length;

        for(let i = 0; i < length; i++) {
            html += "<tr><td>" + data[i].id + "</td><td>" + data[i].name + "</td><td>" + data[i].email + "</td></tr>";
        }

        document.getElementById("usersTable" + tableNum).innerHTML = html;
    }

</script>





