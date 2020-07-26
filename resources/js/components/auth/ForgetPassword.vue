<template>
    <div>
        <div class="container-fluid-full">
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box">
					<div class="icons">
						<a href="index.html"><i class="halflings-icon home"></i></a>
						<a href="#"><i class="halflings-icon cog"></i></a>
					</div>
					<h2>Login to your account</h2>
					<form class="form-horizontal" action="" method="post">
						<fieldset>
							
							<div class="input-prepend" title="email">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="email" id="email" type="email" placeholder="type your email"/>
							</div>
							<div class="clearfix"></div>

							
							<div class="clearfix"></div>
							
					
							<div class="button-login">	
								<button type="submit" class="btn btn-primary">Recover Password</button>
							</div>
							<div class="clearfix"></div>
                            </fieldset>
					</form>
					<hr>
					<h3>Back to login page?</h3>
					<p>
						No problem, <router-link to="/">click here</router-link> 
					</p>	
				</div><!--/span-->
			</div><!--/row-->
			

	</div><!--/.fluid-container-->
	
		</div><!--/fluid-row-->
    </div>
</template>
<script>
    export default {
          
    }
</script>

<style >

</style>