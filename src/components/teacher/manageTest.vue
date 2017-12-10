<template>
    <div>
        <div class="panel admin-panel">
            <div class="panel-head"><strong class="icon-reorder"> 题库列表</strong></div>
            <div class="padding border-bottom">
                <router-link class="button border-yellow" :to="{name:'testAdd'}"><span
                        class="icon-plus-square-o"></span> 添加试卷
                </router-link>
            </div>

            <el-table
                    :data="tableData"
                    style="width: 100%"
                    height="400"
            >
                <el-table-column type="expand">
                    <template slot-scope="props">
                        <el-form label-position="left" inline class="demo-table-expand">
                            <el-form-item label="解析">
                                <span>{{ props.row.exp }}</span>
                            </el-form-item>
                            <br>

                            <div v-if="props.row.options">
                                <el-form-item label="选项">
                                </el-form-item>
                                <el-form-item v-for="item in props.row.options" :key="item">
                                    <span>{{item}}</span>
                                </el-form-item>
                            </div>
                        </el-form>
                    </template>
                </el-table-column>
                <el-table-column
                        label="tid"
                        prop="tid">
                </el-table-column>
                <el-table-column
                        label="类型"
                        prop="name">
                </el-table-column>
                <el-table-column
                        label="题干"
                        prop="title">
                </el-table-column>
                <el-table-column
                        label="答案"
                        prop="answer">
                </el-table-column>
                <el-table-column
                        label="分数"
                        prop="score">
                </el-table-column>
                <el-table-column
                        label="出题者"
                        prop="author">
                </el-table-column>
                <el-table-column
                        label="阶段"
                        prop="sname">
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
                tableData5: [
                    {
                        tid: '1',
                        title: '这一道测试题_A:1|B:2|C:3|D:4',
                        answer: 'A',
                        exp: '这是解析',
                        name: '单选',
                        author: '张三',
                        score: '2',
                        sname: 'html'
                    },
                    {
                        tid: '2',
                        title: '这2道测试题_A:1|B:2|C:3|D:4',
                        answer: 'A,B',
                        exp: '这是解析',
                        name: '多选',
                        author: '张三',
                        score: '2',
                        sname: 'html'
                    },
                    {
                        tid: '3',
                        title: '这是一道简单题_',
                        answer: '这是试题答案',
                        exp: '这是解析',
                        name: '简单',
                        author: '张三',
                        score: '2',
                        sname: 'html'
                    }
                ]
            }
        },
        computed: {
            tableData() {
                let tableData = [];
                this.tableData5.forEach(element => {
                    //{tid:element.tid,title:xx,options:'',name:'',answer:'',exp:''}
//                    '这2道测试题 ' 'A:1 B:2 C:3 D:4'
                    let v = element.title.split('_');
                    let title = v[0];
                    let options = [];
                    if (v[1]) {
                        let arr = v[1].split('|');
                        arr.forEach(ele => {
                            options.push(ele);
                        })
                    } else {
                        options = '';
                    }

                    tableData.push({
                        tid: element.tid,
                        answer: element.answer,
                        exp: element.exp,
                        score: element.score,
                        author: element.author,
                        name: element.name,
                        sname: element.sname,
                        title,
                        options
                    })

                })
                return tableData;
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
            this.$http.get('/home/manageTest.php').then(res => {
                this.tableData5 = res.body;
            })
        }
    }
</script>
<style>

</style>