

var playController = new Vue({
    http:{
        root: '/',
        headers: {
            'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
        }
    },
    el:'#playController',
    data:{
        comment:{
            comment:''
        }
    },
    methods:{
        fetchComments:function () {
            var game_id = document.getElementById('game_id').innerHTML;
            this.$http.get('/api/comments/'+game_id).then(function (response) {
                this.$set('comments',response.data);
            })
        },
        addComment:function () {
            if(document.getElementById('authCheck').innerHTML){
                var com = this.comment;
                var game_id = document.getElementById('game_id').innerHTML;
                console.log(com);
                this.$http.post('/api/comments/'+game_id,com);
                this.fetchComments();
                this.comment.comment = '';
            }else{
                alert('您还没有登录');
            }

        }
    },
    ready:function () {

        this.fetchComments();
    }
});



