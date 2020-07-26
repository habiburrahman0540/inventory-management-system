<template>
    <div>
        <div class="row-fluid sortable ui-sortable">
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Create User</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" @submit.prevent="userinsert">
						  <fieldset>						
                            	<div class="control-group">
							  <label class="control-label" for="typeahead">Name :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" v-model="form.name">	
								<small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>							
							  </div>
							</div>
                            	<div class="control-group">
							  <label class="control-label" for="typeahead">Email :</label>
							  <div class="controls">
								<input type="email" class="span6 typeahead" v-model="form.email">	
								<small class="text-danger" v-if="errors.email">{{errors.email[0]}}</small>
							  </div>
							</div>
                            	<div class="control-group">
							  <label class="control-label" for="typeahead">Password :</label>
							  <div class="controls">
								<input type="password" class="span6 typeahead" v-model="form.password">
								<small class="text-danger" v-if="errors.password">{{errors.password[0]}}</small>	
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Password :</label>
							  <div class="controls">
								<input type="password" class="span6 typeahead" v-model="form.password_confirmation">
								<small class="text-danger" v-if="errors.password_confirmation">{{errors.password_confirmation[0]}}</small>	
							  </div>
							</div>
                                 
						 	
                       
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save</button>
							  <router-link to="/all-customer" class="btn btn-danger">Back</router-link>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div>
    </div>
</template>
<script>
export default {
       created(){
            if(!User.loggedIn()){
                this.$router.push({name:'/'})
            }
        },
    data(){
        return{
            form:{
                name: null,
                email: null,
                password: null,
                password_confirmation:null,
               
                
                
			},
			errors:{},
        }
	},
	methods:{
	
		userinsert(){
			axios.post('/api/auth/signup',this.form)
			.then((res)=>{
				this.$router.push({name:'alluser'})
				noty({type:'success',layout:'topRight',text:'Successfully done.',timeout: 1000})
			})
			.catch(
				error=>this.errors = error.response.data.errors
			)
			
			}

	}
}
</script>