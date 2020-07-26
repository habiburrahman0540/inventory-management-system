<template>
    <div>
        <div class="row-fluid sortable ui-sortable">
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" @submit.prevent="productinsert" enctype="multipart/form-data">
						  <fieldset>						
                            	<div class="control-group">
							  <label class="control-label" for="typeahead">Product Name :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" v-model="form.product_name">
								<small class="text-danger" v-if="errors.product_name">{{errors.product_name[0]}}</small>								
							  </div>
							</div>
                            	<div class="control-group">
							  <label class="control-label" for="typeahead">Product Code :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" v-model="form.product_code">	
								<small class="text-danger" v-if="errors.product_code">{{errors.product_code[0]}}</small>	
							  </div>
							</div>
						<div class="control-group">
								<label class="control-label" for="selectError3">Product Category</label>
								<div class="controls">
								  <select id="selectError3" v-model="form.category_id">
									
									<option :value="category.id" v-for="category in categories" :key="category.id">{{category.category_name}}</option>
									
								  </select>
								  <small class="text-danger" v-if="errors.product_name">{{errors.product_name[0]}}</small>	
								</div>
							  </div>
							 <div class="control-group">
								<label class="control-label" for="selectError3">Product Supplier</label>
								<div class="controls">
								  <select id="selectError3" v-model="form.supplier_id">
									
									<option :value="supplier.id" v-for="supplier in suppliers" :key="supplier.id">{{supplier.name}}</option>
									
								  </select>
								  <small class="text-danger" v-if="errors.product_name">{{errors.product_name[0]}}</small>	
								</div>
							  </div>
                            	<div class="control-group">
							  <label class="control-label" for="typeahead">Product root :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" v-model="form.root">	
								<small class="text-danger" v-if="errors.root">{{errors.root[0]}}</small>	
							  </div>
							</div>
								<div class="control-group">
							  <label class="control-label" for="typeahead">Buying Price :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" v-model="form.buying_price">	
								<small class="text-danger" v-if="errors.buying_price">{{errors.buying_price[0]}}</small>	
							  </div>
							</div>
								<div class="control-group">
							  <label class="control-label" for="typeahead">Selling Price :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" v-model="form.selling_price">
								<small class="text-danger" v-if="errors.selling_price">{{errors.selling_price[0]}}</small>		
							  </div>
							</div>
                               <div class="control-group">
							  <label class="control-label" for="date01">Buying Date:</label>
							  <div class="controls">
								<input type="date" class="input-xlarge datepicker hasDatepicker" id="date01" value="02/16/12" v-model="form.buying_date">
							 <small class="text-danger" v-if="errors.buying_date">{{errors.buying_date[0]}}</small>	
							  </div>
							</div>
                            	<div class="control-group">
							  <label class="control-label" for="typeahead">Product Quantity :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" v-model="form.product_quantity">	
								<small class="text-danger" v-if="errors.product_quantity">{{errors.product_quantity[0]}}</small>	
							  </div>
							</div>
							

							<div class="control-group">
							  <label class="control-label" for="fileInput">Product Image :</label>
							  <div class="controls">
								<div class="uploader" id="uniform-fileInput">
									<input class="input-file uniform_on" id="fileInput" type="file" @change="onFileSelected">
									<span class="filename" style="user-select: none;">No file selected</span>
									<span class="action" style="user-select: none;">Choose File</span></div>
									
										<img :src="form.image" v-if="form.image" alt="" style="width:40px;height:40px;margin-left:20px ;background:#FFFFFF; border: 1px solid #FFFFFF">
									<small class="text-danger" v-if="errors.image">{{errors.image[0]}}</small>	
							  </div>
							</div>          
						 	
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save</button>
							  <router-link to="/all-product" class="btn btn-danger">Back</router-link>
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
                category_id: null,
                product_name: null,
                product_code: null,
                root: null,
                buying_price: null,
                selling_price: null,
                supplier_id: null,
                buying_date: null,
                image: null,
                product_quantity: null,
			},
			errors:{},
			categories:{},
			suppliers:{},
        }
	},
	methods:{
		onFileSelected(event){
			let file = event.target.files[0];
			if(file.size > 1048770){
				noty({type:'error',layout:'topRight',text:'Product image size can not more than 1 MB',timeout: 1000})
			}else{
				let reader = new FileReader();
				 reader.onload = event =>{
					 this.form.image = event.target.result
					 console.log(event.target.result);
					  }
					reader.readAsDataURL(file)
			}
		},
		productinsert(){
			axios.post('/api/all-product',this.form)
			.then((res)=>{
				this.$router.push({name:'allproduct'})
				noty({type:'success',layout:'topRight',text:'Product inserted Successfully.',timeout: 1000})
			})
			.catch(
				error=>this.errors = error.response.data.errors
			)
			
			}

	},
	created(){
		axios.get('/api/all-category/')
		.then(({data}) =>(this.categories = data))
		axios.get('/api/all-supplier/')
		.then(({data})=>(this.suppliers = data))
	}

}
</script>