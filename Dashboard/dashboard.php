<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to my Soul SOciety</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
    
</style>
<body>
    <h1>WELCOME TO MY SOUL SOCIETY</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Username</th>
            </tr>
        </thead>
        <tbody>
        <?php
                include "../Connection/dbconn.php";

                $sql = "SELECT * FROM `registration`";
                $result = $connection->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["user_id"] . "</td>";
                        echo "<td>" . $row["first_name"] . "</td>";
                        echo "<td>" . $row["last_name"] . "</td>";
                        echo "<td>" . $row["gender"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo '<td><button value="' . $row['user_id'] . '" class="btn btn-primary editBtn">Edit</button></td>';
                        echo '<td><button type="button" value="' . $row['user_id'] . '" class="btn btn-danger deleteBtn">Delete</button></td>';

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No data available</td></tr>";
                }

                $connection->close();
                ?>


</tbody>
    </table>
    <a href="../Login/index.php" class="styled-link"> <center>Log Out</center></a>
</body>
</html>
<!-- Modal -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title fs-5" id="exampleModalLabel">Edit Email</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="userID" id="userID">

                        <!-- Inputs -->
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="userEmail" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary saveUser">Save changes</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
    </body>

</html>
<script>

$(document).on('click', '.saveUser', function (e) {
            e.preventDefault();

            var userID = $('#userID').val();
            var email = $('#userEmail').val();
            var username = $('#username').val();

            $.ajax({
                async: true,
                type: "GET",
                url: "process/updateModal.php?userID=" + userID + "&userEmail=" + email,
                dataType: "json",
                success: function (response) {
                    $('#editModal').modal('hide');

                if (response.success) {
                    Swal.fire(
                        'Updated!',
                        'User has been updated.',
                        'success'
                    );}

                    var counter = 0;

                    $('#listUsers').html('');

                    for (let i = 0; i < response.length; i++) {
                        counter++;

                        var id, email, created_at;

                        user_id = response[i][0];
                        email = response[i][1];
                        username = response[i][3];
                        $('#listUsers').append('<tr>\
                                <th scope="row">'+ counter + '</th >\
                                <td>'+ email + '</td>\
                                <td>'+ username + '</td>\
                            <td>\
                                <button type="button" value="'+ id + '" class="btn btn-primary editBtn">Edit</button>\
                                <button type="button" value="'+ id + '" class="btn btn-danger deleteBtn">Delete</button>\
                                </td >\
                            </tr>');

                    }


                }

            });


        });

            // Edit User Functionality
            $(document).on('click', '.editBtn', function (e) {
            e.preventDefault();
            var userID = $(this).val();

            $.ajax({
                async: true,
                type: "GET",
                url: "process/editModal.php?userID=" + userID,
                dataType: "json",
                success: function (response) {
            if (response.error) {
                Swal.fire('Error', response.error, 'error');
            } else if (!$.isEmptyObject(response)) {
                var email = response[1];
                var username = response[2];

                $('#userEmail').val(email);
                $('#username').val(username);
                $('#userID').val(userID);

                $('#editModal').modal('show');
            } else {
                Swal.fire('Error', 'User not found', 'error');
                    }
                }
            });
        });


        $(document).on('click', '.deleteBtn', function (e) {
        e.preventDefault();
        var userID = $(this).val();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    url: "process/deleteModal.php?userID=" + userID,
                    dataType: "json",
                    success: function (response) {
                    if (response.error) {
                        Swal.fire('Error', response.error, 'error');
                    } else {
                        Swal.fire('Deleted!', response.message, 'success');
                        
                        var counter = 0
                        $('listUsers').html('');
                        for (let i= 0; i < response.length; i++)
                        counter++;

                        var user_id, email, username;
                        user_id = response[i][0];
                        email = response[i][1];
                        username = response[i][2];
                        $('#listUsers').append('<tr>\
                        <th scope="row">'+ counter + '</th >\
                        <td>'+ email + '</td>\
                        <td>'+ username + '</td>\
                        <td>\
                        <button type="button" value="'+ id + '" class="btn btn-primary editBtn">Edit</button>\
                        <button type="button" value="'+ id + '" class="btn btn-danger deleteBtn">Delete</button>\
                        </td >\
                        </tr >');
                    }
                    }
                });

            }
        })

    });

</script>