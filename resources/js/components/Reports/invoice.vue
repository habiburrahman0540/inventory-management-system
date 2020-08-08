<template>
    <div>
       <div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
            <button class="btn btn-info" @click.prevent="downloadpdf"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
        </div>
        <hr>
    </div>

<div class="invoice overflow-auto" id="pdfcontent">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        
                            <img :src="'/'+informations.logo" style="width:300px;height:186px" />
                           
                    </div>
                    <div class="col company-details" >
                        <h2 class="name">
                            <a target="_blank" href="https://lobianijs.com">
                            {{informations.name}}
                            </a>
                        </h2>
                        <div>Address: {{informations.address}}</div>
                        <div>Phone : {{informations.phone}}</div>
                        <div>Email : {{informations.email}}</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light"> <h4 class="to">INVOICE TO :</h4> </div>
                        <h2 class="to">{{order.name}}</h2>
                        <div class="address">{{order.address}}</div>
                        <div class="address">{{order.phone}}</div>
                        <div class="email"><a >{{order.email}}</a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE No: #{{order.order_year}}-{{order.id}}</h1>
                        <div class="date">Date of Invoice: {{order.order_date}}</div>
                        <div class="date">Due Date: {{order.order_date}}</div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>Item code</th>
                            <th class="text-left">Description</th>
                            <th class="text-right">Qtn</th>
                            <th class="text-right">Unit price</th>
                            <th class="text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr v-for="detail in details" :key="detail.id">
                            <td class="no">{{detail.product_code}}</td>
                            <td class="text-left"><h3>{{detail.product_name}}</h3></td>
							<td class="qty">{{detail.product_quantity}}</td>
                            <td class="unit">{{detail.product_price}}</td>
                            <td class="total">{{detail.subtotal}}</td>
                        </tr>
                       
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Subtotal</td>
                            <td>{{subtotal}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Vat {{informations.vat}}%</td>
                            <td>{{vatamount}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Grand Total</td>
                            <td>{{totalamount}}</td>
                        </tr>
						   <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Paid Amount</td>
                            <td>{{order.pay}}</td>
                        </tr>
						  <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Due Amount</td>
                            <td>{{order.due}}</td>
                        </tr>
					
                    </tfoot>
					
                </table>
				<br><br><br><br><br>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
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
        
				informations:[],
				order:[],
				details:[],
			
			
			
        }
	},
	computed:{
subtotal(){
				let sum = 0;
				for(let i =0; i < this.details.length; i++)
				{
					sum+= (parseFloat(this.details[i].product_quantity))*(parseFloat(this.details[i].product_price));
					

				}
				return sum;
				
			},
			vatamount(){
				let sum =(this.subtotal*this.informations.vat/100);
				
				return sum;
				
			},
			totalamount(){
				let sum =this.subtotal+this.vatamount;
				
				return sum;
			},
	},

   	 created(){
        this.Information()
        this.downloadpdf()
		let id= this.$route.params.id
		axios.get('/api/order-details/'+id)
			.then(({data})=>(this.order = data))
			.catch()
			axios.get('/api/order-orderdetails/'+id)
			.then(({data})=>(this.details = data))
			.catch()

    },
	methods:{
		Information(){
			axios.get('/api/all-data-information')
			.then(({data})=>(this.informations = data))
			.catch()
        },
        downloadpdf(){
          const doc = new jsPDF()
        autoTable(doc, { html: '#pdfcontent' })
        doc.save('invoice.pdf')
         
        }
		

	},

}
</script>
<style scoped>
#invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #DDDDDD;
    border-bottom: 1px solid #fff
}

.invoice table th {
     background: #3989C6;
    font-weight: bold;
    font-size: 16px;
	text-align: center;
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em;
	text-align: center;
}

.invoice table .no {
    
    font-size: 1.6em;
    background: #DDDDDD;
	text-align: center;
}

.invoice table .unit {
    background: #DDDDDD;
}

.invoice table .total {
    background: #DDDDDD;
    
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: #eee;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;text-align: center;font-weight: bold;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}
</style>