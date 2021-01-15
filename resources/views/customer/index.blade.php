<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <title>Customer</title>
</head>
<body>
<button class="btn btn-success" id="showModalCreate">Create Customer Data</button>
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Image</th>
        <th>Department</th>
{{--        <th>Salary</th>--}}
        <th>Delete</th>
        <th>Update</th>
    </tr>
    </thead>
    <tbody id="showCustomerData">
    @foreach(\App\Models\Customer::all() as $row)
        <tr class="customer{{$row->id}}">
            <td>{{$row->name}}</td>
            <td>{{$row->phone}}</td>
            <td><img src="{{asset('storage/'.$row->image)}}" class="img img-thumbnail"style='width: 60px; height: 60px'></td>
            <td class="customerDepartment{{$row->id}}">{{$row->departmentRelationship->name}}</td>
{{--            <td class="customerSalary{{$row->id}}">{{$row->departmentRelationship->salary}}</td>--}}
            <td><a class="btn btn-danger deleteCustomer" data-id="{{$row->id}}"><i class="fas fa-trash"></i></a></td>
            <td><a class="btn btn-info updateCustomer" data-id="{{$row->id}}"><i class="fas fa-edit"></i></a></td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal Create-->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form enctype="multipart/form-data" id="createForm">
                @csrf
                <div class="modal-body">
                    <table>
                        <tr>
                            <td>Name:</td>
                            <td><input type="text" name="name" placeholder="Input Name" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Phone:</td>
                            <td><input type="number" name="phone" placeholder="Input Phone" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Customer Image:</td>
                            <td>
                                <label class="btn btn-primary img-btn">Upload Customer Image<input type="file" name="image" style="display: none"></label>

                            </td>
                        </tr>
                        <tr>
                            <td>Department:</td>
                            <td><select name="department_id">
                                    @foreach(\App\Models\Department::all() as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                </select></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>

        </div>
    </div>
</div>


<div class="modal fade" id="modalUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form enctype="multipart/form-data" id="updateForm">
                @csrf
                <div class="modal-body">
                    <table>
                        <tr>
                            <td>Name:</td>
                            <td><input type="text" name="name" id="editName" placeholder="Input Name" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Phone:</td>
                            <td><input type="number" name="phone" id="editPhone" placeholder="Input Phone" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Customer Image:</td>
                            <td>
                                <label class="btn btn-primary img-btn">Upload Customer Image<input type="file" name="image" style="display: none"></label>
                            </td>
                        </tr>
                        <tr>
                            <td>Department:</td>
                            <td><select name="department_id">
                                    @foreach(\App\Models\Department::all() as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>


<script>
    $('#showModalCreate').click(function () {
        $('#modalCreate').modal('show');
    });

    $('#createForm').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "{{route('customer.api.create')}}",
            method: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                console.log(data);
                $('#showCustomerData').append("<tr class='customer"+data.id+"'>" +
                    "<td>"+ data.name+"</td>"+
                    "<td>"+ data.phone+"</td>"+
                    "<td><img src='storage/"+data.image +"' class='img img-thumbnail' style='width: 60px; height: 60px'></td>"+
                    "<td class='customerDepartment"+data.id+"'>"+data.department_id +"</td>"+
                    "<td><a class='btn btn-danger deleteCustomer' data-id="+data.id+"><i class=\"fas fa-trash\"></i></a></td>"+
                    "<td><a class='btn btn-danger updateCustomer' data-id="+data.id+"><i class=\"fas fa-edit\"></i></a></td>"+
                    "</tr>");
                renderDepartmentRelationship();
                alertify.success('Customer Data has been created!');
            },
            error: function (data) {
                console.log(data);
            }
        });
    });


    function renderDepartmentRelationship() {
        $.ajax({
            url: "{{route('customer.api.index')}}",
            method: 'get',
            success: function (data) {
                for(let i =0; i< data.length; i++){
                    if (data[i].department_id === 1){
                        $('.customerDepartment'+data[i].id).text('Project Manager');
                    }
                    if (data[i].department_id === 2){
                        $('.customerDepartment'+data[i].id).text('Team Leader');
                    }
                    if (data[i].department_id === 3){
                        $('.customerDepartment'+data[i].id).text('Tester');
                    }
                }

            }
        });
    }

    $('#showCustomerData').on('click','.deleteCustomer', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
            url: "/api/customer/delete/" +id ,
            method: 'delete',
            success: function () {
                alertify.success('Customer data has been deleted!');
                $('.customer'+id).remove();
            }
        });
    });

    let updateId;
    $('#showCustomerData').on('click','.updateCustomer', function () {
        $('#modalUpdate').modal('show');
        updateId = $(this).data('id');
        $.ajax({
            url: "/api/customer/show/"+ updateId,
            method: 'get',
            success: function (data) {
                $('#editName').val(data.name);
                $('#editPhone').val(data.phone);
            }
        });
    });

    $('#updateForm').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "api/customer/update/"+ updateId,
            method: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                console.log(data);
                alertify.success('Updated!');
                $('.customer'+updateId).replaceWith("<tr class='customer"+data.id+"'>" +
                    "<td>"+ data.name+"</td>"+
                    "<td>"+ data.phone+"</td>"+
                    "<td><img src='storage/"+data.image +"' class='img img-thumbnail' style='width: 60px; height: 60px'></td>"+
                    "<td class='customerDepartment"+data.id+"'>"+data.department_id +"</td>"+
                    "<td><a class='btn btn-danger deleteCustomer' data-id="+data.id+"><i class=\"fas fa-trash\"></i></a></td>"+
                    "<td><a class='btn btn-danger updateCustomer' data-id="+data.id+"><i class=\"fas fa-edit\"></i></a></td>"+
                    "</tr>");
                renderDepartmentRelationship();
            }
        })
    });
</script>
</body>
</html>
