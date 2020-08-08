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
				<li><a href="#">Total Due Report</a></li>
			</ul>
		<div class="tdue" style="padding:0px;margin-bottom:10px;font-weight:bold;">
							<span class="quick-button">
							<i class="icon-beaker" style="color:red;font-size:30px"></i>
							<p style="color:red;font-size:30px"> Total Due Amount :  {{totaldue}}</p>
						</span>
							
						</div>
						
        <div class="row-fluid sortable ui-sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon user"></i><span class="break"></span>Total Due Report</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
						
					</div>

					<div class="box-content">
						
						
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
							  aria-label="Role: activate to sort column ascending" style="width: 140px;">Sales Date</th>
							    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Date registered: activate to sort column ascending" style="width: 255px;">Due Amount</th>
							  
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Actions: activate to sort column ascending" style="width: 298px;">Actions</th></tr>
						  </thead>  						  
					  <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd " v-for="(dueamount,index) in dueamounts" :key="dueamount.id">
								<td class="  sorting_1" >{{index+1}}</td>
								<td class="center ">{{dueamount.name}}</td>
								<td class="center ">{{dueamount.order_date}}</td>
								<td class="center ">
								<span class="badge badge-danger priority red">{{dueamount.due}}</span>
									</td>
					
								<td class="center ">
									
									<router-link class="btn btn-success" :to="{name:'invoice',params:{id:dueamount.id}}">
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
				dueamounts:[],
				totaldue:'',
			}
		},
		methods:{
			dueamount(){
				axios.get('/api/yearly-sales-report')
				.then(({data})=>(this.dueamounts=data))
				.catch()
			},
			Totaldue(){
			axios.get('/api/total-due-amount')
				.then(({data})=>(this.totaldue=data))
				.catch()
			},

		},
		created(){
			this.dueamount()
			this.Totaldue()
		}
}
</script>