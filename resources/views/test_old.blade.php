<!--<button id="test">Click Me</button>
<span id="t">This is test span</span>
-->


<input type="text" id="search">






<!--
<br>
    <input type="text" name="email" id="login_email">
    <input type="password" name="password" id="login_pass">
    <input type="button" class="btn btn-success" id="loginBtn" value="Login">



<br>
    <input type="text" name="email">
    <input type="password" name="password">
    <input type="button" class="btn btn-success" id="registerBtn" value="Register">
-->


<table class="table" border="1">
    <thead><th>Email</th></thead>
    <tbody id="usersTable"></tbody>
</table>

<script>



    function getUsers()
    {

    }


    document.getElementById('search').addEventListener('keyup', function () {
        let filteredUsers = filterUsers(document.getElementById('search').value);
        buildTable(filteredUsers)
    });

    function filterUsers(str)
    {
        if (str === '') {
            return users;
        }

        let newArray = [];

        let length = users.length;

        for(let i = 0; i < length; i++) {
            if (users[i].indexOf(str) > -1) {
                newArray.push(users[i]);
            }
        }

        return newArray;
    }

    let users = [
        'viktor@gmail.com',
        'oleg@gmail.com',
        'alexandr@gmail.com',
        'andrey@gmail.com',
        'alexei@gmail.com',
        'dmitry@gmail.com',
        'artem@gmail.com',
        'test@gmail.com',
        'tatiana@gmail.com',
    ];

    buildTable(users);

    function buildTable(data) {
        let html = '';

        let length = data.length;

        for(let i = 0; i < length; i++) {
            html += "<tr><td>" + data[i] + "</td></tr>";
        }

        document.getElementById("usersTable").innerHTML = html;
    }

























/*

document.getElementById('loginBtn').addEventListener("click", function () {
    let loginData = {
        email: document.getElementById("login_email").value,
        password: document.getElementById("login_pass").value,
    };

    console.log(loginData);
});

*/
































    /*
    let array = {
        name1: "Viktor",
        name6: "Oleg",
        name100: "Alexey",
        name123: "Andrey"
    };

    keys = Object.keys(array); // ['name1', 'name6', 'name100', 'name123'];

    let length = keys.length;// 4


    for(let i = 0; i < length; i++) {
        let currentKey = keys[i]; // 0 - name1, 1 - name6, 2 - name100, 3 - name123
        console.log(array[currentKey]);
    }




    let array1 = [1,5,7,8];
    let l = array1.length;
    let j = 0;


    while (j < l) {
        console.log(array1[j]);
        j++;
    }


    //console.log(test + " + " + test2 + " = " + (test + test2));
*/

</script>











































<!--
console.log("Clicked");

let data = {
'name': "Viktor",
'age': 18
};

let xhr = new XMLHttpRequest();
xhr.open("PUT", '/server', true);

//Send the proper header information along with the request
xhr.setRequestHeader("Content-Type", "application/json");

xhr.onreadystatechange = function() { // Call a function when the state changes.
if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
// Request finished. Do processing here.
}
};
xhr.send(data);
-->