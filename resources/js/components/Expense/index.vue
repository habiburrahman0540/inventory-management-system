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
				<li><a href="#">All Expense</a></li>
			</ul>
		<router-link to="/add-expense" class="btn btn-primary" style="margin-bottom:10px;margin-top:-20px"  >Add Expense</router-link>
        <div class="row-fluid sortable ui-sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Expense</h2>
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
							  aria-label="Date registered: activate to sort column ascending" style="width: 255px;">Expense Name</th>
							   <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Date registered: activate to sort column ascending" style="width: 255px;">Expense Description</th>
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Role: activate to sort column ascending" style="width: 140px;">Amount</th>
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Role: activate to sort column ascending" style="width: 140px;">Expense Date :</th>
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Actions: activate to sort column ascending" style="width: 298px;">Actions</th></tr>
						  </thead>  						  
					  <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd " v-for="(expense,index) in searchfilter()" :key="expense.id">
								<td class="  sorting_1" >{{index+1}}</td>
								<td class="center ">{{expense.expense_name}}</td>
								<td class="center ">{{expense.details}}</td>
								<td class="center ">{{expense.amount}}</td>
								<td class="center ">{{expense.expense_date}}</td>
								
								<td class="center ">
									
									<router-link class="btn btn-success" :to="{name:'edit-product',params:{id:expense.id}}">
										<i class="halflings-icon white edit"></i>                                            
									</router-link>
									<a class="btn btn-danger" @click="deleteexpense(expense.id)">
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
				expenses:[],
				searchterm:''
			}
		},
		methods:{
			allexpense(){
				axios.get('/api/all-expense')
				.then(({data})=>(this.expenses=data))
				.catch()
			},
			searchfilter(){
				return this.expenses.filter(expense =>{
					return expense.expense_name.match(this.searchterm)
					|| expense.amount.match(this.searchterm)
					
				})
			},
			deleteexpense(id){
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
	  axios.delete('/api/all-expense/'+id)
	  .then(
		  this.expenses = this.expenses.filter(expense=>{
			  return expense.id != id
		  })
	  )
	  .catch(()=>{
		  this.$router.push({name:'allexpense'})
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
			this.allexpense()
		}
}
</script>