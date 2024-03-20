@include('layout.app')
@php
use App\Config\UrlBase;
@endphp
@include("layout.loading")
@if(session("success"))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session("success")}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<script>
    const close=document.querySelector('.close')
    const alert=document.querySelector('.alert-success')
    console.log(close)
    close.addEventListener('click',function(){
        alert.remove()
    })
    
</script>
@endif
@if(session("faild"))
<div class="alert alert-waring alert-dismissible fade show" role="alert">
    <strong>{{session('faild')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<script>
    const close=document.querySelector('.close')
    const alert=document.querySelector('.alert-success')
    console.log(close)
    close.addEventListener('click',function(){
        alert.remove()
        console.log(1)
    })
    
</script>
@endif


<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details"
            target="__blank">Profile</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-billing-page"
            target="__blank">Billing</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-security-page"
            target="__blank">Security</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-edit-notifications-page"
            target="__blank">Notifications</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <form method="POST" action="{{route('changeImage')}}" enctype="multipart/form-data">
                @csrf
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <div class="img-account-profile rounded-circle mb-2 " style="overflow: hidden;">
                            <img style="width:100px;height: 100px;object-fit: fill;border-radius: 50%"
                                src="{{asset(UrlBase::getImageCustomer($user->image))}}" alt="profile image">
                        </div>

                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <input type="file" name="image">
                        <p class="text-danger">{{ $errors->first('image') }}</p>
                        <button class="btn btn-primary" type="submit">Upload new image</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form method="POST" action="{{route('editProfile')}}" enctype="multipart/form-data">
                        <!-- Form Group (username)-->
                        @csrf
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Username (how your name will appear to other
                                users on the site)</label>
                            <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username"
                                name="username" value="{{$user->username}}">
                            <p class="text-danger">{{ $errors->first('username') }}</p>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">First name</label>
                                <input class="form-control" id="inputFirstName" type="text" name="firstname"
                                    placeholder="Enter your first name" value="{{$user->firstname}}">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Last name</label>
                                <input class="form-control" id="inputLastName" type="text" name="lastname"
                                    placeholder="Enter your last name" value="{{$user->lastname}}">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Sex</label>
                                <select class="form-select" aria-label="Default select example" name='sex'>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Location</label>
                                <input class="form-control" id="inputLocation" type="text" name='address'
                                    placeholder="Enter your location" value="{{ $user->address}}">
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" id="inputEmailAddress" type="email" name='email'
                                placeholder="Enter your email address" value="{{$user->email}}">
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control" id="inputPhone" type="tel" name='phone'
                                    placeholder="Enter your phone number" value="{{$user->phone}}">
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Birthday</label>
                                <input class="form-control" id="inputBirthday" type="date" name="birthday"
                                    placeholder="Enter your birthday"
                                    value="{{date('Y-m-d', strtotime($user->birthday))}}">
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>