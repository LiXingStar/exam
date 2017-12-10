<template>
    <div>
        <div class="panel admin-panel">
            <div class="panel-head"><strong class="icon-reorder"> 试卷列表</strong></div>
            <div class="padding border-bottom">
                <router-link class="button border-yellow" :to="{name:'testAdd'}"><span
                        class="icon-plus-square-o"></span> 添加试题
                </router-link>
            </div>

            <el-table
                    :data="tableData5"
                    style="width: 100%"
                    height="400"
            >
                <el-table-column
                        label="pid"
                        prop="pid">
                </el-table-column>
                <el-table-column
                        label="试卷名称"
                        prop="pname">
                </el-table-column>
                <el-table-column
                        label="班级"
                        prop="cname">
                </el-table-column>
                <el-table-column
                        label="出题者"
                        prop="author">
                </el-table-column>

                <el-table-column
                        label="操作"
                        width="100">
                    <template slot-scope="scope">
                        <el-button type="text" size="small">删除</el-button>
                       <router-link :to="{name:'editPaper',query:{pid:scope.row.pid}}">编辑</router-link>
                    </template>
                </el-table-column>
            </el-table>


        </div>
    </div>
</template>
<script>
    export default {
        name: 'manageTest',
        data: function () {
            return {
                tableData5: []
            }
        },
        methods: {
            del(did) {
                this.$http.post('/home/dirDelete.php', {did}).then(res => {
                    if (res.body == 'ok') {
                        this.tableData = this.tableData.filter(ele => ele.did != did);
                    } else if (res.body == 'error') {
                        this.$message({
                            showClose: true,
                            message: '删除失败'
                        });
                    }
                })
            }
        },
        mounted() {
            this.$http.get('/home/managePaper.php').then(res => {
                this.tableData5 = res.body;
            })
        }
    }
</script>
<style>

</style>