<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="container">
        <h2>Employee Lists</h2>
        <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btnAdd">Add Employee </button>
        <table class="table text-center align-middle mt-3" style="table-layout: fixed;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Position</th>
                    <th>Salary</th>
                    <th>Address</th>
                    <th>Profile</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <?php
                include 'connection.php';
                $result = $connection->query("SELECT * FROM tbemployees");
                while($row = $result->fetch_assoc()){
                    echo '
                    <tr>
                        <td>'.$row['emp_id'].'</td>
                        <td>'.$row['emp_name'].'</td>
                        <td>'.$row['sex'].'</td>
                        <td>'.$row['position'].'</td>
                        <td>'.$row['salary'].'</td>
                        <td>'.$row['province'].'</td>
                        <td><img width="80" src="./upload/'.$row['profile'].'" alt=""></td>
                        <td>
                            <button class="btn btn-warning me-1 edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                            <button class="btn btn-danger delete-btn" data-id="'.$row['emp_id'].'" data-bs-toggle="modal" data-bs-target="#exampleModal1">Delete</button>
                        </td>
                    </tr>
                    ';
                }
                ?>
            </tbody>

        </table>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Add Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <input type="hidden" id="edit_id">
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>  
                    <div class="form-group">
                        <label for="sex" class="form-label">Sex</label>
                        <select class="form-control" name="sex" id="sex">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="salary" class="form-label">Salary</label>
                        <input type="text" class="form-control" name="salary" id="salary">
                    </div>
                    <div class="form-group">
                        <label for="position" class="form-label">Position</label>
                        <select name="position" id="position" class="form-control">
                            <option value="">-- Select Position --</option>
                            <option value="frontend">Front-End Developer</option>
                            <option value="backend">Back-End Developer</option>
                            <option value="fullstack">Full-Stack Developer</option>
                            <option value="mobile">Mobile App Developer</option>
                            <option value="qa">QA Engineer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="province" class="form-label">Province</label>
                        <select name="province" id="province" class="form-control">
                            <option value="">-- Select Province --</option>
                            <option value="Phnom Penh">Phnom Penh</option>
                            <option value="Battambang">Battambang</option>
                            <option value="Kampong Cham">Kampong Cham</option>
                            <option value="Kampong Chhn">Kampong Chhn</option>
                            <option value="Kampong Speu">Kampong Speu</option>
                            <option value="Kampong Thom">Kampong Thom</option>
                            <option value="Kampot">Kampot</option>
                            <option value="Kandal">Kandal</option>
                            <option value="Kep">Kep</option>
                            <option value="Koh Kong">Koh Kong</option>
                            <option value="Kratie">Kratie</option>
                            <option value="Mondol Kiri">Mondol Kiri</option>
                            <option value="Pailin">Pailin</option>
                            <option value="Preah Vihear">Preah Vihear</option>
                            <option value="Prey Veaeng">Prey Veaeng</option>
                            <option value="Rotanak Kiri">Rotanak Kiri</option>
                            <option value="Siem Reap">Siem Reap</option>
                            <option value="Sihanoukville">Sihanoukville</option>
                            <option value="Svay Rieng">Svay Rieng</option>
                            <option value="Takeo">Takeo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="profile" class="form-label">Profile</label>
                        <input type="file" name="profile" id="profile" class="form-control"> <br>
                        <input type="hidden" name="hide_image" id="hide_image">
                        <img style="cursor: pointer;" width="80" class="rounded-circle" id="image" src="./upload/user_profile.webp" alt="">
                    </div>
                    <div class="form-group mt-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="btnSave" data-bs-dismiss="modal">Save</button>
                        <button type="button" class="btn btn-success" id="btnEdit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal delete-->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this Employee?</h5>
            <button type="button" class=" btn-close  " data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                <input type="hidden" name="delete_id" id="delete_id">
                <div class="form-group">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="delete" data-bs-dismiss="modal"  >Yes, delete it.</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
$(document).ready(function () {
    let currentRow = '';

    // ADD button click: Reset form and setup for adding
    $('#btnAdd').click(function () {
        console.log('Add button clicked');
        $('#exampleModalLabel').text('Add Employee');
        $('#btnSave').show();
        $('#btnEdit').hide();
        resetForm();
    });

    // Profile image logic
    $('#profile').hide();
    $('#image').click(function () {
        $('#profile').click();
    });

    $('#profile').change(function () {
        let formData = new FormData();
        formData.append('profile', this.files[0]);

        $.ajax({
            url: 'moveFile.php',
            method: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $('#hide_image').val(response);
                $('#image').attr('src', './upload/' + response);
            }
        });
    });

    // SAVE new employee
    $('#btnSave').click(function () {
        const name = $('#name').val();
        const sex = $('#sex').val();
        const position = $('#position').val();
        const salary = $('#salary').val();
        const province = $('#province').val();
        const profile = $('#hide_image').val();

        $.ajax({
            url: 'insert.php',
            method: 'POST',
            data: {
                name: name,
                sex: sex,
                position: position,
                salary: salary,
                province: province,
                profile: profile
            },
            success: function (response) {
                $('#tbody').append(`
                    <tr>
                        <td>${response}</td>
                        <td>${name}</td>
                        <td>${sex}</td>
                        <td>${position}</td>
                        <td>${salary}</td>
                        <td>${province}</td>
                        <td><img width="80" src="./upload/${profile}" alt=""></td>
                        <td>
                            <button type="button" class="btn btn-warning me-1 edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                            <button class="btn btn-danger delete-btn" data-id="${response}" data-bs-toggle="modal" data-bs-target="#exampleModal1">Delete</button>
                        </td>
                    </tr>
                `);
                
                $('#exampleModal').modal('hide');
                resetForm();
                alert('Employee added successfully!');
            }
        });
    });

    // EDIT button click - Use class selector with event delegation
    $(document).on('click', '.edit-btn', function (e) {
        e.preventDefault();
        console.log('Edit button clicked!');
        
        // want to find that row
        const tr = $(this).closest('tr');

        // get data from table
        const id = tr.find('td:eq(0)').text().trim();
        const name = tr.find('td:eq(1)').text().trim();
        const sex = tr.find('td:eq(2)').text().trim();
        const position = tr.find('td:eq(3)').text().trim();
        const salary = tr.find('td:eq(4)').text().trim();
        const province = tr.find('td:eq(5)').text().trim();
        const profileSrc = tr.find('img').attr('src');
        const profile = profileSrc ? profileSrc.split('/').pop() : 'user_profile.webp';

        console.log('Extracted data:', {id, name, sex, position, salary, province, profile});

        // Store current row for updating later
        // global variable
        currentRow = tr;

        // we need to change modal title and buttons
        $('#exampleModalLabel').text('Update Employee');
        $('#btnSave').hide();
        $('#btnEdit').show();

        // Fill form with data
        // insert data into form
        $('#edit_id').val(id);
        $('#name').val(name);
        $('#sex').val(sex);
        $('#position').val(position);
        $('#salary').val(salary);
        $('#province').val(province);
        $('#hide_image').val(profile);
        $('#image').attr('src', './upload/' + profile);
        
        console.log('Form populated successfully');
    });

    // UPDATE logic
    // no parameters is get from the form
    // get data from form
    $('#btnEdit').click(function () {
        const id = $('#edit_id').val();
        const name = $('#name').val();
        const sex = $('#sex').val();
        const position = $('#position').val();
        const salary = $('#salary').val();
        const province = $('#province').val();
        const profile = $('#hide_image').val();

        console.log('Updating employee:', {id, name, sex, position, salary, province, profile});

        $.ajax({
            url: 'update.php',
            method: 'POST',
            data: {
                id: id, // that any we get it from const id
                name: name,
                sex: sex,
                position: position,
                salary: salary,
                province: province,
                profile: profile
            },
            success: function (res) {
                console.log('Update response:', res);
                
                if (res.trim() === 'Success') {
                    // Update the current row
                    // get from form data
                    currentRow.find('td:eq(1)').text(name);
                    currentRow.find('td:eq(2)').text(sex);
                    currentRow.find('td:eq(3)').text(position);
                    currentRow.find('td:eq(4)').text(salary+'$');
                    currentRow.find('td:eq(5)').text(province);
                    currentRow.find('img').attr('src', './upload/' + profile);
                    
                    $('#exampleModal').modal('hide');
                    resetForm();
                    // alert('Employee updated successfully!');
                } else {
                    alert('Update failed: ' + res);
                }
            },
            error: function(xhr, status, error) {
                console.log('Update error:', error);
                alert('Error updating employee: ' + error);
            }
        });
    });

    // DELETE logic
    // $(document).on('click', '.delete-btn', function () {
    //     const id = $(this).attr('data-id');
    //     $('#delete_id').val(id);
    //     currentRow = $(this).closest('tr');
    // });
    let row ='';
    $('#delete').click(function () {
        // const delete_id = $('#delete_id').val();
        const delete_id = $(this).attr('data-id');
        $('#delete_id').val(delete_id);
        row=$(this).parents('tr');
        $('#delete').click(function () {
            let delete_id = $('#delete_id').val();
            $.ajax({
                url: 'delete.php',
                method: 'POST',
                data: { delete_id: delete_id },
                success: function (res) {
                    if (res.trim() === 'Success') {
                        row.remove();
                        // alert('Employee deleted successfully!');
                    }
                }
            });
        })
    });

    // Reset form function
    function resetForm() {
        $('form')[0].reset();
        $('#edit_id').val('');
        $('#hide_image').val('');
        $('#image').attr('src', './upload/user_profile.webp');
    }
});
</script>
<!-- //when use const id = $(this).attr('delete_id'); cuz we want to get only that id to delete if they click who have id = 1 so make sure that it id 1 -->