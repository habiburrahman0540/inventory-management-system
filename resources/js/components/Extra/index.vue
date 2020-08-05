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
				<li><a href="#"> Information</a></li>
			</ul>
			
<router-link to="/add-extra" class="btn btn-primary" style="margin-bottom:10px;margin-top:-20px">Add Information</router-link>
			
		
	
        <div class="row-fluid sortable ui-sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon user"></i><span class="break"></span> Information</h2>
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
							  aria-label="Date registered: activate to sort column ascending" style="width: 255px;">Company Name</th>
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Date registered: activate to sort column ascending" style="width: 255px;">Vat</th>
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Date registered: activate to sort column ascending" style="width: 255px;">Year</th>
							   <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Date registered: activate to sort column ascending" style="width: 255px;">Email</th>
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Role: activate to sort column ascending" style="width: 140px;">Phone</th>
							  
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Role: activate to sort column ascending" style="width: 340px;">Address</th>
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Status: activate to sort column ascending" style="width: 149px;">Logo</th>
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
							  aria-label="Actions: activate to sort column ascending" style="width: 150px;">Actions</th></tr>
						  </thead>  						  
					  <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd " v-for="(information,index) in searchfilter()" :key="information.id">
								<td class="  sorting_1" >{{index+1}}</td>
								<td class="center ">{{information.name}}</td>
								<td class="center ">{{information.vat}}</td>
								<td class="center ">{{information.year}}</td>
								<td class="center ">{{information.email}}</td>
								<td class="center ">{{information.phone}}</td>
								
								<td class="center ">{{information.address}}</td>
							
								<td class="center ">
									<img :src="information.logo" alt="" style="width:50px;height:40px;border:2px solid#4CAE4C;border-radius:50%" >
								</td>
								<td class="center ">
									
									<router-link class="btn btn-success" :to="{name:'edit-extra',params:{id:information.id}}">
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
				informations:[],
				searchterm:''
			}
		},
		methods:{
			allinformation(){
				axios.get('/api/all-extra-information')
				.then(({data})=>(this.informations=data))
				.catch()
			},
			searchfilter(){
				return this.informations.filter(information =>{
					return information.name.match(this.searchterm)
					|| information.phone.match(this.searchterm)
					|| information.email.match(this.searchterm)
					
					
				})
			},

		},
		created(){
			this.allinformation()
		}
}
</script>