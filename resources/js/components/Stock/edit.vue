<template>
    <div>
        <div class="row-fluid sortable ui-sortable">
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Stock</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
					<form class="form-horizontal" @submit.prevent="stockdataupdate" >
						  <fieldset>						
                            	
                            	<div class="control-group">
							  <label class="control-label" for="typeahead">Product Quantity :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" v-model="form.product_quantity">	
								<small class="text-danger" v-if="errors.product_quantity">{{errors.product_quantity[0]}}</small>	
							  </div>
							</div>
						        
						 	
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update</button>
							  <router-link to="/stock" class="btn btn-danger">Back</router-link>
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
                product_quantity: '',
			},
			errors:{},
			
        }
    },
    created(){
        let id = this.$route.params.id
        axios.get('/api/all-product/'+id)
        .then(({data})=>(this.form=data))
		.catch()
		
    },
	methods:{
		
		stockdataupdate(){
			let id = this.$route.params.id
			axios.post('/api/stock-update/'+id,this.form)
			.then(()=>{
				noty({type:'success',layout:'topRight',text:'Stock updated Successfully.',timeout: 1000})
				this.$router.push({name:'stock'})
				
			})
			.catch(
			)
			
			}

	}
}
</script>