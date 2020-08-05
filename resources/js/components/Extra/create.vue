<template>
    <div>
		<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
            <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Add Extra Information</a></li>
			</ul>
        <div class="row-fluid sortable ui-sortable">
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Extra Information</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" @submit.prevent="extradatainsert" enctype="multipart/form-data">
						  <fieldset>						
                            	<div class="control-group">
							  <label class="control-label" for="typeahead">VAT :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" v-model="form.vat">		
								<small class="text-danger" v-if="errors.vat">{{errors.vat[0]}}</small>						
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Company Name :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" v-model="form.name">		
								<small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>						
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Year :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" v-model="form.year">		
								<small class="text-danger" v-if="errors.year">{{errors.year[0]}}</small>						
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
							  <label class="control-label" for="fileInput">Logo :</label>
							  <div class="controls">
								<div class="uploader" id="uniform-fileInput">
									<input class="input-file uniform_on" id="fileInput" type="file" @change="onFileSelected">
									<span class="filename" style="user-select: none;">No file selected</span>
									<span class="action" style="user-select: none;">Choose File</span></div>
									
										<img :src="form.logo" v-if="form.logo" alt="" style="width:40px;height:40px;margin-left:20px ;background:#FFFFFF; border: 1px solid #FFFFFF">
									<small class="text-danger" v-if="errors.logo">{{errors.logo[0]}}</small>
							  </div>
							</div>           
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save</button>
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
       created(){
            if(!User.loggedIn()){
                this.$router.push({name:'/'})
            }
        },
    data(){
        return{
            form:{
                vat: null,
                name: null,
                year: null,
                logo: null,
                phone: null,
                email: null,
                address: null,            
               
                
			},
			errors:{},
        }
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
					 console.log(event.target.result);
					  }
					reader.readAsDataURL(file)
			}
		},
		extradatainsert(){
			axios.post('/api/all-extra-information',this.form)
			.then((res)=>{
				this.$router.push({name:'allextra'})
				noty({type:'success',layout:'topRight',text:'Successfully done.',timeout: 1000})
			})
			.catch(
				error=>this.errors = error.response.data.errors
			)
			
			}

	}
}
</script>
			