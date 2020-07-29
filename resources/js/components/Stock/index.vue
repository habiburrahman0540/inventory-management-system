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
				<li><a href="#">Stock</a></li>
			</ul>
		
        <div class="row-fluid sortable ui-sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon user"></i><span class="break"></span>Stock</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
						
					</div>

					<div class="box-content">
						<input type="text" v-model="searchterm" placeholder="Search" style="float:right;width:300px;margin-right:300px;">
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
						<table class="table table-striped table-bordered table-condensed bootstrap-datatable  "
											 id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
						  <thead>
							  <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" 
							  rowspan="1" colspan="1" aria-sort="ascending" aria-label="sl: activate to sort column descending" 
							  style="width: 60px;">Sl</th>
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Date registered: activate to sort column ascending" style="width: 255px;">Product Name</th>
							   <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Date registered: activate to sort column ascending" style="width: 255px;">Product Code</th>
							    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Date registered: activate to sort column ascending" style="width: 255px;">Purchase Date</th>
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Role: activate to sort column ascending" style="width: 140px;">Product Category</th>
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Role: activate to sort column ascending" style="width: 140px;">Product Supplier</th>
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Role: activate to sort column ascending" style="width: 140px;">Buying Price</th>
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Role: activate to sort column ascending" style="width: 140px;">Status</th>
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Role: activate to sort column ascending" style="width: 140px;">Present Stock</th>
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Status: activate to sort column ascending" style="width: 149px;">Product Image</th>
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Actions: activate to sort column ascending" style="width: 298px;">Actions</th></tr>
						  </thead>  						  
					  <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd " v-for="(product,index) in searchfilter()" :key="product.id">
								<td class="  sorting_1" >{{index+1}}</td>
								<td class="center ">{{product.product_name}}</td>
								<td class="center ">{{product.product_code}}</td>
								<td class="center ">{{product.buying_date}}</td>
								<td class="center ">{{product.category_name}}</td>
								<td class="center ">{{product.name}}</td>
								<td class="center ">{{product.buying_price}}</td>

								<td class="center " v-if="product.product_quantity >=1"><span class="badge badge-success">Available</span></td>
								<td class="center " v-else=""><span class="badge badge-danger priority red">Stock out</span></td>

								<td class="center ">{{product.product_quantity}}</td>
								<td class="center ">
									<img :src="product.image" alt="" style="width:50px;height:40px;border:2px solid#4CAE4C;border-radius:50%" >
								</td>
								<td class="center ">
									
									<router-link class="btn btn-success" :to="{name:'edit-stock',params:{id:product.id}}">
										<i class="halflings-icon white edit"></i>                                            
									</router-link>
									
								</td>
							</tr></tbody></table>
							</div>            
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
				products:[],
				searchterm:''
			}
		},
		methods:{
			allproduct(){
				axios.get('/api/all-product')
				.then(({data})=>(this.products=data))
				.catch()
			},
			searchfilter(){
				return this.products.filter(product =>{
					return product.product_name.match(this.searchterm)
					|| product.product_code.match(this.searchterm)
					
				})
			},
			deleteproduct(id){
				Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
	  axios.delete('/api/all-product/'+id)
	  .then(
		  this.products = this.products.filter(product=>{
			  return product.id != id
		  })
	  )
	  .catch(()=>{
		  this.$router.push({name:'allproduct'})
	  })


    Swal.fire(
      'Deleted!',
      'Your product has been deleted.',
      'success'
    )
  }
})
			}
		},
		created(){
			this.allproduct()
		}
}
</script>