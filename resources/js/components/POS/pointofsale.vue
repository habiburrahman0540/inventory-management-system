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
				<li><a href="#">Point Of Sale</a></li>
			</ul>
			 <div class="row-fluid sortable ui-sortable">		
				<div class="box span5">

						<div class="box-header" style="height:35px;">
						<h2>Expense insert</h2>
						<div class="design" style="float:right;padding:0px;">
<router-link to="/add-customer" class="btn btn-primary">Add Customer</router-link>
						</div>
						
					</div>
					<div class="box-content">
<table class="table table-striped">
							  <thead>
								  <tr>
									  <th>Name</th>
									  <th style="width:120px">Qtn</th>
									  <th>Unit</th>
									  <th>Total</th>                                          
									  <th>Action</th>                                          
								  </tr>
							  </thead>   
							  <tbody>
								<tr v-for="card in cards" :key="card.id">
									<td>{{card.product_name}}</td>
									<td class="center"><input type="text" readonly="" :value="card.product_quantity" style="width: 20px;height: 26px;margin-top: 5px;">
									<button class="btn btn-sm btn-primary" @click.prevent="increment(card.id)">+</button>
									<button class="btn btn-sm btn-danger" @click.prevent="decrement(card.id)">-</button>
									</td>
									<td class="center">{{card.product_price}}</td>
									<td class="center">{{card.sub_total}}</td>
									<td class="center">
										<a @click="removecarditems(card.id)" class="btn btn-sm btn-primary" >x</a>
									</td>                                       
								</tr>
							                            
							  </tbody>
						 </table>
							
					</div>
<div class="box-content">
						<table class="table table-bordered table-striped">
							<tbody><tr>
								<td style="text-align:center">
									<strong>
										Total Quantity
									</strong>
									
									</td>
								<td style="text-align:center">
									<strong>
				                       50
				                    </strong>
								</td>
							</tr>
							<tr>
								<td style="text-align:center">
									<strong>
										Sub	total
									</strong>
								</td>
								<td style="text-align:center">
									<strong>
				                       50
				                    </strong>
								</td>
							</tr>
							<tr>
								<td style="text-align:center">
									<strong>
										VAT
									</strong>	</td>
								<td style="text-align:center">
									<strong >
				                       50
				                    </strong>
								</td>
							</tr>
							<tr>
								<td style="text-align:center">
									<strong>
										Total
									</strong>
									</td>
									<td style="text-align:center">
									<strong>
				                       50
				                    </strong>
								</td>
							</tr>
							
						</tbody></table>
					</div>
					<div class="box-content">
						<form class="form-horizontal" @submit.prevent="">
						  <fieldset>						
                           
						<div class="control-group">
								<label class="control-label" for="selectError3">Customer Name</label>
								<div class="controls">
								  <select id="selectError3" >
									
									<option v-for="customer in customers" :key="customer.id">{{customer.name}}</option>
									
								  </select>
								  
								</div>
							  </div>
						
                          
						
								<div class="control-group">
							  <label class="control-label" for="typeahead">Pay Now :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" >
								
							  </div>
							</div>
                           <div class="control-group">
							  <label class="control-label" for="typeahead">Due amount :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" >
								
							  </div>
							</div>
                             <div class="controls">
							<button type="submit" class="btn btn-primary">Submit</button>
							 </div>
						  </fieldset>
						</form>   

					</div>
			
			</div>
				<div class="box span7">
					<div class="box-header">
						
					</div>
					<div class="box-content">
						<ul class="nav tab-menu nav-tabs" id="myTab">
							<li class="" v-for="category in Categories" :key="category.id" >
								<a href="#custom" data-toggle="tab" @click="allproductbycategoryid(category.id)">{{category.category_name}}</a>
								</li>
							<li class="active"><a href="#messages" data-toggle="tab">All Product</a></li>
						</ul>
						 
						<div id="myTabContent" class="tab-content">
								<div class="tab-pane active" id="messages">
									
									
										<div class="row-fluid" >
										<input type="text" v-model="searchterm" placeholder="Search" style="float:right;width:250px;margin-right:30px;">
											</div>	
													
													
														<ul class="thumbnails" >
														<li class="span3" v-for="product in searchfilter" :key="product.id">
															
															<div class="thumbnail" style="height:260px" >
															<img  alt="100x100" :src="product.image" style="width: 125px; height: 100px;">
															<div class="caption">
																<h6>{{product.product_name}}</h6>
																<p>{{product.product_code}}</p>
																<span class="badge badge-success" v-if="product.product_quantity >=1">available {{product.product_quantity}}</span>
																<span class="badge badge-danger priority red" v-else="">Stock out </span>
																<button class="btn btn-small btn-primary" style="margin-top:5px;margin-left:30px;" @click.prevent="addToCard(product.id)">Buy Now</button>
																
															</div>
															</div>
														
														</li>
														
														
														</ul>
												
												
												
							</div>
							<div class="tab-pane" id="custom">
										<div class="box-content">
											<div class="row-fluid" >
										<input type="text" v-model="searchterm" placeholder="Search" style="float:right;width:250px;margin-right:30px;">
											</div>
													<div class="row-fluid" >
														<ul class="thumbnails" >
														<li class="span3" v-for="getproduct in getsearchfilter" :key="getproduct.id">
															<div class="thumbnail" style="width:8.5rem" >
															<img  alt="100x100" :src="getproduct.image" style="width: 135px; height: 100px;">
															<div class="caption">
																<h6>{{getproduct.product_name}}</h6>
																<p>{{getproduct.product_code}}</p>
																<span class="badge badge-success" v-if="getproduct.product_quantity >=1">available {{getproduct.product_quantity}}</span>
																<span class="badge badge-danger priority red" v-else="">Stock out </span>
																<p style="margin-top:5px;margin-left:30px;"><a href="#" class="btn btn-primary"  @click.prevent="addToCard(getproduct.id)">Buy Now</a></p>
															</div>
															</div>
														</li>
														
														
														</ul>
												</div>

												</div>
							</div>
						
						</div>
					</div>
				</div>
					

					
			
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
				products:[],
				Categories:'',
				getproducts:[],
				customers:[],
				cards:[],
				searchterm:''
			}
		},
		computed:{
			searchfilter(){
				return this.products.filter(product =>{
					return product.product_name.match(this.searchterm)
					|| product.product_code.match(this.searchterm)
					
				})
			},
				getsearchfilter(){
				return this.getproducts.filter(getproduct =>{
					return getproduct.product_name.match(this.searchterm)
					|| getproduct.product_code.match(this.searchterm)
					
				})
			},
		},
		methods:{
			addToCard(id){
					axios.get('/api/addToCard/'+id)
					.then(()=>{
						Reload.$emit('Afteradd');
						noty({type:'success',layout:'topRight',text:'Product added successfully into card',timeout: 1000})
					}).catch()
			},
			increment(id){
				axios.get('/api/Cardproductincrement/'+id)
					.then(()=>{
						Reload.$emit('Afteradd');
						noty({type:'success',layout:'topRight',text:'Product added successfully into card',timeout: 1000})
					}).catch()
			},
				decrement(id){
				axios.get('/api/Cardproductdecrement/'+id)
					.then(()=>{
						Reload.$emit('Afteradd');
						noty({type:'success',layout:'topRight',text:'Product unit removed successfully from card',timeout: 1000})
					}).catch()
			},
			removecarditems(id){
					axios.get('/api/remove/cardItems/'+id)
					.then(()=>{
						Reload.$emit('Afteradd');
						noty({type:'success',layout:'topRight',text:'Product item remove successfully.',timeout: 1000})
					}).catch()
			},
			cardproduct(){
				axios.get('/api/card/product')
				.then(({data})=>(this.cards = data)).catch()
			},
			
			allproduct(){
				axios.get('/api/all-product')
				.then(({data})=>(this.products=data))
				.catch()
			},
			allcategory(){
				axios.get('/api/all-category')
				.then(({data})=>(this.Categories=data))
				.catch()
			},
			allproductbycategoryid(id){
				axios.get('/api/get-product-by-catid/'+id)
				.then(({data})=>(this.getproducts=data))
				.catch()
			},
			allcustomer(){
				axios.get('/api/all-customer')
				.then(({data})=>(this.customers=data))
				.catch()
			},
			
		},
		created(){
			this.allproduct()
			this.allcategory()
			this.allcustomer()
			this.cardproduct()
			Reload.$on('Afteradd',()=>{
				this.cardproduct()
			})

			
		}
}

 

</script>