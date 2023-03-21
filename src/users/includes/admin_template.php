

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal" data-whatever="@getbootstrap">Add User</button>

    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="addUserLabel">Create New User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="fetch_userData.php" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="First name" name="firstname" required>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Last name" name="lastname" required>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="col">
                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="col">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="col">
                        <input type="file" name="img" class="form-control" id="user_photo" value="" />
                    </div>
                </div>

                <div class="modal-footer mt-5">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="add_user">Submit</button>
                </div>
            </form>
            </div>

            </div>
        </div>
    </div>
</div>

<script>


    $('#grid_table_all_user').jsGrid({
        width: '100%',
        height: '600px',
 
        inserting: true,
        editing: true,
        sorting: true,
        paging: true,
        autoload: true,
        pageSize: 10,
        pageButtonCount: 5,
        deleteConfirm: "Do you really fucking want to delete this user?",

        controller: {
            loadData: function(filter) {
                return $.ajax({
                    type: 'GET',
                    url: 'fetch_userData.php',
                    data: filter,
                    dataType: 'json'
                });
            },

            insertItem: function(item)
            {
                return $.ajax({
                    type: "POST",
                    url: "/fetch_userData.php",
                    data: item
                });

            },

            updateItem: function(item) {
                return $.ajax({
                    type: "PUT",
                    url: "/fetch_userData.php",
                    data: item
                });
            },
            
            deleteItem: function(item) {
                $.ajax({
                    type: "DELETE",
                    url: "/fetch_userData.php",
                    data: item
                });
                    
            }
        },

        fields: [
            { name: 'id', title: 'ID', width: 50,align: "center",  editing: false },
            { name: 'firstname', title: 'Firstname', type: 'text', width: 150, validate: 'required' },
            { name: 'lastname', title: 'Lastname', type: 'text', width: 150, validate: 'required' },
            { name: 'email', title: 'Email', type: 'text', validate: 'required', textField: 'Name' },
            { name: 'password', title: 'Password', type: 'text', width: 150, validate: 'required',align: "center"},
            { name: 'createdDate', title: 'Created at', editing: false },
            { type: 'control' }
        ]
        
    });


</script>


<style>
    form
    {
        margin: 0 !important;
    }
</style>