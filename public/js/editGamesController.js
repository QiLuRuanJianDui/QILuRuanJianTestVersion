var editGames = new Vue({
    http:{
        root: '/',
        headers: {
            'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
        }
    },
    el:'#editGamesController',
    data:{
        spiritList:[0],
        game_id: document.getElementById('game_id').innerHTML
    },
    methods:{
        setListLength:function (n) {
            if(n>this.config.spirits.length){
                while (this.config.spirits.length < n){
                    var spirit = {src:'',r:50,x:0,y:Math.random()};
                    this.config.spirits.push(spirit)
                }
            }else if(n<this.config.spirits.length){
                while (n < this.config.spirits.length){
                    this.config.spirits.pop()
                }
            }

        },
        alertMsg:function () {
            alert('error')
        },
        fetchConfig:function(){
            this.$http.get('/api/config/'+this.game_id).then(function(response){
                this.$set('config',response.data);
                this.n = this.config.spirits.length;
            })
        }
    },
    ready:function () {
        this.fetchConfig();
    }
});