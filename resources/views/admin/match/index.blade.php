@extends('layouts.dashboard', [ 'titlePage' => __('User Profile')])

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Users</h4>
                            <p class="card-category"> Manage users</p>
                        </div>
                        <div class="card-body">
                           <div class="row mt-4">
                           	<div class="col-md-3">
                            	<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    USer Info
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>
                            </div>
                           	<div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Email-id">
                            </div>
                           	<div class="col-md-3">
                            <input type="text" class="form-control" placeholder="folio number">

                            </div>
                           	<div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Go</button>
                            </div>
                           </div>
                           <div class="border px-3 mt-5 pb-4">
                           		<h3 class="mb-2">User Profile</h3>
                                <div class="media">
  <svg class="bd-placeholder-img mr-3" width="64" height="64" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 64x64"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">64x64</text></svg>
  <div class="media-body">
    
  </div>
</div>
                           </div>
                           <div class="row mt-5">
                           	<div class="col-md-4">
                            	<div class="border py-3">
                                	<form action="">
                                    <div class="form-group row">
    <label for="staticEmail" class="col-4 col-form-label pr-0 position-static">Date of Birth</label>
    <div class="col-8">
      <input type="date" class="form-control" id="staticEmail" value="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-4 col-form-label pr-0 position-static">Born time</label>
    <div class="col-8">
      <input type="text" class="form-control" id="staticEmail" value="">
    </div>
  </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-8">
                            	<div class="media">
  <svg class="bd-placeholder-img mr-3" width="64" height="64" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 64x64"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">64x64</text></svg>
  <div class="media-body">
    <h5>Title goes here</h5>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, doloremque architecto optio corporis maiores voluptas provident! Quod, ducimus, rerum magnam facilis neque dolore ut reiciendis rem enim voluptatibus illum autem.</p>
  </div>
</div><div class="media">
  <svg class="bd-placeholder-img mr-3" width="64" height="64" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 64x64"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">64x64</text></svg>
  <div class="media-body">
    <h5>Title goes here</h5>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, doloremque architecto optio corporis maiores voluptas provident! Quod, ducimus, rerum magnam facilis neque dolore ut reiciendis rem enim voluptatibus illum autem.</p>
  </div>
</div><div class="media">
  <svg class="bd-placeholder-img mr-3" width="64" height="64" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 64x64"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">64x64</text></svg>
  <div class="media-body">
    <h5>Title goes here</h5>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, doloremque architecto optio corporis maiores voluptas provident! Quod, ducimus, rerum magnam facilis neque dolore ut reiciendis rem enim voluptatibus illum autem.</p>
  </div>
</div>
                            </div>
                           </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection