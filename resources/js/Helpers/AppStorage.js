class AppStorage{
    StorageToken(token){
    localStorage.setItem('token',token)
    }
    StorageUser(user){
        localStorage.setItem('user',user)
        }
        Store(token,user){
            this.StorageToken(token)
            this.StorageUser(user)
        }
        clear(){
            localStorage.removeItem(token)
            localStorage.removeItem(user)
        }
        getToken(){
            localStorage.getItem(token);
        }
        getUser(){
            localStorage.getItem(user);
        }
    }
    export default AppStorage =new AppStorage();