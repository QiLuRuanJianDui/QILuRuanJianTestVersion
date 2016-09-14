var myGame = new Vue({
    http:{
        root: '/',
        headers: {
            'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
        }
    },
    el:'#myGameController',

    data:{

    },
    methods:{
        fetchGames:function () {
            this.$http.get('/api/showMyGames').then(function (response) {
                this.$set('games',response.data);
            })
        },
        deleteThisGame:function(game_id){
            if(confirm('你确定要删除吗？不可恢复哦')){
                this.$http.delete('/api/deleteMyGame/'+game_id).then(function (response) {
                    if(response.data){
                        alert('suss');
                    }else{
                        alert('好像哪里错了');
                    }
                });
                this.fetchGames();
            }
        }
    },
    ready:function(){
        this.fetchGames();
    }
});