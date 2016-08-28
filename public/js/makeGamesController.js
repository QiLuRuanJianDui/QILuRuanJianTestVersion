var makeGame = new Vue({
    http:{
        root: '/',
        headers: {
            'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
        }
    },
    el:'#makeGameController',
    data:{
        n:1,
        spiritList:[0]
    },
    methods:{
        setListLength:function (n) {
            if(n<1){
                alert('请输入大于0的数');
                this.n = 1;
                return;
            }
            this.spiritList = [0];
            for (var i=1;i<n;i++){
                this.spiritList.push(i);
                console.log(this.spiritList[i]);
            }
        }
    },
    ready:function () {

    }
});
$(document).ready(function(){

});