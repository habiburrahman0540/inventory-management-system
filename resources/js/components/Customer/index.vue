<template>
    <div>
		<router-link to="/add-customer" class="btn btn-primary" style="margin-bottom:10px;margin-top:-20px"  >Add Customer</router-link>
        <div class="row-fluid sortable ui-sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Customer</h2>
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
							  aria-label="Date registered: activate to sort column ascending" style="width: 255px;">Name</th>
							   <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Date registered: activate to sort column ascending" style="width: 255px;">Email</th>
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Role: activate to sort column ascending" style="width: 140px;">Phone</th>
							  
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Role: activate to sort column ascending" style="width: 340px;">Address</th>
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Status: activate to sort column ascending" style="width: 149px;">photo</th>
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Actions: activate to sort column ascending" style="width: 150px;">Actions</th></tr>
						  </thead>  						  
					  <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd " v-for="(customer,index) in searchfilter()" :key="customer.id">
								<td class="  sorting_1" >{{index+1}}</td>
								<td class="center ">{{customer.name}}</td>
								<td class="center ">{{customer.email}}</td>
								<td class="center ">{{customer.phone}}</td>
								
								<td class="center ">{{customer.address}}</td>
							
								<td class="center ">
									<img :src="customer.photo" alt="" style="width:50px;height:40px;border:2px solid#4CAE4C;border-radius:50%" >
								</td>
								<td class="center ">
									
									<router-link class="btn btn-success" :to="{name:'edit-customer',params:{id:customer.id}}">
										<i class="halflings-icon white edit"></i>                                            
									</router-link>
									<a class="btn btn-danger" @click="deletecustomer(customer.id)">
										<i class="halflings-icon white trash"></i> 
									</a>
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
				customers:[],
				searchterm:''
			}
		},
		methods:{
			allcustomer(){
				axios.get('/api/all-customer')
				.then(({data})=>(this.customers=data))
				.catch()
			},
			searchfilter(){
				return this.customers.filter(customer =>{
					return customer.name.match(this.searchterm)
					|| customer.phone.match(this.searchterm)
					|| customer.email.match(this.searchterm)
					
					
				})
			},
			deletecustomer(id){
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
	  axios.delete('/api/all-customer/'+id)
	  .then(
		  this.customers = this.customers.filter(customer=>{
			  return customer.id != id
		  })
	  )
	  .catch(()=>{
		  this.$router.push({name:'allcustomer'})
	  })


    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})
			}
		},
		created(){
			this.allcustomer()
		}
}
</script>