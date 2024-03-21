@php
use App\Config\UrlBase;

@endphp
<!doctype html>
<html lang="en">
<style>
    #overlay {
        position: fixed;
        top: 0;
        z-index: 100;
        width: 100%;
        height: 100%;
        display: none;
        background: rgba(0, 0, 0, 0.6);
    }

    .cv-spinner {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .spinner {
        width: 40px;
        height: 40px;
        border: 4px #ddd solid;
        border-top: 4px #2e93e6 solid;
        border-radius: 50%;
        animation: sp-anime 0.8s infinite linear;
    }

    @keyframes sp-anime {
        100% {
            transform: rotate(360deg);
        }
    }
</style>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Admin Highland</title>
    <!-- Bootstrap CSS -->
    <!----css3---->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{asset(UrlBase::adminCss())}}">
    <link rel="stylesheet" href="{{asset(UrlBase::customerCss())}}">


    <!--google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">


    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>

<body>



    <div class="wrapper">

        <div class="body-overlay"></div>

        <!-------sidebar--design------------>
        @include('Account.admin.admin_layout.sidebar')
        <!-------sidebar--design- close----------->



        <!-------page-content start----------->

        <div id="content">

            <!------top-navbar-start----------->
            @include('Account.admin.admin_layout.header')

            <!------top-navbar-end----------->


            <!------main-content-start----------->

            <div class="main-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrapper">

                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                                        <h2 class="ml-lg-2">Manage Employees</h2>
                                    </div>
                                    <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                                            <i class="material-icons">&#xE147;</i>
                                            <span>Add New Employees</span>
                                        </a>
                                        <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
                                            <i class="material-icons">&#xE15C;</i>
                                            <span>Delete</span>
                                        </a>
                                        <button class="btn btn-secondary" id="refresh">
                                            <i class="material-icons">refresh</i>
                                            <span>Refresh</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><span class="custom-checkbox">
                                                <input type="checkbox" id="selectAll">
                                                <label for="selectAll"></label></th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Active</th>
                                        <th>Phone</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(empty($list_manager))
                                    @else
                                    @foreach($list_manager as $item)
                                    <tr>
                                        <th><span class="custom-checkbox">
                                                <input type="checkbox" class="checkbox_item" name="option[]"
                                                    value="{{$item->id}}">
                                                <label for="checkbox1"></label></th>
                                        <th>{{$item->username}}</th>
                                        <th>{{$item->email}}</th>
                                        <th>{{$item->address}}</th>
                                        <th>{{$item->status==1? "Đang hoạt động":"Ngừng hoạt động"}}</th>
                                        <th>{{$item->phone}}</th>
                                        <th>
                                            <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                                                <i class="material-icons" data-toggle="tooltip"
                                                    title="Edit">&#xE254;</i>
                                            </a>
                                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                                                <i class="material-icons" data-toggle="tooltip"
                                                    title="Delete">&#xE872;</i>
                                            </a>
                                        </th>
                                    </tr>
                                    @endforeach
                                    @endif




                                </tbody>


                            </table>

                            <div class="clearfix">
                                <div class="hint-text">showing <b>5</b> out of <b>25</b></div>
                                <ul class="pagination">
                                    <li class="page-item disabled"><a href="#">Previous</a></li>
                                    <li class="page-item "><a href="#" class="page-link">1</a></li>
                                    <li class="page-item "><a href="#" class="page-link">2</a></li>
                                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                                    <li class="page-item "><a href="#" class="page-link">4</a></li>
                                    <li class="page-item "><a href="#" class="page-link">5</a></li>
                                    <li class="page-item "><a href="#" class="page-link">Next</a></li>
                                </ul>
                            </div>









                        </div>
                    </div>


                    <!----add-modal start--------->
                    <div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Employees</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>

                                </div>
                                <input id="add_member-token" name="_token" type="hidden" value="{{csrf_token()}}">
                                <div class="modal-body">
                                    <div class="form-group add_employee">
                                        <label>Name</label>
                                        <input type="text" class="form-control add_name " required name="name">
                                    </div>
                                    <div class="form-group add_employee">
                                        <label>Email</label>
                                        <input type="emil" class="form-control add_email " required name="email">
                                    </div>
                                    <div class="form-group add_employee">
                                        <label>Address</label>
                                        <textarea class="form-control add_address " required name="address"></textarea>
                                    </div>
                                    <div class="form-group add_employee">
                                        <label>Phone</label>
                                        <input type="text" class="form-control add_phone " name="phone" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-select form-select-lg mb-3"
                                            aria-label=".form-select-lg example" id="add_status">
                                            <option value="1" selected>Active</option>
                                            <option value="2">Is Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-success btn-add-member">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!----edit-modal end--------->





                    <!----edit-modal start--------->
                    <div class="modal fade" tabindex="-1" id="editEmployeeModal" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Employees</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="emil" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-select form-select-lg mb-3"
                                            aria-label=".form-select-lg example">
                                            <option value="1" selected>Active</option>
                                            <option value="2">Is Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!----edit-modal end--------->


                    <!----delete-modal start--------->
                    <div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Employees</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this Records</p>
                                    <p class="text-warning"><small>this action Cannot be Undone,</small></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-success delete_member">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!----edit-modal end--------->




                </div>
            </div>

            <!------main-content-end----------->



            <!----footer-design------------->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="footer-in">
                        <p class="mb-0">&copy 2021 Vishweb Design . All Rights Reserved.</p>
                    </div>
                </div>
            </footer>



        </div>

    </div>
    <div id="overlay">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>



    <!-------complete html----------->






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"
        integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css"
        integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js"
        integrity="sha512-Y+cHVeYzi7pamIOGBwYHrynWWTKImI9G78i53+azDb1uPmU1Dz9/r2BLxGXWgOC7FhwAGsy3/9YpNYaoBy7Kzg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css"
        integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easy-loading/1.3.0/jquery.loading.min.js"
        integrity="sha512-tKLMM/v1nsieFOgUyeMSC2jdB4UtbU7R88e+S0pVIz3f6sWdpOpirG2j5pulmH45l1vk47J84V4ifXAYv+wuMw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easy-loading/1.3.0/jquery.loading.js"
        integrity="sha512-l9jYjbia7nXf4ZpR3dFSAjOOygUAytRrqmT32a5cBZjVpIUdFgBzIPQPPhJ6gh/NwaIerUEsn3vkEVQzQExGag=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function(){
	      $(".xp-menubar").on('click',function(){
		    $("#sidebar").toggleClass('active');
			$("#content").toggleClass('active');
		  });
		  
		  $('.xp-menubar,.body-overlay').on('click',function(){
		     $("#sidebar,.body-overlay").toggleClass('show-nav');
		  });
		  
	   });
       $('#selectAll').change(function(){
        var checkboxes = $(this).closest('table').find(':checkbox');
        checkboxes.prop('checked', $(this).is(':checked'));
       })

    //---------------------- Add manager-------------------------------//
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN':$('#add_member-token').val()
        },
    })
    //////////////////////////////////////
    $('.btn-add-member').click(function(){
    $('#addEmployeeModal').hide()
    $('#overlay').show()
    name=$(".add_name").val()
    email=$(".add_email").val()
    address=$('.add_address').val()
    phone=$('.add_phone').val()
    status=$('#add_status option:selected').val()
    $.ajax({
    type:"POST",
    url:"{{route('addMember')}}",
    dataType:'json',
    data:{
        _token:$('.add_member-token').val(),
        name:name,
        email:email,
        address:address,
        phone:phone,
        status:status
    },
    beforeSend: function() {
     
    },
    success:function(data){  
        $('#overlay').hide()
        $('.modal-backdrop').hide()
   $.toast({
        heading: 'Success',
        text: data.message,
        showHideTransition: 'slide',
        icon: 'success'
        })
    },
    error:function(xhr,stt,err){
        $('#overlay').hide()
        $('#addEmployeeModal').show()
        for (const key in xhr.responseJSON.errors) {
           const input= document.querySelector(`input[name=${key}],textarea[name=${key}]`)
           input.parentNode.setAttribute('data-error',xhr.responseJSON.errors[key][0]);
        }
      $.toast({
            heading: 'Error',
            text:"Vui lòng nhập lại thông tin",
            showHideTransition: 'fade',
            icon: 'error'
            })
    }
    })
    })
    //////////////////////////////
    $('.add_employee>input').on('input',(function(){
        $(this)[0].parentNode.removeAttribute('data-error')
    }))
    $('.add_employee>textarea').on('input',(function(){
        $(this)[0].parentNode.removeAttribute('data-error')
    }))
    //////////////////////////////

    ////////////-------------------------Refresh--------------------------------
    $('#refresh').click(function(){
        window.location.reload()
    })
    ///--------------------------DELETE MANAGER------------------------------
    $('.delete_member').click(function(){
    $('#overlay').show()
        formData=[]
        $('.checkbox_item:checked').each(function(index,value){
            formData.push(value.value)
        });
        $.ajax({
            type:'POST',
            url:"{{route('revomeMember')}}",
            dataType:'json',
            data:{
                data:formData
            },
            success:function(data){
                $('#overlay').hide()
                $('#deleteEmployeeModal').hide()
                $('.modal-backdrop').hide()
               $.toast({
                heading: 'Success',
                text: "Revome success",
                showHideTransition: 'slide',
                icon: 'success'
                })
            },
            beforeSend:function(){
                $(this).hide()
            },
            error:function(xhr,stt,err){
                $('#overlay').hide()
                $('#deleteEmployeeModal').hide()
                console.log(xhr);
                console.log(stt);
                console.log(err);
            }
        })
    })
       






    </script>





</body>

</html>