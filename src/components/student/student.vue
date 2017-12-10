<template>
    <div id="box">
        <header>
            <div class="content">
                <img src="../../assets/uek.png" alt="">
                <div class="right">
                    <ul class="nav">
                        <li>
                            <router-link :to="{name:'studentExam'}">试卷</router-link>
                        </li>
                        <li>
                            <router-link to="aa">历史记录</router-link>
                        </li>
                    </ul>
                    <ul class="info">
                        <li>
                            <el-button round>冯杰</el-button>
                        </li>
                        <li>
                            <el-button round>退出</el-button>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <router-view>

        </router-view>
    </div>
</template>
<script>

</script>
<style>
    * {
        margin: 0;
        padding: 0;
        list-style: none;
        text-decoration: none;
    }
    #box {
        width: 100%;
        height: auto;
    }

    #box header {
        width: 100%;
        height: 80px;
        background: #ffffff;
        position: fixed;
        left: 0;
        top: 0;
        z-index: 9999;
        box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
    }
    #box  .content{
        width:1200px;
        height:100%;
        margin:0 auto;
        display: flex;
        /*justify-content: space-between;*/
        align-items: center;
    }
    #box .content img{
        width:50px;
        height:50px;
        filter: grayscale(1);
    }
    #box .content .right{
        flex: 1;
        display: flex;
        justify-content: flex-end;
        height:100%;
    }
    .nav,.info{
        display: flex;
        height:100%;
        align-items: center;
    }
    .nav li , .info li{
        margin: 0  10px;
    }
    .nav{
        margin-right: 30px;
    }
    .nav li a{
        color: #5a5e66;
        font-size: 14px;
    }
 </style>
