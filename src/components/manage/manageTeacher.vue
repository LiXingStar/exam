<template>
    <div>
        <div class="panel admin-panel">
            <div class="panel-head"><strong class="icon-reorder"> 教师列表</strong></div>
            <div class="padding border-bottom">
                <router-link  class="button border-yellow" :to="{name:'teacherAdd'}" ><span class="icon-plus-square-o"></span> 添加教师</router-link>
            </div>


            <el-table
                    :data="tableData"
                    ref="multipleTable"
                    style="width: 100%"  @selection-change="handleSelectionChange" max-height="350">
                <el-table-column
                        type="selection"
                        width="55">
                </el-table-column>
                <el-table-column
                        prop="tid"
                        label="tid">
                </el-table-column>
                <el-table-column
                        prop="mname"
                        label="姓名"
                >
                </el-table-column>
                <el-table-column
                        prop="cname"
                        label="班级"
                >
                </el-table-column>
                <el-table-column
                        prop="dname"
                        label="方向"
                >
                </el-table-column>

                <el-table-column
                        label="操作"
                >
                    <template slot-scope="scope">
                        <router-link :to="{name:'dirUpdate',query:{did:scope.row.did}}" style="color: #409EFF;font-size: 14px">修改</router-link>
                    </template>
                </el-table-column>

            </el-table>
            <div style="margin-top: 20px">
                <el-button @click="reverseSelect">反选</el-button>
                <el-button @click="cancelSelect">取消选择</el-button>
                <el-button @click="del">删除</el-button>
            </div>
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
                        tid:1,
                        mname:'苏凡',
                        cname:'wuif1707-1',
                        dname:'全栈'
                    }
                ],
                multipleSelection: []
            }
        },
        methods:{
            del(){
                let ids  = this.multipleSelection.map(ele=>ele.tid);
                this.$http.post('/home/teacherDelete.php',{ids}).then(res=>{
                    if(res.body =='ok'){
                        this.tableData =  this.tableData.filter(ele=> ids.indexOf(ele.tid) ==-1);

                    }else if(res.body =='error'){
                        this.$message({
                            showClose: true,
                            message: '删除失败'
                        });
                    }
                })
            },
            handleSelectionChange(val) {
                this.multipleSelection = val;
            },
            cancelSelect(){
                this.$refs.multipleTable.clearSelection();
            },
            reverseSelect(){
                this.tableData.forEach(row => {
                    this.$refs.multipleTable.toggleRowSelection(row);
                });
            }
        },
        mounted() {
            this.$http.get('/home/manageTeacher.php').then(res => {
                this.tableData = res.body;
            })
        }
    }
</script>
<style>

</style>