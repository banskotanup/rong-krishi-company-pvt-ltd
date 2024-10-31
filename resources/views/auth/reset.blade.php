@extends('home.layouts.app')
@section('content')
        <main class="main">
            <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('{{url('/assets/images/backgrounds/login-bg.jpg')}}')">
            	<div class="container">
            		<div class="form-box">
            			<div class="form-tab">
	            			<ul class="nav nav-pills nav-fill" role="tablist">
							    <li class="nav-item">
							        <a class="nav-link active" id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="true">Reset Password</a>
							    </li>
							</ul>
							<div class="tab-content">
							    <div class="tab-pane fade show active" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                                    @include('admin.auth.message')
                                    <form action="" method="post">
                                        {{csrf_field()}}
                                        
							    		<div class="form-group">
							    			<label for="register-email-2">New Password <span style="color: red;">*</span></label>
							    			<input type="password" class="form-control" name="password" required>
							    		</div>
							    		<div class="form-group">
							    			<label for="register-email-2">Confirm Password <span style="color: red;">*</span></label>
							    			<input type="password" class="form-control" name="cpassword" required>
							    		</div>
							    		<div class="form-footer">
							    			<button type="submit" class="btn btn-outline-primary-2">
			                					<span>Reset</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>
							    		</div>
							    	</form>
							    </div>
							</div>
						</div>
            		</div>
            	</div>
            </div>
        </main>

@endsection