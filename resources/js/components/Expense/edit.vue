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
				<li><a href="#">Edit Expense</a></li>
			</ul>
        <div class="row-fluid sortable ui-sortable">
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Expense</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
					<form class="form-horizontal" @submit.prevent="expensedataupdate" >
						  <fieldset>						
                            	<div class="control-group">
							  <label class="control-label" for="typeahead">Expense Name :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" v-model="form.expense_name">
								<small class="text-danger" v-if="errors.expense_name">{{errors.expense_name[0]}}</small>								
							  </div>
							</div>
                            	<div class="control-group">
							  <label class="control-label" for="typeahead">Expense Description :</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" v-model="form.details">	
								<small class="text-danger" v-if="errors.details">{{errors.details[0]}}</small>	
							  </div>
							</div>
						
                            	<div class="control-group">
							  <label class="control-label" for="typeahead">Expense Amount:</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" v-model="form.amount">	
								<small class="text-danger" v-if="errors.amount">{{errors.amount[0]}}</small>	
							  </div>
							</div>
								<div class="control-group">
							  <label class="control-label" for="typeahead">Expense Date :</label>
							  <div class="controls">
								<input type="date" class="input-xlarge datepicker hasDatepicker" id="date01" value="02/16/12" v-model="form.expense_date">
							 <small class="text-danger" v-if="errors.expense_date">{{errors.expense_date[0]}}</small>		
							  </div>
							</div>
					        
						 	
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update</button>
							  <router-link to="/all-expense" class="btn btn-danger">Back</router-link>
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
				expense_name: '',
                details: '',
                amount: '',
                expense_date: '',
			},
			errors:{},
			
        }
    },
    created(){
        let id = this.$route.params.id
        axios.get('/api/all-expense/'+id)
        .then(({data})=>(this.form=data))
		.catch()
		
    },
	methods:{
		
		expensedataupdate(){
			let id = this.$route.params.id
			axios.patch('/api/all-expense/'+id,this.form)
			.then(()=>{
				noty({type:'success',layout:'topRight',text:'Expense updated Successfully.',timeout: 1000})
				this.$router.push({name:'allexpense'})
				
			})
			.catch(
			)
			
			}

	}
}
</script>