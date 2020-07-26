
class Notification{
    success(){
       new Noty({
           type:'success',
           layout:'topRight',
           text: 'Successfully done.',
           timeout:1000,
           
       }).show();
    }
    alert(){
       new Noty({
           type:'alert',
           layout:'topRight',
           text: 'Are you sure ?',
           timeout: 1000,
           
       }).show();
    }
    error(){
       new Noty({
           type:'alert',
           layout:'topRight',
           text: 'Something is wrong !',
           timeout: 1000,
           
       }).show();
    }
    warning(){
       new Noty({
           type:'warning',
           layout:'topRight',
           text: 'Opps ! wrong ',
           timeout: 1000,
           
       }).show();
    }
    image_validation(){
        new Noty({
            type:'alert',
            layout:'topRight',
            text: 'Upload image file less than 1 MB',
            timeout: 1000,
            
        }).show();
    }
   }
   export default Notification = new Notification();