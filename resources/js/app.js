
require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import jsPDF from 'jspdf';
window.jsPDF = jsPDF;
import autoTable from 'jspdf-autotable'
window.autoTable =autoTable;
Vue.use(VueRouter)
window.Reload = new Vue();
import {routes} from './routes.js'
import User from './Helpers/User'
window.User = User;
import Notification from './Helpers/Notification.js'
window.Notification = Notification;

import Swal from 'sweetalert2'
window.Swal = Swal;
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});
window.Toast = Toast;
const router = new VueRouter({
    routes ,
    mode:'history'
  })


const app = new Vue({
    el: '#inventory',
    router,
});
