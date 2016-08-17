var User = new Vue({
  http: {
        root: '/api',
        headers: {
            'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
        }
    },
el:'#UserLoginController',
data:{
  user:{
    name:'mike',
  },
  guest:true,
},
methods:{
  checkUser:function(){
    this.$http.get('/api/check').then(function(response){
      this.guest = response.data;
    });
  },
},
ready:function(){
  this.checkUser();
}
});
