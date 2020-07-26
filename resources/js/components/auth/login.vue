<template>
    <div>
        <div class="container-fluid-full">
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box">
					<div class="icons">
						<router-link to="/"><i class="halflings-icon home"></i></router-link>
						<a href="#"><i class="halflings-icon cog"></i></a>
					</div>
					<h2>Login to your account</h2>
					<form class="form-horizontal" @submit.prevent="login">
						<fieldset>
							
							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" v-model="form.email" id="username" type="text" placeholder="type username"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" v-model="form.password" id="password" type="password" placeholder="type password"/>
							</div>
							<div class="clearfix"></div>
							
							<label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>

							<div class="button-login">	
								<button type="submit" class="btn btn-primary">Login</button>
							</div>
							<div class="clearfix"></div>
                            </fieldset>
					</form>
					<hr>
					<h3>Forgot Password?</h3>
					<p>
						No problem, <router-link to="/forgetpassword">click here</router-link> to get a new password.
					</p>	
				</div><!--/span-->
			</div><!--/row-->
			

	</div><!--/.fluid-container-->
	
		</div><!--/fluid-row-->
    </div>
</template>
<script>
    export default {
        created(){
            if(User.loggedIn()){
                this.$router.push({name:'dashboard'})
                
            }
        },
     data(){
         return{
             form:{
                 email:null,
                 password:null
             },
             errors:{}
         }
     } ,
       methods:{
           login(){
                axios.post('/api/auth/login',this.form)
                .then(res=> {
                    User.responseAfterLogin(res)
                    Toast.fire({
  icon: 'success',
  title: 'You are Signed in successfully'
})
                    this.$router.push({name:'dashboard'})
                    
                } )
                .catch(error=>this.errors=error.response.data.errors)
                .catch(
                  Toast.fire({
                        icon: 'warning',
                        title: 'Invalid email address or password'
                })
                )
           },
       }
    }
</script>

<style >
.login-box{
    background-color: #007ACC !important;
    
}

</style>