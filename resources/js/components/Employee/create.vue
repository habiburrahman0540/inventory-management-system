<template>
    <div>
        <div class="row-fluid sortable ui-sortable">
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Employee</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" @submit.prevent="employeeinsert" enctype="multipart/form-data">
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
							  <label class="control-label" for="typeahead">Phone Number :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" v-model="form.phone">
								<small class="text-danger" v-if="errors.phone">{{errors.phone[0]}}</small>	
							  </div>
							</div>
                            	<div class="control-group">
							  <label class="control-label" for="typeahead">Address :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" v-model="form.address">
								<small class="text-danger" v-if="errors.address">{{errors.address[0]}}</small>	
							  </div>
							</div>
                            	<div class="control-group">
							  <label class="control-label" for="typeahead">Salary :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" v-model="form.salary">
								<small class="text-danger" v-if="errors.salary">{{errors.salary[0]}}</small>	
							  </div>
							</div>
							

							<div class="control-group">
							  <label class="control-label" for="fileInput">Photo :</label>
							  <div class="controls">
								<div class="uploader" id="uniform-fileInput">
									<input class="input-file uniform_on" id="fileInput" type="file" @change="onFileSelected">
									<span class="filename" style="user-select: none;">No file selected</span>
									<span class="action" style="user-select: none;">Choose File</span></div>
									
										<img :src="form.photo" v-if="form.photo" alt="" style="width:40px;height:40px;margin-left:20px ;background:#FFFFFF; border: 1px solid #FFFFFF">
									<small class="text-danger" v-if="errors.photo">{{errors.photo[0]}}</small>
							  </div>
							</div>          
						 	<div class="control-group">
							  <label class="control-label" for="typeahead">National ID :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" v-model="form.nid">	
								<small class="text-danger" v-if="errors.nid">{{errors.nid[0]}}</small>
							  </div>
							</div>
                        <div class="control-group">
							  <label class="control-label" for="date01">Date input</label>
							  <div class="controls">
								<input type="date" class="input-xlarge datepicker hasDatepicker" id="date01" value="02/16/12" v-model="form.joining_date">
							 <small class="text-danger" v-if="errors.joining_date">{{errors.joining_date[0]}}</small>
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save</button>
							  <router-link to="/all-employee" class="btn btn-danger">Back</router-link>
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
                phone: null,
                address: null,
                salary: null,
                photo: null,
                nid: null,
                joining_date: null
			},
			errors:{},
        }
	},
	methods:{
		onFileSelected(event){
			let file = event.target.files[0];
			if(file.size > 1048770){
				Notification.image_validation()
			}else{
				let reader = new FileReader();
				 reader.onload = event =>{
					 this.form.photo = event.target.result
					 console.log(event.target.result);
					  }
					reader.readAsDataURL(file)
			}
		},
		employeeinsert(){
			axios.post('/api/all-employee',this.form)
			.then(()=>{
				this.$router.push({name:'allemployee'})
				noty({type:'success',layout:'topRight',text:'Successfully done.',timeout: 1000})
			})
			.catch(
				error=>this.errors = error.response.data.errors
			)
			
			}

	}
}
</script>