<template>
    <div>
        <div class="panel admin-panel">
            <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
            <div class="padding border-bottom">
                <router-link  class="button border-yellow" :to="{name:'stageAdd'}" ><span class="icon-plus-square-o"></span> 添加内容</router-link>
            </div>


            <el-table
                    :data="tableData"
                    style="width: 100%">
                <el-table-column
                        prop="sid"
                        label="sid">
                </el-table-column>
                <el-table-column
                        prop="sname"
                        label="阶段名称"
                >
                </el-table-column>
                <el-table-column
                        prop="dname"
                        label="所属方向"
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
                    {
                        sid:1,
                        sname:'html',
                        dname:'前端'
                    }
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
            this.$http.get('/home/manageStage.php').then(res => {
                this.tableData = res.body;
            })
        }
    }
</script>
<style>

</style>