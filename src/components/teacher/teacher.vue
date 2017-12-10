<template>
    <div>
        <div class="header bg-main">
            <div class="logo margin-big-left fadein-top">
                <h1>后台试题管理中心</h1>
            </div>
            <div class="head-l"><a class="button button-little bg-green" href="" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a href="##" class="button button-little bg-blue"><span class="icon-wrench"></span> 清除缓存</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="login.html"><span class="icon-power-off"></span> 退出登录</a> </div>
        </div>
        <div class="leftnav">
            <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
            <h2><span class="icon-user"></span>基本设置</h2>
            <ul style="display:block">
                <li><a href="#/manage/manageDir"><span class="icon-caret-right"></span>修改密码</a></li>
            </ul>
            <h2><span class="icon-user"></span>功能设置</h2>
            <ul style="display:block">
                <li>
                    <router-link :to="{name:'manageType'}"><span class="icon-caret-right"></span>题型管理</router-link></li>
                <li>
                <li>
                    <router-link :to="{name:'manageTest'}"><span class="icon-caret-right"></span>试题管理</router-link></li>
                <li>
                    <router-link :to="{name:'managePaper'}"><span class="icon-caret-right"></span>试卷管理</router-link></li>
            </ul>
        </div>
        <ul class="bread">
            <li><a href="{:U('Index/info')}" target="right" class="icon-home"> 首页</a></li>
            <li><a id="a_leader_txt">网站信息</a></li>
        </ul>
        <div class="admin">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    export default {
        name:'manage',
        data:function(){
           return {

           }
        }
    }

    /*
    *  这是一个单选
    *  A:xxx
    *  B:xxx
    *  C:xxx
    *  D:xxx
    *
    *  这是一个单选_A:xxx|B:xxx|C:xxx|D:xxx
    *
    *  这是一道简答题
    * */
</script>
<style>
    @import "../../assets/css/admin.css";
    @import "../../assets/css/pintuer.css";
</style>