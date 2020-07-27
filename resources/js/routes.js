
let login = require('./components/auth/login.vue').default;
let Register = require('./components/auth/register.vue').default;
let Logout = require('./components/auth/Logout.vue').default;
let ForgetPassword = require('./components/auth/ForgetPassword.vue').default;
let Dashboard = require('./components/Dashboard.vue').default;
 //Employee
 let Addemployee = require('./components/Employee/create.vue').default;
 let Allemployee = require('./components/Employee/index.vue').default;
 let Editemployee = require('./components/Employee/edit.vue').default;
 //Supplier
 let Addsupplier = require('./components/Supplier/create.vue').default;
 let Allsupplier = require('./components/Supplier/index.vue').default;
 let Editsupplier = require('./components/Supplier/edit.vue').default;
 //Customer
 let Addcustomer = require('./components/Customer/create.vue').default;
 let Allcustomer = require('./components/Customer/index.vue').default;
 let Editcustomer = require('./components/Customer/edit.vue').default;
 //Category
 let Addcategory = require('./components/Category/create.vue').default;
 let Allcategory = require('./components/Category/index.vue').default;
 let Editcategory = require('./components/Category/edit.vue').default;
 //Product
 let Addproduct = require('./components/Product/create.vue').default;
 let Allproduct = require('./components/Product/index.vue').default;
 let Editproduct = require('./components/Product/edit.vue').default;
 //Expense
 let Addexpense = require('./components/Expense/create.vue').default;
 let Allexpense = require('./components/Expense/index.vue').default;
 let Editexpense = require('./components/Expense/edit.vue').default;
 //user registration

 let Alluser = require('./components/User/Alluser.vue').default;
export const routes = [
    { path: '/', component: login , name:'/' },
    { path: '/register', component: Register , name:'register' },
    { path: '/logout', component: Logout , name:'logout' },
    { path: '/forgetpassword', component: ForgetPassword , name:'forget' },
    { path: '/dashboard', component: Dashboard , name:'dashboard' },
    //Employee
     { path: '/add-employee', component: Addemployee , name:'addemployee' },
     { path: '/all-employee', component: Allemployee , name:'allemployee' },
     { path: '/edit-employee/:id', component: Editemployee , name:'edit-employee' },
     //Supplier
     { path: '/add-supplier', component: Addsupplier , name:'addsupplier' },
     { path: '/all-supplier', component: Allsupplier , name:'allsupplier' },
     { path: '/edit-supplier/:id', component: Editsupplier , name:'edit-supplier' },
     //Customer
     { path: '/add-customer', component: Addcustomer , name:'addcustomer' },
     { path: '/all-customer', component: Allcustomer , name:'allcustomer' },
     { path: '/edit-customer/:id', component: Editcustomer , name:'edit-customer' },
      //Category
      { path: '/add-category', component: Addcategory , name:'addcategory' },
      { path: '/all-category', component: Allcategory , name:'allcategory' },
      { path: '/edit-category/:id', component: Editcategory , name:'edit-category' },
       //Product
       { path: '/add-product', component: Addproduct , name:'addproduct' },
       { path: '/all-product', component: Allproduct , name:'allproduct' },
       { path: '/edit-product/:id', component: Editproduct, name:'edit-product' },
       //Expenses
       { path: '/add-expense', component: Addexpense , name:'addexpense' },
       { path: '/all-expense', component: Allexpense , name:'allexpense' },
       { path: '/edit-expense/:id', component: Editexpense, name:'edit-expense' },
     //User
     
     { path: '/all-user', component: Alluser , name:'alluser' },
  ]