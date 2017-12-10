<template>
   <section id="exam">
       <ul class="box">
           <li class="item" v-for="item in table">
               <router-link :to="{name:'studentPaper',query:{pid:item.pid}}">
                   <img src="../../assets/images/11.jpg" alt="">
                   <h4>{{item.pname}} <span>{{cname}}</span></h4>
               </router-link>
           </li>
       </ul>
   </section>
</template>
<script>
  export default {
      name:'studentExam',
      data:function(){
          return {
              table:[],
              cname:''
          }
      },
      mounted(){
          this.$http.get('/home/studentExam.php').then(res=>{
              this.table = res.body[0];
              this.cname = res.body[1];
          })
      }
  }
</script>
<style>
    * {
        margin: 0;
        padding: 0;
        list-style: none;
    }
    #exam{
        padding-top: 100px;
        width:1200px;
        height: auto;
        margin: 0 auto;
    }
    #exam .box{
        width:100%;
        height:auto;
        display: flex;
        justify-content: flex-start;
        flex-wrap: wrap;
    }
    .box .item{
        width:280px;
        height:280px;
        border:1px solid #dddddd;
        border-radius: 5px;
        box-sizing: border-box;
        margin-bottom: 27px;
        margin-right: 26px;
    }
    .box .item:nth-of-type(4n){
        margin-right: 0;
    }
    .item a{
        display: block;
        width:100%;
        height:100%;
    }
    .item h4{
        height:50px;
        line-height: 50px;
        font-size: 16px;
        font-weight: normal;
        padding: 0 10px;
        display: flex;
        justify-content: space-between;
        color: #3a3a3a;

    }
    .item img{
        width:100%;
        height: 228px;
        filter: grayscale(1);
    }
 </style>
