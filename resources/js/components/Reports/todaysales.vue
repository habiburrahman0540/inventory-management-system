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
				<li><a href="#">Today Sales Report</a></li>
			</ul>
		<div class="tdue" style="padding:0px;margin-bottom:10px;font-weight:bold;">
							<span class="quick-button">
							<i class="icon-beer" style="color:#1DBF73;font-size:30px"></i>
							<p style="color:#1DBF73;font-size:30px"> Total Sales Amount :  {{totalsale}}</p>
						</span>
							
						</div>
        <div class="row-fluid sortable ui-sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon user"></i><span class="break"></span>Today Sales Report</h2>
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
							  aria-label="Date registered: activate to sort column ascending" style="width: 255px;">Customer Name</th>
							   <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Date registered: activate to sort column ascending" style="width: 255px;">Total Amount</th>
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Date registered: activate to sort column ascending" style="width: 255px;">Paid Amount</th>
							    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Date registered: activate to sort column ascending" style="width: 255px;">Due Amount</th>
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Role: activate to sort column ascending" style="width: 140px;">Payment Type</th>
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Role: activate to sort column ascending" style="width: 140px;">Sales Date</th>
							  
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Role: activate to sort column ascending" style="width: 140px;">Status</th>
							  
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Actions: activate to sort column ascending" style="width: 298px;">Actions</th></tr>
						  </thead>  						  
					  <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd " v-for="(todaysalereport,index) in searchfilter()" :key="todaysalereport.id">
								<td class="  sorting_1" >{{index+1}}</td>
								<td class="center ">{{todaysalereport.name}}</td>
								<td class="center ">{{todaysalereport.total}}</td>
								<td class="center ">{{todaysalereport.pay}}</td>
								<td class="center ">{{todaysalereport.due}}</td>
								<td class="center ">{{todaysalereport.payby}}</td>
								<td class="center ">{{todaysalereport.order_date}}</td>
								<td class="center ">
									<span class="badge badge-success" v-if="todaysalereport.total == todaysalereport.pay">Paid</span>
									<span class="badge badge-warning" v-else-if="todaysalereport.pay >= 1">Partial paid</span>
																<span class="badge badge-danger priority red" v-else>Due</span>
																
								</td>
								

								
								
								<td class="center ">
									
									<router-link class="btn btn-success" :to="{name:'invoice',params:{id:todaysalereport.id}}">
										<i class="halflings-icon white zoom-in"></i>                                            
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
				todaysales:[],
				searchterm:'',
				totalsale:''
			}
		},
		methods:{
			todaysalesreport(){
				axios.get('/api/today-sales-report')
				.then(({data})=>(this.todaysales=data))
				.catch()
			},
			searchfilter(){
				return this.todaysales.filter(todaysale =>{
					return todaysale.name.match(this.searchterm)
					
					
				})
			},
				totalsales(){
				axios.get('/api/today-total-sales')
				.then(({data})=>(this.totalsale=data))
				.catch()
			},

		},
		created(){
			this.todaysalesreport()
			this.totalsales()
		}
}
</script>