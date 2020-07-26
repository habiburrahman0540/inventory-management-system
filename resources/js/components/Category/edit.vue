<template>
    <div>
        <div class="row-fluid sortable ui-sortable">
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Category</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" @submit.prevent="Categorydataupdate">
						  <fieldset>						
                            	<div class="control-group">
							  <label class="control-label" for="typeahead">Category Name :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" v-model="form.category_name">								
							  </div>
							</div>
                            	
                            	
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update</button>
							  <router-link to="/all-category" class="btn btn-danger">Back</router-link>
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
                category_name: '',
            }
        }
    },
    created(){
        let id = this.$route.params.id
        axios.get('/api/all-category/'+id)
        .then(({data})=>(this.form=data))
        .catch()
    },
	methods:{
	
		Categorydataupdate(){
			let id = this.$route.params.id
			axios.patch('/api/all-category/'+id,this.form)
			.then(()=>{
				noty({type:'success',layout:'topRight',text:'Category data Successfully updated.',timeout: 1000})
				this.$router.push({name:'allcategory'})
				
			})
			.catch(
			
			)
			
			}

	}
}
</script>