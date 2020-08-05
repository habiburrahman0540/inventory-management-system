<template>
    <div>
        <div class="row-fluid sortable ui-sortable">
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Information</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" @submit.prevent="Informationdataupdate" enctype="multipart/form-data">
						  <fieldset>						
                            <div class="control-group">
							  <label class="control-label" for="typeahead">VAT :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" v-model="form.vat">		
														
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Company Name :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" v-model="form.name">		
														
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Year :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" v-model="form.year">		
														
							  </div>
							</div>
                            	<div class="control-group">
							  <label class="control-label" for="typeahead">Email :</label>
							  <div class="controls">
								<input type="email" class="span6 typeahead" v-model="form.email">
									
							  </div>
							</div>
                            	<div class="control-group">
							  <label class="control-label" for="typeahead">Phone Number :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" v-model="form.phone">
								
							  </div>
							</div>
                            	<div class="control-group">
							  <label class="control-label" for="typeahead">Address :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" v-model="form.address">	
								
							  </div>
							</div>
                            
							

							<div class="control-group">
							  <label class="control-label" for="fileInput">Logo :</label>
							  <div class="controls">
								<div class="uploader" id="uniform-fileInput">
									<input class="input-file uniform_on" id="fileInput" type="file" @change="onFileSelected">
									<span class="filename" style="user-select: none;">No file selected</span>
									<span class="action" style="user-select: none;">Choose File</span></div>
									
										<img :src="form.logo" v-if="form.logo" alt="" style="width:40px;height:40px;margin-left:20px ;background:#FFFFFF; border: 1px solid #FFFFFF">
									
							  </div>
							</div>              
						 
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update</button>
							  <router-link to="/all-extra" class="btn btn-danger">Back</router-link>
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
       mounted(){
            if(!User.loggedIn()){
                this.$router.push({name:'/'})
            }
        },
    data(){
        return{
            form:{
                vat: '',
                name: '',
                year: '',
                logo: '',
                phone: '',
                email: '',
                address: '',
               
                
            }
        }
    },
    created(){
        let id = this.$route.params.id
        axios.get('/api/all-extra-information/'+id)
        .then(({data})=>(this.form=data))
        .catch()
    },
	methods:{
		onFileSelected(event){
			let file = event.target.files[0];
			if(file.size > 1048770){
				noty({type:'warning',layout:'topRight',text:'File size can not be more then 1 MB.',timeout: 1000})
			}else{
				let reader = new FileReader();
				 reader.onload = event =>{
					 this.form.logo = event.target.result
					 
					  }
					reader.readAsDataURL(file)
			}
		},
		Informationdataupdate(){
			let id = this.$route.params.id
			axios.patch('/api/all-extra-information/'+id,this.form)
			.then(()=>{
				noty({type:'success',layout:'topRight',text:'Successfully updated.',timeout: 1000})
				this.$router.push({name:'allextra'})
				
			})
			.catch(
				
			)
			
			}

	}
}
</script>