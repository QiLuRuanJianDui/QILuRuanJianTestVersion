
window.onload = function () {

    var HEIGHT = $('#canvas').height();
    var WIDTH = $('#canvas').width();
    var dataText = document.getElementById('game_config').innerHTML;
    console.log('json',JSON.parse(dataText));
     var data = JSON.parse(dataText);
    $('#start').on('click',function(){
        var spirits = [];

        function setXY(obj,x,y) {
            $(obj).css('transform','translate('+x+'px,'+y+'px)');
        }





        function updateVx(x,v){
            return x-v;
        }





        function addSpirit(src, index,x,y,r,v){
            var spirit = new Spirit(src,index,x,y,r,v);
            spirits.push(spirit);
        }






        function randomY(){
            return Math.random()*HEIGHT/1.5;
        }






        /*圆形碰撞检测*/
        function collisionTestCircle(sx1,ex1,sy1,ey1,r1,sx2,ex2,sy2,ey2,r2){

            var ox1 = sx1 + ex1/2;
            var oy1 = sy1 + ey1/2;
            var ox2 = sx2 + ex2/2;
            var oy2 = sy2 + ey2/2;
            console.log(sy1,ey1);
            console.log('1'+' '+ox1+' '+oy1+' '+r1);
            console.log('2'+' '+ox2+' '+oy2+' '+r2);
            var x2 = (ox1-ox2)*(ox1-ox2);
            var y2 = (oy1-oy2)*(oy1-oy2);
            return  x2 + y2  < (r1+r2)*(r1+r2);


        }






        /*主精灵类*/
        function MainSpirit(src,index,x,y,r){
            $('#content').append('<img src="'+src+'" class="MainSpirit" style="transform: translate('+x+'px,'+y+'px);height: '+2*r+'px;' +
                'width: '+2*r+'px;" id="MainSpirit'+index+'">');
            var id = '#MainSpirit'+index;
            var MainSpirit = {
                element:$(id),
                x:x,
                y:y,
                id:id,
                r:r,
                src:src,
                index:index,
                destroy:function(){
                    $(id).remove();
                }
            };
            return MainSpirit;

        }







        /*场景精灵类*/
        function Spirit(src, index,x,y,r,v) {
            $('#content').append('<img src="'+src+'" class="MainSpirit" style="transform: translate('+x+'px,'+y+'px);height: '+2*r+'px;' +
                'width: '+2*r+'px;"id="spirit'+index+'">');
            var id = '#spirit'+index;
            var spirit = {
                element:$(id),
                x:x,
                y:y,
                v:v,
                r:r,
                src:src,
                index:index,
                id:id,
                destroy:function () {
                    $(id).remove();
                },
            };
            return spirit;
        }



        var canvas = document.getElementById('canvas');
        var cxt = canvas.getContext('2d');

        var mainSpirit = new MainSpirit(data.mainSpirit.src,data.mainSpirit.index,data.mainSpirit.x*(WIDTH - data.mainSpirit.r*2),data.mainSpirit.y,data.mainSpirit.r);




        $('#canvas').mousemove(function (e){
            // mainSpirit.x = e.offsetX - mainSpirit.element.width()*2;

            mainSpirit.y = e.offsetY - mainSpirit.element.height()/2;
            setXY(mainSpirit.element,mainSpirit.x,mainSpirit.y);
        });




        canvas.addEventListener('touchmove',function (event) {
            var touch = event.targetTouches[0];
            // mainSpirit.x = touch.pageX -mainSpirit.element.width()*2;

            mainSpirit.y = touch.pageY - mainSpirit.element.height()/2;
            console.log(touch.pageX);
            setXY(mainSpirit.element,mainSpirit.x,mainSpirit.y);
        });



        addSpirit(data.spirits[0].src,spirits.length,WIDTH + 200,data.spirits[0].y*(HEIGHT-data.spirits[0].r*2),data.spirits[0].r,data.spiritsV);

        var needToAdd = true;

        var InterVal = setInterval(function(){



0

            if(spirits[spirits.length-1].x<$('#canvas').width()/10*9&&needToAdd){
                var x = WIDTH + 200;
                var index = spirits.length;
                addSpirit(data.spirits[index].src,spirits.length,x,data.spirits[index].y*(HEIGHT-data.spirits[0].r*2),data.spirits[index].r,data.spiritsV);
            }
            for(var i=0;i<spirits.length;i++){
                spirits[i].x = updateVx(spirits[i].x,spirits[i].v);
                setXY(spirits[i].element,spirits[i].x,spirits[i].y);
                if(spirits[i].x<-20){
                    spirits[i].destroy();
                }
                if(collisionTestCircle(mainSpirit.x,mainSpirit.element.width(),mainSpirit.y,mainSpirit.element.height(),mainSpirit.r,
                        spirits[i].x,spirits[i].element.width(),spirits[i].y,spirits[i].element.height(),spirits[i].r)){
                    spirits[i].y = spirits[i].y + HEIGHT;
                    setXY(spirits[i].x,spirits[i].y);
                    console.log('你撞了');
                }

            }






            if(spirits.length == data.spirits.length){
                needToAdd = false;
                console.log(spirits[spirits.length - 1].x,spirits.length);
                if(spirits[spirits.length - 1].x<-100){
                    clearInterval(InterVal);
                }

            }




        },1);
    })




};

