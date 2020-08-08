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
				<li><a href="#">Dashboard</a></li>
			</ul>
           
          
			
			<div class="row-fluid">	

				<a class="quick-button metro yellow span2">
					<i class="icon-group"></i>
					<p>Users</p>
					<span class="badge">237</span>
				</a>
				<a class="quick-button metro red span2">
					<i class="icon-bullhorn"></i>
					<p>Total Due Amount</p>
					<span class="badge">{{TotalDue}}</span>
				</a>
				<a class="quick-button metro blue span2">
					<i class="icon-shopping-cart"></i>
					<p>Today Sales</p>
					<span class="badge">{{todaysale}}</span>
				</a>
				<a class="quick-button metro blue span2">
					<i class="icon-shopping-cart"></i>
					<p>Today collection</p>
					<span class="badge">{{todaycollection}}</span>
				</a>
					<a class="quick-button metro blue span2">
					<i class="icon-shopping-cart"></i>
					<p>Today Due</p>
					<span class="badge">{{todaydue}}</span>
				</a>
				<a class="quick-button metro green span2">
					<i class="icon-barcode"></i>
					<p>Total Product</p>
					<span class="badge">{{totalProduct}}</span>
				</a>
			
				
				<div class="clearfix"></div>
								
			</div><!--/row-->
    </div>
</template>
<script>
    export default {
          created(){
            if(!User.loggedIn()){
                this.$router.push({name:'/'})
            }
		}, 
		data(){
			return{
				todaysale:'',
				todaycollection:'',
				todaydue:'',
				TotalDue:'',
				totalProduct:'',
			}
		},
		methods:{
			TotalProductS(){
				axios.get('/api/total-product')
				.then(({data})=>(this.totalProduct=data))
				.catch()
			},
			todaysales(){
				axios.get('/api/today-total-sales')
				.then(({data})=>(this.todaysale=data))
				.catch()
			},
			todaycollections(){
				axios.get('/api/today-total-collection')
				.then(({data})=>(this.todaycollection=data))
				.catch()
			},
			todaytotaldue(){
				axios.get('/api/today-total-due')
				.then(({data})=>(this.todaydue=data))
				.catch()
			},
				totaldue(){
				axios.get('/api/total-due')
				.then(({data})=>(this.TotalDue=data))
				.catch()
			},
		} ,
		created(){
			this.todaysales();
			this.todaycollections();
			this.todaytotaldue();
			this.totaldue();
			this.TotalProductS();
		}
    }
</script>
<style >

</style>