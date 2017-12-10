<template>
    <div>
        <div class="panel admin-panel">
            <div class="panel-head"><strong class="icon-reorder"> 题型列表</strong></div>
            <div class="padding border-bottom">
                <router-link  class="button border-yellow" :to="{name:'typeAdd'}" ><span class="icon-plus-square-o"></span> 添加题型</router-link>
            </div>


            <el-table
                    :data="tableData"
                    style="width: 100%">
                <el-table-column
                        prop="id"
                        label="id">
                </el-table-column>
                <el-table-column
                        prop="name"
                        label="题型"
                >
                </el-table-column>

                <el-table-column
                        label="操作"
                >
                    <template slot-scope="scope">
                     <router-link :to="{name:'dirUpdate',query:{did:scope.row.did}}" style="color: #409EFF;font-size: 14px">修改</router-link>

                        <el-button type="text" size="small" @click="del(scope.row.did)">删除</el-button>
                    </template>
                </el-table-column>

            </el-table>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'manageDir',
        data: function () {
            return {
                tableData: [
                ]
            }
        },
        methods:{
           del(did){
               this.$http.post('/home/dirDelete.php',{did}).then(res=>{
                   if(res.body =='ok'){
                      this.tableData =  this.tableData.filter(ele=>ele.did != did);
                   }else if(res.body =='error'){
                       this.$message({
                           showClose: true,
                           message: '删除失败'
                       });
                   }
               })
           }
        },
        mounted() {
            this.$http.get('/home/manageType.php').then(res => {
               this.tableData = res.body;
            })
        }
    }
</script>
<style>

</style>